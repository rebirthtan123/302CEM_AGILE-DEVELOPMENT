@extends('Layout.layout2')
@section('content')

<div style="margin-left:10px;margin-right:10px;">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="margin-top:20px; margin-left:20px;margin-bottom:50px;">Edit User</h2>
        </div>
        <div class="pull-right">
        </div>
    </div>
</div>

<form action="{{ route('admin.updateUser',$user->id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10" style="margin-left: 20px;margin-bottom:30px;">
            <div class="form-group">
               <h2> <strong>Username</strong> </h2>
                <input type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder="Username">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10" style="margin-left: 20px;margin-bottom:30px;">
            <div class="form-group">
                <h2><strong>Role</strong></h2> <br>
                <input type="text" name="role" value="{{ $user->role }}" class="form-control" placeholder="Role">
            </div>
        </div>
     
        <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button type="submit" class="btn btn-primary" style="margin-top: 50px;margin-left: 20px;">Update</button>
        </div>
    </div>
   
</form>
</div>

@endsection