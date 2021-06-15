@extends('Layout.layout')
@section('content')

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
                          <th><button type="button" class="btn-info" style="text-color:#fff;"><a href="{{ asset('staff/kitchen') }}" style="text-decoration: none">Kitchen</button></th>
                          <th><button type="button" class="btn-warning"><a href="{{ route('auth.login') }}" style="text-decoration: none">Logout</button></th>
                          
     
                      </tr>
                  </table>
                  
              
          </div>
        </div>
      </div>

 
      <div class="col-lg-6">
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
                          <th>status</th>
                          <th>Payment</th>
                          <th>Action</th>

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
                          
                          <form action="{{ route('staff.receipt',['id'=>$order->id]) }}" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{ $order['id'] }}">
                          <input type="submit" value="Print Receipt">
                          </form>
                          
                          </td>

                          <td>
                            <form action="{{ route('staff.delete',['id'=>$order->id]) }}" method="post">
                              @csrf
                              <input type="submit" value="Cancel">
                            </form>
                          </td>

                      </tr>
                      @endforeach
                  </table>
                  
                  
              
          </div>
        </div>
      </div>

    
<script>
  function myFunction() {
    
        
}
</script>

@endsection