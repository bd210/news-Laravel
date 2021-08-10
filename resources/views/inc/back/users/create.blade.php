
<div class="col-lg-8 col-xlg-9 col-md-12">
    <h2>CREATE USER</h2>
    <div class="card">

        <div class="card-body">

            <form action="{{ route('createUser') }}" method="POST" class="form-horizontal form-material">
                @csrf
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">First Name</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" placeholder="First name"
                               class="form-control p-0 border-0" name="first_name"
                               value="{{ old('first_name')  }}"> </div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Last Name</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" placeholder="Last name"
                               class="form-control p-0 border-0" name="last_name"
                               value="{{ old('last_name')  }}"> </div>
                </div>

                <div class="form-group mb-4">
                    <label for="example-email" class="col-md-12 p-0">Email</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="email" placeholder="example@gmail.com"
                               class="form-control p-0 border-0" name="email"
                               id="example-email"
                               value="{{ old('email')  }}">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Password</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="password" placeholder="Password" class="form-control p-0 border-0" name="password"
                               value="{{ old('password')  }}">
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-sm-12">Role</label>

                    <div class="col-sm-12 border-bottom">
                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="role_id">
                            <option value="{{ old('role_id') }}">Choose role...</option>
                            @isset($roles)

                            @foreach ($roles as $role)
                            <option  value="{{ $role->id }}"> {{ $role->role_name }}</option>


                            @endforeach

                            @else {{ "NO ROLES" }}
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <div class="col-sm-12">

                        @can('create', $user)
                        <button class="btn btn-success" name="btnCreateUser">Create User</button>
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
