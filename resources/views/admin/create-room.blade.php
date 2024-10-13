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
                <form method="POST" action="{{route('add.room')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Room Title</label>
                        <div class="col-sm-9">
                          <input id="inputHorizontalSuccess" name="room_title" type="text" placeholder="Room Title" class="form-control form-control-success">
                        </div>
                      </div>
                      @error('room_title')
                      <span class="text-danger">{{ $message }}</span>
                     @enderror

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="description" id="" cols="10" rows="5"></textarea>
                    </div>
                  </div>
                  @error('description')
                  <span class="text-danger">{{ $message }}</span>
                 @enderror

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Regular Price</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalSuccess" name="regular_price" type="text" placeholder="Regular Price" class="form-control form-control-success">
                    </div>
                  </div>

                  @error('regular_price')
                  <span class="text-danger">{{ $message }}</span>
                 @enderror

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Discount Price</label>
                    <div class="col-sm-9">
                      <input id="inputHorizontalWarning" name="discount_price" type="text" placeholder="Discount Price" class="form-control form-control-warning">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Room Status</label>
                    <div class="col-sm-9">
                      <select id="room_status" name="room_status" class="form-control form-control-warning">
                        <option value="">Select Room Status</option> <!-- Placeholder option -->
                        <option value="available">Available</option>
                        <option value="booked">Booked</option>
                      </select>
                    </div>
                  </div>

                  @error('room_status')
                  <span class="text-danger">{{ $message }}</span>
                 @enderror

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Room Type</label>
                    <div class="col-sm-9">
                      <select id="roomType" name="room_type" class="form-control form-control-warning">
                        <option value="">Select Room Type</option>
                        <option value="single">Regular</option>
                        <option value="double">Premium</option>
                        <option value="suite">Delux</option>
                      </select>
                    </div>
                  </div>

                  @error('room_type')
                  <span class="text-danger">{{ $message }}</span>
                 @enderror

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Wifi</label>
                    <div class="col-sm-9">
                      <select id="wifi" name="wifi" class="form-control form-control-warning">
                        <option value="">Select Wifi Option</option> <!-- Placeholder -->
                        <option value="free">Free Wifi</option>
                        <option value="paid">Paid Wifi</option>
                        <option value="none">No Wifi</option>
                      </select>
                    </div>
                  </div>

                  @error('wifi')
                  <span class="text-danger">{{ $message }}</span>
                 @enderror

                  <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Food</label>
                    <div class="col-sm-9">
                      <select id="food" name="food" class="form-control form-control-warning">
                        <option value="">Select Food Option</option> <!-- Placeholder -->
                        <option value="included">Food Included</option>
                        <option value="available">Food Available on Request</option>
                        <option value="none">No Food Provided</option>
                      </select>
                    </div>
                  </div>

                  @error('food')
                  <span class="text-danger">{{ $message }}</span>
                 @enderror


              <!-- Single Image Upload Field -->
                    <div id="imgpreview-single" class="form-group row">
                        <label class="col-sm-3 form-control-label">Upload Image</label>
                        <div class="col-sm-9">
                            <!-- File Input -->
                            <input type="file" id="myFileSingle" name="image" accept="image/*" class="form-control" onchange="previewSingleImage(event)">
                        </div>
                    </div>
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                   @enderror

                    <!-- Preview for Single Image -->
                    <div class="form-group row mt-3">
                        <div class="col-sm-9 offset-sm-3" id="single-image-preview"></div>
                    </div>

                    <!-- Multiple Image Upload Field -->
                    <div id="imgpreview-multiple" class="form-group row">
                        <label class="col-sm-3 form-control-label">Gallery Image</label>
                        <div class="col-sm-9">
                            <!-- File Input -->
                            <input type="file" id="myFileMultiple" name="images[]" accept="image/*" class="form-control" multiple onchange="previewMultipleImages(event)">
                        </div>
                    </div>
                    @error('images')
                    <span class="text-danger">{{ $message }}</span>
                   @enderror
                    <!-- Preview for Multiple Images -->
                    <div id="gallery" class="form-group row mt-3">
                        <div class="col-sm-9 offset-sm-3" id="multiple-image-preview"></div>
                    </div>
                    <!-- Submit Button -->
                  <div class="form-group row">
                    <div class="col-sm-9 ml-auto">
                      <button type="submit" class="btn btn-primary">Submit</button>
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

  <script>
  // Function to preview a single image
function previewSingleImage(event) {
    const singleImagePreview = document.getElementById('single-image-preview');
    singleImagePreview.innerHTML = ""; // Clear existing preview

    const file = event.target.files[0]; // Only one image

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100px';
            img.style.height = '100px';
            img.style.objectFit = 'cover';
            img.style.border = '2px solid #ddd';
            img.style.borderRadius = '4px';

            singleImagePreview.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
}

// Function to preview multiple images
function previewMultipleImages(event) {
    const multipleImagePreview = document.getElementById('multiple-image-preview');
    multipleImagePreview.innerHTML = ""; // Clear existing previews

    const files = event.target.files;

    if (files) {
        Array.from(files).forEach((file) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgContainer = document.createElement('div');
                imgContainer.style.display = 'inline-block';
                imgContainer.style.margin = '5px';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100px';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                img.style.border = '2px solid #ddd';
                img.style.borderRadius = '4px';

                imgContainer.appendChild(img);
                multipleImagePreview.appendChild(imgContainer);
            };
            reader.readAsDataURL(file);
        });
    }
}

  </script>

@endsection
