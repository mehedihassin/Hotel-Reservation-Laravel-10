@extends('admin.admin-common')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="container">

<!-- Video List -->
<h4 class="mt-4">Uploaded Videos</h4>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Video</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i=1;
        @endphp
        @foreach ($data as $video)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $video->title }}</td>
                <td>
                    <video width="120" height="90" controls>
                        <source src="{{ asset($video->url) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </td>
                <td>
                    <form action="{{ route('videos.delete', ['id' => $video->id]) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this booking?");
    }
</script>


@endsection
