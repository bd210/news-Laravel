
@isset($category)


<div class="col-lg-8 col-xlg-9 col-md-12">
    <div class="card">
        <div class="card-body">

            <form action=" {{ route('updateCategory', ['cat' =>  $category->id ]) }}" method="POST" class="form-horizontal form-material">
               @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Category Name</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" name="category"
                               class="form-control p-0 border-0" value=" {{ $category->category_name }}"> </div>
                </div>

                <div class="form-group mb-4">
                    <div class="col-sm-12">

                        @can('update', $category)
                        <button class="btn btn-success" name="btnUpdateCategory">Update Category</button>
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


@else {{ "CATEGORY DOES NOT EXIST" }}

@endisset
