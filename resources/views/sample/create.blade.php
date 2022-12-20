@extends('layouts.app')

@section('content')
    <div class="container-fluid">  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create item</h1>
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3> 
        </div>

 
        
        {{  Form::open(array('route' => 'locations.store')) }}
        <div class="card-body"> 
          <div class="form-group row">
            <label  class="col-sm-2" for="name">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control   @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="name">
          @error('name')
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
        {{ Form::close() }}
      </div> 

    </section> 
  </div> 
@endsection
