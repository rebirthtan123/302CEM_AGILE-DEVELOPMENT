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

<br><br>

    <div class="col-lg-6">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-bar"></i>
           Button</div>
          <div class="card-body">
              
                  <table id="tblOrderList" class="table table-bordered text-center" width="50%" cellspacing="0">
                      <tr>
                          <th> <button type="button" class="btn-default"><a href="{{ asset('staff/table') }}" style="text-decoration: none">Add Order</button></th>
                          <th><button type="button" class="btn-default" style="text-color:#fff;"><a href="{{ asset('staff/kitchen') }}" style="text-decoration: none">Kitchen</button></th>
                          <th><button type="button" class="btn-warning"><a href="{{ route('auth.login') }}" style="text-decoration: none">Logout</button></th>
                          
     
                      </tr>
                  </table>
                  
              
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
 
      <div class="col-lg-13">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-bar"></i>
           Current Order List</div>
          <div class="card-body">
              
                  <table id="tblOrderList" class="table table-bordered text-center" width="100%" cellspacing="0">
                      <tr>
                          <th>id</th>
                          <th>table</th>
                          <th>Food (Quantity & Price)</th>
                          <th>Time</th>
                          <th>Order Status</th>
                          <th>Payment Status</th>
                          <th>Action</th>

                      </tr>
                      
                        @foreach($orders as $order)
                        @if ($order['status']=='Ready' || $order['status']=='placed')
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
                                  <li>{{ $item->itemName }} ({{ $item->pivot->quantity }} x ${{ $item->price }})</li>
                              @endforeach
                              </ul>
                          </td>
                          <td>
                            {{ $order->created_at ?? '' }}
                          </td>
                          <td>
                            {{ $order->status ?? '' }}
                          </td>
                          
                          <td>
                          {{ $order->paymentStatus ?? '' }}
                         
                          </td>

                          <td>
                            @if ($order['status']=='Ready')
                            <form action="{{ route('order.update',['id'=>$order['id']]) }}" method="POST">
                              @csrf
                              <input type="hidden" name="id" value="{{ $order['id'] }}">
                              <input type="hidden" name="status" value="Served" readonly>
                              <button type="submit" >Served</button>
                            </form>
                            @endif 
                            <br>
                            <form action="{{ route('staff.delete',['id'=>$order->id,'table_id'=>$order->table_id]) }}" method="post">
                              @csrf
                              <input type="submit" value="Cancel">
                            </form>
                          </td>

                      </tr>
                      @endif
                      @endforeach
                  </table>
                
          </div>
        </div>
      </div>
    </div>


    <div class="column">
 
      <div class="col-lg-13">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-bar"></i>
           Served Order List</div>
          <div class="card-body">
              
                  <table id="tblOrderList" class="table table-bordered text-center" width="100%" cellspacing="0">
                      <tr>
                          <th>id</th>
                          <th>table</th>
                          <th>Food (Quantity & Price)</th>
                          <th>Time</th>
                          <th>Order Status</th>
                          <th>Payment Status</th>
                          <th>Action</th>

                      </tr>
                        @foreach($orders as $order)
                        @if ($order['status']=='Served' && $order['paymentStatus']=='Not Paid')
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
                                  <li>{{ $item->itemName }} ({{ $item->pivot->quantity }} x ${{ $item->price }})</li>
                              @endforeach
                              </ul>
                          </td>
                          <td>
                            {{ $order->created_at ?? '' }}
                          </td>
                          <td>
                            {{ $order->status ?? '' }}
                          </td>
                          
                          <td>
                          {{ $order->paymentStatus ?? '' }}
                          
                          
                          </td>

                          <td>
                            <form action="{{ route('staff.receipt',['id'=>$order->id,'table_id'=>$order->table_id]) }}" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{ $order['id'] }}">
                              <input type="submit" value="Pay">
                              </form>
                            <br>
                            
                          </td>

                      </tr>
                      @endif
                      @endforeach
                  </table>
                
          </div>
        </div>
      </div>
    </div>
  </div>

    


@endsection