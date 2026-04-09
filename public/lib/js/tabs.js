const tabs = document.querySelectorAll('.tab-button');
const tabContents = document.querySelectorAll('.tab-content');

tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    const targetId = tab.dataset.tabTarget;
    const target = document.getElementById(targetId); 
  
    tabs.forEach(t => {
      t.style.backgroundColor = '#E5E7EB'; 
      t.classList.remove('text-white'); 
      t.classList.add('text-gray-700'); 
    });

    tabContents.forEach(content => {
      content.classList.add('hidden'); 
    });

    tab.style.backgroundColor = '#005DB5'; 
    tab.classList.add('text-white');
    tab.classList.remove('text-gray-700');

    target.classList.remove('hidden');
  });
});

