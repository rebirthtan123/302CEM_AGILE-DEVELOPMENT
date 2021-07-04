@extends('Layout.layout2')
@section('content')


<h3 style="margin-left:20px; margin-top:20px;">View Order Page</h3>

<div class="card-body">
<table class="table table-bordered text-center">
    <tr>
        <th>id</th>
        <th>table</th>
        <th>Food (Quantity & Price)</th>
        <th>Time</th>
        <th>Order Status</th>
        <th>Payment Status</th>

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
                    {{ $order->paymentStatus ?? '' }}
                         
                </td>



     </tr>
     @endforeach
</table>
{{ $orders->appends(request()->query())->links() }}
</div>



@endsection


