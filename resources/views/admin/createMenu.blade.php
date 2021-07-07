@extends('Layout.layout2')
@section('content')

<div style="margin-left:10px;margin-right:10px;">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="margin-top:20px; margin-left:20px;margin-bottom:50px;">Create Menu</h2>
        </div>
        
    </div>
</div>

<form action="{{ route('admin.storeMenu') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10" style="margin-left: 20px;margin-bottom:30px;">
            <div class="form-group">
                <h2><strong>Food Name</strong></h2>
                <input type="text" name="itemName" class="form-control" placeholder="Food Name" required>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group" style="margin-left: 20px; margin-bottom:30px;">
                <h2><strong>Category</strong></h2> <br>
                <select name="categoryName">  
                    <option value="Select">Select</option>  
                    <option value="Meal">Meal</option>
                    <option value="Drink">Drink</option>    
                    <option value="Dessert">Dessert</option>  
                </select>  
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10" style="margin-left: 20px;margin-bottom:30px;">
            <div class="form-group">
                <h2><strong>Price</strong></h2>
                <input type="text" name="price" class="form-control" placeholder="Price" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 ">
                <button type="submit" class="btn btn-primary" style="margin-top: 50px;margin-left: 20px;" >Submit</button>
        </div>
    </div>
   
</form>
</div>

@endsection