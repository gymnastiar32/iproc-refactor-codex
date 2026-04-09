
$(function () {
  const $tnsOuter = $(".tns-outer");
  const $toggleButton = $(".client-toggle");

  $tnsOuter.addClass("max-h-80 overflow-y-clip md:max-h-max");

  $toggleButton.on("click", function () {
    const isExpanded = $tnsOuter.hasClass("max-h-max");

    $tnsOuter.toggleClass("max-h-80 max-h-max");
    $(this).text(isExpanded ? "Show More" : "Show Less");
  });
});



var slider = tns({
  container: '.my-slider',
  items: 1,
  autoHeight: true,
  autoplay: false,
  autoplayTimeout: 5000,
  autoplayButtonOutput: false,
  controlsContainer: "#controls",
  prevButton: ".prev",
  nextButton: ".next",
  loop: true,
  nav: false,
});

var awardSlider = tns({
  container: '.award-slider',
  items: 1,
  autoHeight: true,
  autoplay: false,
  autoplayTimeout: 5000,
  autoplayButtonOutput: false,
  controls: false,
  loop: true,
  gutter: 8,
  nav: false,
  responsive: {
    768: {
      items: 2,
      gutter: 32
    }
  }
});

$('.award-prev').on('click', function () {
  awardSlider.goTo('prev');
});

$('.award-next').on('click', function () {
  awardSlider.goTo('next');
});

// Tambahan untuk mengubah isi teks client-sector
const sectorMap = [
  'BUMN & BUMD',
  'Energy & Mining',
  'Finance & Banking',
  'Manufacturing & Construction',
  'Government',
  'Telecommunications, Transportation & Entertainment'
];

function updateClientSector(index) {
  index = index - 1
  $('.client-sector').text(sectorMap[index]);
}

// Set teks saat load pertama
updateClientSector(slider.getInfo().index);

// Update teks saat slide diganti
slider.events.on('indexChanged', function (info) {
  updateClientSector(info.index);
});
