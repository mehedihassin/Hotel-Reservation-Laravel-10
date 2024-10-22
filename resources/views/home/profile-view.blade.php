@extends('layouts.common')

@section('content')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <!-- Vibrant Gradient Header -->
                <div class="card-header text-center text-white" 
                     style="background: linear-gradient(45deg, #d44b4b, #2575fc);">
                    <h2 class="mb-0">Update Profile</h2>
                </div>

                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
                @endif


                <div class="card-body p-5 bg-light">
                    <form method="POST" action="{{ route('update.profile') }}">
                        @csrf
                        @method('PUT')

                        <!-- Profile Picture Placeholder -->
                       
                        <div class="row g-4">
                            <!-- Full Name -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <label for="name" class="text-muted">Full Name</label>
                                    <input type="text" class="form-control border-1 shadow-sm" 
                                           id="name" name="name" placeholder="Full Name" 
                                           value="{{ old('name', Auth::user()->name) }}" required>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <label for="email" class="text-muted">Email Address</label>
                                    <input type="email" class="form-control border-1 shadow-sm" 
                                           id="email" name="email" placeholder="Email" 
                                           value="{{ old('email', Auth::user()->email) }}" required>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <label for="phone" class="text-muted">Phone Number</label>
                                    <input type="text" class="form-control border-1 shadow-sm" 
                                           id="phone" name="phone" placeholder="Phone Number" 
                                           value="{{ old('phone', Auth::user()->phone ?? '') }}">
                                </div>
                            </div>
                        </div>

                       <!-- Action Buttons -->
                       <div class="mt-5 d-flex justify-content-between">
                        <!-- Show Your Bookings Button -->
                        <a href="{{ route('reservetion.list') }}" class="btn btn-outline-primary btn-lg shadow-sm">
                            <i class="bi bi-calendar3 me-2"></i> Show Your Bookings
                        </a>

                        <!-- Save Changes Button -->
                        <button type="submit" class="btn btn-gradient btn-lg text-white shadow-sm"
                                style="background: linear-gradient(45deg, #2427be, #e52e71);">
                            <i class="bi bi-save me-2"></i> Save Changes
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection