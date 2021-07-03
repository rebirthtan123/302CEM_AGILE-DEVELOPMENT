@extends('Layout.layout2')
@section('content')



<br><br>
 
<button style="margin-left:20px; margin-top:20px;"><a href="{{ route('admin.createMenu') }}"> Create Menu </a></button>

<div class="card-body">
    <table class="table table-bordered text-center">
        <tr>
            <th>id</th>
            <th>Category</th>
            <th>Food Name</th>
            <th>Price</th>  
            <th>Action</th>  
        </tr>

        @foreach($menus as $menu)
        <tr >
            <td>
                 {{ $menu->id ?? '' }}
            </td>
            <td>
                 {{ $menu->categoryName ?? '' }}
            </td>
                      
            <td>
                {{ $menu->itemName ?? '' }}
            </td>
            <td>
                {{ $menu->price ?? '' }}
            </td>
            <td>
                <form action="{{ route('admin.deleteMenu',['id'=>$menu->id]) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('admin.editMenu',$menu->id) }}">Edit</a>
   
                    @csrf
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    </div>
    


@endsection