document.addEventListener("DOMContentLoaded", function () {
  const ul = document.querySelector(".syccase-shop-products ul");
  if (!ul) return;
  const items = Array.from(ul.querySelectorAll("li"));

  // Helper to extract the first tag slug from class list
  function getFirstTag(li) {
      const classes = li.className.split(/\s+/);
      const tagClass = classes.find(c => c.startsWith('product_tag-'));
      return tagClass ? tagClass.replace('product_tag-', '').toLowerCase() : '';
  }

  // Sort items based on extracted tag slug
  items.sort((a, b) => {
      const tagA = getFirstTag(a);
      const tagB = getFirstTag(b);
      return tagA.localeCompare(tagB);
  });

  // Reorder the <ul>
  ul.innerHTML = "";
  items.forEach(item => ul.appendChild(item));




  const priceContainers = document.querySelectorAll('.wc-block-grid__product-price');

  priceContainers.forEach(container => {
      const isEmpty = container.innerHTML.trim() === "";
      if (isEmpty) {
          container.innerHTML = '<span class="coming-soon-label">COMING SOON</span>';
      }
  });
});


