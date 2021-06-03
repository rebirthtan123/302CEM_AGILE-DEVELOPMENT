@extends('Layout.layout')
 
@section('content')

<div id="overlay" onclick="off()">
    <div id="image"><img src="/images/MapView.PNG" alt=""></div>
  </div>
  
  <div style="padding:20px">
    <h2>Table Map View</h2>
    <button onclick="on()">Map View Button</button>
  </div>

<div class="card-body">
<table class="table table-bordered text-center">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Image</th>
        <th>Status</th>
        <th width="250px">Action</th>
    </tr>
    @foreach ($tables as $table)
    <tr>
        <td>{{ $table->id }}</td>
        <td>{{ $table->name }}</td>
        <td><img src="data:image/png;base64,{{ chunk_split(base64_encode($table->src)) }}" height="100" width="100" alt="table"></td>
        <td>{{ $table->status }}</td>
        <td>            
            <a class="btn btn-info" href="{{ route('staff.addOrder',$table->id) }}">Select</a>
        </td>
    </tr>
    @endforeach
</table>

</div>

<script>
    function on() {
      document.getElementById("overlay").style.display = "block";
    }
    
    function off() {
      document.getElementById("overlay").style.display = "none";
    }
    </script>
@endsection