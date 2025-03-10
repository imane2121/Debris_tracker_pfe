<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AquaScan - sign up</title>
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

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="starter-page-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('overview') }}" class="logo d-flex align-items-center">
        <img src="assets/img/apple-touch-icon.png" alt="">
        <h1 class="sitename">AquaScan</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('overview') }}#about">About</a></li>
          <li><a href="{{ route('overview') }}#services">Services</a></li>
          <li><a href="{{ route('signInWithEmail') }}">Log in</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="{{ route('overview') }}#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title accent-background">
      <div class="container position-relative">
        <nav class="breadcrumbs">
        </nav>
      </div>
    </div><!-- End Page Title -->

    <section style="display: flex; justify-content: center; align-items: center;" id="starter-section" class="starter-section section">
      <div class="signContainer">
        <div class="heading">Sign Up</div>
        @if(session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="form" enctype="multipart/form-data">
          @csrf
          <input required class="input @error('first_name') is-invalid @enderror" 
                 type="text" name="first_name" id="first_name" 
                 placeholder="First Name" value="{{ old('first_name') }}">

          <input required class="input @error('last_name') is-invalid @enderror" 
                 type="text" name="last_name" id="last_name" 
                 placeholder="Last Name" value="{{ old('last_name') }}">

          <input required class="input @error('username') is-invalid @enderror" 
                 type="text" name="username" id="username" 
                 placeholder="Username" value="{{ old('username') }}">

          <input required class="input @error('email') is-invalid @enderror" 
                 type="email" name="email" id="email" 
                 placeholder="E-mail" value="{{ old('email') }}">
          
          <!-- Role Selection -->
          <label for="role">Choose your role:</label>
          <select id="role" name="role" class="input @error('role') is-invalid @enderror" required>
            <option value="contributor" {{ old('role') == 'contributor' ? 'selected' : '' }}>
              Contributor - Report and track marine waste
            </option>
            <option value="supervisor" {{ old('role') == 'supervisor' ? 'selected' : '' }}>
              Collection Supervisor - Manage cleanup operations
            </option>
          </select>
          
          <!-- Additional Inputs for Collection Supervisor -->
          <div id="supervisor-fields" style="display: none;">
            <select class="input @error('organization') is-invalid @enderror" 
                    name="organisation_id" id="organization">
              <option value="" disabled {{ old('organisation_id') ? '' : 'selected' }}>Select Organization</option>
              @foreach($organisations as $organisation)
                <option value="{{ $organisation->id }}" {{ old('organisation_id') == $organisation->id ? 'selected' : '' }}>
                  {{ $organisation->name }}
                </option>
              @endforeach
            </select>

            <label for="front_organization_card">Provide the front of your organization card</label>
            <input class="input @error('front_organization_card') is-invalid @enderror" 
                   type="file" name="front_organization_card" id="front_organization_card">

            <label for="back_organization_card">Provide the back of your organization card</label>
            <input class="input @error('back_organization_card') is-invalid @enderror" 
                   type="file" name="back_organization_card" id="back_organization_card">
          </div>
          
          <input required class="input @error('password') is-invalid @enderror" 
                 type="password" name="password" id="password" 
                 placeholder="Password">

          <input required class="input @error('password_confirmation') is-invalid @enderror" 
                 type="password" name="password_confirmation" id="password_confirmation" 
                 placeholder="Confirm Password">
          
          <div class="agreement">
            By signing up, you agree to our <a href="#">Terms & Conditions</a>.
          </div>
          <input class="login-button" type="submit" value="Sign Up">
          <div class="agreement">
            <a href="{{ route('signInWithEmail') }}">Sign In</a> if you already have an account.
          </div>
        </form>  
      </div>
    </section>
    
    <script>
      // Show/hide supervisor fields based on role selection
      document.getElementById('role').addEventListener('change', function() {
        let supervisorFields = document.getElementById('supervisor-fields');
        if (this.value === 'supervisor') {
          supervisorFields.style.display = 'block';
          // Make supervisor fields required
          document.getElementById('organization').required = true;
          document.getElementById('front_organization_card').required = true;
          document.getElementById('back_organization_card').required = true;
        } else {
          supervisorFields.style.display = 'none';
          // Make supervisor fields not required
          document.getElementById('organization').required = false;
          document.getElementById('front_organization_card').required = false;
          document.getElementById('back_organization_card').required = false;
        }
      });

      // Show supervisor fields on page load if supervisor role is selected
      window.addEventListener('load', function() {
        let role = document.getElementById('role');
        if (role.value === 'supervisor') {
          document.getElementById('supervisor-fields').style.display = 'block';
        }
      });
    </script>
    

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{ route('overview') }}" class="logo d-flex align-items-center">
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
            <li><a href="{{ route('overview') }}">Home</a></li>
            <li><a href="{{ route('overview') }}#about">About us</a></li>
            <li><a href="{{ route('overview') }}#services">Services</a></li>
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

</body>

</html>