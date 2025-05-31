


<?php
require_once 'include/functions.inc.php';
?>

<button id="theme-toggle" title="Changer de thème">🌙</button>

<footer>
    <section>
        <h4>Contacts et autres informations</h4>
        <p>Auteur : Youmna Saad et Nohayla Chennouf</p>
        <p>Page modifiée le 20/04/2025</p>
        <p>CY Paris Université</p>
        <p><a href="tech.php">Page Tech</a></p>
    </section>
    <div class="footer-logo">
        <img src="./images/CYU.png" alt="Logo" />
    </div>
    <a href="#top" id="backToTop" title="Retour en haut">↑</a>
</footer>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("theme-toggle");
    const link = document.querySelector('link[rel="stylesheet"]');

    function updateIcon(theme) {
      toggle.textContent = theme.includes("stylenight.css") ? "🌞" : "🌙";
    }

    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
      link.href = savedTheme;
      updateIcon(savedTheme);
    } else {
      updateIcon(link.getAttribute("href"));
    }

    toggle.addEventListener("click", () => {
  const currentHref = link.getAttribute("href");
  const newHref = currentHref.includes("stylenight.css") ? "style.css" : "stylenight.css";

  link.setAttribute("href", newHref);
  localStorage.setItem("theme", newHref);

  document.cookie = "theme=" + newHref + "; path=/; max-age=" + (30 * 24 * 60 * 60);

  updateIcon(newHref);
});

  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const searchWrapper = document.querySelector(".search-wrapper");

    if (searchWrapper) {
      const toggleBtn = searchWrapper.querySelector(".search-toggle");

      toggleBtn.addEventListener("click", () => {
        searchWrapper.classList.toggle("active");
      });
    }
  });
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const backToTop = document.getElementById("backToTop");

  window.addEventListener("scroll", function () {
    if (window.scrollY > 200) {
      backToTop.style.display = "block";
    } else {
      backToTop.style.display = "none";
    }
  });

  backToTop.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
});
</script>





</body>
</html>