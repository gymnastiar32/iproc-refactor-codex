        <section id="form" class="py-12 sm:py-24 bg-gradient-to-t from-sky-400/20 to-white/20 bg-white">
            <div class="max-w-screen-2xl mx-auto px-8 xl:px-14">
                <h2 class="text-2xl sm:text-4xl font-bold text-gray-900 mb-2 text-center">
                    <span data-i18n="cloud_form.title">
                    Bantu Kami Memahami Kebutuhan Pengadaan Anda
                    </span>
                </h2>
                <p class="text-base sm:text-lg text-gray-500 mb-8 text-center max-w-5xl mx-auto"
                    data-i18n="cloud_form.subtitle">
                    Sebelum kami menghubungi lebih lanjut, izinkan kami memahami terlebih dahulu kebutuhan pengadaan di
                    organisasi Anda. Informasi singkat ini membantu kami merekomendasikan solusi yang paling sesuai,
                    apakah iProc Cloud yang siap pakai atau sistem khusus yang lebih terintegrasi.
                </p>

                <form class="ga-track-form" id="lead-form" name="Lead Form" action="#" method="POST"
                    accept-charset="UTF-8">
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 sm:p-10 md:p-[50px]">

                        <!-- Stepper -->
                        <div class="flex flex-col md:flex-row gap-6 md:gap-6 items-center justify-center w-full mb-8">
                            <!-- Step 1 -->
                            <div class="w-full md:w-1/2 flex flex-col gap-2">
                                <div class="flex items-center justify-center gap-2">
                                    <div id="stepperIcon1"
                                        class="w-6 h-6 rounded-full flex items-center justify-center text-sm font-semibold bg-[#FFB406]/10 text-[#DE9B00]">
                                        1
                                    </div>
                                    <p id="stepperLabel1" class="text-sm font-semibold text-[#111928]"
                                        data-i18n="cloud_form.steps.contact">
                                        Informasi Kontak
                                    </p>
                                </div>
                                <div id="stepperBar1" class="h-2 w-full bg-[#DE9B00]"></div>
                            </div>

                            <!-- Step 2 -->
                            <div class="w-full md:w-1/2 flex flex-col gap-2">
                                <div class="flex items-center justify-center gap-2">
                                    <div id="stepperIcon2"
                                        class="w-6 h-6 rounded-full flex items-center justify-center text-sm font-semibold bg-gray-200 text-gray-500">
                                        2
                                    </div>
                                    <p id="stepperLabel2" class="text-sm font-semibold text-gray-300"
                                        data-i18n="cloud_form.steps.assessment">
                                        Cek Kebutuhan
                                    </p>
                                </div>
                                <div id="stepperBar2" class="h-2 w-full bg-gray-200"></div>
                            </div>
                        </div>

                        <div id="formStatus" class="hidden mb-6 rounded-lg border p-3 text-sm"></div>

                        <!-- STEP 1 -->
                        <div id="step1" class="space-y-8">
                            <div class="space-y-5">
                                <div>
                                    <h3 class="text-lg font-bold text-[#101828] uppercase"
                                        data-i18n="cloud_form.contact.title">Informasi Kontak</h3>
                                    <p class="text-base text-[#4A5565]" data-i18n="cloud_form.contact.description">
                                        Digunakan agar tim kami dapat menghubungi Anda setelah asesmen awal
                                    </p>
                                </div>

                                <div class="grid grid-cols-12 gap-5">
                                    <div class="col-span-12 md:col-span-6 flex flex-col gap-5">
                                        <div>
                                            <label for="nama_lengkap"
                                                class="block mb-2 text-sm font-medium text-gray-900"
                                                data-i18n="cloud_form.fields.full_name.label" data-i18n-html>
                                                Nama Lengkap dan Jabatan <span class="text-red-600">*</span>
                                            </label>
                                            <input type="text" id="nama_lengkap" name="nama_lengkap"
                                                autocomplete="given-name" required
                                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                                                data-i18n-placeholder="cloud_form.fields.full_name.placeholder"
                                                placeholder="Contoh: Andi Pratama – Procurement Manager" />
                                        </div>

                                        <div>
                                            <label for="perusahaan"
                                                class="block mb-2 text-sm font-medium text-gray-900"
                                                data-i18n="cloud_form.fields.company.label" data-i18n-html>
                                                Asal Organisasi/Perusahaan <span class="text-red-600">*</span>
                                            </label>
                                            <input type="text" id="perusahaan" name="perusahaan"
                                                autocomplete="organization" required
                                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                                                data-i18n-placeholder="cloud_form.fields.company.placeholder"
                                                placeholder="Nama badan usaha atau unit kerja" />
                                        </div>
                                    </div>

                                    <div class="col-span-12 md:col-span-6 flex flex-col gap-5">
                                        <div>
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900"
                                                data-i18n="cloud_form.fields.email.label" data-i18n-html>
                                                Alamat Email <span class="text-red-600">*</span>
                                            </label>
                                            <input type="email" id="email" name="email" autocomplete="email" required
                                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                                                data-i18n-placeholder="cloud_form.fields.email.placeholder"
                                                placeholder="Gunakan email aktif untuk tindak lanjut" />
                                        </div>

                                        <div>
                                            <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900"
                                                data-i18n="cloud_form.fields.phone.label" data-i18n-html>
                                                Nomor Whatsapp Aktif <span class="text-red-600">*</span>
                                            </label>
                                            <input type="tel" id="telepon" name="telepon" inputmode="tel"
                                                autocomplete="tel" required
                                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                                                data-i18n-placeholder="cloud_form.fields.phone.placeholder"
                                                placeholder="Digunakan untuk koordinasi cepat" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button type="button" id="nextStepBtn"
                                    class="inline-flex items-center justify-center rounded-lg bg-[#005db5] px-5 py-2.5 text-sm font-medium text-white hover:bg-[#02519b] focus:ring-4 focus:ring-blue-300 hover:cursor-pointer">
                                    <span data-i18n="cloud_form.buttons.next">
                                    Selanjutnya
                                    </span>
                                </button>
                            </div>
                        </div>

                        <!-- STEP 2 -->
                        <div id="step2" class="hidden space-y-8">
                            <div class="space-y-5">
                                <div>
                                    <h3 class="text-lg font-bold text-[#101828] uppercase"
                                        data-i18n="cloud_form.assessment.title">Cek Kebutuhan Sistem
                                        E-Procurement</h3>
                                </div>

                                <div class="grid grid-cols-12 gap-5">
                                    <!-- Left -->
                                    <div class="col-span-12 md:col-span-6 flex flex-col gap-5">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                                data-i18n="cloud_form.assessment.q1.label" data-i18n-html>
                                                Saat ini apakah proses pengadaan dilakukan di luar sistem atau sulit
                                                ditelusuri saat audit? <span class="text-red-600">*</span>
                                            </label>
                                            <div class="flex flex-col gap-3">
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="ya" name="proses_pengadaan" type="radio" value="Ya"
                                                        class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q1.yes">Ya</span>
                                                </label>
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="sebagian" name="proses_pengadaan" type="radio"
                                                        value="Sebagian" class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q1.partial">Sebagian</span>
                                                </label>
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="tidak" name="proses_pengadaan" type="radio" value="Tidak"
                                                        class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q1.no">Tidak</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                                data-i18n="cloud_form.assessment.q2.label" data-i18n-html>
                                                Kebutuhan mendesak yang ingin diperbaiki dalam waktu dekat (Pilih
                                                maksimal 2)
                                                <span class="text-red-600">*</span>
                                            </label>

                                            <div class="flex flex-col gap-3">
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="kecepatan" name="kebutuhan[]" type="checkbox"
                                                        value="Kecepatan proses pengadaan"
                                                        class="kebutuhan-checkbox mt-0.5 w-4 h-4 border border-gray-300 rounded">
                                                    <span data-i18n="cloud_form.assessment.q2.speed">Kecepatan proses pengadaan</span>
                                                </label>

                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="transparansi" name="kebutuhan[]" type="checkbox"
                                                        value="Transparansi & Audit Trail"
                                                        class="kebutuhan-checkbox mt-0.5 w-4 h-4 border border-gray-300 rounded">
                                                    <span data-i18n="cloud_form.assessment.q2.transparency">Transparansi & Audit Trail</span>
                                                </label>

                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="kontrol" name="kebutuhan[]" type="checkbox"
                                                        value="Kontrol & Evaluasi Vendor"
                                                        class="kebutuhan-checkbox mt-0.5 w-4 h-4 border border-gray-300 rounded">
                                                    <span data-i18n="cloud_form.assessment.q2.vendor_control">Kontrol & Evaluasi Vendor</span>
                                                </label>

                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="efisiensi" name="kebutuhan[]" type="checkbox"
                                                        value="Efisiensi Biaya"
                                                        class="kebutuhan-checkbox mt-0.5 w-4 h-4 border border-gray-300 rounded">
                                                    <span data-i18n="cloud_form.assessment.q2.cost_efficiency">Efisiensi Biaya</span>
                                                </label>

                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="lainnya" name="kebutuhan[]" type="checkbox"
                                                        value="Lainnya"
                                                        class="kebutuhan-checkbox mt-0.5 w-4 h-4 border border-gray-300 rounded">
                                                    <span data-i18n="cloud_form.assessment.q2.other">Lainnya</span>
                                                </label>
                                            </div>

                                            <div id="lainnyaWrap" class="mt-3 hidden">
                                                <label for="lainnyaDesc"
                                                    class="block mb-2 text-sm font-medium text-gray-900"
                                                    data-i18n="cloud_form.fields.other_need.label" data-i18n-html>
                                                    Jelaskan kebutuhan lainnya <span class="text-red-600">*</span>
                                                </label>
                                                <textarea id="lainnyaDesc" name="kebutuhan_lainnya"
                                                    class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-2 focus:ring-blue-300 focus:border-blue-500"
                                                    rows="3" data-i18n-placeholder="cloud_form.fields.other_need.placeholder"
                                                    placeholder="Contoh: integrasi SAP/ERP, kontrol budget, SLA approval, dll."></textarea>
                                                <p class="mt-1 text-xs text-gray-500" data-i18n="cloud_form.fields.other_need.note">Wajib diisi jika memilih
                                                    “Lainnya”.</p>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                                data-i18n="cloud_form.assessment.q3.label" data-i18n-html>
                                                Apakah organisasi Anda menggunakan proses bidding/tender?
                                                <span class="text-red-600">*</span>
                                            </label>
                                            <div class="flex flex-col gap-3">
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="ya-bidding" name="proses_bidding" type="radio"
                                                        value="Ya, rutin" class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q3.regular">Ya, rutin</span>
                                                </label>
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="kadang" name="proses_bidding" type="radio"
                                                        value="Kadang-kadang"
                                                        class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q3.sometimes">Kadang-kadang</span>
                                                </label>
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="tidak_bidding" name="proses_bidding" type="radio"
                                                        value="Tidak" class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q3.no">Tidak</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="permintaan"
                                                class="block mb-2 text-sm font-medium text-gray-900"
                                                data-i18n="cloud_form.fields.request.label" data-i18n-html>
                                                Permintaan Awal <span class="text-gray-500">(opsional)</span>
                                            </label>
                                            <textarea id="permintaan" name="permintaan" rows="5"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full px-4 py-3 focus:ring-blue-500 focus:border-blue-500"
                                                data-i18n-placeholder="cloud_form.fields.request.placeholder"
                                                placeholder="Mohon jelaskan kebutuhan Anda secara rinci."></textarea>
                                        </div>
                                    </div>

                                    <!-- Right -->
                                    <div class="col-span-12 md:col-span-6 flex flex-col gap-5">
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                                data-i18n="cloud_form.assessment.q4.label" data-i18n-html>
                                                Saat ini proses pengadaan paling sering dilakukan melalui:
                                                <span class="text-red-600">*</span>
                                            </label>
                                            <div class="flex flex-col gap-3">
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="eew" name="proses_pengadaan_2" type="radio"
                                                        value="Email / Excel / WhatsApp"
                                                        class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q4.manual">Email / Excel / WhatsApp</span>
                                                </label>
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="sistem_internal" name="proses_pengadaan_2" type="radio"
                                                        value="Sistem internal sederhana"
                                                        class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q4.internal">Sistem internal sederhana</span>
                                                </label>
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="erp" name="proses_pengadaan_2" type="radio"
                                                        value="ERP / sistem enterprise"
                                                        class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q4.erp">ERP / sistem enterprise</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                                data-i18n="cloud_form.assessment.q5.label" data-i18n-html>
                                                Apakah database vendor saat ini sudah tersentralisasi dan terdokumentasi
                                                dengan baik?
                                                <span class="text-red-600">*</span>
                                            </label>
                                            <div class="flex flex-col gap-3">
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="sudah" name="database_vendor" type="radio"
                                                        value="Sudah tersentralisasi sistem"
                                                        class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q5.centralized">Sudah tersentralisasi sistem</span>
                                                </label>
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="belum" name="database_vendor" type="radio"
                                                        value="Belum, dokumentasi masih manual"
                                                        class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q5.manual">Belum, dokumentasi masih manual</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-900"
                                                data-i18n="cloud_form.assessment.q6.label" data-i18n-html>
                                                Ekspektasi terhadap adanya sistem e-Procurement
                                                <span class="text-red-600">*</span>
                                            </label>
                                            <div class="flex flex-col gap-3">
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="siap_pakai" name="ekspektasi_sistem" type="radio"
                                                        value="Sistem siap pakai (plug & play), minim penyesuaian"
                                                        class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q6.ready">Sistem siap pakai (plug &amp; play), minim penyesuaian</span>
                                                </label>
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="bertahap" name="ekspektasi_sistem" type="radio"
                                                        value="Bertahap, konfigurasi seperlunya"
                                                        class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q6.gradual">Bertahap, konfigurasi seperlunya</span>
                                                </label>
                                                <label class="flex items-start gap-2 text-sm text-gray-900">
                                                    <input id="perlu_sesuai" name="ekspektasi_sistem" type="radio"
                                                        value="Perlu disesuaikan dengan kebijakan / kebutuhan khusus"
                                                        class="mt-0.5 w-4 h-4 border border-gray-300">
                                                    <span data-i18n="cloud_form.assessment.q6.custom">Perlu disesuaikan dengan kebijakan / kebutuhan khusus</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- TnC -->
                            <div class="space-y-[13px]">
                                <p class="text-base sm:text-lg font-semibold leading-5 text-black"
                                    data-i18n="cloud_form.assessment.note">
                                    Form ini merupakan tahap awal asesmen. Detail proses dan kebutuhan akan dibahas
                                    lebih lanjut
                                    pada sesi diskusi bersama tim kami.
                                </p>

                                <div class="flex items-start gap-2">
                                    <input id="consent" type="checkbox" name="consent" value="agree" required
                                        class="mt-1 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500">
                                    <label for="consent" class="text-base text-[#101828]"
                                        data-i18n="cloud_form.consent.label" data-i18n-html>
                                        Saya telah membaca dan menyetujui
                                        <button type="button" id="openConsentModal"
                                            class="underline text-blue-700 hover:text-blue-800 focus:outline-none hover:cursor-pointer">
                                            Persetujuan Privasi.
                                        </button>
                                    </label>
                                </div>

                                <small class="text-[#6A7282] block leading-6" data-i18n="cloud_form.consent.helper"
                                    data-i18n-html="">
                                    Ringkas: iProc, ADW Consulting, dan Pengadaan.com <strong>berkomitmen melindungi
                                        privasi Anda</strong>.
                                    Kami <strong>tidak akan pernah</strong> menjual, membagikan, atau mendistribusikan
                                    informasi pribadi Anda kepada
                                    pihak ketiga untuk keperluan pemasaran/komersial. Informasi Anda hanya digunakan
                                    untuk komunikasi terkait layanan kami.
                                    Anda dapat mencabut persetujuan kapan saja melalui
                                    <a href="mailto:support.cloud@pengadaan.com"
                                        class="underline text-blue-700">support.cloud@pengadaan.com</a>.
                                </small>

                                <div class="flex flex-wrap items-start gap-4 sm:gap-5">
                                    <button type="button" id="backStepBtn"
                                        class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-[#111928] hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 hover:cursor-pointer">
                                        <span data-i18n="cloud_form.buttons.back">
                                        Kembali
                                        </span>
                                    </button>

                                    <button type="submit" data-button-id="cta-2"
                                        data-button-text="Lanjutkan & Ajukan Diskusi dengan Tim iProc"
                                        class="inline-flex items-center justify-center rounded-lg bg-[#005db5] px-5 py-2.5 text-sm font-semibold text-white hover:bg-[#02519b] focus:ring-4 focus:ring-blue-300 hover:cursor-pointer">
                                        <span data-i18n="cloud_form.buttons.submit">Lanjutkan &amp; Ajukan Diskusi
                                            dengan Tim iProc</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- STEP 4 / SUCCESS -->
                        <div id="stepSuccess" class="hidden flex flex-col items-center justify-center gap-3 py-4">
                            <div class="flex items-center justify-center w-[200px] h-[200px]">
                                <div
                                    class="relative flex items-center justify-center w-[122px] h-[122px] rounded-2xl bg-emerald-600/20">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-emerald-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75l2.25 2.25L15.75 9m5.25 3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>

                            <div class="w-full max-w-4xl text-center px-0 sm:px-10 md:px-[120px]">
                                <h3 class="text-2xl font-bold tracking-tight text-[#111928] mb-2"
                                    data-i18n="cloud_form.success.title">
                                    Berhasil Mengirim Formulir
                                </h3>
                                <p class="text-base leading-6 text-black" data-i18n="cloud_form.success.description"
                                    data-i18n-html>
                                    Informasi yang Anda berikan akan membantu kami menentukan apakah kebutuhan Anda
                                    lebih sesuai
                                    menggunakan iProc Cloud (plug &amp; play) atau solusi khusus (private/on-premise).
                                    Kami akan segera menghubungi Anda melalui email atau WhatsApp dalam waktu
                                    <strong>1–2 hari</strong> kerja untuk menindaklanjuti sesi diskusi atau demo.
                                </p>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div id="consentModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
                            <div class="absolute inset-0 bg-black/50" data-close-consent></div>

                            <div role="dialog" aria-modal="true" aria-labelledby="consentModalTitle"
                                class="relative w-full max-w-2xl bg-white rounded-xl shadow-lg overflow-hidden">
                                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-300">
                                    <h3 id="consentModalTitle" class="text-lg font-semibold text-gray-900"
                                        data-i18n="cloud_form.modal.title">
                                        Persetujuan Privasi Pengisian Formulir
                                    </h3>
                                    <button type="button" class="p-2 rounded hover:bg-gray-100"
                                        aria-label="{{ __('cloud_form.modal.close') }}"
                                        data-close-consent>
                                        ✕
                                    </button>
                                </div>

                                <div class="px-6 py-5 space-y-4 text-sm text-gray-700 max-h-[70vh] overflow-y-auto">
                                    <p>
                                        <strong>Ringkasan.</strong> Dengan mengirimkan formulir ini, Anda menyetujui
                                        bahwa data Anda diproses oleh
                                        iProc (PT Anggada Duta Wisesa/“ADW Consulting”) dan Pengadaan.com, serta
                                        disimpan dan dikelola melalui layanan
                                        pihak ketiga <strong>Trello (Atlassian)</strong> untuk keperluan pencatatan
                                        permintaan dan tindak lanjut.
                                    </p>

                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">1) Data yang Dikumpulkan</h4>
                                        <ul class="list-disc ms-5 space-y-1">
                                            <li>Data yang Anda isi pada formulir.</li>
                                            <li>Metadata teknis yang wajar dari proses pengiriman.</li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">2) Tujuan Pemrosesan</h4>
                                        <ul class="list-disc ms-5 space-y-1">
                                            <li>Menjawab permintaan Anda dan melakukan tindak lanjut komunikasi.</li>
                                            <li>Pencatatan korespondensi dan peningkatan kualitas layanan.</li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">3) Dasar Hukum</h4>
                                        <p>Persetujuan Anda saat mencentang kotak persetujuan dan menekan tombol kirim.
                                        </p>
                                    </div>

                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">4) Pihak Ketiga (Trello/Atlassian)
                                        </h4>
                                        <p>
                                            Data yang Anda kirimkan akan dicatat sebagai item/tiket di
                                            <strong>Trello</strong>
                                            agar tim kami dapat menindaklanjuti secara terstruktur.
                                        </p>
                                    </div>

                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">5) Retensi &amp; Keamanan</h4>
                                        <ul class="list-disc ms-5 space-y-1">
                                            <li>Data disimpan selama diperlukan untuk menindaklanjuti permintaan Anda.
                                            </li>
                                            <li>Akses ke workspace dibatasi hanya untuk pihak yang berwenang.</li>
                                            <li>Kami menerapkan kontrol keamanan yang wajar.</li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">6) Komitmen Privasi</h4>
                                        <p>
                                            <strong>iProc, ADW Consulting, dan Pengadaan.com berkomitmen untuk
                                                melindungi privasi Anda.</strong>
                                            Kami tidak akan menjual informasi pribadi Anda.
                                        </p>
                                    </div>

                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-1">7) Hak Anda &amp; Kontak</h4>
                                        <ul class="list-disc ms-5 space-y-1">
                                            <li>Meminta akses, koreksi, pembatasan, atau penghapusan data.</li>
                                            <li>Menarik kembali persetujuan kapan saja melalui
                                                <a href="mailto:support@pengadaan.com"
                                                    class="underline text-blue-700">support@pengadaan.com</a>.
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="px-6 py-4 border-t border-gray-300 flex items-center justify-end gap-2">
                                    <button type="button"
                                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 hover:cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5"
                                        data-close-consent>
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </section>
