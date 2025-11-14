@extends('layout.frontend.main')

@section('main-content')
<div class="alert-success text-center">
    <h1>Payment Successful!</h1>
    <p>Thank you for your purchase. Your payment has been processed successfully.</p>
    <a href="{{ route('home') }}" class="btn btn-primary">Return to Home</a>
</div>
@endsection