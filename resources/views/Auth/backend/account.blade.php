@push('title')
    Admin-register
@endpush

<html lang="en">

<head>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

    
      <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap">
           <h4 class="text-center fw-bold p-4">Admin Registration Form</h4>
         </div>

<div class="container-fluid mt-5 bg-light">
    <div class="row justify-content-center align-items-center">

        <!-- Image Column -->
        <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
            <img src="{{ asset('assets/login1.png.jpg') }}" alt="logo1" class="img-fluid rounded shadow-sm">
        </div>

        <!-- Form Column -->
        <div class="col-12 col-md-6">
            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
            <form method="post" action="{{ route('admin.make') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}"
                        placeholder="Enter your full name">
                    @error('fullname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                            placeholder="Enter your phone number">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                            placeholder="Enter your email">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <label class="form-label">UserName</label>
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                        placeholder="Enter username">
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                        placeholder="Enter your password">
                    @error('fullname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mt-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                        placeholder="Enter your address">
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="form-label">Admin role</label>
                    <input type="text" class="form-control" name="role" value="{{ old('role') }}"
                        placeholder="Enter your role">
                    @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-4 w-100">Submit</button>
            </form>
        </div>
    </div>
</div>
@include('layout.backend.footer');