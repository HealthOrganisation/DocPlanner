<header id="header" class="header">
  <nav class="navbar">
    <div class="logo">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-image" />
      <span class="logo-textt">MyHealth</span>
    </div>
    <ul class="nav-links">
      @if(Auth::check())
        @if(Auth::user()->role == 'doctor')
        <li><a href="/doctor/profile">Doctor Dashboard</a></li>
          <li><a href="/appointments">Appointments</a></li>
        @else
          <li><a href="/doctor">Doctors</a></li>
          <li>
          <a href="{{ route('appointments.index') }}" 
          class="text-blue-600 hover:text-blue-800 transition"> My Appointments </a></li>

          <li><a href="{{ route('editprofilepatient', ['id' => auth()->id()]) }}">My profile</a></li>

        @endif

        <!-- Logout Link styled like other links -->
        <li>
          <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <a href="#" onclick="this.closest('form').submit();">Logout</a>
          </form>
        </li>

        

      @else
      <li><a href="/">Home</a></li>
      <li><a href="/about-us">About</a></li>
      <li><a href="/contactus">Contact</a></li>
      <li><a href="/login">Login</a></li>
      @endif

      <li><a href="/articles">Articles</a></li>
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
    padding: 15px 0; /* Adjusted padding to avoid horizontal overflow */
    background-color: transparent; /* Ensure initial transparency */
    transition: background-color 0.3s ease;
    z-index: 1000; /* Keeps the header on top */
  }

  header.scrolled {
    background-color: lightgrey;
  }

  /* Navbar Styling */
  .navbar {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto; /* Center the navbar within the header */
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 30px; /* Inner padding for content spacing */
    position: relative;
    z-index: 10;
  }

  /* Logo Styling */
  .logo {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .logo-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
  }

  .logo-textt {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
    font-family: 'Arial', sans-serif;
  }

  /* Navigation Links Styling */
  .nav-links {
    list-style: none;
    display: flex;
    gap: 40px;
    margin: 0; /* Ensure no extra margin around nav-links */
    padding: 0;
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
    display: block;
    padding: 15px 10px; /* Ensure clickable area is larger */
  }

  .nav-links li a:hover {
    color: #d4af37;
  }
  </style>
