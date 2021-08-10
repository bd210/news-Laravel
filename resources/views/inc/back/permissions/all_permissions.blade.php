
@isset($permissions)


<?php
$number = 1;
?>

<h2>Permissions</h2>

<a href="{{ route('createPermissionView') }}"> <i class="fas fa-plus"><b>NEW</b></i></a>

<table class="table text-nowrap">
    <tr>
        <th>#</th>
        <th>CreatedAt</th>
        <th>UpdatedAt</th>
        <th>Name</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

    @foreach ($permissions as $permission)
    <tr>
        <td> {{ $number++ }} </td>
        <td> {{ date("F jS Y H:i", strtotime($permission->created_at)) }}</td>
        <td>
            @if ($permission->updated_at != null)

            {{ date("F jS Y H:i", strtotime($permission->updated_at)) }}

             @else {{ "Not updated" }}

            @endif
        </td>
        <td> {{ $permission->name }}</td>
        <td> {{ $permission->description }}</td>
        <td>


            <a href="{{ route('editPermission', ['id' => $permission->id]) }}"><i class="fas fa-edit"></i>  </a>


        </td>


        <td>
            @can('delete', $permission)
            <form action="{{ route('deletePermission', ['id' => $permission->id]) }}" method="POST">
                @CSRF
                @method('DELETE')

                <button class="btn btn-danger"><i class="fas fa-trash-alt"> </i> </button>

            </form>
            @endcan
        </td>

    </tr>
    @endforeach

</table>



@else {{ "NO PERMISSIONS" }}

@endif
