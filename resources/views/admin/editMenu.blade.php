@extends('Layout.layout2')
@section('content')

<div style="margin-left:10px;margin-right:10px;">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Menu</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.menu') }}"> Back</a>
        </div>
    </div>
</div>

<form action="{{ route('admin.updateMenu',$menu->id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Food Name</strong>
                <input type="text" name="itemName" value="{{ $menu->itemName }}" class="form-control" placeholder="Food Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category</strong> <br>
                <input type="text" name="categoryName" value="{{ $menu->categoryName }}" class="form-control" placeholder="Category">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price</strong>
                <textarea class="form-control" name="price" placeholder="Price">{{ $menu->price }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
   
</form>
</div>

@endsection