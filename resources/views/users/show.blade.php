@extends('layouts.app')

@section('content')
    <div class="container-fluid">  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $user->name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $user->name }}</li>
            </ol>
          </div>
        </div>
      </div> 
    </section>
 
    <section class="content"> 
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Details</h3> 
          <div class="card-tools">
            <a href="{{ url()->previous() }}" class="btn bg-gray btn-sm"> <i class="fa fa-arrow"></i>
                Back</a>
        </div>
        </div>
        <div class="card-body">

          <dl class="row">
            <dt class="col-sm-4">Name</dt>
            <dd class="col-sm-8">{{ $user->name }}</dd>
            <dt class="col-sm-4">Email</dt>
            <dd class="col-sm-8">{{ $user->email }}</dd> 

            <dt class="col-sm-4">NIC</dt>
            <dd class="col-sm-8">{{ $user->nic }}</dd>
            <dt class="col-sm-4">User Name</dt>
            <dd class="col-sm-8">{{ $user->user_name }}</dd>
            <dt class="col-sm-4">Phone</dt>
            <dd class="col-sm-8">{{ $user->phone }} &nbsp; {{ $user->phone_two }} &nbsp; {{ $user->phone_land }}</dd>
            <dt class="col-sm-4">Date of Birth</dt>
            <dd class="col-sm-8">{{ $user->date_of_birth }}</dd>
            <dt class="col-sm-4">Address</dt>
            <dd class="col-sm-8">{{ $user->address }}</dd>
            <dt class="col-sm-4">District</dt>
            <dd class="col-sm-8">{{ $user->district }}</dd>


            <dt class="col-sm-4">Roles</dt>
            <dd class="col-sm-8">   @if(!empty($user->getRoleNames()))    
              @foreach($user->getRoleNames() as $v)
                  <label class="badge badge-success">{{ $v }}</label>
              @endforeach
          @endif</dd>
             
          </dl>
 

        </div>  
      </div> 

    </section> 
  </div> 
@endsection
