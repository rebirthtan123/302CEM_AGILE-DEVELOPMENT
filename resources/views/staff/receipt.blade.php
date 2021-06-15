@extends('Layout.layout')
 
@section('content')

<br><br>
<div class="row">
<div class="col-lg-6">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-bar"></i>
       Receipt</div>
      <div class="card-body">

                

              <table id="tblOrderList" class="table text-center" width="100%" cellspacing="0" >
                 
                  <tr>
                      <th> id </th>
                      <th> Company Name </th>
                      <th> Company Address </th>
                      <th> Date & Time </th>
                      <th> Table No. </th>
                  </tr>

                   
                  <tr>
                      <td>
                          {{ $order->id ?? '' }}
                      </td>
                      <td>
                          Jason Food
                      </td>
                      <td>
                          123, Taman Indah,
                          Jalan Mat Rempit,
                          Sungai Saman,
                          12345 Bukit Trek,
                          Penang.
                      </td>
                      <td>
                          {{ $order->created_at ?? '' }}
                      </td>
                      <td>
                          {{ $order->table_id ?? '' }}
                      </td>
                  </tr>  


                <tr>
                      <th> Qty </th>
                      <th> </th>
                      <th> Description  </th>
                      <th> Unit Price </th>
                      <th> Amount </th>
                </tr>


                  <tr >
                      <td>
                        <ul>
                          @foreach($order->menus as $item)
                                {{ $item->pivot->quantity }} 
                          @endforeach
                          </ul>
                      </td>
                      <td>
                      </td>
                      <td>
                          <ul>
                          @foreach($order->menus as $item)
                               {{ $item->itemName }} <br>
                          @endforeach
                          </ul>
                      </td>
                      <td>
                          <ul>
                          @foreach($order->menus as $item)
                               {{ $item->price }} <br>
                          @endforeach
                          </ul>
                      </td>
                      <td>
                          <ul>
                          @foreach($order->menus as $item)
                            {{number_format(round(($item->pivot->quantity * $item->price )), 2)}}
                          @endforeach
                          </ul>
                      </td>
                  </tr>
                  <tr>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>
                        <div style='font-weight: bold;'>Total Amount (RM)</div>
                    </td>
                    <td>
                        <ul>
                          
                          <div class="details" style="display:none">
                            @php($total=0)
                            @php($add=0)

                            @foreach($order->menus as $item)
                                {{$add=$item->pivot->quantity * $item->price}}
                                {{$total+=$add}}
                            @endforeach
                          </div>
                          </form>

                              {{number_format(round(($total)), 2)}}
                              
                        </ul>
                    </td> 
                  </tr>  
                  <tr>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>
                        <form>
                            <input type="button" value="Print Receipt"  onclick=window.print()>
                            </form>
                    </td>
                    <td>
                        <form action="{{ route('order.makePayment',['id'=>$order->id,'table_id'=>$table->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $order['id'] }}">
                            <input type="hidden" name="status" value="Paid" readonly>

                            <input type="hidden" name="table_id" value="{{ $table['id']}}">
                            <input type="hidden" name="statusTable" value="Available" readonly>

                            <button type="submit" >Pay</button><br><br><br>
                        </form>
                    </td>
                  </tr>
                  
                  
              </table>
              
             
              
      </div>
    </div>
  </div>
</div>

@endsection

