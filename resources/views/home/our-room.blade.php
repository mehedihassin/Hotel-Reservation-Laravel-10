@extends('layouts.common')

@section('content')
<div  class="our_room">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Our Room</h2>
                <p>Lorem Ipsum available, but the majority have suffered </p>
             </div>
          </div>
       </div>
       <div class="row">
           @foreach ($data as $room)
          <div class="col-md-4 col-sm-6">
             <div id="serv_hover"  class="room">
                <div class="room_img">
                   <figure><img src="{{asset('uploads/images/rooms')}}/{{$room->image}}" alt="{{$room->room_title}}"/></figure>
                </div>
                <div class="bed_room">
                   <h3>{{$room->room_title}}</h3>
                   <p>Room Type: {{$room->room_type}} </p>
                   <p>Room Status: {{$room->room_status}} </p>
                   <h2 class="text-info">Discount Price: {{$room->regular_price}}</h2>
                   <a href="{{route('room.details',['id'=>$room->id])}}" class="btn btn-danger mt-2">See Details</a>
                </div>
             </div>
          </div>
          @endforeach
       </div>
    </div>
 </div>

 @endsection
