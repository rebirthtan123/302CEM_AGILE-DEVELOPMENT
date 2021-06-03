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
                          <th> <button type="button" class="btn btn-secondary"><a href="{{ asset('staff/table') }}" style="text-decoration: none">Add Order</button></th>
                          <th><button type="button" class="btn btn-secondary"><a href="#" style="text-decoration: none">Kitchen</button></th>
                          <th><button type="button" class="btn btn-secondary"><a href="{{ route('auth.login') }}" style="text-decoration: none">Logout</button></th>
     
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
                          <th>Food</th>
                          <th>Qty</th>
                          <th>Time</th>
                          <th>status</th>
                      </tr>
                      <tr>

                      </tr>
                  </table>
                  
              
          </div>
        </div>
      </div>

    


@endsection