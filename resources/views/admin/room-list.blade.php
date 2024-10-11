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
                        <th class="th_deg">Room title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Regular Price</th>
                        <th class="th_deg">Discount Price</th>
                        <th class="th_deg">Room Status</th>
                        <th class="th_deg">Room Type</th>
                        <th class="th_deg">wifi</th>
                        <th class="th_deg">Food</th>
                        <th class="th_deg">image</th>
                        <th class="th_deg">Edit</th>
                        <th class="th_deg">Delete</th>
                    </tr>
                </thead>

                @php
                    $i=1;
                @endphp

            <tbody>

            @foreach ($data as $data)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$data->room_title}}</td>
                <td>{{!! Str::limit($data->description, 150) !!}}</td>
                <td>{{$data->regular_price}}</td>
                <td>{{$data->discount_price}}</td>
                <td>{{$data->room_status}}</td>
                <td>{{$data->room_type}}</td>
                <td>{{$data->wifi}}</td>
                <td>{{$data->food}}</td>
                <td>
                    <img width="60" src="{{asset('uploads/images/rooms')}}/{{$data->image}}" alt="{{$data->name}}" class="image">

                </td>
                <td>
                    <a href="{{route('room.edit',['id'=>$data->id])}}" class="btn btn-sm btn-info">Edit</a>
                </td>
                <td>
                    <form action="{{route('room.delete',['id'=>$data->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="item text-danger delete">
                           <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </div>
                    </form>

                </td>

            </tr>
            @endforeach
        </tbody>
            </table>
      </div>
      </div>
  </div>
@endsection


