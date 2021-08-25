
@isset($users)

<?php
$number = 1;

?>
<h2>Users</h2>


<a href="{{ route('createUserView') }}"> <i class="fas fa-plus"><b>NEW</b></i></a>


<form action="" method="get">
    <input type="text" name="per_page" placeholder="Users per page" value=" {{ isset($_GET['per_page']) ? $_GET['per_page'] : 10 }}">
    <input type="submit" name="submitPerPage" value="Go!" class="btn-primary">

</form>

<table class="table text-nowrap" >
    <tr>
        <th>#</th>
        <th>CreatedAt</th>
        <th>UpdatedAt</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

   @foreach ($users as $user)
    <tr>
        <td> {{ $number++ }} </td>
        <td> {{ date("F jS Y H:i", strtotime($user->created_at)) }}</td>
        <td>
              @if ($user->updated_at != null)

                {{ date("F jS Y H:i", strtotime($user->updated_at))}}

            @else   {{ "Not updated" }}

            @endif

        </td>
        <td><a href="{{ route('editUser',['userID' => $user->id ]) }}"> {{ $user->first_name . " " . $user->last_name }}  </a> </td>
        <td> {{ $user->email }}</td>
        <td> {{ $user['roles']->role_name }}</td>
        <td>

            <a href="{{ route('editUser', ['userID' => $user->id ]) }}"><i class="fas fa-edit"></i>  </a></td>

        <td>

            @can('delete', $user)
            <form action="{{ route('deleteUser', ['userID' => $user->id]) }}" method="POST">
                @CSRF
                @method('DELETE')

                <button class="btn btn-danger"><i class="fas fa-trash-alt"> </i> </button>

            </form>
            @endcan
        </td>


    </tr>
    @endforeach

</table>

<a href="">{{ $users->links() }}</a>



@else  {{ "NO USERS" }}

@endisset

