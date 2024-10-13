@extends('layouts.common')

@section('content')

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
