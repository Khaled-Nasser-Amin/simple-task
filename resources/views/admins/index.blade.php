@extends('dashboard.layouts.app')
@section('title', 'Dashboard')
@section('active_admins', 'active')
@section('content')
    <!-- Content navbar search and add  (Page header) -->
        <section class="content-header " style="margin-left:250px ">
            <div class="container-fluid">
                <div class="row ml-250">
                    <div class="card-tools col-4">
                        <div class="input-group input-group-sm">
                            <form method="get" action="{{route('admins.index')}}" id="search_form">
                                <input type="text" name="search" class="form-control float-right search_text" placeholder="Search" value="{{request()->query('search')}}">
                            </form>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default search_btn"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div> {{--end of search--}}
                    <div>
                        <a href="{{route('admins.create')}}" class="btn btn-secondary "><i class="fa fa-plus"></i> Add New Admin</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Content table of admins -->
        <section class="content" style="margin-left:250px ">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Admins</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{route('admins.edit',$user->id)}}" class="btn btn-info btn-sm">edit</a>
                                        <form action="{{route('admins.destroy',[$user->id])}}" method="post" style="display: inline-block">
                                            @csrf
                                            {{method_field('delete')}}
                                            <button class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </section>

@stop
