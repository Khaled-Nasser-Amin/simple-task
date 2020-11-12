@extends('dashboard.layouts.app')
@section('title', 'Dashboard')
@section('active_dashboard', 'active')
@section('content')
    <div class="row justify-content-center" style="margin-left: 250px">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tickets</div>
                    <section>
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Owner Tickets</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Other Tickets</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-bordered text-center">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Ticket Name</th>
                                                        <th >Expire date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach(auth()->user()->ticket as $key => $ticket)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$ticket->name}}</td>
                                                            <td>{{$ticket->ex_date}}</td>
                                                            <td>
                                                                <a href="{{route('tickets.edit',$ticket->id)}}" class="btn btn-info btn-sm">edit</a>
                                                                <form action="{{route('tickets.destroy',[$ticket->id])}}" method="post" style="display: inline-block">
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
                            </div>
                            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-bordered text-center">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Ticket Name</th>
                                                        <th >Expire Date</th>
                                                        <th>action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($tickets as $key => $ticket)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$ticket->name}}</td>
                                                            <td>{{$ticket->ex_date}}</td>
                                                            <td>
                                                                <a href="{{route('tickets.edit',$ticket->id)}}" class="btn btn-info btn-sm {{auth()->user()->hasRole('super_admin') ?  '':'disabled'}}">edit</a>
                                                                <form action="{{route('tickets.destroy',[$ticket->id])}}" method="post" style="display: inline-block">
                                                                    @csrf
                                                                    {{method_field('delete')}}
                                                                    <button class="btn btn-danger btn-sm delete " {{auth()->user()->hasRole('super_admin') ? '':'disabled'}} ><i class="fa fa-trash"></i></button>
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
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </div>

@stop


