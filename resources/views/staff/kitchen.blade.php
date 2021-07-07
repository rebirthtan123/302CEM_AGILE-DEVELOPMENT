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
  
  a{
    color:rgb(66, 133, 192);
  }
  a:hover {
    color: white;
  }
  

  </style>

<br><br>
<button type="button" class="btn btn-outline-info" style="margin-left:30px;margin-bottom:30px;"><a href="{{ route('auth.login') }}" >Logout </a></button>

<div class="row">
  <div class="column">
<div class="col-lg-13">
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
                    @if ($order['status']=='placed')
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
                        <form action="{{ route('staff.update',['id'=>$order['id']]) }}" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{ $order['id'] }}">
                          <input type="hidden" name="status" value="Ready" readonly>
                          <button type="submit" >Complete order</button>
                        </form>
                      </th>

                  </tr>
                  @endif
                  @endforeach
              </table>
              
          
      </div>
      </div>
    </div>
  </div>
      {{-- complete order list --}}

      <div class="column">
        <div class="col-lg-13">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
               Complete Order</div>
              <div class="card-body">
                
                      <table id="tblOrderList" class="table table-bordered text-center" width="100%" cellspacing="0">
                          <tr>
                              <th> id </th>
                              <th> Table No. </th>
                              <th> Food (Quantity) </th>
                              <th> Time </th>
                              <th> Status </th>
                              
        
                          </tr>
                            @foreach($orders as $order)
                            @if ($order['status']=='Ready')
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