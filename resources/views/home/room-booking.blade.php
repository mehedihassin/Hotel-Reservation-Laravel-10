@extends('layouts.common')

@section('content')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #9d9999;
            font-family: Arial, sans-serif;
        }

        .reservation-form {
            max-width: 600px;
            margin: 50px auto;
            background: rgb(54, 53, 53);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-header h2 {
            font-size: 30px;
            font-weight: bold;
            color: #1ccbde;
        }

        .form-group label {
            font-weight: bold;
            color: white;
        }

        .form-control {
            background-color: #000;
            color: #fff;
            border: 1px solid #ced4da;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .form-control:focus {
            background-color: #706e6e;
            color: #fff;
            border-color: #007bff;
            box-shadow: none;
        }

        /* Specifically targeting date input fields */
        input[type="date"] {
            background-color: #000;
            color: #fff;
            border: 1px solid #ced4da;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1); /* Inverts the color of the date picker icon */
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>



</head>

<body>

    <div class="reservation-form">
        <div class="form-header">
            <h2>Reserve You Room</h2>
        </div>

        @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

        <form action="{{route('room.add.booking',$id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="room_id" value="{{ $id }}">
            <div class="form-group mb-3">
                <label for="name">Full Name</label>
                <input name="name" type="text" class="form-control" @if (Auth::id())
                    value="{{Auth::user()->name}}"
                @endif  placeholder="Enter your full name" >
            </div>
            <div class="form-group mb-3">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" @if (Auth::id())
                value="{{Auth::user()->phone}}"
            @endif class="form-control" id="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email Address</label>
                <input type="email" name="email" @if (Auth::id())
                value="{{Auth::user()->email}}"
            @endif class="form-control" id="email" placeholder="Enter your email address" required>
            </div>
            <div class="form-group mb-3">
                <label for="start-date">Check-in Date</label>
                <input type="date" name="start_date"  class="form-control" id="start-date" required>
            </div>
            @if ($errors)

            @foreach ($errors->all() as $errors)
            <li class="text-danger">{{$errors}}</li>

            @endforeach

            @endif
            <div class="form-group mb-3">
                <label for="end-date">Check-out Date</label>
                <input type="date"  name="end_date" class="form-control" id="end-date" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Reserve Now</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();

            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            document.getElementById('start-date').setAttribute('min', maxDate);
            document.getElementById('end-date').setAttribute('min', maxDate);
        });
    </script>


</body>

</html>






@endsection
