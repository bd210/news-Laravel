
@isset($post)
<?php


$videos = array('mp4');
$images = array('png', 'jpg', 'jpeg');
$audios = array('mp3', 'wma');
$postID = $post->id;
?>

<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-12">
        <div class="white-box">
            <div class="user-bg">
            @if($firstImg)


                    <img src="{{ asset('assets/upload/'. $firstImg) }}" alt="post file" width="100%" height="100%" />

            @else

                    <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" width="100%" alt="user" />

            @endif

            </div>
            <div class="user-btm-box mt-5 d-md-flex">
                <div class="col-md-4 col-sm-4 text-center">

                    <h3>Author : </h3>
                </div>
                <h3><a href="{{ route('editUser',['userID' => $post->author->id ]) }}">{{ $post->author->first_name . " " . $post->author->last_name }}</a></h3>

            </div>
            @if (isset($likes) && $likes > 0 )

                 <i class=' far fa-thumbs-up' style='color: #0b5ed7'>  {{"Likes : ".$likes }} </i>


            @else  <h3 style='color: red'>{{"No likes yet"}}</h3>

            @endif

        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('updatePost', ['postID' => $post->id]) }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                  @csrf
                    @method('PUT')
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Title</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" name="title"
                                   class="form-control p-0 border-0" value="{{ $post->title }}"> </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Content</label>
                        <div class="col-md-12 border-bottom p-0">

                            <textarea name="content" class="form-control p-0 border-0"> {{ $post->content }}  </textarea>

                        </div>

                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">File</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="file"
                                       class="form-control p-0 border-0" name="file_name[]" multiple > </div>
                        </div>

                        <div class="form-group mb-4">

                            @isset($post->tags)

                                {{ "Current tags : " }}

                                @foreach ($post->tags as $tag)

                                     <li>{{ $tag->keyword }} </li>
                                @endforeach
                                @else

                                    {{ "NO TAGS" }}

                            @endisset

                            <br/>

                            <label class="col-sm-12">Select Tags</label>
                            <div class="col-sm-12 border-bottom">
                                <select class="form-select shadow-none p-0 border-0 form-control-line" name="tag[]" multiple>
                                    <option value="0">Choose tags... </option>
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
                            <label class="col-sm-12">Select Category</label>

                            <div class="col-sm-12 border-bottom">
                                <select class="form-select shadow-none p-0 border-0 form-control-line" name="category_id">
                                    <option value="{{ $post->categories->id }}">{{ $post->categories->category_name }}</option>

                                    @isset($categories)

                                    @foreach ($categories as $category)

                                    <option  value="{{ $category->id }}"> {{ $category->category_name }}</option>


                                    @endforeach;

                                    @else {{ "NO CATEGORY" }}
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">

                                 @can('update', $post)
                                <button class="btn btn-success" name="btnUpdatePost">Update Post</button>
                                @endcan

                            </div>
                        </div>
                    </div>
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

                <br/>
                <div>
                    <h3>All files</h3>
                    <form >



                        @isset($post->files[0])

                            @foreach ($post->files as $file)

                            <?php    $ext = pathinfo($file->file_name, PATHINFO_EXTENSION); ?>

                                @if (in_array($ext, $images))

                                     <img src="{{ asset('/assets/upload/'. $file->file_name) }}" alt="post file" width="100px" height="100px" />


                                    @can('deleteFilePost', $post)

                                    <form action="{{ route('deletePostFile', ['postID' => $postID , 'fileID' => $file->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" > DELETE </button>

                                    </form>

                                    @endcan

                                @elseif (in_array($ext, $videos))


                                    <video controls src="{{ asset('/assets/upload/'. $file->file_name) }}" alt="post file" width="200px" height="200px" ></video>

                                    @can('deleteFilePost', $post)

                                    <form action="{{ route('deletePostFile', ['postID' => $postID , 'fileID' => $file->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" > DELETE </button>

                                    </form>

                                    @endcan

                                @elseif (in_array($ext, $audios))


                                    <audio controls src="{{ asset('/assets/upload/'. $file->file_name) }}" alt="post file" width="100px" height="100px" ></audio>

                                    @can('deleteFilePost', $post)

                                        <form action="{{ route('deletePostFile', ['postID' => $postID , 'fileID' => $file->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" > DELETE </button>

                                        </form>

                                    @endcan
                                @endif


                            @endforeach
                        @else {{ "NO FILES" }}
                        @endisset

                    </form>




                </div>
            </div>


        </div>

    </div>
    <!-- Column -->
</div>


@else {{ "NEW DOES NOT EXIST" }}

@endif
