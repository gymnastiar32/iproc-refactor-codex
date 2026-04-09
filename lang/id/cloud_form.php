<?php

return [
    'title' => 'Bantu kami memahami kebutuhan pengadaan Anda',
    'subtitle' => 'Sebelum kami menghubungi lebih lanjut, izinkan kami memahami terlebih dahulu kebutuhan pengadaan di organisasi Anda. Informasi singkat ini membantu kami merekomendasikan solusi yang paling sesuai, apakah iProc Cloud yang siap pakai atau sistem khusus yang lebih terintegrasi.',
    'steps' => [
        'contact' => 'Informasi Kontak',
        'assessment' => 'Cek Kebutuhan',
    ],
    'contact' => [
        'title' => 'Informasi Kontak',
        'description' => 'Digunakan agar tim kami dapat menghubungi Anda setelah asesmen awal',
    ],
    'fields' => [
        'full_name' => [
            'label' => 'Nama Lengkap dan Jabatan <span class="text-red-600">*</span>',
            'placeholder' => 'Contoh: Andi Pratama - Procurement Manager',
        ],
        'company' => [
            'label' => 'Asal Organisasi / Perusahaan <span class="text-red-600">*</span>',
            'placeholder' => 'Nama badan usaha atau unit kerja',
        ],
        'email' => [
            'label' => 'Alamat Email <span class="text-red-600">*</span>',
            'placeholder' => 'Gunakan email aktif untuk tindak lanjut',
        ],
        'phone' => [
            'label' => 'Nomor WhatsApp Aktif <span class="text-red-600">*</span>',
            'placeholder' => 'Digunakan untuk koordinasi cepat',
        ],
        'request' => [
            'label' => 'Permintaan Awal <span class="text-gray-500">(opsional)</span>',
            'placeholder' => 'Mohon jelaskan kebutuhan Anda secara rinci.',
        ],
        'other_need' => [
            'label' => 'Jelaskan kebutuhan lainnya <span class="text-red-600">*</span>',
            'placeholder' => 'Contoh: integrasi SAP/ERP, kontrol budget, SLA approval, dll.',
            'note' => 'Wajib diisi jika memilih "Lainnya".',
        ],
    ],
    'buttons' => [
        'next' => 'Selanjutnya',
        'back' => 'Kembali',
        'submit' => 'Lanjutkan & Ajukan Diskusi dengan Tim iProc',
    ],
    'assessment' => [
        'title' => 'Cek Kebutuhan Sistem e-Procurement',
        'q1' => [
            'label' => 'Saat ini apakah proses pengadaan dilakukan di luar sistem atau sulit ditelusuri saat audit? <span class="text-red-600">*</span>',
            'yes' => 'Ya',
            'partial' => 'Sebagian',
            'no' => 'Tidak',
        ],
        'q2' => [
            'label' => 'Kebutuhan mendesak yang ingin diperbaiki dalam waktu dekat (pilih maksimal 2) <span class="text-red-600">*</span>',
            'speed' => 'Kecepatan proses pengadaan',
            'transparency' => 'Transparansi & Audit Trail',
            'vendor_control' => 'Kontrol & Evaluasi Vendor',
            'cost_efficiency' => 'Efisiensi Biaya',
            'other' => 'Lainnya',
        ],
        'q3' => [
            'label' => 'Apakah organisasi Anda menggunakan proses bidding / tender? <span class="text-red-600">*</span>',
            'regular' => 'Ya, rutin',
            'sometimes' => 'Kadang-kadang',
            'no' => 'Tidak',
        ],
        'q4' => [
            'label' => 'Saat ini proses pengadaan paling sering dilakukan melalui: <span class="text-red-600">*</span>',
            'manual' => 'Email / Excel / WhatsApp',
            'internal' => 'Sistem internal sederhana',
            'erp' => 'ERP / sistem enterprise',
        ],
        'q5' => [
            'label' => 'Apakah database vendor saat ini sudah tersentralisasi dan terdokumentasi dengan baik? <span class="text-red-600">*</span>',
            'centralized' => 'Sudah tersentralisasi di sistem',
            'manual' => 'Belum, dokumentasi masih manual',
        ],
        'q6' => [
            'label' => 'Ekspektasi terhadap adanya sistem e-Procurement <span class="text-red-600">*</span>',
            'ready' => 'Sistem siap pakai (plug & play), minim penyesuaian',
            'gradual' => 'Bertahap, konfigurasi seperlunya',
            'custom' => 'Perlu disesuaikan dengan kebijakan / kebutuhan khusus',
        ],
        'note' => 'Form ini merupakan tahap awal asesmen. Detail proses dan kebutuhan akan dibahas lebih lanjut pada sesi diskusi bersama tim kami.',
    ],
    'consent' => [
        'label' => 'Saya telah membaca dan menyetujui <button type="button" id="openConsentModal" class="underline text-blue-700 hover:text-blue-800 focus:outline-none hover:cursor-pointer">Persetujuan Privasi</button>.',
        'helper' => 'Ringkas: iProc, ADW Consulting, dan Pengadaan.com <strong>berkomitmen melindungi privasi Anda</strong>. Kami <strong>tidak akan pernah</strong> menjual, membagikan, atau mendistribusikan informasi pribadi Anda kepada pihak ketiga untuk keperluan pemasaran / komersial. Informasi Anda hanya digunakan untuk komunikasi terkait layanan kami. Anda dapat mencabut persetujuan kapan saja melalui <a href="mailto:support.cloud@pengadaan.com" class="underline text-blue-700">support.cloud@pengadaan.com</a>.',
    ],
    'success' => [
        'title' => 'Berhasil mengirim formulir',
        'description' => 'Informasi yang Anda berikan akan membantu kami menentukan apakah kebutuhan Anda lebih sesuai menggunakan iProc Cloud (plug &amp; play) atau solusi khusus (private / on-premise). Kami akan segera menghubungi Anda melalui email atau WhatsApp dalam waktu <strong>1-2 hari</strong> kerja untuk menindaklanjuti sesi diskusi atau demo.',
        'page_title' => 'Formulir Berhasil Dikirim',
        'page_description' => 'Terima kasih sudah mengisi formulir asesmen kebutuhan iProc Cloud.',
        'thanks' => 'Terima kasih sudah mengisi formulir.',
        'back' => 'Kembali ke halaman sebelumnya',
    ],
    'modal' => [
        'title' => 'Persetujuan Privasi Pengisian Formulir',
        'close' => 'Tutup',
    ],
    'js' => [
        'alert' => [
            'info_title' => 'Mengirim...',
            'success_title' => 'Terima kasih telah mengisi asesmen awal.',
            'danger_title' => 'Gagal',
            'warning_title' => 'Perlu diperiksa',
        ],
        'submit_loading' => 'Mengirim...',
        'processing' => 'Mohon tunggu, data Anda sedang diproses...',
        'step1_required' => 'Mohon lengkapi seluruh <b>Informasi Kontak</b> terlebih dahulu.',
        'step2_required' => 'Mohon lengkapi seluruh pertanyaan pada bagian <b>Cek Kebutuhan</b>.',
        'need_min' => 'Silakan pilih minimal <b>1 kebutuhan mendesak</b>.',
        'need_max' => 'Maksimal pilih <b>2 kebutuhan mendesak</b>.',
        'other_required' => 'Silakan isi penjelasan untuk pilihan <b>Lainnya</b>.',
        'consent_required' => 'Silakan centang <b>Persetujuan Privasi</b> terlebih dahulu.',
        'submit_error' => 'Gagal mengirim formulir. Silakan coba lagi.<br>Atau Anda bisa langsung menghubungi kami melalui WhatsApp: <a href="https://wa.me/6285215356968" class="underline text-blue-700">https://wa.me/6285215356968</a>',
    ],
];
