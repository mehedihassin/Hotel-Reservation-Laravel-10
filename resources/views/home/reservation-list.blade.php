@extends('layouts.common')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


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
    vertical-align: middle;
    text-align: center;
    max-width: 300px;
    min-width: 150px;
    word-wrap: break-word;
    overflow: hidden;
    white-space: normal;
    padding: 0.75rem;
    text-overflow: ellipsis;
}

tr {
    border: 1px solid rgb(109, 107, 107);
}

.table-bordered {
    border: 2px solid black;
}

@media screen and (max-width: 768px) {
    .table td, .table th {
        padding: 1rem;
        font-size: 0.9rem;
        white-space: normal;
    }
}

    </style>


<div class="page-content">
    <div class="text-center py-5" style="background-color: #f8f9fa; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 class="display-4 fw-bold" style="color: #ff5e57;">Your Booking</h1>
        <p class="lead text-muted">Manage your bookings with ease</p>
    </div>
    
      <div class="container-fluid">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered border-dark">
                    <thead>
                        <tr>
                            <th class="th_deg">ID</th>
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
                            <th class="th_deg">Cancel</th>
                            <th class="th_deg">Make Payment</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
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
                                    @if ($data->status == 'Approve')
                                        <button class="btn btn-secondary" disabled>Approved</button>
                                    @elseif ($data->status == 'Rejected' || $data->status == 'waiting')
                                    <form action="{{ route('booking.confirmation.delete', ['id' => $data->id]) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ URL('stripe') }}">Payment</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
      </div>
      </div>
  </div>

  <script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this booking?");
    }
</script>

@endsection


