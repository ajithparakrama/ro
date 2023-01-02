@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit {{ $user->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item  ">Edit </li>
                            <li class="breadcrumb-item active">Edit {{ $user->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User details</h3>
                    <div class="card-tools">
                        <a href="{{ url()->previous() }}" class="btn bg-gray btn-sm"> <i class="fa fa-arrow"></i>
                            Back</a>
                    </div>
                </div>

                {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PATCH']) !!}

                <div class="card-body">


                    <div class="form-group row">
                        <label class="col-sm-2">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control   @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $user->name }}" placeholder="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2" for="email">Email:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control   @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ $user->email }}" placeholder="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label class="col-sm-1" for="nic">Nic:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control   @error('nic') is-invalid @enderror" id="nic"
                                name="nic" value="{{ $user->nic }}" placeholder="Nic">
                            @error('nic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2" for="phone">phone:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control   @error('phone') is-invalid @enderror" id="phone"
                                name="phone" value="{{ $user->phone }}" placeholder="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control   @error('phone_two') is-invalid @enderror"
                                id="phone_two" name="phone_two" value="{{ $user->phone_two }}" placeholder="phone two">
                            @error('phone_two')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <input type="text" class="form-control   @error('phone_land') is-invalid @enderror"
                                id="phone_land" name="phone_land" value="{{ $user->phone_land }}" placeholder="Home Phone">
                            @error('phone_land')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2" for="date_of_birth">Date Of birth:</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control   @error('date_of_birth') is-invalid @enderror"
                                id="date_of_birth" name="date_of_birth" value="{{ $user->date_of_birth }}" placeholder=" ">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2" for="address">Address:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control   @error('address') is-invalid @enderror"
                                id="address" name="address" value="{{ $user->address }}" placeholder="address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2" for="roles">Role:</label>
                        <div class="col-sm-4">
                            <select name="roles[]" id="roles" class="form-control multipel select2" multiple>

                                @foreach ($roles as $item)
                                    <option value="{{ $item }}"
                                        @if (in_array($item, $user->roles->pluck('name')->toArray())) selected="selected" @endif>{{ $item }}
                                    </option>
                                @endforeach
                            </select>
                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                </div>


 
            <div class="card-footer">
                {{ Form::submit('Save', ['class' => 'btn btn-sm btn-success']) }}
            </div>
            {{ Form::close() }}
    </div>

    </section>
    </div>
@endsection

@section('third_party_stylesheets')
    <link rel="stylesheet" href="{{ asset('plugin/select2/select2.css') }}">
@stop

@section('third_party_scripts')
    <script src="{{ asset('plugin/jquery/jquery.js') }}"></script>
    <script src="{{ asset('plugin/select2/select2.js') }}"></script>
    <script>
        $(".select2").select2({
            theme: "classic"
        });
    </script>
@stop
