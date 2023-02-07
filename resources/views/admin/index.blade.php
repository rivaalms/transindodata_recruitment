@extends('admin.layouts.main')
@section('container')
<div class="container mt-5">
   <h1>Ticket List</h1>
   <div class="table-responsive">
      <table class="table table-hover">
         <thead>
            <tr>
               <th>#</th>
               <th>Booking ID</th>
               <th>Name</th>
               <th>Ticket Type</th>
               <th>Check In Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody class="table-group-divider">
            @foreach($tickets as $t)
            <tr>
               <td>{{ $t->id }}</td>
               <td>{{ $t->booking_id }}</td>
               <td>{{ $t->user->name }}</td>
               <td>{{ $t->ticket_name->name }}</td>
               <td>{{ $t->checkin->name }}</td>
               <td>
                  <a href="/admin/ticket/{{ $t->id }}/edit">Edit</a> |
                  <form action="/admin/ticket/{{ $t->id }}/delete" method="post" class="d-inline">
                     @csrf
                     <button type="submit" class="btn btn-link p-0 m-0" onclick="return confirm('Are you sure you want to delete this ticket?')">Delete</button>
                  </form>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
   <div class="float-end">
      {{ $tickets->links() }}
   </div>
</div>
@endsection