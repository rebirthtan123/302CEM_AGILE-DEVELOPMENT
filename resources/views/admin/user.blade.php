@extends('Layout.layout2')
@section('content')



<br><br>
 
<button style="margin-left:20px; margin-top:20px;"><a href="{{ route('admin.createUser') }}"> Create User </a></button>

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