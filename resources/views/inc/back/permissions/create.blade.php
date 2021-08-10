
<div class="col-lg-8 col-xlg-9 col-md-12">
    <h2>CREATE PERMISSION</h2>
    <div class="card">

        <div class="card-body">

            <form action=" {{ route('createPermission') }}" method="POST" class="form-horizontal form-material">
                @csrf
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Name</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" placeholder="Permission Name"
                               class="form-control p-0 border-0" name="name"
                               value="{{ old('name')  }}"> </div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Description</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" placeholder="Permission Description"
                               class="form-control p-0 border-0" name="description"
                               value="{{ old('description')  }}"> </div>
                </div>

                <div class="form-group mb-4">
                    <div class="col-sm-12">

                        @can('create', $permission)
                        <button class="btn btn-success" name="btnCreatePermission">Create Permission</button>
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
