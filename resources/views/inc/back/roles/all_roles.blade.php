

@isset($roles)
<?php
$number = 1;
?>
<h2>Roles</h2>


<a href="{{ route('createRoleView') }}"> <i class="fas fa-plus"><b>NEW</b></i></a>


<table class="table text-nowrap">
    <tr>
        <th>#</th>
        <th>CreatedAt</th>
        <th>UpdatedAt</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

    @foreach ($roles as $role)
    <tr>
        <td> {{ $number++ }} </td>
        <td> {{ date("F jS Y H:i", strtotime($role->created_at)) }}</td>
        <td>
           @if ($role->updated_at != null)

                {{ date("F jS Y H:i", strtotime($role->updated_at)) }}

            @else  {{ "Not updated"}}

            @endif
        </td>
        <td> {{ $role->role_name }}</td>
        <td>  <a href="{{ route('editRole', ['id' => $role->id]) }}"><i class="fas fa-edit"></i>  </a></td>


        <td>
            @can('delete', $role)
            <form action="{{ route('deleteRole', ['id' => $role->id]) }}" method="POST">
                @CSRF
                @method('DELETE')

            <button class="btn btn-danger"><i class="fas fa-trash-alt"> </i> </button>

            </form>

            @endcan
        </td>


    </tr>
    @endforeach

</table>


@else  {{ "NO ROLES" }}

@endisset

