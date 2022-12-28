@extends('layouts.app')

@section('content')
    <div class="container-fluid">  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Upload Points</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create item</li>
            </ol>
          </div>
        </div>
      </div> 
    </section>
    
    <section class="content"> 
      <div class="card col-md-6">
        <div class="card-header">
          <h3 class="card-title">Add Event details</h3> 
        </div> 
        <form action="{{ route('points.store') }}" method="post" enctype="multipart/form-data"> 
          @csrf
        <div class="card-body"> 
          <div class="form-group row">
            <label  class="col-sm-3" for="event">Event Name</label>
            <div class="col-sm-9">
            <input type="text" class="form-control   @error('event') is-invalid @enderror" id="event" name="event" value="{{ old('event') }}" placeholder="Event">
          @error('event')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3" for="event_date">Event Date</label>
            <div class="col-sm-9">
            <input type="date" class="form-control   @error('event_date') is-invalid @enderror" id="event_date" name="event_date" value="{{ old('event_date') }}" placeholder="Event date">
          @error('event_date')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3" for="file">File</label>
            <div class="col-sm-9">
            <input type="file" class="form-control   @error('file') is-invalid @enderror" id="file" name="file" >
          @error('file')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
            </div>
          </div>

        </div>
        <div class="card-footer">
           {{ Form::submit('Save',array('class'=>'btn btn-sm btn-success')) }}
        </div> 
      </form>
      </div> 

    </section> 
  </div> 
@endsection
