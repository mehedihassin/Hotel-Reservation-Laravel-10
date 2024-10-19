@extends('admin.admin-common')

@section('content')
<div class="container">
    <h2 class="mb-4">Upload Video</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Video Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="url">Video File</label>
            <input type="file" name="url" class="form-control" accept="video/*" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Upload Video</button>
    </form>
</div>

@endsection
