const dropdowns = document.querySelectorAll('li > ul');

dropdowns.forEach((dropdown) => {
  dropdown.parentElement.addEventListener('mouseenter', () => {
    dropdown.style.display = 'block';
  });

  dropdown.parentElement.addEventListener('mouseleave', () => {
    dropdown.style.display = 'none';
  });
});
