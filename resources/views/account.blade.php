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
          <li><a href="#team">My account</a></li>
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

      <!-- Page Title -->
      <div class="page-title accent-background">
        <div class="container position-relative">
          <nav class="breadcrumbs">
          </nav>
        </div>
      </div><!-- End Page Title -->

      <main class="account-settings-container">
        <!-- Sidebar Navigation -->
        <aside class="account-sidebar">
          <nav>
            <ul>
              <li><a href="#profile" class="account-nav-link active">Profile</a></li>
              <li><a href="#security" class="account-nav-link">Security</a></li>
              <li><a href="#privacy" class="account-nav-link">Privacy</a></li>
              <li><a href="#notifications" class="account-nav-link">Notifications</a></li>
              <li><a href="#language" class="account-nav-link">Language</a></li>
              <li><a href="#rewards" class="account-nav-link">Rewards</a></li>
              <li><a href="#community" class="account-nav-link">Community</a></li>
            </ul>
          </nav>
        </aside>
      
        <!-- Main Content Area -->
        <section class="account-content">
          <!-- Profile Section -->
          <div id="profile" class="account-section active">
            <h2 class="account-section-title">Profile Settings</h2>
            <form class="account-form profile-form">
              <div class="account-form-group">
                <label for="profile-picture" class="account-form-label">Profile Picture</label>
                <div class="account-profile-picture">
                  <img src="https://via.placeholder.com/150" alt="Profile Picture" class="account-profile-img">
                  <input type="file" id="profile-picture" class="account-form-input" accept="image/*">
                </div>
              </div>
              <div class="account-form-group">
                <label for="username" class="account-form-label">Username</label>
                <input type="text" id="username" class="account-form-input" value="Example123" readonly>
              </div>
              <div class="account-form-group">
                <label for="email" class="account-form-label">Email</label>
                <input type="text" id="email" class="account-form-input" value="Example123@gmail.com" readonly>
              </div>
              <button type="submit" class="account-button save-button">Save Changes</button>
            </form>
          </div>
      
          <!-- Security Section -->
          <div id="security" class="account-section">
            <h2 class="account-section-title">Security Settings</h2>
            <form class="account-form security-form">
              <div class="account-form-group">
                <label for="current-password" class="account-form-label">Current Password</label>
                <input type="text" id="current-password" class="account-form-input">
              </div>
              <div class="account-form-group">
                <label for="new-password" class="account-form-label">New Password</label>
                <input type="text" id="new-password" class="account-form-input">
              </div>
              <div class="account-form-group">
                <label for="confirm-password" class="account-form-label">Confirm New Password</label>
                <input type="text" id="confirm-password" class="account-form-input">
              </div>
              <button type="submit" class="account-button save-button">Update Password</button>
            </form>
          </div>
      
          <!-- Privacy Section -->
          <div id="privacy" class="account-section">
            <h2 class="account-section-title">Privacy Settings</h2>
            <form class="account-form privacy-form">
              <div class="account-form-group">
                <label class="account-form-label">
                  <input type="checkbox" class="account-form-checkbox" checked> Make profile public
                </label>
              </div>
              <div class="account-form-group">
                <label class="account-form-label">
                  <input type="checkbox" class="account-form-checkbox" checked> Allow search engines to index my profile
                </label>
              </div>
              <div class="account-form-group">
                <label class="account-form-label">
                  <input type="checkbox" class="account-form-checkbox"> Show my activity to other users
                </label>
              </div>
              <button type="submit" class="account-button save-button">Save Preferences</button>
            </form>
          </div>
      
          <!-- Notifications Section -->
          <div id="notifications" class="account-section">
            <h2 class="account-section-title">Notification Preferences</h2>
            <form class="account-form notifications-form">
              <div class="account-form-group">
                <label class="account-form-label">
                  <input type="checkbox" class="account-form-checkbox" checked> Receive email notifications
                </label>
              </div>
              <div class="account-form-group">
                <label class="account-form-label">
                  <input type="checkbox" class="account-form-checkbox" checked> Receive SMS notifications
                </label>
              </div>
              <div class="account-form-group">
                <label class="account-form-label">
                  <input type="checkbox" class="account-form-checkbox"> Receive community updates
                </label>
              </div>
              <button type="submit" class="account-button save-button">Save Preferences</button>
            </form>
          </div>
      
          <!-- Language Section -->
          <div id="language" class="account-section">
            <h2 class="account-section-title">Language Preferences</h2>
            <form class="account-form language-form">
              <div class="account-form-group">
                <label for="language-select" class="account-form-label">Select Language</label>
                <select id="language-select" class="account-form-input">
                  <option value="en">English</option>
                  <option value="fr">French</option>
                  <option value="es">Spanish</option>
                  <option value="de">German</option>
                </select>
              </div>
              <button type="submit" class="account-button save-button">Save Language</button>
            </form>
          </div>
      
          <!-- Rewards Section -->
          <div id="rewards" class="account-section">
            <h2 class="account-section-title">Your Rewards</h2>
            <div class="account-rewards-dashboard">
              <div class="account-reward-card">
                <h3 class="account-reward-title">Total Points</h3>
                <p class="account-reward-points">1,250</p>
                <p class="account-reward-description">Keep contributing to earn more!</p>
              </div>
              <div class="account-reward-card">
                <h3 class="account-reward-title">Badges Earned</h3>
                <div class="account-badges">
                  <span class="account-badge">🌊 Ocean Hero</span>
                  <span class="account-badge">♻️ Eco Champion</span>
                  <span class="account-badge">🏆 Top Contributor</span>
                </div>
              </div>
              <div class="account-reward-card">
                <h3 class="account-reward-title">Recent Activity</h3>
                <ul class="account-activity-list">
                  <li>Reported 10 plastic bottles (+50 points)</li>
                  <li>Cleaned a beach (+100 points)</li>
                  <li>Shared on social media (+25 points)</li>
                </ul>
              </div>
            </div>
          </div>
      
          <!-- Community Section -->
          <div id="community" class="account-section">
            <h2 class="account-section-title">Community Engagement</h2>
            <div class="account-community-forum">
              <h3 class="account-forum-title">Latest Discussions</h3>
              <div class="account-forum-post">
                <h4 class="account-forum-post-title">How to reduce microplastics?</h4>
                <p class="account-forum-post-author">Posted by EcoFriend123</p>
                <a href="#" class="account-forum-post-link">Join the discussion</a>
              </div>
              <div class="account-forum-post">
                <h4 class="account-forum-post-title">Upcoming Beach Cleanup Event</h4>
                <p class="account-forum-post-author">Posted by CleanOceanOrg</p>
                <a href="#" class="account-forum-post-link">Learn more</a>
              </div>
            </div>
          </div>
        </section>
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