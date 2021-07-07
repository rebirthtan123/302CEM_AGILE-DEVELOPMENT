@extends('Layout.layout2')
@section('content')

<style>
    article {
      background: linear-gradient(
        to right, 
        hsl(203, 100%, 70%),
        hsl(219, 100%, 50%)
      );
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-align: center;
      margin-bottom: 50px;
    }
    
    h2 {
      font-size: 5vmin;
      line-height: 1.1;
    }
    
    </style>

<br><br>
<article>
    <h2>Admin Main Page</h2>
  </article>

<div class="row" style="margin-left: 100px;">
    <div class="column">

  <div class="col-lg-13">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-bar"></i>
       Current Order List </div>
      <div class="card-body">
          
              <table id="tblOrderList" class="table table-bordered text-center" width="100%" cellspacing="0">
                  <tr>
                      <th>id</th>
                      <th>table</th>
                      <th>Food (Quantity & Price)</th>
                      <th>Time</th>
                      <th>Order Status</th>
                      <th>Payment Status</th>

                  </tr>
                  
                    @foreach($orders as $order)
                    @if ($order['status']=='Ready' || $order['status']=='placed' || ($order['status']=='Served' && $order['paymentStatus']=='Not Paid') )
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

                     

                  </tr>
                  @endif
                  @endforeach
              </table>
            
      </div>
    </div>
  </div>
</div>
<h2 style="opacity: 0;">test</h2>
<div class="column">
    <div class="col-lg-13">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-bar"></i>
           Current Kitchen List</div>
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