@extends('admin.admin-common')

@section('content')

<style type="text/css">


    .table-responsive {
    max-width: 100%;
    overflow-x: auto;
    display: block;
    white-space: nowrap;
}

/* Table Styles */
.th_deg {
    background-color: rgb(33, 74, 97);
    padding: 1.5rem;
    color: white;
    text-align: center;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table td, .table th {
    /* padding: 2.5rem; */
    vertical-align: middle;
    text-align: center;
    overflow: hidden;
    max-width: 200px;
}

tr {
    border: 1px solid rgb(109, 107, 107);
}

.table-bordered {
    border: 2px solid black;
}

/* Ensure the table remains responsive */
@media screen and (max-width: 768px) {
    .table td, .table th {
        padding: 1rem;
        font-size: 0.9rem;
    }
}

    </style>


<div class="page-content">
      <div class="container-fluid">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered border-dark">
                    <thead>
                        <tr>
                            <th class="th_deg">ID</th>
                            <th class="th_deg">Room Id</th>
                            <th class="th_deg">Name</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Phone</th>
                            <th class="th_deg">Check in</th>
                            <th class="th_deg">Check out</th>
                            <th class="th_deg">Room Title</th>
                            <th class="th_deg">Regular Price</th>
                            <th class="th_deg">Discount Price</th>
                            <th class="th_deg">Status</th>
                            <th class="th_deg">Image</th>
                            <th class="th_deg">Delete</th>
                            <th class="th_deg">Confermation</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->room_id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->end_date }}</td>
                                <td>{{ $data->room ? $data->room->room_title : 'No Room Assigned' }}</td>
                                <td>{{ $data->room ? $data->room->regular_price : 'Not Available' }}</td>
                                <td>{{ $data->room ? $data->room->discount_price : 'Not Available' }}</td>

                                <td>
                                    @if ($data->status == 'Approve')
                                    <span style="color: skyblue">
                                        Approved
                                    </span>

                                    @endif
                                    @if ($data->status == 'Rejected')
                                    <span style="color: red">
                                       Rejected
                                    </span>

                                    @endif
                                    @if ($data->status == 'waiting')
                                    <span style="color:rgb(236, 236, 34)">
                                       Waiting
                                    </span>

                                    @endif

                                </td>
                                <td>
                                    @if($data->room && $data->room->image)
                                    <img width="50" src="{{ asset('uploads/images/rooms/' . $data->room->image) }}" alt="Room Image">
                                @else
                                    <span>No Image Available</span>
                                @endif
                                </td>

                                <td>
                                    <form action="{{route('admin.booking.delete',['id'=>$data->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="item text-danger delete">
                                           <button onclick="return confirm('Are You Sure Want To Delete This Data ?')" type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <span>
                                        <a class="btn btn-sm btn-info" href="{{route('admin.booking.confirm',['id'=>$data->id])}}">Approve</a>
                                    </span>
                                    <a class="btn btn-sm btn-danger" href="{{route('admin.booking.regected',['id'=>$data->id])}}">Rejected</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
      </div>
      </div>
  </div>
@endsection


