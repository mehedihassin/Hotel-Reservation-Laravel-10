

@extends('layouts.common')

@section('content')
<section class="banner_main">
    <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
       <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner">
          <div class="carousel-item active">
             <img class="first-slide" src="images/banner1.jpg" alt="First slide">
             <div class="container">
             </div>
          </div>
          <div class="carousel-item">
             <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
             <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
          </div>
       </div>
       <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
       </a>
       <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
       </a>
    </div>
    <div class="booking_ocline">
       <div class="container">
          <div class="row">
             <div class="col-md-5">
                <div class="book_room">
                   <h1>Book a Room Online</h1>
                   <form class="book_now">
                      <div class="row">
                         <div class="col-md-12">
                            <span>Arrival</span>
                            <img class="date_cua" src="images/date.png">
                            <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="dd/mm/yyyy">
                         </div>
                         <div class="col-md-12">
                            <span>Departure</span>
                            <img class="date_cua" src="images/date.png">
                            <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="dd/mm/yyyy">
                         </div>
                         <div class="col-md-12">
                            <button class="book_btn">Book Now</button>
                         </div>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- end banner -->
 <!-- about -->
 <div class="about">
    <div class="container-fluid">
       <div class="row">
          <div class="col-md-5">
             <div class="titlepage">
                <h2>About Us</h2>
                <p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum. </p>
                <a class="read_more" href="Javascript:void(0)"> Read More</a>
             </div>
          </div>
          <div class="col-md-7">
             <div class="about_img">
                <figure><img src="images/about.png" alt="#"/></figure>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- end about -->
 <!-- our_room -->
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
 <!-- end our_room -->
 <!-- gallery -->
 <div  class="gallery">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>gallery</h2>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-3 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery1.jpg" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-3 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery2.jpg" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-3 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery3.jpg" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-3 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery4.jpg" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-3 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery5.jpg" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-3 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery6.jpg" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-3 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery7.jpg" alt="#"/></figure>
             </div>
          </div>
          <div class="col-md-3 col-sm-6">
             <div class="gallery_img">
                <figure><img src="images/gallery8.jpg" alt="#"/></figure>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- end gallery -->
 <!-- blog -->
 <div  class="blog">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Blog</h2>
                <p>Lorem Ipsum available, but the majority have suffered </p>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-4">
             <div class="blog_box">
                <div class="blog_img">
                   <figure><img src="images/blog1.jpg" alt="#"/></figure>
                </div>
                <div class="blog_room">
                   <h3>Bed Room</h3>
                   <span>The standard chunk </span>
                   <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf you are   </p>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <div class="blog_box">
                <div class="blog_img">
                   <figure><img src="images/blog2.jpg" alt="#"/></figure>
                </div>
                <div class="blog_room">
                   <h3>Bed Room</h3>
                   <span>The standard chunk </span>
                   <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf you are   </p>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <div class="blog_box">
                <div class="blog_img">
                   <figure><img src="images/blog3.jpg" alt="#"/></figure>
                </div>
                <div class="blog_room">
                   <h3>Bed Room</h3>
                   <span>The standard chunk </span>
                   <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf you are   </p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- end blog -->
 <!--  contact -->
 <div class="contact">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Contact Us</h2>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-6">
             <form id="request" class="main_form">
                <div class="row">
                   <div class="col-md-12 ">
                      <input class="contactus" placeholder="Name" type="type" name="Name">
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="Email" type="type" name="Email">
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="Phone Number" type="type" name="Phone Number">
                   </div>
                   <div class="col-md-12">
                      <textarea class="textarea" placeholder="Message" type="type" Message="Name">Message</textarea>
                   </div>
                   <div class="col-md-12">
                      <button class="send_btn">Send</button>
                   </div>
                </div>
             </form>
          </div>
          <div class="col-md-6">
             <div class="map_main">
                <div class="map-responsive">
                   <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
