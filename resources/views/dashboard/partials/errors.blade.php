@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" style="margin-left: 250px">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
        <h5> <i class="icon fas fa-ban"></i> Errors!</h5>
    @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
    </div>
@endif

