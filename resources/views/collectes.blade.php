<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AquaScan</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icobn">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Font Awesome for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="starter-page-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('contributerHome') }}" class="logo d-flex align-items-center">
        <img src="assets/img/apple-touch-icon.png" alt="">
        <h1 class="sitename">AquaScan</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#about">About</a></li>
          <li><a href="#cartography">Data</a></li>
          <li><a href="#services">Services</a></li>
          <li>
            <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <a href="#" onclick="confirmLogout(event)">Log out</a>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      

    </div>
  </header>

      <!-- Page Title -->
      <div class="page-title accent-background">
        <div class="container position-relative">
          <nav class="breadcrumbs">
          </nav>
        </div>
      </div><!-- End Page Title -->

      <main class="collectes-container">
              <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Upcoming Collectes</h2>
          <p>Stay tuned! Volunteer now to clean our beaches and protect marine life. Every effort counts—be part of the change! </p>
        </div><!-- End Section Title -->

        <div class="collectes-grid">
          @foreach ($collectes as $collecte)
              <div class="collecte-card">
                  <div class="collecte-image">
                      <!-- Dynamic Image -->
                      @if ($collecte->image)
                          <img src="{{ asset('assets/img/collectes/' . $collecte->image) }}" alt="Collecte Location">
                      @else
                          <img src="{{ asset('assets/img/collectes/default.png') }}" alt="No Image">
                      @endif
                      <div class="icon-buttons">
                          <button class="icon-button save-button" title="Save">
                              <i class="fas fa-bookmark"></i>
                          </button>
                          <button class="icon-button share-button" title="Share">
                              <i class="fas fa-share-alt"></i>
                          </button>
                      </div>
                  </div>
                  <div class="collecte-info">
                      <h2 class="collecte-location">{{ $collecte->region }}</h2>
                      <p class="collecte-description">
                        {{ $collecte->description }}
                     <a href="#" class="see-more-link">see more</a>
                      </p>
                      <div class="collecte-stats">
                          <div class="stat">
                              <i class="fas fa-users"></i>
                              <span>10 / 20 Volunteers</span>
                          </div>
                          <div class="stat">
                              <i class="fas fa-calendar-alt"></i>
                              <span>{{ $collecte->starting_date->format('F j, Y') }}</span>
                          </div>
                      </div>
                      <div class="collecte-actions">
                          <button class="collecte-button volunteer-button">Volunteer</button>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
      
        <!-- Share Popup -->
        <div class="share-popup" id="share-popup">
          <div class="share-popup-content">
            <h3>Share This Collecte</h3>
            <div class="social-icons">
              <a href="#" class="social-icon facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon twitter">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon linkedin">
                <i class="fab fa-linkedin-in"></i>
              </a>
              <a href="#" class="social-icon whatsapp">
                <i class="fab fa-whatsapp"></i>
              </a>
            </div>
            <button class="close-button" id="close-share-popup">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
      </main>
    

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">AquaScan</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A012 ABD Street</p>
            <p>City, AB 012345</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+0123456789</span></p>
            <p><strong>Email:</strong> <span>info@AquaScan.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our community!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">AquaScan</strong> <span>All Rights Reserved</span></p>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/report.js"></script>

  <script>
    function confirmLogout(event) {
      event.preventDefault();
      if (confirm('Are you sure you want to log out?')) {
        document.getElementById('logoutForm').submit();
      }
    }
  </script>

</body>

</html>