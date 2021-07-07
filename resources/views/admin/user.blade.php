@extends('Layout.layout2')
@section('content')

<style>
article {
  background: linear-gradient(
    to right, 
    hsl(100 100% 62%), 
    hsl(204 100% 59%)
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
    <h2>User Management Page</h2>
  </article>


<button style="margin-left:20px; margin-top:20px;" class="btn btn-outline-light btn-lg"><a href="{{ route('admin.createUser') }}"> Create User </a></button>

<div class="card-body">
    <table class="table table-bordered text-center">
        <tr>
            <th>id</th>
            <th>Username</th>
            <th>Role</th>
            <th>Action</th>  
        </tr>

        @foreach($users as $user)
        <tr >
            <td>
                 {{ $user->id ?? '' }}
            </td>
            <td>
                 {{ $user->username ?? '' }}
            </td>
                      
            <td>
                {{ $user->role ?? '' }}
            </td>
            <td>
                <form action="{{ route('admin.deleteUser',['id'=>$user->id]) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('admin.editUser',$user->id) }}">Edit</a>
   
                    @csrf
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    </div>
    


@endsection