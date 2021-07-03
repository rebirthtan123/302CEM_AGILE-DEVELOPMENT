@extends('Layout.layout2')
@section('content')

<div style="margin-left:10px;margin-right:10px;">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create Menu</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.menu') }}"> Back</a>
        </div>
    </div>
</div>

<form action="{{ route('admin.storeMenu') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Food Name</strong>
                <input type="text" name="itemName" class="form-control" placeholder="Food Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category</strong> <br>
                <select name="categoryName">  
                    <option value="Select">Select</option>}  
                    <option value="Meal">Meal</option>
                    <option value="Drink">Drink</option>    
                    <option value="Dessert">Dessert</option>  
                </select>  
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price</strong>
                <textarea class="form-control" name="price" placeholder="Price"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
</div>

@endsection