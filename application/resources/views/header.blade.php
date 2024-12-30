<header id="header" class="header">
  <nav class="navbar">
    <div class="logo">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-image" />
      <span class="logo-text">MyHealth</span> <!-- Added logo text -->
    </div>
    <ul class="nav-links">
      <li><a href="/">Home</a></li>
      <li><a href="/about-us">About</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">Articles</a></li>
      <li><a href="#">Login</a></li>
    </ul>
  </nav>
</header>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const header = document.getElementById("header");
    
    window.addEventListener("scroll", function() {
      if (window.scrollY > 50) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
  });
</script>

<style scoped>
/* General Header Styling */
header {
  position: fixed;
  top: 0;
  width: 100%;
  padding: 15px 30px;
  transition: background-color 0.3s ease;
  z-index: 1000; /* Check if this is correct */
}


header.scrolled {
  background-color: lightgrey;
}

/* Navbar Styling */
.navbar {
  width: 100%;
  max-width: 1200px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
  z-index: 10;
}

/* Logo Styling */
.logo {
  display: flex;
  align-items: center; /* Align logo and text */
  gap: 10px; /* Spacing between logo image and text */
}

.logo-image {
  width: 50px;
  height: 50px;
  object-fit: cover;
}

.logo-text {
  font-size: 1.5rem; /* Adjust font size for logo text */
  font-weight: bold;
  color: #333;
  font-family: 'Arial', sans-serif; /* Make sure the font is consistent */
}

/* Navigation Links Styling */
.nav-links {
  list-style: none;
  display: flex;
  gap: 40px;
  pointer-events: auto;
}

.nav-links li {
  display: inline-block;
}

.nav-links li a {
  text-decoration: none;
  color: #333;
  font-size: 1rem;
  font-family: 'Arial', sans-serif;
  transition: color 0.3s ease;
  display: block; /* Make sure the link is a block element */
  cursor: pointer; /* Ensures that the cursor changes to a pointer */
}


.nav-links li a:hover {
  color: #d4af37; /* Hover effect */
}
</style>
