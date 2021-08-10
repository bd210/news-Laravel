

<div class="col-lg-8 col-xlg-9 col-md-12">
    <h2>CREATE NEWS</h2>
    <div class="card">

        <div class="card-body">

            <form action="{{ route('createPost') }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Title</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" placeholder="Title"
                               class="form-control p-0 border-0" name="title"
                               value="{{ old('title')  }}"> </div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Content</label>
                    <div class="col-md-12 border-bottom p-0">
                        <textarea name="content" class="form-control p-0 border-0">
                        {{ old('content')  }}
                        </textarea></div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">File</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="file"
                               class="form-control p-0 border-0" name="file[]" multiple > </div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-sm-12">Category</label>

                    <div class="col-sm-12 border-bottom">
                        <select class="form-select shadow-none p-0 border-0 form-control-line" name="category_id">
                            <option value="{{ old('category_id')  }}">Choose category...</option>
                            @isset($categories)

                                @foreach ($categories as $cat)

                                    <option  value="{{ $cat->id }}"> {{ $cat->category_name }}</option>


                                @endforeach

                            @else {{ "NO CATEGORY" }}
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="col-sm-12">Tags</label>

                    <div class="col-sm-12 border-bottom">
                        <select class="form-select shadow-none p-0 border-0 form-control-line"  name="tag_id[]" multiple >
                            <option value="0">Choose tags...</option>
                            @isset($tags)

                            @foreach ($tags as $tag)

                            <option  value="{{ $tag->id }}"> {{ $tag->keyword }}</option>


                            @endforeach

                            @else {{ "NO TAG" }}
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <div class="col-sm-12">

                        @can('create', $post)
                        <button class="btn btn-success" name="btnCreatePost">Create Post</button>
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
