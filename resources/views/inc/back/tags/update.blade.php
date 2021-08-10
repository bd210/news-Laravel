

@isset($tag)

<div class="col-lg-8 col-xlg-9 col-md-12">
    <div class="card">
        <div class="card-body">

            <form action=" {{ route('updateTag', ['id' => $tag->id ]) }}" method="POST" class="form-horizontal form-material">
            @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Tag Name</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" name="tag"
                               class="form-control p-0 border-0" value=" {{ $tag->keyword }}"> </div>
                </div>

                <div class="form-group mb-4">
                    <div class="col-sm-12">

                        @can('update', $tag)
                        <button class="btn btn-success" name="btnUpdateTag">Update Tag</button>
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


@else {{ "TAG DOES NOT EXIST" }}

@endisset
