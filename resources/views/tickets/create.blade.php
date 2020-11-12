@extends('dashboard.layouts.app')
@section('title', 'Dashboard')
@section('active_tickets', 'active')
@section('content')
    @include('dashboard.partials.errors')
    <section class="content" >
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6" style="display: block;margin:40px auto;">
                    <!-- general form elements -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Add Ticket</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('tickets.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ticket Name</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name_en')}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Expire Date</label>
                                    <input type="date" class="form-control"  name="ex_date" value="{{old('ex_date')}}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
