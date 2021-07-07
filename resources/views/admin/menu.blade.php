@extends('Layout.layout2')
@section('content')

<style>
    article {
      background: linear-gradient(
        to right, 
        hsl(100 100% 85%), 
        hsl(204 100% 39%)
      );
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-align: center;
    }
    
    h2 {
      font-size: 5vmin;
      line-height: 1.1;
    }
    
    </style>

<br><br>

<article>
    <h2>Menu Management Page</h2>
  </article>
 
<button style="margin-left:20px; margin-top:20px;" class="btn btn-outline-light btn-lg"><a href="{{ route('admin.createMenu') }}"> Create Menu </a></button>

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