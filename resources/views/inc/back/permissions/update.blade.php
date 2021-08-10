
@isset($permission)


<div class="col-lg-8 col-xlg-9 col-md-12">
    <div class="card">
        <div class="card-body">

            <form action=" {{ route('updatePermission', ['id' => $permission->id ]) }} " method="POST" class="form-horizontal form-material">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Name</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" name="name"
                               class="form-control p-0 border-0" value=" {{ $permission->name }}"> </div>
                </div>


                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Description</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" name="description"
                               class="form-control p-0 border-0" value=" {{ $permission->description }}"> </div>
                </div>
                <div class="form-group mb-4">
                    <div class="col-sm-12">


                        @can('update' , $permission)
                        <button class="btn btn-success" name="btnUpdatePermission">Update Permission</button>

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


@else  {{ "PERMISSION DOES NOT EXIST" }}

@endisset
