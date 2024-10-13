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
              <div class="title text-success"><strong class="d-block">Gallery Create Form</strong><span class="d-block text-primary">Please Enter Your Room Detailes</span></div>
              <div class="block-body">
                <form method="POST" action="{{route('admin.add.gallery')}}" enctype="multipart/form-data">
                    @csrf
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
