
@extends('layouts.common')

@section('content')

@section('content')
<div class="container mt-5 text-center">
    <h2>Thank You for Your Booking!</h2>
    <p>Your booking has been successfully submitted. We look forward to welcoming you!</p>
    <a href="{{route('reservetion.list')}}" class="btn btn-primary mt-3">Go Back to show your Booking</a>
</div>
@endsection
