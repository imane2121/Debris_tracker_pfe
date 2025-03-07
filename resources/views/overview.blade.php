<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AquaScan - overview</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<!-- Leaflet JS & Heatmap Plugin -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>
  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!--bootstrap links-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('contributerHome') }}" class="logo d-flex align-items-center">
        <img src="assets/img/apple-touch-icon.png" alt="">
        <h1>AquaScan</h1>      
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#about">About</a></li>
          <li><a href="#cartography">Data</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="{{ route('signInWithEmail') }}">Log in</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>


  </header>

  <main class="main">
  
    <!-- Hero Section -->
    <section id="hero" class="hero section accent-background">

      <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

      <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
        <h2>Clean Seas Project</h2>
        <p>Protect Our Seas—Together, Let's Fight Marine Pollution!</p>
        <a href="#articles" class="btn-scroll" title="Scroll Down"><i class="bi bi-chevron-down"></i></a>
      </div>

    </section><!-- /Hero Section -->

    <section class="collectes-container">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
          <h2>Upcoming Collectes</h2>
          <p>Stay tuned! Volunteer now to clean our beaches and protect marine life. Every effort counts—be part of the change! </p>
      </div><!-- End Section Title -->
  
      <!-- Swiper Carousel -->
      <div class="container">
          <div class="swiper collectesSwiper">
              <div class="swiper-wrapper">
                  @foreach ($collectes as $collecte)
                      <div class="swiper-slide">
                          <div class="collecte-card">
                              <div class="collecte-image">
                                  @if ($collecte->image)
                                      <img src="{{ asset('assets/img/collectes/' . $collecte->image) }}" alt="Collecte Location">
                                  @else
                                      <img src="{{ asset('assets/img/collectes/default.png') }}" alt="No Image">
                                  @endif
                                  <div class="icon-buttons">
                                      <button class="icon-button expand-button" title="See More" data-bs-toggle="modal" data-bs-target="#collecteModal{{ $collecte->id }}">
                                          <i class="fas fa-expand-alt"></i>
                                      </button>
                                      <div class="share-container">
                                          <button class="icon-button share-button" title="Share">
                                              <i class="fas fa-share-alt"></i>
                                          </button>
                                          <div class="share-popup">
                                              <div class="share-icon facebook" title="Share on Facebook">
                                                  <i class="fab fa-facebook-f"></i>
                                              </div>
                                              <div class="share-icon twitter" title="Share on Twitter">
                                                  <i class="fab fa-twitter"></i>
                                              </div>
                                              <div class="share-icon instagram" title="Share on Instagram">
                                                  <i class="fab fa-instagram"></i>
                                              </div>
                                              <div class="share-icon pinterest" title="Share on Pinterest">
                                                  <i class="fab fa-pinterest-p"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="collecte-info">
                                  <h2 class="collecte-location">{{ $collecte->region }}</h2>
                                  <p class="collecte-description">
                                      {{ Str::limit($collecte->description, 100) }}
                                  </p>
                                  <div class="collecte-stats">
                                      <div class="stat">
                                          <i class="fas fa-users"></i>
                                          <span>10 / {{ $collecte->nbrContributors }} Volunteers</span>
                                      </div>
                                      <div class="stat">
                                          <i class="fas fa-calendar-alt"></i>
                                          <span>{{ $collecte->starting_date->format('F j, Y') }}</span>
                                      </div>
                                  </div>
                                  <div class="collecte-actions">
                                      <a href="{{ route('signInWithEmail') }}" class="collecte-button volunteer-button">Volunteer</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
              <div class="swiper-pagination"></div>
          </div>
      </div>
  </section>

  <!-- Collecte Details Modals -->
  @foreach ($collectes as $collecte)
  <div class="modal fade" id="collecteModal{{ $collecte->id }}" tabindex="-1" aria-labelledby="collecteModalLabel{{ $collecte->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
        <div class="modal-body">
          <div class="collecte-modal-image">
            @if ($collecte->image)
              <img src="{{ asset('assets/img/collectes/' . $collecte->image) }}" alt="Collecte Location">
            @else
              <img src="{{ asset('assets/img/collectes/default.png') }}" alt="No Image">
            @endif
            <div class="collecte-modal-title">
              <h5>{{ $collecte->region }}</h5>
              @if($collecte->signal && $collecte->signal->wasteTypes)
                <div class="waste-types">
                  @foreach($collecte->signal->getWasteTypeNames() as $wasteTypeName)
                    <span class="waste-type-badge">{{ $wasteTypeName }}</span>
                  @endforeach
                </div>
              @endif
            </div>
          </div>
          <div class="collecte-modal-content">
            <div class="collecte-modal-description">
              <h6>About This Collecte</h6>
              <p>{{ $collecte->description }}</p>
            </div>
            <div class="collecte-modal-details">
              <div class="detail-item">
                <i class="fas fa-users"></i>
                <div>
                  <h6>Volunteers</h6>
                  <p>10 / {{ $collecte->nbrContributors }} Volunteers</p>
                </div>
              </div>
              <div class="detail-item">
                <i class="fas fa-calendar-alt"></i>
                <div>
                  <h6>Date & Time</h6>
                  <p>{{ $collecte->starting_date->format('F j, Y') }} at {{ $collecte->starting_date->format('h:i A') }}</p>
                </div>
              </div>
              <div class="detail-item">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                  <h6>Location</h6>
                  <p>{{ $collecte->location }}</p>
                </div>
              </div>
              @if($collecte->signal)
                <div class="detail-item">
                  <i class="fas fa-weight"></i>
                  <div>
                    <h6>Estimated Volume</h6>
                    <p>{{ $collecte->signal->volume }} kg</p>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="{{ route('signInWithEmail') }}" class="volunteer-button">Volunteer Now</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.collectesSwiper', {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            speed: 2000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: 'slide',
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            // Enable touch swiping
            simulateTouch: true,
            touchRatio: 1,
            touchAngle: 45,
            grabCursor: true,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            }
        });

        // Share popup functionality
        const shareButtons = document.querySelectorAll('.share-button');
        const sharePopups = document.querySelectorAll('.share-popup');

        shareButtons.forEach((button, index) => {
            button.addEventListener('click', (e) => {
                e.stopPropagation();
                // Close all other popups
                sharePopups.forEach((popup, i) => {
                    if (i !== index) popup.classList.remove('active');
                });
                // Toggle current popup
                sharePopups[index].classList.toggle('active');
            });
        });

        // Close share popup when clicking outside
        document.addEventListener('click', () => {
            sharePopups.forEach(popup => popup.classList.remove('active'));
        });
    });
  </script>

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section accent-background">

      <img src="assets/img/cta-bg.jpg" alt="Protect Our Oceans">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Protect Our Oceans, One Action at a Time</h3>
              <p>Every year, millions of tons of trash pollute our seas, harming marine life. Join us in cleaning up and making a real impact for a cleaner, healthier ocean!</p>
              <a class="cta-btn" href="{{ route('signInWithEmail') }}">Join the Cleanup</a>
              <a class="cta-btn" href="{{ route('signInWithEmail') }}">Report Marine Trash</a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Call To Action Section -->

<!-- Articles Section -->
<section id="articles" class="portfolio section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>News</h2>
    <p>Stay informed about marine life, ocean pollution, and conservation efforts.</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

      <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        <li data-filter=".filter-news">News</li>
        <li data-filter=".filter-event">Events</li>
        <li data-filter=".filter-guideline">Guidline</li>
      </ul><!-- End Filters -->

      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

        <!-- Dynamic Articles Loop -->
        @foreach ($articles as $article)
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ strtolower($article->category) }}">
                <!-- Dynamic Image -->
                @if ($article->image)
                    <img src="{{ asset('assets/img/articles/' . $article->image) }}" class="img-fluid" alt="{{ $article->title }}">
                @else
                    <!-- Fallback image if no image is available -->
                    <img src="{{ asset('assets/img/portfolio/app-1.jpg') }}" class="img-fluid" alt="No Image">
                @endif
    
                <div class="portfolio-info">
                    <h4>{{ $article->title }}</h4>
                    <p>{{ Str::limit($article->content, 100, '...') }}</p> <!-- Display first 100 characters of content -->
                    
                    <!-- Dynamic Preview Link -->
                    @if ($article->image)
                        <a href="{{ asset('assets/img/articles/' . $article->image) }}" title="{{ $article->title }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="fas fa-share"></i></a>
                    @else
                        <a href="{{ asset('assets/img/portfolio/app-1.jpg') }}" title="{{ $article->title }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="fas fa-share"></i></a>
                    @endif
                    
                    <a href="{{ route('article', ['id' => $article->id]) }}" title="{{ $article->title }}" class="details-link"><i class="fas fa-ellipsis-h"></i></a>
                </div>
            </div><!-- End Article -->
        @endforeach
    
    </div><!-- End Articles Container -->

    </div>

  </div>
</section>


    <!-- About Section -->
    <section id="about" class="about section  light-background">

      <div class="container">

        <div class="container section-title" data-aos="fade-up">
          <h2>About</h2>
          <p>An innovative platform to combat marine pollution through citizen participation and data analysis</p>
        </div><!-- End Section Title -->

        <div class="row gy-5">

          <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
            <h3>Collaborative and Data-Driven Marine Waste Management</h3>
            <p>
              Our platform enables users to report marine waste through geolocation, photos, and classification. Advanced analytics and AI-based verification ensure accurate data collection, helping organizations take targeted actions.
            </p>
          </div>

          <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">

              <div class="col-md-6 icon-box position-relative">
                <i class="bi bi-map"></i>
                <h4><a href="" class="stretched-link">Interactive Mapping</a></h4>
                <p>Real-time visualization of reported marine waste with filtering options by date, type, and location</p>
              </div><!-- Icon-Box -->

              <div class="col-md-6 icon-box position-relative">
                <i class="bi bi-bar-chart"></i>
                <h4><a href="" class="stretched-link">Heatmaps & Statistics</a></h4>
                <p>Automatic heatmap generation to identify critical pollution areas and statistical reports for analysis</p>
              </div><!-- Icon-Box -->

              <div class="col-md-6 icon-box position-relative">
                <i class="bi bi-shield-check"></i>
                <h4><a href="" class="stretched-link">AI Verification</a></h4>
                <p>Image recognition technology ensures reported waste is valid, reducing false submissions</p>
              </div><!-- Icon-Box -->

              <div class="col-md-6 icon-box position-relative">
                <i class="bi bi-people"></i>
                <h4><a href="" class="stretched-link">Community Engagement</a></h4>
                <p>Users can discuss local solutions, share best practices, and collaborate on cleanup initiatives</p>
              </div><!-- Icon-Box -->

            </div>
          </div>

        </div>

      </div>

    </section>

    <section id="cartography" class="about section">
      <div class="container section-title" data-aos="fade-up">
          <h2>Cartography</h2>
          <p></p>
      </div>    
      <div class="map-container">
          <div id="map" class="map-box"></div>
      </div>
  </section>
  
  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  
  <script>
      // Initialize the map, centered on Moroccan seas
      var map = L.map('map').setView([31.7917, -9.5541], 6); // Coordinates for Morocco
  
      // Add tile layer (map background)
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenStreetMap contributors'
      }).addTo(map);
  
      // Fetch locations data from the backend
      var locations = @json($locations);
  
      // Debug the locations data
      console.log('Locations:', locations);
  
      // Define custom icons for upcoming and completed collectes
      var upcomingIcon = L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png', // Red marker icon          iconSize: [25, 41], // Size of the icon
          iconAnchor: [12, 41], // Point of the icon that corresponds to the marker's location
          popupAnchor: [1, -34] // Point from which the popup should open relative to the iconAnchor
      });
  
      var completedIcon = L.icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png', // Red marker icon          iconSize: [25, 41], // Size of the icon
          iconAnchor: [12, 41], // Point of the icon that corresponds to the marker's location
          popupAnchor: [1, -34] // Point from which the popup should open relative to the iconAnchor
      });
  
      // Add markers for each location
      if (locations.length > 0) {
          locations.forEach(function(location) {
              // Determine if the collecte is upcoming or completed
              var collecteDate = new Date(location.starting_date); // Convert starting_date to a Date object
              var isUpcoming = collecteDate > new Date(); // Check if the date is in the future
  
              // Choose the icon based on the collecte status
              var icon = isUpcoming ? upcomingIcon : completedIcon;
  
              // Create a marker for each location
              var marker = L.marker([
                  parseFloat(location.latitude), // Convert latitude to number
                  parseFloat(location.longitude) // Convert longitude to number
              ], { icon: icon }).addTo(map);
  
              // Add a popup to the marker
              marker.bindPopup(`
                  <b>Location:</b> ${location.latitude}, ${location.longitude}<br>
                  <b>Volume:</b> ${location.volume}<br>
                  <b>Status:</b> ${isUpcoming ? 'Upcoming' : 'Completed'}<br>
                  <b>Date:</b> ${collecteDate.toLocaleDateString()}
              `);
          });
      } else {
          console.error('No location data available.');
          alert('No validated collectes found.'); // Notify the user
      }
  </script>
  
        <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-droplet"></i>
              <span data-purecounter-start="0" data-purecounter-end="15430" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Total Analyses</strong> <span>Water samples tested</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-geo-alt"></i>
              <span data-purecounter-start="0" data-purecounter-end="82" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Regions Covered</strong> <span>Areas monitored</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-cpu"></i>
              <span data-purecounter-start="0" data-purecounter-end="210" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Active Sensors</strong> <span>Devices in operation</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="47" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Expert Collaborators</strong> <span>Scientists & analysts</span></p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

        <!-- Faq Section -->
    <section id="faq" class="faq section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
        <p>Find answers to common questions about our platform and how you can help protect our oceans.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row faq-item" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5 d-flex">
            <i class="bi bi-question-circle"></i>
            <h4>How can I report marine trash?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              You can report marine trash by submitting details and images through our platform. Just click on "Report Trash," provide the location and description, and our community will take action!
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5 d-flex">
            <i class="bi bi-question-circle"></i>
            <h4>Who can participate in cleanup missions?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Anyone! Whether you're an individual, an organization, or a group of volunteers, you can join cleanup efforts near you. Check our map to find or start a cleanup mission.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-5 d-flex">
            <i class="bi bi-question-circle"></i>
            <h4>How does this platform help the ocean?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Our platform connects people with real-time data on ocean pollution. By reporting and organizing cleanups, we help remove plastic waste and protect marine ecosystems.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item" data-aos="fade-up" data-aos-delay="400">
          <div class="col-lg-5 d-flex">
            <i class="bi bi-question-circle"></i>
            <h4>What happens after I report trash?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Once reported, trash locations are added to our map. Volunteers and environmental groups can then organize cleanups based on priority areas.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item" data-aos="fade-up" data-aos-delay="500">
          <div class="col-lg-5 d-flex">
            <i class="bi bi-question-circle"></i>
            <h4>How can I support this project?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              You can support us by spreading the word, joining cleanups, or even reporting trash to help us expand our impact. Every action counts!
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

      </div>

    </section><!-- /Faq Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section  light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Whether you're a contributor looking to contact us or someone interested in applying as a collection supervisor with an organizational background, feel free to reach out. We welcome all collaborations to make a positive environmental impact.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>A012 ABCD Street, City, AB 012345</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+0123456789</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>info@AquaScan.com</p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6922.231494736724!2d-9.232722035532442!3d32.29307913571006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda91b41af357795%3A0x9c3e79a5a19d5d56!2sSafi%2C%20Maroc!5e0!3m2!1sfr!2sma!4v1707079791674!5m2!1sfr!2sma" 
              frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="text" name="email" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

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
            <li><a href="">Home</a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="">Terms of service</a></li>
            <li><a href="">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our community!</p>
          <form action="" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© Copyright <strong class="px-1 sitename">AquaScan</strong> All Rights Reserved</p>
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