@extends('admin.admin-common')

@section('content')


<style type="text/css">


    .th_deg{
        background-color: rgb(33, 74, 97);
        padding: 1.75rem;
    }
    tr{
        border: 1px solid rgb(109, 107, 107);
    }

    .table td, .table th {
    padding: 1.75rem;
    vertical-align: top;
    }
    </style>


<div class="page-content">
      <div class="container-fluid">
        <div class="card-body">

            <table class="table table-bordered border-dark">
                <thead>
                    <tr>
                        <th class="th_deg">ID</th>
                        <th class="th_deg">Images</th>
                        <th class="th_deg">Delete</th>
                    </tr>
                </thead>

                @php
                    $i=1;
                @endphp

                @foreach ($data as $data)


                <tbody>
                    <tr>
                        <td>{{$i++}}</td>
                        <td>
                            <div class="gallery">
                                @foreach (json_decode($data->images) as $image)
                                    <img  src="{{ asset('uploads/images/rooms/gallery/' . $image) }}"
                                         width="80" alt="Gallery Image" class="img-thumbnail"
                                         style="margin-right: 5px;">
                                @endforeach
                            </div>

                        </td>
                        <td>
                            <form action="{{route('gallery.delete',['id'=>$data->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="item text-danger delete">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
        @endforeach
    </table>
</div>
</div>
</div>




@endsection
