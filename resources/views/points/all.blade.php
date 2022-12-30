@extends('layouts.app')

@section('content')
    <div class="container-fluid">  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Requests for Approve</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Points</li>
            </ol>
          </div>
        </div>
      </div> 
    </section>
 
    <section class="content"> 
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All</h3> 
        </div>
        <div class="card-body"> 
          <table class="table table-responsive table-bordered w-100">
            <thead>
              <tr>
                <th>No</th>
                <th>Member</th>
                <th>Event</th>
                <th>Date</th>
                <th>Status</th>
                <th>Points</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody> 
              @foreach($points as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->event }}</td>
                <td>{{ $item->event_date }}</td>
                <td>
                  @switch($item->status)
                      @case(10)
                          <span class="badge badge-warning">Pending</span>
                          @break
                      @case(5)
                      <span class="badge badge-danger">Cancel</span>
                          @break
                          @case(1)
                          <span class="badge badge-success">Approved</span>
                              @break
                      @default
                          
                  @endswitch 
                </td>
                <td>{{ $item->point }}</td>
                <td> <a href="{{ route('points.show',$item->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>  
        <div class="card-footer">
          {{ $points->links("pagination::bootstrap-4") }}
        </div>
      </div> 

    </section> 
  </div> 
@endsection

@section('third_party_stylesheets') 
 
@stop

@section('third_party_scripts') 
 
@stop


