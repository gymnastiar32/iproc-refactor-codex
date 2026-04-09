let duration = 2000; // 2 detik

function runCountUp(valueDisplay) {
  let endValue = parseInt(valueDisplay.getAttribute("data-val"));
  let startValue = 0;
  let startTime = null;
  valueDisplay.textContent = "0"; // Pastikan mulai dari 0

  function animateCountUp(currentTime) {
    if (!startTime) startTime = currentTime;
    let elapsed = currentTime - startTime;
    let progress = Math.min(elapsed / duration, 1);
    let currentValue = Math.floor(startValue + progress * (endValue - startValue));
    valueDisplay.textContent = currentValue.toLocaleString("de-DE");
    if (progress < 1) {
      requestAnimationFrame(animateCountUp);
    } else {
      valueDisplay.textContent = endValue.toLocaleString("de-DE");
    }
  }

  requestAnimationFrame(animateCountUp);
}

// Pakai nama unik untuk observer
let valueDisplays = document.querySelectorAll(".num");
let numObserver = new IntersectionObserver(
  function (entries, observer) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Hanya jalankan jika belum pernah animasi
        if (!entry.target.classList.contains('animated')) {
          runCountUp(entry.target);
          entry.target.classList.add('animated'); // Supaya hanya sekali
        }
      }
    });
  },
  { threshold: 0.4 }
);

valueDisplays.forEach(el => numObserver.observe(el));
