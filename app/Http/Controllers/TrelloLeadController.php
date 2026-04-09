<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class TrelloLeadController extends Controller
{
    private const CUSTOM_FIELDS = [
        'email' => '6996b768eff1fcfb37ddec0d',
        'whatsapp' => '6996b780ecc15d5e0aeb90cd',
        'company' => '6996b790fd4110ab01fc627b',
        'audit' => '6996ba29e6a3c0df97cc5a97',
        'kebutuhan_1' => '6996ba58a45f3af90c86369d',
        'kebutuhan_2' => '6996ba8f236afae78e46eaa2',
        'detail_lainnya' => '6996bb379dc030f946dcf00e',
        'bidding' => '6996bb6f62b2823975ab2363',
        'channel' => '6996bab31a7287003fc663a8',
        'vendor_db' => '6996baeca1f87b1dcefeb8d6',
        'ekspektasi' => '6996bb0945f919bc2110b31c',
        'consent' => '6996bb1a6c9ab346aca278b4',
    ];

    private const OPTIONS = [
        'audit' => [
            'Ya' => '6996ba29e6a3c0df97cc5a98',
            'Sebagian' => '6996ba29e6a3c0df97cc5a99',
            'Tidak' => '6996ba29e6a3c0df97cc5a9a',
        ],
        'kebutuhan_1' => [
            'Kecepatan proses pengadaan' => '6996ba58a45f3af90c86369e',
            'Transparansi & Audit Trail' => '6996ba58a45f3af90c86369f',
            'Kontrol & Evaluasi Vendor' => '6996ba58a45f3af90c8636a0',
            'Efisiensi Biaya' => '6996ba58a45f3af90c8636a1',
            'Lainnya' => '6996ba58a45f3af90c8636a2',
        ],
        'kebutuhan_2' => [
            'Kecepatan proses pengadaan' => '6996ba8f236afae78e46eaa3',
            'Transparansi & Audit Trail' => '6996ba8f236afae78e46eaa4',
            'Kontrol & Evaluasi Vendor' => '6996ba8f236afae78e46eaa5',
            'Efisiensi Biaya' => '6996ba8f236afae78e46eaa6',
            'Lainnya' => '6996ba8f236afae78e46eaa7',
        ],
        'bidding' => [
            'Ya, rutin' => '6996bb6f62b2823975ab2364',
            'Kadang-kadang' => '6996bb6f62b2823975ab2365',
            'Tidak' => '6996bb6f62b2823975ab2366',
        ],
        'channel' => [
            'Email / Excel / WhatsApp' => '6996bab31a7287003fc663a9',
            'Sistem internal sederhana' => '6996bab31a7287003fc663aa',
            'ERP / Sistem Enterprise' => '6996bab31a7287003fc663ab',
        ],
        'vendor_db' => [
            'Sudah tersentralisasi sistem' => '6996baeca1f87b1dcefeb8d7',
            'Belum, dokumen masih manual' => '6996baeca1f87b1dcefeb8d8',
            'Belum, dokumentasi masih manual' => '6996baeca1f87b1dcefeb8d8',
        ],
        'ekspektasi' => [
            'Sistem siap pakai (plug & play), minim penyesuaian' => '6996bb0945f919bc2110b31d',
            'Bertahap, konfigurasi seperlunya' => '6996bb0945f919bc2110b31e',
            'Perlu disesuaikan dengan kebijakan / kebutuhan khusus' => '6996bb0945f919bc2110b31f',
        ],
    ];

    public function __invoke(Request $request)
    {
        if ($request->isMethod('options')) {
            return response('', 204, $this->corsHeaders());
        }

        if (! $request->isMethod('post')) {
            return response()->json(['error' => 'Method not allowed'], 405, $this->corsHeaders());
        }

        $config = config('services.trello_lead');

        if (blank($config['key'] ?? null) || blank($config['token'] ?? null) || blank($config['list'] ?? null)) {
            return response()->json([
                'error' => 'Trello lead config is missing',
            ], 500, $this->corsHeaders());
        }

        $data = $request->json()->all();

        if (! is_array($data) || $data === []) {
            $data = $request->all();
        }

        if (! empty($data['website'] ?? '')) {
            return response()->json(['ok' => true], 200, $this->corsHeaders());
        }

        $payload = $this->normalizePayload($data);
        $errors = $this->validatePayload($payload);

        if ($errors !== []) {
            return response()->json([
                'error' => 'Validasi gagal',
                'details' => $errors,
            ], 400, $this->corsHeaders());
        }

        try {
            [$cardId, $cardUrl] = $this->createCard($payload, $config);
            $warnings = $this->syncCustomFields($cardId, $payload, $config);

            return response()->json([
                'ok' => true,
                'cardId' => $cardId,
                'cardUrl' => $cardUrl,
                'customFieldWarnings' => $warnings,
            ], 200, $this->corsHeaders());
        } catch (\Throwable $exception) {
            return response()->json([
                'error' => 'Trello error',
                'message' => $exception->getMessage(),
            ], 500, $this->corsHeaders());
        }
    }

    private function normalizePayload(array $data): array
    {
        $kebutuhan = $data['kebutuhan'] ?? $data['kebutuhan[]'] ?? [];

        if (! is_array($kebutuhan)) {
            $kebutuhan = [$kebutuhan];
        }

        $kebutuhan = array_values(array_filter(array_map(
            static fn ($value) => trim((string) $value),
            $kebutuhan
        )));

        return [
            'nama_lengkap' => trim((string) ($data['nama_lengkap'] ?? '')),
            'perusahaan' => trim((string) ($data['perusahaan'] ?? '')),
            'email' => trim((string) ($data['email'] ?? '')),
            'telepon' => trim((string) ($data['telepon'] ?? '')),
            'proses_pengadaan' => trim((string) ($data['proses_pengadaan'] ?? '')),
            'kebutuhan' => $kebutuhan,
            'kebutuhan_lainnya' => trim((string) ($data['kebutuhan_lainnya'] ?? '')),
            'proses_bidding' => trim((string) ($data['proses_bidding'] ?? '')),
            'proses_pengadaan_2' => trim((string) ($data['proses_pengadaan_2'] ?? '')),
            'ekspektasi_sistem' => trim((string) ($data['ekspektasi_sistem'] ?? '')),
            'database_vendor' => trim((string) ($data['database_vendor'] ?? '')),
            'permintaan' => trim((string) ($data['permintaan'] ?? '')),
            'consent' => trim((string) ($data['consent'] ?? '')),
        ];
    }

    private function validatePayload(array $payload): array
    {
        $errors = [];

        if ($payload['nama_lengkap'] === '') {
            $errors[] = 'Nama lengkap & jabatan wajib diisi.';
        }

        if ($payload['perusahaan'] === '') {
            $errors[] = 'Perusahaan wajib diisi.';
        }

        if ($payload['email'] === '') {
            $errors[] = 'Email wajib diisi.';
        }

        if ($payload['telepon'] === '') {
            $errors[] = 'Nomor Whatsapp wajib diisi.';
        }

        if ($payload['proses_pengadaan'] === '') {
            $errors[] = 'Proses pengadaan wajib dipilih.';
        }

        if (count($payload['kebutuhan']) === 0) {
            $errors[] = 'Pilih minimal 1 kebutuhan mendesak.';
        }

        if (count($payload['kebutuhan']) > 2) {
            $errors[] = 'Kebutuhan mendesak maksimal 2 pilihan.';
        }

        if (in_array('Lainnya', $payload['kebutuhan'], true) && $payload['kebutuhan_lainnya'] === '') {
            $errors[] = 'Jika memilih "Lainnya", deskripsi wajib diisi.';
        }

        if ($payload['proses_bidding'] === '') {
            $errors[] = 'Proses bidding/tender wajib dipilih.';
        }

        if ($payload['proses_pengadaan_2'] === '') {
            $errors[] = 'Proses pengadaan via wajib dipilih.';
        }

        if ($payload['ekspektasi_sistem'] === '') {
            $errors[] = 'Ekspektasi sistem wajib dipilih.';
        }

        if ($payload['database_vendor'] === '') {
            $errors[] = 'Database vendor wajib dipilih.';
        }

        if ($payload['permintaan'] === '') {
            $errors[] = 'Permintaan awal wajib diisi.';
        }

        if ($payload['consent'] !== 'agree') {
            $errors[] = 'Persetujuan privasi wajib dicentang.';
        }

        return $errors;
    }

    private function createCard(array $payload, array $config): array
    {
        $response = Http::asForm()
            ->timeout(25)
            ->post('https://api.trello.com/1/cards', [
                'idList' => $config['list'],
                'name' => "[iProc Cloud Lead] {$payload['perusahaan']} — {$payload['nama_lengkap']}",
                'desc' => "=== PERMINTAAN AWAL ===\n{$payload['permintaan']}",
                'key' => $config['key'],
                'token' => $config['token'],
            ]);

        $this->assertOk($response, 'create card');

        $cardId = $response->json('id');
        $cardUrl = $response->json('url');

        if (! $cardId) {
            throw new RuntimeException('Card created but missing card ID');
        }

        return [$cardId, $cardUrl];
    }

    private function syncCustomFields(string $cardId, array $payload, array $config): array
    {
        $warnings = [];
        $key = $config['key'];
        $token = $config['token'];

        $runner = function (string $label, callable $callback) use (&$warnings): void {
            try {
                $callback();
            } catch (\Throwable $exception) {
                $warnings[] = "{$label}: {$exception->getMessage()}";
            }
        };

        $runner('Alamat Email', fn () => $this->setTextField($cardId, self::CUSTOM_FIELDS['email'], $payload['email'], $key, $token, 'set email'));
        $runner('Nomor Whatsapp', fn () => $this->setTextField($cardId, self::CUSTOM_FIELDS['whatsapp'], $payload['telepon'], $key, $token, 'set whatsapp'));
        $runner('Nama Perusahaan', fn () => $this->setTextField($cardId, self::CUSTOM_FIELDS['company'], $payload['perusahaan'], $key, $token, 'set company'));

        $this->setListFieldIfMapped($runner, 'Auditability', 'audit', $payload['proses_pengadaan'], $cardId, self::CUSTOM_FIELDS['audit'], $key, $token, 'set audit list');
        $this->setListFieldIfMapped($runner, 'Bidding', 'bidding', $payload['proses_bidding'], $cardId, self::CUSTOM_FIELDS['bidding'], $key, $token, 'set bidding list');
        $this->setListFieldIfMapped($runner, 'Channel', 'channel', $payload['proses_pengadaan_2'], $cardId, self::CUSTOM_FIELDS['channel'], $key, $token, 'set channel list');
        $this->setListFieldIfMapped($runner, 'Vendor DB', 'vendor_db', $payload['database_vendor'], $cardId, self::CUSTOM_FIELDS['vendor_db'], $key, $token, 'set vendor db list');
        $this->setListFieldIfMapped($runner, 'Ekspektasi', 'ekspektasi', $payload['ekspektasi_sistem'], $cardId, self::CUSTOM_FIELDS['ekspektasi'], $key, $token, 'set ekspektasi list');

        $need1 = $payload['kebutuhan'][0] ?? '';
        $need2 = $payload['kebutuhan'][1] ?? '';

        $this->setListFieldIfMapped($runner, 'Kebutuhan 1', 'kebutuhan_1', $need1, $cardId, self::CUSTOM_FIELDS['kebutuhan_1'], $key, $token, 'set kebutuhan 1');
        $this->setListFieldIfMapped($runner, 'Kebutuhan 2', 'kebutuhan_2', $need2, $cardId, self::CUSTOM_FIELDS['kebutuhan_2'], $key, $token, 'set kebutuhan 2');

        if (in_array('Lainnya', $payload['kebutuhan'], true) && $payload['kebutuhan_lainnya'] !== '') {
            $runner('Detail Lainnya', fn () => $this->setTextField($cardId, self::CUSTOM_FIELDS['detail_lainnya'], $payload['kebutuhan_lainnya'], $key, $token, 'set detail lainnya'));
        }

        $runner('Consent', fn () => $this->setCheckboxField($cardId, self::CUSTOM_FIELDS['consent'], true, $key, $token, 'set consent'));

        return $warnings;
    }

    private function setListFieldIfMapped(callable $runner, string $label, string $mapKey, string $selectedValue, string $cardId, string $fieldId, string $key, string $token, string $context): void
    {
        $mappedValue = self::OPTIONS[$mapKey][$selectedValue] ?? null;

        if (! $mappedValue) {
            return;
        }

        $runner($label, fn () => $this->setListField($cardId, $fieldId, $mappedValue, $key, $token, $context));
    }

    private function setTextField(string $cardId, string $fieldId, string $value, string $key, string $token, string $context): void
    {
        $response = Http::timeout(25)->put(
            $this->customFieldUrl($cardId, $fieldId, $key, $token),
            ['value' => ['text' => $value]]
        );

        $this->assertOk($response, $context);
    }

    private function setListField(string $cardId, string $fieldId, string $idValue, string $key, string $token, string $context): void
    {
        $response = Http::timeout(25)->put(
            $this->customFieldUrl($cardId, $fieldId, $key, $token),
            ['idValue' => $idValue]
        );

        $this->assertOk($response, $context);
    }

    private function setCheckboxField(string $cardId, string $fieldId, bool $checked, string $key, string $token, string $context): void
    {
        $response = Http::timeout(25)->put(
            $this->customFieldUrl($cardId, $fieldId, $key, $token),
            ['value' => ['checked' => $checked ? 'true' : 'false']]
        );

        $this->assertOk($response, $context);
    }

    private function customFieldUrl(string $cardId, string $fieldId, string $key, string $token): string
    {
        return "https://api.trello.com/1/card/{$cardId}/customField/{$fieldId}/item?key={$key}&token={$token}";
    }

    private function assertOk(Response $response, string $context): void
    {
        if ($response->successful()) {
            return;
        }

        $message = $response->json('message') ?? $response->body();

        throw new RuntimeException("HTTP {$response->status()} - {$context} - {$message}");
    }

    private function corsHeaders(): array
    {
        return [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'POST, OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type',
        ];
    }
}
