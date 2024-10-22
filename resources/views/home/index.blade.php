

@extends('layouts.common')

@section('content')
<section class="banner_main">
    <div>
        <div id="videoCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($videos as $index => $video)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <video autoplay loop muted style="width: 100%; height: 100%; object-fit: cover;">
                            <source src="{{ $video->url }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="carousel-caption d-none d-md-block">
                           <h1 class="text-danger"><img src="{{asset('images/logo5.png')}}" alt=""></h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#videoCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#videoCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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
                <a class="read_more" href="{{route('about')}}"> Read More</a>
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
                <h2>Rooms & Suites</h2>
                <p>A Home Away From Home </p>
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
    <div class="">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>gallery</h2>
             </div>
          </div>
       </div>
       <div class="row">
        @foreach ($gimage as $item)
        @foreach (json_decode($item->images) as $img)
          <div class="col-md-3 col-sm-6">
             <div class="gallery_img">
                <figure>
                    <img src="{{ asset('uploads/images/rooms/gallery/' . $img) }}" alt="Gallery Image" style="width: 100%; height: auto;" />
                </figure>
             </div>
          </div>
          @endforeach
          @endforeach
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
       @if(session('success'))
       <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
           <span>{{ session('success') }}</span>
           <div>
               <button type="button" class="btn-close me-2" data-bs-dismiss="alert" aria-label="Close"></button>
               <button type="button" class="btn btn-link" onclick="closeAlert(this)">X</button>
           </div>
       </div>
   @endif
   <script>
    function closeAlert(button) {
        var alert = button.closest('.alert');
        alert.classList.remove('show');
        alert.classList.add('fade');
    }
</script>

       <div class="row">
          <div class="col-md-6">
             <form action="{{route('contact')}}" class="main_form" method="POST">
                @csrf
                <div class="row">
                   <div class="col-md-12 ">
                      <input class="contactus" placeholder="Name" type="type" name="name">
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="Email" type="type" name="email">
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="Phone Number" type="type" name="phone">
                   </div>
                   <div class="col-md-12">
                      <textarea class="textarea" placeholder="Message" type="type" name="message"></textarea>
                   </div>
                   <div class="col-md-12">
                      <button type="submit" class="send_btn">Send</button>
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
