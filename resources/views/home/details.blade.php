


@extends('layouts.common')

@section('content')


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="titlepage">
               <h2>Our Room</h2>

            </div>
         </div>
        <!-- Room Image Section -->
        <div class="col-md-6">
            <div class="room-image">
                <img width="80%" src="{{ asset('uploads/images/rooms/' . $room->image) }}" class="img-fluid rounded">

            </div>
        </div>

        <!-- Room Details Section -->
        <div class="col-md-6">
            <h1 class="room-title">{{ $room->room_title }}</h1>
            <ul class="list-unstyled mt-4">
                <h3><strong>Room Type:</strong> {{ $room->room_type }}</h3>
                <h3><strong>Room Status:</strong> {{ $room->room_status }}</h3>
                <li><strong>Wifi:</strong> {{ $room->wifi ? ucfirst($room->wifi) : 'Not Available' }}</li>
                <li><strong>Food:</strong> {{ $room->food ? ucfirst($room->food) : 'Not Available' }}</li>
            </ul>

            <!-- Pricing Section -->
            <div class="room-pricing mt-4">
                <h2 class="text-success">Regular Price: ${{ $room->regular_price }}</h2>
                @if($room->discount_price)
                    <h2 class="text-danger">Discount Price: ${{ $room->discount_price }}</h2>
                @endif
            </div>

            <!-- Book Now Button -->
            <a href="{{ route('room.booking', ['id' => $room->id]) }}" class="btn btn-primary mt-4">Book Now</a>
        </div>
    </div>

    <!-- Additional Room Details or Amenities (Optional) -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h3>Amenities</h3>
            <p>{{$room->description}}</p>
        </div>
    </div>
</div>



@endsection
