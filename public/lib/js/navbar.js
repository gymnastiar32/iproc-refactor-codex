document.addEventListener("DOMContentLoaded", function () {
  const navbar = document.getElementById("navbar");
  const navLinks = document.querySelectorAll(".nav-link");
  const sections = document.querySelectorAll("section");
  const toggleBtn = document.querySelector("[data-collapse-toggle]");
  const navbarMenu = document.getElementById("menu");
  const contactBtn = document.querySelector(".button-nav-mini");

  // Fungsi untuk update style navbar berdasarkan scroll dan menu state
  function updateNavbarStyle() {
    const menuIsVisible = navbarMenu && !navbarMenu.classList.contains("hidden");

    if (window.scrollY > 0 || menuIsVisible) {
      navbar.classList.add("bg-white", "text-black", "shadow-xl");
      navbar.classList.remove("bg-transparent");
    } else {
      navbar.classList.add("bg-transparent");
      navbar.classList.remove("bg-white", "text-black", "shadow-xl");
    }

    // Handle tombol kontak
    if (contactBtn) {
      if (menuIsVisible) {
        contactBtn.classList.add("block");
        contactBtn.classList.remove("hidden");
      } else {
        contactBtn.classList.add("hidden");
        contactBtn.classList.remove("block");
      }
    }
  }

  // Jalankan saat halaman load dan scroll
  updateNavbarStyle();
  window.addEventListener("scroll", updateNavbarStyle);

  // Event untuk toggle menu
  if (toggleBtn && navbar && navbarMenu) {
    toggleBtn.addEventListener("click", function () {
      setTimeout(updateNavbarStyle, 10);
    });
  } else {
    console.warn("Elemen navbar tidak lengkap, script dihentikan.");
  }

  // Intersection observer untuk aktifkan nav-link
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        const id = entry.target.getAttribute("id");
        const navItem = document.querySelector(`.nav-link[href="#${id}"]`);

        if (entry.isIntersecting && navItem !== null) {
          navLinks.forEach((link) => link.classList.remove("active"));
          navItem.classList.add("active");
        }
      });
    },
    {
      root: null,
      rootMargin: "0px",
      threshold: 0.6,
    }
  );

  sections.forEach((section) => observer.observe(section));
});