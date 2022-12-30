@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $point->event }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ $point->event }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="card col-6">
                    <div class="card-header">
                        <h3 class="card-title">Details</h3>
                        <div class="card-tools">
                            <a href="{{ url()->previous() }}" class="btn bg-gray btn-sm"> <i class="fa fa-arrow"></i>
                                Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Event</th>
                                <td>{{ $point->event }}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>{{ $point->event_date }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @switch($point->status)
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
                            </tr>
                            <tr>
                                <th>Point</th>
                                <td>{{ $point->point }}</td>
                            </tr>

                        </table>
                    </div>

                    @can('point-update')
                        <div class="card-body">
                            <h4 class="text-success"> Approve And Give Points</h4>
                            <hr>

                            <div class="form-group row">
                                <label for="Points" class="col-md-2">Points</label>

                                <form action="{{ route('points.update', $point->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="input-group col-md-8">

                                        <input type="text" class="form-control" name="point">
                                        <input type="hidden" name="status" value="1">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-flat">Approve!</button>
                                        </span>

                                    </div>
                                </form>

                                 <form action="{{ route('points.update', $point->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="col-md-2">
                                <input type="hidden" name="point" value="0">
                                <input type="hidden" name="status" value="5">
                                <button type="submit" class="btn btn-warning btn-flat">Reject!</button>
                              </div>
                            </form>
                            </div>


                           


                        </div>
                    @endcan

                </div>

                <div class="card col-6">
                    <div class="card-header">
                        <h3 class="card-title">Image</h3>

                    </div>
                    <div class="card-body">
                        @if ($point->file)
                            <a href="">
                                <img src="{{ asset($point->file) }}" alt="" width="100%">
                            </a>
                        @else
                            <span>No Image Uploaded</span>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
