<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signals Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar {
      margin-bottom: 20px;
    }
    .table-responsive {
      border-radius: 8px;
      overflow-x: auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .table th, .table td {
      vertical-align: middle;
      word-wrap: break-word;
      white-space: normal;
    }
    .actions {
      display: flex;
      flex-wrap: wrap;
      gap: 5px;
    }
    @media (max-width: 768px) {
      body {
        font-size: 14px; /* Smaller font size for mobile */
      }
      .table {
        font-size: 12px; /* Smaller font size for table on mobile */
      }
      .navbar-brand, .nav-link {
        font-size: 14px; /* Smaller font size for navbar on mobile */
      }
      .badge {
        font-size: 10px; /* Smaller badge font size */
      }
      .btn-sm {
        font-size: 10px; /* Smaller button font size */
        padding: 3px 6px; /* Smaller button padding */
      }
      .actions {
        flex-direction: column; /* Stack buttons vertically on mobile */
        align-items: flex-end; /* Align buttons to the left */
      }
      /* Stack table rows vertically on mobile */
      .table thead {
        display: none; /* Hide the table header on mobile */
      }
      .table, .table tbody, .table tr, .table td {
        display: block;
        width: 100%;
      }
      .table tr {
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
      }
      .table td {
        text-align: right;
        padding-left: 50%;
        position: relative;
        border-bottom: 1px solid #ddd;
      }
      .table td::before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        width: 45%;
        padding-right: 10px;
        text-align: left;
        font-weight: bold;
        white-space: nowrap;
      }
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Marine Waste Collection</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Signals</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Collections</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              User Name
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container">
    <h1 class="my-4">Signals Dashboard</h1>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Location</th>
            <th>Waste Types</th>
            <th>Volume</th>
            <th>Status</th>
            <th>Signal Date</th>
            <th>Anomaly</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($signals as $signal)
          <tr>
            <td data-label="ID">{{ $signal->id }}</td>
            <td data-label="Location">{{ $signal->location }}</td>
            <td data-label="Waste Types">
              @foreach($signal->getWasteTypeNames() as $wasteTypeName)
                  <span class="badge bg-info text-dark">{{ $wasteTypeName }}</span>
              @endforeach
            </td>
            <td data-label="Volume">{{ $signal->volume }}</td>
            <td data-label="Status">
              <span class="badge 
              {{ $signal->status == 'pending' ? 'text-warning' : 
                 ($signal->status == 'validated' ? 'text-success' : 
                 'text-danger') }}">
              {{ ucfirst($signal->status) }}
              </span>
            </td>
            <td data-label="Signal Date">{{ \Carbon\Carbon::parse($signal->signalDate)->format('d M Y H:i') }}</td>
            <td data-label="Anomaly">{{ $signal->anomalyFlag ? 'Yes' : 'No' }}</td>
            <td data-label="Actions">
              <div class="actions">
                <a href="#" class="btn btn-info btn-sm">View</a>
                <form action="{{ route('signals.destroy', $signal->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="#" class="btn btn-success btn-sm">Organize</a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>