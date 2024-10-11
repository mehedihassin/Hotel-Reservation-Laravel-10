@extends('admin.admin-common')

@section('content')

<div class="page-content">
    <!-- Page Header-->

    <!-- Breadcrumb-->

    <section class="no-padding-top">
      <div class="container-fluid">
        <div class="row">
          <!-- Basic Form-->
          <div class="col-lg-12">
            <div class="block">
              <div class="title text-success"><strong class="d-block">Room Create Form</strong><span class="d-block text-primary">Please Enter Your Room Detailes</span></div>
              <div class="block-body">
                <form method="POST" action="{{route('room.update',['id'=>$data->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Room Title</label>
                        <div class="col-sm-9">
                          <input id="inputHorizontalSuccess" value="{{$data->room_title}}" name="room_title" type="text" placeholder="Room Title" class="form-control form-control-success">
                        </div>
                      </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="description" id="" cols="10" rows="5">{{$data->description}}</textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Regular Price</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalSuccess" value="{{$data->regular_price}}" name="regular_price" type="text" placeholder="Regular Price" class="form-control form-control-success">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Discount Price</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalWarning" value="{{$data->discount_price}}" name="discount_price" type="text" placeholder="Discount Price" class="form-control form-control-warning">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Room Status</label>
                    <div class="col-sm-9">
                        <select id="room_status" name="room_status" class="form-control form-control-warning">
                            <option value="">Select Room Status</option>
                            <option value="available" {{$data->room_status == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="booked" {{$data->room_status == 'booked' ? 'selected' : '' }}>Booked</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Room Type</label>
                    <div class="col-sm-9">
                        <select id="roomType" name="room_type" class="form-control form-control-warning">
                            <option value="">Select Room Type</option>
                            <option value="single" {{$data->room_type == 'single' ? 'selected' : '' }}>Regular</option>
                            <option value="double" {{$data->room_type == 'double' ? 'selected' : '' }}>Premium</option>
                            <option value="suite" {{$data->room_type == 'suite' ? 'selected' : '' }}>Deluxe</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Wifi</label>
                    <div class="col-sm-9">
                        <select id="wifi" name="wifi" class="form-control form-control-warning">
                            <option value="">Select Wifi Option</option> <!-- Placeholder option -->
                            <option value="free" {{$data->wifi == 'free' ? 'selected' : '' }}>Free Wifi</option>
                            <option value="paid" {{$data->wifi == 'paid' ? 'selected' : '' }}>Paid Wifi</option>
                            <option value="none" {{$data->wifi == 'none' ? 'selected' : '' }}>No Wifi</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Food</label>
                    <div class="col-sm-9">
                        <select id="food" name="food" class="form-control form-control-warning">
                            <option value="">Select Food Option</option> <!-- Placeholder option -->
                            <option value="included" {{$data->food == 'included' ? 'selected' : '' }}>Food Included</option>
                            <option value="available" {{$data->food == 'available' ? 'selected' : '' }}>Food Available on Request</option>
                            <option value="none" {{$data->food == 'none' ? 'selected' : '' }}>No Food Provided</option>
                        </select>
                    </div>
                </div>

               <!-- Image Upload Field -->
               <div id="imgpreview" class="form-group row">
                <label class="col-sm-3 form-control-label">Upload Image</label>
                <div class="col-sm-9">
                    <!-- File Input -->
                    <input type="file" id="myFile" name="image" accept="image/*" class="form-control" onchange="previewImage(event)">

                    <!-- Image Preview -->
                    <img width="80" id="imagePreview" src="{{ asset('uploads/images/rooms/' . $data->image) }}" alt="Image Preview" class="mt-3" style="max-width: 200px; max-height: 200px;">

                </div>
            </div>



                    <!-- Submit Button -->
                  <div class="form-group row">
                    <div class="col-sm-9 ml-auto">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </div>



                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </div>

@endsection


<script>
    <script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
</script>
