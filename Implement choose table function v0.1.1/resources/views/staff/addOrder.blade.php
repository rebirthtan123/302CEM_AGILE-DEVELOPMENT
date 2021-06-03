@extends('Layout.layout')
 
@section('content')
<br><br>
<div class="row" >
    <div class="col-lg-6">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-utensils"></i>
          Take Order</div>
        <div class="card-body">
          <table class="table table-bordered text-center" width="100%" cellspacing="0">
            <tr>
              <th>No</th>
              <th>Category Name</th>
              <th>Item Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th width="250px">Action</th>
          </tr>
            @foreach ($menus as $menu)
            <form action="#" method="post">
            <tr>
             <td> {{ $menu->id }}</td>
              <td>{{ $menu->categoryName }}</td>
                <td>{{ $menu->itemName }}</td>
                <td>{{ $menu->price }}</td>
                <td>
                      <input type="text">
                  </form>
                </td>
                <td>
                    <button>Add</button>
                </td>
            </tr>
          </form>
            @endforeach
          </table>
          <table id="tblItem" class="table table-bordered text-center" width="100%" cellspacing="0"></table>

        <div id="qtypanel" hidden="">
                    Quantity : <input id="qty" required="required" type="number" min="1" max="50" name="qty" value="1" />
                    <button class="btn btn-info" onclick = "insertItem()">Done</button>
                    <br><br>
        </div>

        </div>
      </div>
    </div>
</div>

@endsection