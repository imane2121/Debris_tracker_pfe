<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AquaScan - Supervisor Dashboard</title>
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
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

  <main id="main">
    <section class="supervisor-dashboard">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="text-center mb-4">Supervisor Dashboard</h2>
            
            <!-- Signals Table -->
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">New Signals</h3>
                <span class="badge bg-primary">{{ $signals->total() }} Total Signals</span>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Location</th>
                        <th scope="col">Date</th>
                        <th scope="col">Waste Types</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($signals as $signal)
                      <tr>
                        <td data-label="ID">{{ $signal->id }}</td>
                        <td data-label="Location">{{ $signal->location }}</td>
                        <td data-label="Date">{{ $signal->signalDate ? date('Y-m-d H:i', strtotime($signal->signalDate)) : 'N/A' }}</td>
                        <td data-label="Waste Types">
                          <div class="d-flex flex-wrap gap-1">
                            @foreach($signal->getWasteTypeNames() as $wasteTypeName)
                              <span class="badge bg-info text-dark">{{ $wasteTypeName }}</span>
                            @endforeach
                          </div>
                        </td>
                        <td data-label="Description">
                          <div class="text-truncate" style="max-width: 200px;" title="{{ $signal->description }}">
                            {{ $signal->description }}
                          </div>
                        </td>
                        <td data-label="Status">
                          <span class="badge bg-{{ $signal->status === 'pending' ? 'warning' : 'success' }}">
                            {{ $signal->status }}
                          </span>
                        </td>
                        <td data-label="Actions">
                          <button class="btn btn-primary btn-sm" onclick="openCollecteModal({{ $signal->id }})">
                            <i class="bi bi-plus-circle me-1"></i>Organize
                          </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                  <div class="text-muted">
                    Showing {{ $signals->firstItem() ?? 0 }} to {{ $signals->lastItem() ?? 0 }} of {{ $signals->total() }} signals
                  </div>
                  <div>
                    {{ $signals->links('pagination::bootstrap-4') }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Collecte Modal -->
  <div class="modal fade" id="collecteModal" tabindex="-1" role="dialog" aria-labelledby="collecteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="collecteModalLabel">Organize New Collecte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
          @endif

          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form id="collecteForm" method="POST" action="{{ route('store.collecte') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="signal_id" id="signal_id" value="{{ old('signal_id') }}">
            
            <div class="form-group">
              <label for="date">Starting Date</label>
              <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" 
                     id="date" name="date" value="{{ old('date') }}" required>
              @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="end_date">End Date</label>
              <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" 
                     id="end_date" name="end_date" value="{{ old('end_date') }}" required>
              @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="region">Region</label>
              <select class="form-control @error('region') is-invalid @enderror" 
                      id="region" name="region" required>
                <option value="">Select a region</option>
                @foreach($regions as $region)
                  <option value="{{ $region }}" {{ old('region') == $region ? 'selected' : '' }}>
                    {{ $region }}
                  </option>
                @endforeach
              </select>
              @error('region')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="location">Location</label>
              <input type="text" class="form-control @error('location') is-invalid @enderror" 
                     id="location" name="location" value="{{ old('location') }}" required>
              @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" 
                        id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
              @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="nbrContributors">Number of Contributors Required</label>
              <input type="number" class="form-control @error('nbrContributors') is-invalid @enderror" 
                     id="nbrContributors" name="nbrContributors" 
                     value="{{ old('nbrContributors') }}" required min="1" 
                     placeholder="Enter the number of contributors needed">
              @error('nbrContributors')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control-file @error('image') is-invalid @enderror" 
                     id="image" name="image" accept="image/*">
              <small class="form-text text-muted">Upload an image (optional). Supported formats: JPEG, PNG, JPG, GIF. Max size: 2MB</small>
              @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" form="collecteForm" class="btn btn-primary">Create Collecte</button>
        </div>
      </div>
    </div>
  </div>

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

  <script>
    function confirmLogout(event) {
      event.preventDefault();
      if (confirm('Are you sure you want to log out?')) {
        document.getElementById('logoutForm').submit();
      }
    }

    function openCollecteModal(signalId) {
      document.getElementById('signal_id').value = signalId;
      $('#collecteModal').modal('show');
    }

    // Show modal if there are validation errors or old input
    @if($errors->any() || session('error') || session('success'))
      $(document).ready(function() {
        $('#collecteModal').modal('show');
      });
    @endif
  </script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <style>
    @media (max-width: 768px) {
      .table {
        font-size: 14px;
      }
      
      .table thead {
        display: none;
      }
      
      .table tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
      }
      
      .table td {
        display: block;
        text-align: right;
        padding: 0.5rem;
        border: none;
        position: relative;
      }
      
      .table td::before {
        content: attr(data-label);
        position: absolute;
        left: 0.5rem;
        font-weight: 500;
      }
      
      .table td:not(:last-child) {
        border-bottom: 1px solid #dee2e6;
      }
      
      .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 12px;
      }
      
      .badge {
        font-size: 11px;
      }
      
      .card-header h3 {
        font-size: 1.25rem;
      }
      
      .text-truncate {
        max-width: 100% !important;
      }
    }

    /* Pagination Styling */
    .pagination {
      margin-bottom: 0;
    }

    .page-link {
      padding: 0.375rem 0.75rem;
      font-size: 14px;
    }

    .page-item.active .page-link {
      background-color: #051c41;
      border-color: #051c41;
    }

    .page-link:hover {
      background-color: #e9ecef;
      border-color: #dee2e6;
      color: #051c41;
    }
  </style>
</body>

</html> 