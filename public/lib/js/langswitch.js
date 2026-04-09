
(function () {
    const enBtn = document.getElementById("btnLangEn");
    const idBtn = document.getElementById("btnLangId");
    if (!enBtn || !idBtn) return;

    const path = location.pathname; // contoh: "/", "/features", "/id/", "/id/features"
    const isID = path === "/id" || path.startsWith("/id/");

    // Mapping agar tetap di halaman yang sama:
    // EN: /features  <-> ID: /id/features
    const enPath = isID ? (path.replace(/^\/id(\/|$)/, "/") || "/") : path;
    const idPath = isID ? path : (path === "/" ? "/id/" : "/id" + path);

    enBtn.href = enPath;
    idBtn.href = idPath;

    // Style aktif/non-aktif sesuai request
    const active = "bg-[#005db5] text-white";
    const inactive = "text-black hover:bg-[#005db5]/10";

    if (isID) {
        idBtn.classList.add(...active.split(" "));
        idBtn.classList.remove(...inactive.split(" "));
        enBtn.classList.remove(...active.split(" "));
        enBtn.classList.add(...inactive.split(" "));
        idBtn.setAttribute("aria-current", "true");
        enBtn.removeAttribute("aria-current");
    } else {
        enBtn.classList.add(...active.split(" "));
        enBtn.classList.remove(...inactive.split(" "));
        idBtn.classList.remove(...active.split(" "));
        idBtn.classList.add(...inactive.split(" "));
        enBtn.setAttribute("aria-current", "true");
        idBtn.removeAttribute("aria-current");
    }
})();
