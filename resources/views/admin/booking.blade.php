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
    padding: 2.5rem;
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
                                <td>{{ $data->room->room_title }}</td>
                                <td>{{ $data->room->regular_price }}</td>
                                <td>{{ $data->room->discount_price }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <img width="50" src="{{ asset('uploads/images/rooms/' . $data->room->image) }}" alt="">

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


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
      </div>
      </div>
  </div>
@endsection


