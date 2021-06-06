@extends('Layout.layout')
 
@section('content')

<br><br>
<div class="col-lg-6">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-bar"></i>
       Order List</div>
      <div class="card-body">
        
              <table id="tblOrderList" class="table table-bordered text-center" width="100%" cellspacing="0">
                  <tr>
                      <th> id </th>
                      <th> Table No. </th>
                      <th> Food (Quantity) </th>
                      <th> Time </th>
                      <th> Status </th>
                      <th> Action </th>

                  </tr>
                    @foreach($orders as $order)
                  <tr data-entry-id="{{ $order->id }}">
                      <td>
                          {{ $order->id ?? '' }}
                      </td>
                      <td>
                          {{ $order->table_id ?? '' }}
                      </td>
                      
                      <td>
                          <ul>
                          @foreach($order->menus as $item)
                              <li>{{ $item->itemName }} ({{ $item->pivot->quantity }})</li>
                          @endforeach
                          </ul>
                      </td>
                      <td>
                        {{ $order->created_at ?? '' }}
                      </td>
                      <td>
                          <strong>
                            {{ $order->status ?? '' }}
                          </strong>
                      </td>
                      
                      <th>
                        <button><a href="#"> Complete order </button>
                      </th>

                  </tr>
                  @endforeach
              </table>
              
          
      </div>
    </div>
  </div>

@endsection