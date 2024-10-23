


@extends('layouts.common')

@section('content')

<style>
    body {
        background-color: #f4f4f4;
        font-family: 'Arial', sans-serif;
    }

    .titlepage h2 {
        text-align: center;
        font-weight: bold;
        margin-bottom: 30px;
        font-size: 2.5rem;
        color: #007bff; 
    }

    .room-section {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        margin-bottom: 40px; 
        display: flex; 
    }

    .room-image {
        flex: 1; 
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px; 
    }

    .room-image img {
        width: 100%; 
        height: auto;
        border: 2px solid #ddd; 
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .room-image img:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .gallery {
        flex: 0 0 30%; 
        padding: 10px; 
        display: flex; 
        flex-direction: column; 
    }

    .gallery h3 {
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
        text-align: center;
        border-bottom: 2px solid #007bff; 
    }

    .gallery-thumbnail {
        cursor: pointer;
        transition: transform 0.2s;
        border-radius: 8px;
        margin-bottom: 10px;
        border: 2px solid #ddd;
        width: 60%; 
    }

    .gallery-thumbnail:hover {
        transform: scale(1.1);
        border-color: #007bff; 
    }

    .room-details {
        padding: 20px;
        flex: 1;
    }

    .room-title {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 10px; 
        color: #333;
        border-bottom: 2px solid #007bff; 
        padding-bottom: 10px;
    }

    .list-unstyled h3 {
        font-weight: 500;
        color: #555;
        margin-bottom: 10px;
        font-size: 1.2rem;
    }

    .room-pricing h2 {
        font-size: 1.5rem;
        margin-top: 10px; 
        font-weight: bold; 
    }

    .text-success {
        color: #28a745; 
    }

    .text-danger {
        color: #dc3545; 
    }

    .btn-primary {
        padding: 12px 24px;
        font-size: 1.2rem;
        transition: background-color 0.3s;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .amenities-section {
        margin-top: 40px;
        padding: 20px;
        background-color: #fff; 
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .amenities-section h3 {
        font-weight: bold;
        color: #333;
        font-size: 1.5rem;
        border-bottom: 2px solid #007bff; 
        padding-bottom: 10px; 
    }

    .amenities-section p {
        color: #555; 
        line-height: 1.6; 
    }
</style>
</head>
<body>
<div class="container mt-5">
    <div class="titlepage">
        <h2>Our Room</h2>
    </div>

    <div class="row room-section">
        <!-- Gallery Section -->
        <div class="gallery mt-4">
            @if($room->images)
                @foreach(json_decode($room->images) as $galleryImage)
                <img src="{{ asset('uploads/images/rooms/thumbnails/' . $galleryImage) }}" 
                     class="img-fluid rounded gallery-thumbnail" alt="Gallery Image">
                @endforeach
            @endif
        </div>

        <!-- Room Image Section -->
        <div class="room-image text-center">
            <img id="mainImage" src="{{ asset('uploads/images/rooms/' . $room->image) }}" 
                 class="img-fluid rounded" alt="Room Main Image">
        </div>

        <!-- Room Details Section -->
        <div class="col-md-12 room-details mt-5">
            <h1 class="room-title">{{ $room->room_title }}</h1>
            <ul class="list-unstyled">
                <h3><strong>Room Type:</strong> {{ $room->room_type }}</h3>
                <h3><strong>Room Status:</strong> {{ $room->room_status }}</h3>
                <li><strong>Wifi:</strong> {{ $room->wifi ? ucfirst($room->wifi) : 'Not Available' }}</li>
                <li><strong>Food:</strong> {{ $room->food ? ucfirst($room->food) : 'Not Available' }}</li>
            </ul>

            <!-- Pricing Section -->
            <div class="room-pricing">
                <h2 >Regular Price: ${{ $room->regular_price }}</h2>
                @if($room->discount_price)
                <h2 >Discount Price: ${{ $room->discount_price }}</h2>
                @endif
            </div>

            <!-- Book Now Button -->
            <a href="{{ route('room.booking', ['id' => $room->id]) }}" class="btn btn-primary mt-4">Book Now</a>
        </div>
    </div>

    <!-- Amenities Section -->
    <div class="row amenities-section mt-5">
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
        thumbnail.addEventListener('click', function () {
            mainImage.src = this.src;
        });
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

@endsection
