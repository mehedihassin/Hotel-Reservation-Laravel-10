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
                        <th class="th_deg">Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Phone No</th>
                        <th class="th_deg">Message</th>
                        <th class="th_deg">Action</th>
                    </tr>
                </thead>

                @php
                    $i=1;
                @endphp

            <tbody>

            @foreach ($data as $data)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->message}}</td>
                {{-- <td>
                    <a href="{{route('room.edit',['id'=>$data->id])}}" class="btn btn-sm btn-info">Edit</a>
                </td> --}}
                <td>
                    <form action="{{route('contact.delete',['id'=>$data->id])}}" method="POST">
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
