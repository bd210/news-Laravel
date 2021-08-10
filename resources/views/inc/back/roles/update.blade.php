
@if (isset($role))


<div class="col-lg-8 col-xlg-9 col-md-12">
    <div class="card">
        <div class="card-body">

            <form action=" {{ route('updateRole', ['id' => $role->id ]) }}" method="POST" class="form-horizontal form-material">
            @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Role Name</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" name="role_name"
                               class="form-control p-0 border-0" value=" {{ $role->role_name }}"> </div>
                </div>

                <div class="form-group mb-4">
                    <div class="col-sm-12">

                        @can('update', $role)
                        <button class="btn btn-success" name="btnUpdateRole">Update Role</button>
                        @endcan

                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>


@else {{ "ROLE DOES NOT EXIST" }}

@endif
