// for changing color of nav buttons after get clicked
// highlight the current page link
document.querySelectorAll('.nav-link').forEach(link => {
  if (link.href === window.location.href) {
    link.classList.add('active');
  }
});

