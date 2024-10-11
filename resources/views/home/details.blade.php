


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
                <!-- Main Image Display -->
                <img id="mainImage" width="80%" src="{{ asset('uploads/images/rooms/' . $room->image) }}" class="img-fluid rounded" alt="Room Main Image">
            </div>

            <!-- Gallery Images Section -->
            @if($room->images)
                <div class="room-gallery mt-4">
                    <h3>Gallery</h3>
                    <div class="row">
                        @foreach(json_decode($room->images) as $galleryImage)
                            <div class="col-md-4 mb-3">
                                <img src="{{ asset('uploads/images/rooms/thumbnails/' . $galleryImage) }}" class="img-fluid rounded gallery-thumbnail" alt="Gallery Image" style="cursor: pointer;">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
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
            <p>{{ $room->description }}</p>
        </div>
    </div>
</div>

<!-- JavaScript to handle gallery image clicks -->
<script>
    const galleryThumbnails = document.querySelectorAll('.gallery-thumbnail');
    const mainImage = document.getElementById('mainImage');

    galleryThumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            mainImage.src = this.src;
        });
    });
</script>


@endsection
