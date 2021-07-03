
@extends('Layout.layout')
 
@section('content')

<style>
  * {
    box-sizing: border-box;
  }
  
  .row {
    margin-left:5px;
    margin-right:5px;
  }
    
  .column {
    float: left;
    width: 50%;
    padding: 5px;
  }
  
  /* Clearfix (clear floats) */
  .row::after {
    content: "";
    clear: both;
    display: table;
  }
  
  table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
  }
  

  </style>

<div class="row">
  <div class="column">
    <div class="col-lg-13">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-utensils"></i>
          Menu</div>
          <div class="card-body">
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
            <tr>
              <th>No</th>
              <th>Category Name</th>
              <th>Item Name</th>
              <th>Price</th>
             
           </tr>
           @foreach ($menus as $menu)

           <tr>
            <td> {{ $menu->id }}</td>
             <td>{{ $menu->categoryName }}</td>
               <td>{{ $menu->itemName }}</td>
               <td>{{ $menu->price }}</td>
              
           </tr>

           @endforeach

    </table>
          </div>
      </div>
    </div>
  </div>

  <form action="{{ route('staff.addOrder.store',['id'=>$table->id]) }}" method="POST">
    @csrf

    {{-- ... customer name and email fields --}}

    <div class="card">
        <div class="card-header">
            Ordering
        </div>

        <div class="card-body">
            <table class="table" id="menus_table">
                <thead>
                  <tr>
                    <div class="form-group {{ $errors->has('table_id') ? 'has-error' : '' }}">
                      <label for="table_id">Table Id</label>
                      <input type="text" id="table_id" name="table_id" class="form-control" value="{{ $table->id }}{{ old('table_id', isset($order) ? $order->table_id : '') }}" readonly>
                      @if($errors->has('table_id'))
                          <em class="invalid-feedback">
                              {{ $errors->first('table_id') }}
                          </em>
                      @endif
                  </div>
                  </tr>
                    <tr>
                        <th>Food</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="menu0">
                        <td>
                            <select name="menus[]" class="form-control">
                                <option value="">-- choose menu --</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">
                                        {{ $menu->itemName }} (${{ number_format($menu->price, 2) }})
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="quantities[]" class="form-control" value="1" />
                        </td>
                    </tr>
                    <tr id="menu1"></tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                    <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                </div>
            </div>
        </div>
    </div>
           <br>
    <div>
      <input type="hidden" name="table_id" value="{{ $table['id'] }}">
      <input type="hidden" name="statusTable" value="Occupied" readonly>
        <input class="btn btn-primary" type="submit" value="save">
    </div>
</form>
</div>

<script>
  $(document).ready(function(){
    let row_number = {{ count(old('menus', [''])) }};
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#menu' + row_number).html($('#menu' + new_row_number).html()).find('td:first-child');
      $('#menus_table').append('<tr id="menu' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#menu" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>

@endsection
