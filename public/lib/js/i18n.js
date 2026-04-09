function getLangFromPath() {
    console.log(location.pathname)
    return location.pathname.startsWith("/id") ? "id" : "en";
}

async function loadDict(lang) {
    const res = await fetch(`/lib/lang/${lang}.json`); // ✅ absolut
    if (!res.ok) throw new Error(`Lang file not found: ${lang}.json`);
    return res.json();
}

function applyDict(dict) {
    document.querySelectorAll("[data-i18n]").forEach(el => {
        const key = el.dataset.i18n;
        const val = dict[key];

        if (val == null) return;

        // Jika elemen memiliki atribut data-i18n-html, render sebagai HTML
        if (el.hasAttribute("data-i18n-html")) {
            el.innerHTML = val;       // ✅ bisa baca tag HTML
        } else {
            el.textContent = val;     // ✅ default aman (tanpa HTML)
        }
    });

    document.querySelectorAll("[data-i18n-placeholder]").forEach(el => {
    const key = el.dataset.i18nPlaceholder; // otomatis baca data-i18n-placeholder
    const val = dict[key];
    if (val == null) return;

    el.setAttribute("placeholder", val);
  });
}


document.addEventListener("DOMContentLoaded", async () => {
    const lang = getLangFromPath();
    document.documentElement.lang = lang;

    try {
        const dict = await loadDict(lang);
        applyDict(dict);
    } catch (e) {
        console.error(e);
    }
});
