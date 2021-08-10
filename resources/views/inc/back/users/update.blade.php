

 @isset($user)

<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-12">
        <div class="white-box">
            <div class="user-bg"> <img width="100%" alt="user" src="{{ asset('/') }}assets/back/plugins/images/users/d3.jpg">
                <div class="overlay-box">
                    <div class="user-content">
                        <a href="javascript:void(0)"><img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png"
                                                          class="thumb-lg img-circle" alt="img"></a>
                        <h4 class="text-white mt-2">{{ $user->first_name . " " . $user->last_name }}</h4>
                        <h5 class="text-white mt-2">{{ $user->email }}</h5>
                    </div>
                </div>
            </div>
            <div class="user-btm-box mt-5 d-md-flex">
                <div class="col-md-4 col-sm-4 text-center">
                    <h1>{{ $user['roles']->role_name }}</h1>
                </div>

            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('updateUser', ['id' => $user->id]) }}" method="POST" class="form-horizontal form-material">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">First Name</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" name="fname"
                                   class="form-control p-0 border-0" value="{{ $user->first_name }}"> </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Last Name</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text"  name="lname"
                                   class="form-control p-0 border-0" value="{{ $user->last_name }}"> </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="example-email" class="col-md-12 p-0">Email</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="email" name="email"
                                   class="form-control p-0 border-0"
                                   id="example-email"
                                   value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-sm-12">Select Role</label>

                        <div class="col-sm-12 border-bottom">
                            <select class="form-select shadow-none p-0 border-0 form-control-line" name="role">
                                <option value="{{ $user['roles']->id }}">{{ $user['roles']->role_name }} </option>
                                @if (isset($roles))

                                @foreach ($roles as $role)
                                <option  value="{{ $role->id }}"> {{ $role->role_name }}</option>


                                @endforeach

                                @else  {{  "NO ROLES" }}
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="col-sm-12">
                            @can('update', $user)
                            <button class="btn btn-success" name="btnUpdateProfile">Update Profile</button>
                            @endcan

                        </div>
                    </div>
                </form> <br/>

                <h2>Update password</h2>

                <form action="{{ route('updateUserPassword', ['id' => $user->id]) }}" method="POST"  class="form-horizontal form-material">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">New password</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="password" class="form-control p-0 border-0" name="newPassword">
                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Confirm new password</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="password" class="form-control p-0 border-0" name="confirmNewPassword">
                            </div>
                        </div>

                        <div class="col-sm-12">

                            @can('update', $user)
                            <button class="btn btn-success" name="btnUpdatePassword">Update Password</button>
                            @endcan


                        </div>
                    </div>
                </form>
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

    </div>
    <!-- Column -->
</div>



@else {{ "USER DOES NOT EXIST" }}

@endif

