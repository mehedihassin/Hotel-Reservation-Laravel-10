@extends('layouts.common')

@section('content')


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


@endsection
