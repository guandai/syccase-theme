document.addEventListener("DOMContentLoaded", function () {
  const priceContainers = document.querySelectorAll('.wc-block-grid__product-price');

  priceContainers.forEach(container => {
      const isEmpty = container.innerHTML.trim() === "";
      if (isEmpty) {
          container.innerHTML = '<span class="coming-soon-label">COMING SOON</span>';
      }
  });
});


