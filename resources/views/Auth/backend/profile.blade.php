@push('title')
    Registration-form
@endpush

@extends('frontend.layout.main')

@section('main-content')

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mt-3">
        <div class="col-sm-9">
            <h4 class="text-center fw-bold mt-3">Registeration-form</h4>
        </div>
        <div class="col-sm-3 mt-2">
            <p> Do You Have an Account <a href="{{ url('login') }}" class="text-danger text-decoration-none">sign in</p></a>
        </div>
    </div>

    <div class="container mt-5 bg-light">
        <form method="post" action="{{ route('register-save') }}">
            @csrf
            <div class="row mt-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Your FirstName" aria-label="First name"
                        name="firstname" value="{{ old('firstname') }}">
                    @error('firstname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Your LastName" aria-label="Last name"
                        name="lastname" value="{{ old('lastname') }}">
                    @error('lastname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Your Email/Username" aria-label="First name"
                        name="username" value="{{ old('username') }}">
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Mobail" aria-label="Last name" name="phone"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="password" aria-label="First name" name="password"
                        value="{{ old('password') }}">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Full Address" aria-label="Last name" name="address"
                        value="{{ old('address') }}">
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-3">
                @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <select id="disabledSelect" class="form-select" name="city" value="{{ old('city') }}">
                    <option>Selet City</option>
                    <option>peshawer</option>
                    <option>sialkot</option>
                    <option>lahore</option>
                    <option>islambad</option>
                </select>
            </div>

            <div class="mt-3">

                @error('delivery')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <select id="disabledSelect" class="form-select" name="delivery" value="{{ old('delivery') }}">
                    <option>Payment Methode</option>
                    <option>cash in delevery</option>
                    <option>jazz cash</option>
                    <option>bank account</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your Message"
                    name="message" value="{{ old('delivery') }}"></textarea>
                @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger rounded-pill">Sign Up</a>
        </form>
    </div>
@endsection