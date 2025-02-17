@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4 bg-dark text-white" style="background: linear-gradient(135deg, #0a3d62, #1e3c72);">
                <div class="card-body p-5">
                    <h2 class="card-title text-center mb-4 display-5 fw-bold">Register for the Ocean Clean Project</h2>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- First Name -->
                        <div class="mb-4">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" name="firstName" id="firstName" class="form-control bg-transparent text-white border-2 border-secondary rounded-3" placeholder="Enter your first name" required>
                        </div>

                        <!-- Last Name -->
                        <div class="mb-4">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" name="lastName" id="lastName" class="form-control bg-transparent text-white border-2 border-secondary rounded-3" placeholder="Enter your last name" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control bg-transparent text-white border-2 border-secondary rounded-3" placeholder="Enter your email" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control bg-transparent text-white border-2 border-secondary rounded-3" placeholder="Enter your password" required>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control bg-transparent text-white border-2 border-secondary rounded-3" placeholder="Confirm your password" required>
                        </div>

                        <!-- Role Selection -->
                        <div class="mb-4">
                            <label for="role" class="form-label">Select Your Role</label>
                            <select name="role" id="role" class="form-select bg-transparent text-white border-2 border-secondary rounded-3" required>
                                <option value="contributor">Contributor (Help clean the ocean)</option>
                                <option value="collecte_supervisor">Collecte Supervisor (Manage teams and oversee collections)</option>
                            </select>
                        </div>

                        <!-- Contributor Fields -->
                        <div id="contributorFields" class="hidden mb-4">
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control bg-transparent text-white border-2 border-secondary rounded-3" placeholder="Enter your phone number">
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control bg-transparent text-white border-2 border-secondary rounded-3" placeholder="Choose a username">
                            </div>
                        </div>

                        <!-- Supervisor Fields -->
                        <div id="supervisorFields" class="hidden mb-4">
                            <div class="mb-3">
                                <label for="CNI" class="form-label">CNI Number</label>
                                <input type="text" name="CNI" id="CNI" class="form-control bg-transparent text-white border-2 border-secondary rounded-3" placeholder="Enter your CNI number">
                            </div>

                            <div class="mb-3">
                                <label for="organisation" class="form-label">Organisation</label>
                                <input type="text" name="organisation" id="organisation" class="form-control bg-transparent text-white border-2 border-secondary rounded-3" placeholder="Enter your organisation">
                            </div>

                            <div class="mb-3">
                                <label for="region" class="form-label">Region</label>
                                <input type="text" name="region" id="region" class="form-control bg-transparent text-white border-2 border-secondary rounded-3" placeholder="Enter your region">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold text-uppercase" style="background: #1e90ff; border: none;">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('role').addEventListener('change', function() {
        const contributorFields = document.getElementById('contributorFields');
        const supervisorFields = document.getElementById('supervisorFields');

        if (this.value === 'contributor') {
            contributorFields.classList.remove('hidden');
            supervisorFields.classList.add('hidden');
        } else {
            supervisorFields.classList.remove('hidden');
            contributorFields.classList.add('hidden');
        }
    });
</script>
@endsection