@extends('dashboard.layouts.app')
@section('title', 'Dashboard')
@section('active_admins', 'active')
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
                            <h3 class="card-title">Update Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admins.update',$user->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"name="name" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"  value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" >
                                </div>
                                <div class="form-group">
                                    <label>Permissions for tickets</label>
                                    <div class="form-group clearfix">
                                        @php
                                            $permissions=['create','read','update','delete'];
                                        @endphp
                                        @foreach ($permissions as $key => $permission)
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" name="permissions[]" id="{{$key + 1}}" value="{{$permission}}" {{$user->hasPermission('tickets-'.$permission) ? 'checked' : ''}}>
                                                <span for="checkboxPrimary1">{{$permission}}</span>
                                            </div>
                                        @endforeach
                                    </div>

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
