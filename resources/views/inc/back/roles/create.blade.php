
@if(session()->has('roleParams'))

    @endisset
<div class="col-lg-8 col-xlg-9 col-md-12">
    <h2>CREATE ROLE</h2>
    <div class="card">

        <div class="card-body">

            <form action="{{ route('createRole') }}" method="POST" class="form-horizontal form-material">
                @csrf
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Role Name</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" placeholder="Role name"
                               class="form-control p-0 border-0" name="role_name"
                               value="{{ old('role_name')  }}"> </div>
                </div>


                <div class="form-group mb-4">
                    <div class="col-sm-12">

                        @can('create', $role)
                        <button class="btn btn-success" name="btnCreateRole">Create Role</button>
                        @endcan

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
