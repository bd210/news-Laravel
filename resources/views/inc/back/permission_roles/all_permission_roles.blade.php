


@if ( isset($roles) && isset($permissions))

<?php
$number = 1;

$permission_id = array();
?>
<h2>Permission Roles</h2>
<form action="{{ route('updatePermissionRole') }}" method="post" >
    @csrf
    @method('PUT')
    <table class=" text-nowrap">
        <tr>

            <th>Role</th>

        </tr>

        @foreach ($roles as $role)
        <tr>

            <td>  <input type="radio" value="{{ $role->id }}" name="role_name"> <a href=" {{ route('showPermissions', ['id' => $role->id]) }}"> {{ $role->role_name }}</a> </td>


        </tr>
        @endforeach


        <table class=" text-nowrap">
            <tr>

                <th>Permission</th>

            </tr>


           @isset($permissionRoles)


                @foreach ($permissionRoles as $per)

          <?php    array_push($permission_id, $per->id) ?>

                @endforeach

            @endisset

            @foreach ($permissions as $permission)




            <tr>

                <td> <input type="checkbox" name="chbPermission[]" value="{{ $permission->id }}" {{ isset($permissionRoles) && in_array($permission->id, $permission_id )  ?  'checked' :  '' }} multiple> {{ $permission->name }} </td>


            </tr>


            @endforeach


        </table> <br/>

        @can('updatePR', $pmr)
        <input type="submit" value="Submit" name="submitPermissionRole" class="btn-dropbox"/>
        @endcan

</table>
</form> <br/>



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (isset($permissionRoles))

<h4>{{ isset($permissionRoles[0]->role_name) ? $permissionRoles[0]->role_name : "" }}</h4>

@foreach ($permissionRoles as $value)
@if ($value->name != null)

<li> {{ $value->name }}</li>

@endif

@endforeach

@else {{ "CLICK ON ROLE NAME TO SEE PERMISSIONS" }}

@endif



@else {{ "NO ROLES OR PERMISSIONS" }}

@endif
