    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const copy = @json(trans('cloud_form.js'));
            const form = document.getElementById('lead-form');
            if (!form) throw new Error('Form #lead-form tidak ditemukan');

            // === Elements for multi-step form ===
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');
            const stepSuccess = document.getElementById('stepSuccess');

            const nextStepBtn = document.getElementById('nextStepBtn');
            const backStepBtn = document.getElementById('backStepBtn');

            const stepperIcon1 = document.getElementById('stepperIcon1');
            const stepperIcon2 = document.getElementById('stepperIcon2');
            const stepperLabel1 = document.getElementById('stepperLabel1');
            const stepperLabel2 = document.getElementById('stepperLabel2');
            const stepperBar1 = document.getElementById('stepperBar1');
            const stepperBar2 = document.getElementById('stepperBar2');

            const lainnyaCheckbox = document.getElementById('lainnya');
            const lainnyaWrap = document.getElementById('lainnyaWrap');
            const lainnyaDesc = document.getElementById('lainnyaDesc');
            const kebutuhanCheckboxes = Array.from(document.querySelectorAll('.kebutuhan-checkbox'));

            const consentModal = document.getElementById('consentModal');
            const openConsentModal = document.getElementById('openConsentModal');
            const closeConsentButtons = document.querySelectorAll('[data-close-consent]');

            // === 1) Buat wrapper alert (di-append di atas form) ===
            const alertWrap = document.createElement('div');
            alertWrap.id = 'flowbiteAlertWrap';
            alertWrap.className = 'mb-4';
            form.parentNode.insertBefore(alertWrap, form);

            // === 2) Helper render alert ala Flowbite ===
            const ALERT_MAP = {
                info: {
                    wrap: 'text-blue-800 border-blue-300 bg-blue-50',
                    btn: 'bg-blue-50 text-blue-500 focus:ring-blue-400 hover:bg-blue-200',
                    title: copy.alert.info_title,
                },
                success: {
                    wrap: 'text-green-800 border-green-300 bg-green-50',
                    btn: 'bg-green-50 text-green-500 focus:ring-green-400 hover:bg-green-200',
                    title: copy.alert.success_title,
                },
                danger: {
                    wrap: 'text-red-800 border-red-300 bg-red-50',
                    btn: 'bg-red-50 text-red-500 focus:ring-red-400 hover:bg-red-200',
                    title: copy.alert.danger_title,
                },
                warning: {
                    wrap: 'text-yellow-800 border-yellow-300 bg-yellow-50',
                    btn: 'bg-yellow-50 text-yellow-500 focus:ring-yellow-400 hover:bg-yellow-200',
                    title: copy.alert.warning_title,
                },
            };

            function escapeHtml(str) {
                return String(str ?? '').replace(/[&<>"']/g, (m) => ({
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                }[m]));
            }

            function renderAlert(type = 'info', message = '', doScroll = true) {
                const c = ALERT_MAP[type] || ALERT_MAP.info;

                alertWrap.innerHTML = `
            <div class="flex items-start gap-3 p-4 text-sm border rounded-lg ${c.wrap}" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 mt-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9 6a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V6Zm1 10a1.25 1.25 0 1 1 0-2.5A1.25 1.25 0 0 1 10 16Z"/>
                </svg>
                <div class="flex-1">
                    <span class="font-medium">${c.title}</span>
                    <div class="mt-1">${message}</div>
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 inline-flex h-8 w-8 rounded-lg focus:ring-2 p-1.5 ${c.btn}" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 12 12M13 1 1 13"/>
                    </svg>
                </button>
            </div>
        `;

                const closeBtn = alertWrap.querySelector('button[aria-label="Close"]');
                closeBtn?.addEventListener('click', () => (alertWrap.innerHTML = ''));

                if (doScroll) {
                    alertWrap.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }

            function clearAlert() {
                alertWrap.innerHTML = '';
            }

            // === 3) Loading state tombol submit ===
            const submitBtn = form.querySelector('button[type="submit"]');
            const setLoading = (isLoading) => {
                if (!submitBtn) return;

                if (isLoading) {
                    submitBtn.dataset.oldText = submitBtn.textContent;
                    submitBtn.disabled = true;
                    submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
                    submitBtn.textContent = copy.submit_loading;
                } else {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-70', 'cursor-not-allowed');
                    submitBtn.textContent = submitBtn.dataset.oldText || submitBtn.textContent;
                }
            };

            // === Stepper UI ===
            function updateStepUI(step) {
                if (step === 1) {
                    step1?.classList.remove('hidden');
                    step2?.classList.add('hidden');
                    stepSuccess?.classList.add('hidden');

                    if (stepperIcon1) {
                        stepperIcon1.innerHTML = '1';
                        stepperIcon1.className = 'w-6 h-6 rounded-full flex items-center justify-center text-sm font-semibold bg-[#FFB406]/10 text-[#DE9B00]';
                    }
                    if (stepperLabel1) stepperLabel1.className = 'text-sm font-semibold text-[#111928]';
                    if (stepperBar1) stepperBar1.className = 'h-2 w-full bg-[#DE9B00]';

                    if (stepperIcon2) {
                        stepperIcon2.innerHTML = '2';
                        stepperIcon2.className = 'w-6 h-6 rounded-full flex items-center justify-center text-sm font-semibold bg-gray-200 text-gray-500';
                    }
                    if (stepperLabel2) stepperLabel2.className = 'text-sm font-semibold text-gray-300';
                    if (stepperBar2) stepperBar2.className = 'h-2 w-full bg-gray-200';
                }

                if (step === 2) {
                    step1?.classList.add('hidden');
                    step2?.classList.remove('hidden');
                    stepSuccess?.classList.add('hidden');

                    if (stepperIcon1) {
                        stepperIcon1.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                `;
                        stepperIcon1.className = 'w-6 h-6 rounded-full flex items-center justify-center bg-sky-400/20 text-[#005DB5]';
                    }
                    if (stepperLabel1) stepperLabel1.className = 'text-sm font-semibold text-[#111928]';
                    if (stepperBar1) stepperBar1.className = 'h-2 w-full bg-[#005DB5]';

                    if (stepperIcon2) {
                        stepperIcon2.innerHTML = '2';
                        stepperIcon2.className = 'w-6 h-6 rounded-full flex items-center justify-center text-sm font-semibold bg-[#FFB406]/10 text-[#DE9B00]';
                    }
                    if (stepperLabel2) stepperLabel2.className = 'text-sm font-semibold text-[#111928]';
                    if (stepperBar2) stepperBar2.className = 'h-2 w-full bg-[#DE9B00]';
                }

                if (step === 3) {
                    step1?.classList.add('hidden');
                    step2?.classList.add('hidden');
                    stepSuccess?.classList.remove('hidden');

                    if (stepperIcon1) {
                        stepperIcon1.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                `;
                        stepperIcon1.className = 'w-6 h-6 rounded-full flex items-center justify-center bg-sky-400/20 text-[#005DB5]';
                    }

                    if (stepperIcon2) {
                        stepperIcon2.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                `;
                        stepperIcon2.className = 'w-6 h-6 rounded-full flex items-center justify-center bg-sky-400/20 text-[#005DB5]';
                    }

                    if (stepperLabel1) stepperLabel1.className = 'text-sm font-semibold text-[#111928]';
                    if (stepperLabel2) stepperLabel2.className = 'text-sm font-semibold text-[#111928]';
                    if (stepperBar1) stepperBar1.className = 'h-2 w-full bg-[#005DB5]';
                    if (stepperBar2) stepperBar2.className = 'h-2 w-full bg-[#005DB5]';
                }
            }

            // === Validation helpers ===
            function validateStep1() {
                const requiredFields = [
                    document.getElementById('nama_lengkap'),
                    document.getElementById('perusahaan'),
                    document.getElementById('email'),
                    document.getElementById('telepon'),
                ];

                for (const field of requiredFields) {
                    if (!field || !field.value.trim()) {
                        renderAlert('warning', copy.step1_required);
                        field?.focus();
                        return false;
                    }
                }

                return true;
            }

            function validateStep2() {
                const fd = new FormData(form);
                const kebutuhan = fd.getAll('kebutuhan[]');

                const radioGroups = [
                    'proses_pengadaan',
                    'proses_bidding',
                    'proses_pengadaan_2',
                    'ekspektasi_sistem',
                    'database_vendor'
                ];

                for (const name of radioGroups) {
                    if (!form.querySelector(`input[name="${name}"]:checked`)) {
                        renderAlert('warning', copy.step2_required);
                        return false;
                    }
                }

                if (kebutuhan.length === 0) {
                    renderAlert('warning', copy.need_min);
                    return false;
                }

                if (kebutuhan.length > 2) {
                    renderAlert('warning', copy.need_max);
                    return false;
                }

                if (kebutuhan.includes('Lainnya') && !((fd.get('kebutuhan_lainnya') || '').trim())) {
                    renderAlert('warning', copy.other_required);
                    lainnyaDesc?.focus();
                    return false;
                }

                if (fd.get('consent') !== 'agree') {
                    renderAlert('warning', copy.consent_required);
                    return false;
                }

                return true;
            }

            // === Checkbox "Lainnya" ===
            function toggleLainnya() {
                if (!lainnyaCheckbox || !lainnyaWrap || !lainnyaDesc) return;

                if (lainnyaCheckbox.checked) {
                    lainnyaWrap.classList.remove('hidden');
                    lainnyaDesc.setAttribute('required', 'required');
                } else {
                    lainnyaWrap.classList.add('hidden');
                    lainnyaDesc.removeAttribute('required');
                    lainnyaDesc.value = '';
                }
            }

            // === Max 2 checkbox ===
            function enforceMaxKebutuhan(event) {
                const checked = kebutuhanCheckboxes.filter(cb => cb.checked);

                if (checked.length > 2) {
                    event.target.checked = false;
                    renderAlert('warning', copy.need_max, false);
                } else {
                    clearAlert();
                }

                toggleLainnya();
            }

            // === Modal consent ===
            if (openConsentModal && consentModal) {
                openConsentModal.addEventListener('click', () => {
                    consentModal.classList.remove('hidden');
                    consentModal.classList.add('flex');
                });
            }

            closeConsentButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    consentModal?.classList.add('hidden');
                    consentModal?.classList.remove('flex');
                });
            });

            // === Step navigation ===
            if (nextStepBtn) {
                nextStepBtn.addEventListener('click', () => {
                    if (!validateStep1()) return;

                    clearAlert();
                    updateStepUI(2);
                    form.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            }

            if (backStepBtn) {
                backStepBtn.addEventListener('click', () => {
                    clearAlert();
                    updateStepUI(1);
                    form.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            }

            kebutuhanCheckboxes.forEach(cb => {
                cb.addEventListener('change', enforceMaxKebutuhan);
            });

            // init state
            updateStepUI(1);
            toggleLainnya();

            // === 4) Submit handler (payload tetap) ===
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                e.stopPropagation();

                if (!validateStep2()) return;

                const fd = new FormData(form);
                const kebutuhan = fd.getAll('kebutuhan[]');

                const payload = {
                    nama_lengkap: (fd.get('nama_lengkap') || '').trim(),
                    perusahaan: (fd.get('perusahaan') || '').trim(),
                    email: (fd.get('email') || '').trim(),
                    telepon: (fd.get('telepon') || '').trim(),

                    proses_pengadaan: (fd.get('proses_pengadaan') || '').trim(),
                    kebutuhan,
                    kebutuhan_lainnya: (fd.get('kebutuhan_lainnya') || '').trim(),

                    proses_bidding: (fd.get('proses_bidding') || '').trim(),
                    proses_pengadaan_2: (fd.get('proses_pengadaan_2') || '').trim(),
                    ekspektasi_sistem: (fd.get('ekspektasi_sistem') || '').trim(),
                    database_vendor: (fd.get('database_vendor') || '').trim(),

                    permintaan: (fd.get('permintaan') || '').trim(),
                    consent: fd.get('consent'),
                    website: (fd.get('website') || '').trim(),
                };

                setLoading(true);
                renderAlert('info', copy.processing);

                try {
                    const res = await fetch('/api/trello_card.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(payload),
                    });

                    const data = await res.json().catch(() => ({}));

                    if (!res.ok) {
                        const detail = Array.isArray(data.details) ? data.details.join(' ') : '';
                        throw new Error((data.error || `HTTP ${res.status}`) + (detail ? ` — ${detail}` : ''));
                    }

                    clearAlert();
                    form.reset();
                    toggleLainnya();
                    updateStepUI(3);

                    stepSuccess?.scrollIntoView({ behavior: 'smooth', block: 'center' });

                } catch (err) {
                    renderAlert(
                        'danger',
                        copy.submit_error
                    );
                    console.error(err);
                } finally {
                    setLoading(false);
                }
            });
        });
    </script>


    <script>
        AOS.init();
    </script>

    <script>
        function equalizeElementHeights(className) {
            const elements = document.querySelectorAll(`.${className}`);
            let maxHeight = 0;

            // Reset height terlebih dahulu
            elements.forEach(el => {
                el.style.height = 'auto';
            });

            // Hitung tinggi maksimal
            elements.forEach(el => {
                maxHeight = Math.max(maxHeight, el.offsetHeight);
            });

            // Terapkan tinggi maksimal ke semua elemen
            elements.forEach(el => {
                el.style.height = maxHeight + 'px';
            });
        }

        // Contoh penggunaan saat halaman dimuat
        window.addEventListener('load', () => {
            equalizeElementHeights('price-head');
            equalizeElementHeights('for-list'); // contoh class lain
        });

        // Tambahkan debounce saat resize
        window.addEventListener('resize', () => {
            clearTimeout(window.__resizeTimeout);
            window.__resizeTimeout = setTimeout(() => {
                equalizeElementHeights('price-head');
                equalizeElementHeights('for-list'); // contoh class lain
            }, 100);
        });

    </script>

    <script>
        $(document).ready(function () {
            const modal = document.getElementById('consentModal');
            const closeEls = modal.querySelectorAll('[data-close-consent], .absolute.inset-0');

            let lastFocus;

            function openModal() {
                lastFocus = document.activeElement;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                const title = document.getElementById('consentModalTitle');
                if (title) title.focus({ preventScroll: true });
                document.addEventListener('keydown', onEsc);
            }

            function closeModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.removeEventListener('keydown', onEsc);
                if (lastFocus) lastFocus.focus();
            }

            function onEsc(e) {
                if (e.key === 'Escape') closeModal();
            }

            $(document).on('click', '#openConsentModal', function (e) {
                e.preventDefault();
                e.stopPropagation(); // penting karena tombol ada di dalam <label>
                openModal();
            });

            closeEls.forEach(el => el.addEventListener('click', closeModal));
        });
    </script>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2NFEC7PRVV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-2NFEC7PRVV');
    </script>


    <script>
        document.addEventListener('click', function (e) {
            const el = e.target.closest('.ga-track-contact');
            if (!el) return;
            gtag('event', 'contact_btn_click', {
                button_id: el.dataset.buttonId,
                button_text: el.dataset.buttonText
            });
        });

        document.addEventListener('submit', function (e) {
            const f = e.target.closest('form.ga-track-form');
            if (!f || typeof gtag !== 'function') return;

            // Cegah submit dulu biar event terkirim
            if (f.dataset.gaSubmitted === '1') return;
            e.preventDefault();

            const params = {
                form_id: f.dataset.formId || f.id || 'lead-form',
                form_name: f.dataset.formName || f.getAttribute('name') || 'Lead Form',
                page_path: location.pathname
            };

            // Kirim event lalu lanjut submit setelah terkirim/timeout
            gtag('event', 'form_submit', {
                ...params,
                event_callback: function () {
                    f.dataset.gaSubmitted = '1';
                    f.submit();
                },
                event_timeout: 2000
            });
        });
    </script>

    <!-- <script>
        (function () {
            const overlay = document.getElementById('popup-overlay');
            const popup = document.getElementById('popup-banner');
            const closeBtn = document.getElementById('popup-close');

            console.log(overlay);
            console.log(popup);
            console.log(closeBtn);

            function showPopup() {
                overlay.classList.remove('hidden');
                popup.classList.remove('hidden');
                requestAnimationFrame(() => {
                    overlay.classList.remove('opacity-0');
                    popup.classList.remove('opacity-0', 'scale-95');
                });
                setTimeout(() => closeBtn.focus(), 50);
            }

            function hidePopup() {
                overlay.classList.add('opacity-0');
                popup.classList.add('opacity-0', 'scale-95');
                setTimeout(() => {
                    overlay.classList.add('hidden');
                    popup.classList.add('hidden');
                }, 250);

            }
           
            showPopup();
            

            closeBtn.addEventListener('click', hidePopup);
            overlay.addEventListener('click', hidePopup);
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') hidePopup();
            });

        })();
    </script> -->

    <script>
        $(function () {
            const MAX = 2;
            const $boxes = $('.kebutuhan-checkbox');
            const $lainnya = $('#lainnya');
            const $lainnyaWrap = $('#lainnyaWrap');
            const $lainnyaDesc = $('#lainnyaDesc');

            function syncLainnyaUI() {
                if ($lainnya.is(':checked')) {
                    $lainnyaWrap.removeClass('hidden');
                    $lainnyaDesc.prop('required', true);
                } else {
                    $lainnyaWrap.addClass('hidden');
                    $lainnyaDesc.prop('required', false).val('');
                }
            }

            $boxes.on('change', function () {
                const checkedCount = $boxes.filter(':checked').length;

                // Batasi maksimal 2
                if (checkedCount > MAX) {
                    $(this).prop('checked', false);

                    // Optional: kasih feedback simpel
                    alert('Maksimal pilih 2 opsi.');
                    return;
                }

                // Toggle field "Lainnya"
                syncLainnyaUI();
            });

            // Initial state (kalau ada prefill)
            syncLainnyaUI();
        });
    </script>
