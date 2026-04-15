<?php

namespace Tests\Feature;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class TrelloLeadLoggingTest extends TestCase
{
    private string $logPath;

    protected function setUp(): void
    {
        parent::setUp();

        Carbon::setTestNow(Carbon::parse('2026-04-14 09:15:30', 'Asia/Jakarta'));

        $this->logPath = storage_path('logs/testing/iproc-cloud-forms-test.log');

        if (! is_dir(dirname($this->logPath))) {
            mkdir(dirname($this->logPath), 0777, true);
        }

        if (file_exists($this->logPath)) {
            unlink($this->logPath);
        }

        config([
            'logging.channels.iproc_cloud_forms' => [
                'driver' => 'single',
                'path' => $this->logPath,
                'level' => 'info',
                'replace_placeholders' => true,
            ],
        ]);

        app('log')->forgetChannel('iproc_cloud_forms');
    }

    protected function tearDown(): void
    {
        Carbon::setTestNow();

        if (file_exists($this->logPath)) {
            unlink($this->logPath);
        }

        parent::tearDown();
    }

    public function test_it_logs_backup_and_trello_success_for_valid_form_submission(): void
    {
        config([
            'services.trello_lead' => [
                'key' => 'test-key',
                'token' => 'test-token',
                'list' => 'test-list',
            ],
        ]);

        Http::fake([
            'https://api.trello.com/1/cards' => Http::response([
                'id' => 'card_123',
                'url' => 'https://trello.test/card_123',
            ], 200),
            'https://api.trello.com/1/card/*' => Http::response([], 200),
        ]);

        $response = $this->withHeaders([
            'User-Agent' => 'PHPUnit',
            'Referer' => 'https://example.com/iproc-cloud',
        ])->postJson('/api/trello_card.php', $this->validPayload());

        $response->assertOk()
            ->assertJson([
                'ok' => true,
                'cardId' => 'card_123',
                'cardUrl' => 'https://trello.test/card_123',
            ]);

        $log = $this->readLogFile();

        $this->assertStringContainsString('iProc Cloud form received', $log);
        $this->assertStringContainsString('iProc Cloud lead sent to Trello', $log);
        $this->assertStringContainsString('"logged_date":"2026-04-14"', $log);
        $this->assertStringContainsString('"logged_time":"09:15:30"', $log);
        $this->assertStringContainsString('"perusahaan":"PT Contoh Sukses"', $log);
        $this->assertStringContainsString('"trello_card_id":"card_123"', $log);
    }

    public function test_it_keeps_backup_log_when_trello_request_fails(): void
    {
        config([
            'services.trello_lead' => [
                'key' => 'test-key',
                'token' => 'test-token',
                'list' => 'test-list',
            ],
        ]);

        Http::fake([
            'https://api.trello.com/1/cards' => Http::response([
                'message' => 'invalid request',
            ], 500),
        ]);

        $response = $this->postJson('/api/trello_card.php', $this->validPayload([
            'perusahaan' => 'PT Gagal Kirim',
        ]));

        $response->assertStatus(500)
            ->assertJson([
                'error' => 'Trello error',
            ]);

        $log = $this->readLogFile();

        $this->assertStringContainsString('iProc Cloud form received', $log);
        $this->assertStringContainsString('Failed sending iProc Cloud lead to Trello', $log);
        $this->assertStringContainsString('"perusahaan":"PT Gagal Kirim"', $log);
        $this->assertStringContainsString('"exception_message":"HTTP 500 - create card - invalid request"', $log);
    }

    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'nama_lengkap' => 'Budi Santoso - Procurement Manager',
            'perusahaan' => 'PT Contoh Sukses',
            'email' => 'budi@example.com',
            'telepon' => '08123456789',
            'proses_pengadaan' => 'Ya',
            'kebutuhan' => ['Kecepatan proses pengadaan', 'Efisiensi Biaya'],
            'kebutuhan_lainnya' => '',
            'proses_bidding' => 'Ya, rutin',
            'proses_pengadaan_2' => 'ERP / Sistem Enterprise',
            'ekspektasi_sistem' => 'Bertahap, konfigurasi seperlunya',
            'database_vendor' => 'Sudah tersentralisasi sistem',
            'permintaan' => 'Mohon jadwalkan demo produk.',
            'consent' => 'agree',
            'website' => '',
        ], $overrides);
    }

    private function readLogFile(): string
    {
        clearstatcache(true, $this->logPath);

        $this->assertFileExists($this->logPath);

        return (string) file_get_contents($this->logPath);
    }
}
