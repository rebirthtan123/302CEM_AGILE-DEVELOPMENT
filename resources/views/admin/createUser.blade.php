@extends('Layout.layout2')
@section('content')

<div style="margin-left:10px;margin-right:10px;">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="margin-top:20px; margin-left:20px;margin-bottom:50px;">Create User</h2>
        </div>
        
    </div>
</div>

<form action="{{ route('admin.storeUser') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10" style="margin-left: 20px;">
            <div class="form-group">
                <h2><strong>Username</strong></h2>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 " style="margin-left: 20px;">
            <div class="form-group">
                <h2><strong>Role</strong></h2> <br>
                <select name="role">  
                    <option value="Select">Select</option>
                    <option value="waiter">waiter</option>
                    <option value="chef">chef</option>    
                </select>  
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button type="submit" class="btn btn-primary" style="margin-top: 50px;margin-left: 20px;">Submit</button>
        </div>
    </div>
   
</form>
</div>

@endsection