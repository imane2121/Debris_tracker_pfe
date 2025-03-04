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
          <li><a href="#about">Report</a></li>
          <li><a href="#services">News</a></li>
          <li><a href="#portfolio">Data</a></li>
          <li><a href="{{ route('account') }}">My account</a></li>
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

    <div class="marine-report-body" >
        <div class="form-container">
          <div class="container section-title" data-aos="fade-up">
            <h2>Help Us Tackle Marine Pollution</h2>
            <p>Few Steps to Cleaner Seas</p>
          </div><!-- End Section Title -->
          <form id="trash-report-form" action="" method="POST">
            <!-- Location Field-->
            <div class="form-group">
              <label for="location">Your Location</label>
              <div class="location-wrapper">
                <input type="text" id="location" name="location" readonly>
                <button type="button" id="refresh-location" aria-label="Refresh Location">🔄</button>
              </div>
              <input type="text" id="manual-location" name="manual-location" placeholder="Enter location manually">
            </div> 
      
            <!-- Material and Type Selection -->
            <div class="form-group">
              <label for="material">Select Material</label>
              <select id="material" name="material">
                <option value="plastiques">Plastics</option>
                <option value="metaux">Metals</option>
                <option value="verre">Glass</option>
                <option value="dechets-dangereux">Hazardous Waste</option>
                <option value="materiel-peche">Abandoned Fishing Gear</option>
                <option value="bois">Wood Waste</option>
                <option value="organique">Organic Waste</option>
                <option value="textiles">Textiles and Fabrics</option>
                <option value="autre">Other</option>
              </select>
            </div>
      
            <!-- Type Selection (Dynamic) -->
            <div class="form-group type-group" id="type-group" style="display: none;">
              <label for="type">Select Type</label>
              <select id="type" name="type">
                <option value="" disabled selected>Choose a type</option>
              </select>
              <button type="button" id="add-material-type" class="add-button">➕ Add Material & Type</button>
            </div>
      
            <!-- Added Material & Type List -->
            <div class="form-group">
              <label>Added Materials & Types</label>
              <div id="material-type-list" class="material-type-list"></div>
            </div>
      
            <!-- Manual Type Input -->
            <div class="form-group">
              <label for="manual-type">Add a Custom Type</label>
              <input type="text" id="manual-type" name="manual-type" placeholder="Enter a custom type">
              <button type="button" id="add-custom-type" class="add-button">➕ Add Custom Type</button>
            </div>
            
            <!-- Quantity Estimation -->
            <div class="form-group">
              <label for="quantity">Estimated Quantity</label>
              <div class="quantity-options">
                <label><input type="radio" name="quantity" value="small"> Small (1-10 kg)</label>
                <label><input type="radio" name="quantity" value="medium"> Medium (10-50 kg)</label>
                <label><input type="radio" name="quantity" value="large"> Large (50+ kg)</label>
              </div>
            </div>
      
            <!-- Photo Upload -->
            <div class="form-group">
              <label for="photo">Upload Photo</label>
              <div class="upload-area" id="upload-area">
                <input type="file" id="photo" name="photo" accept="image/*" multiple>
                <p>Drag & drop or click to upload</p>
              </div>
              <div id="photo-preview" class="photo-preview"></div>
            </div>
      
            <!-- Additional Notes -->
            <div class="form-group">
              <label for="notes">Additional Information</label>
              <textarea id="notes" name="notes" rows="4" placeholder="Add any extra details..."></textarea>
            </div>
      
            <!-- Submit Button -->
            <button type="submit" id="submit-report" class="submit-button">Submit Report</button>
          </form>
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

</body>

</html>