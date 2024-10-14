@extends('admin.admin-common')

@section('content')


<section class="no-padding-top">
    <div class="container-fluid">
      <div class="row">
        <!-- Basic Form-->
        <div class="col-lg-12">
          <div class="block">
            <div class="title text-success"><strong class="d-block text-center text-info">Send Email To {{$email->name}}</strong></div>
            <div class="block-body">

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
                    <span>{{ session('success') }}</span>
                    <div>
                        <button type="button" class="btn btn-sm btn-danger" onclick="closeAlert(this)">X</button>
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

              <form method="POST" action="{{route('send.email',['id'=>$email->id])}}" >
                  @csrf
                  <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Greeting</label>
                      <div class="col-sm-9">
                        <input id="inputHorizontalSuccess" name="greeting" type="text" placeholder="Greeting" class="form-control form-control-success">
                      </div>
                    </div>
                    @error('greeting')
                    <span class="text-danger">{{ $message }}</span>
                   @enderror

                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Mail Body</label>
                  <div class="col-sm-9">
                      <textarea class="form-control" name="body" id="inputHorizontalSuccess" cols="10" rows="5"></textarea>
                  </div>
                </div>
                @error('mail_body')
                <span class="text-danger">{{ $message }}</span>
               @enderror

                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Action Text</label>
                  <div class="col-sm-9">
                    <input id="inputHorizontalSuccess" name="action_text" type="text" placeholder="Action Text" class="form-control form-control-success">
                  </div>
                </div>

                @error('action_text')
                <span class="text-danger">{{ $message }}</span>
               @enderror

                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Action URL</label>
                  <div class="col-sm-9">
                    <input id="inputHorizontalWarning" name="action_url" type="text" placeholder="Action URL" class="form-control form-control-warning">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">End Line</label>
                  <div class="col-sm-9">
                    <input id="inputHorizontalWarning" name="end_line" type="text" placeholder="End Line" class="form-control form-control-warning">
                  </div>
                </div>
                  <!-- Submit Button -->
                <div class="form-group row">
                  <div class="col-sm-9 ml-auto">
                    <button type="submit" class="btn btn-info">Send Email</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


@endsection
