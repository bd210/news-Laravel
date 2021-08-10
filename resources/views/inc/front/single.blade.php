
@isset($single)

    <?php
$postID = $single->id;
$countLikes = count($single['likes']);

$userIdArray = array();

$videos = array('mp4');
$images = array('png', 'jpg', 'jpeg');
$audios = array('mp3', 'wma');

$controller = new \App\Http\Controllers\Controller();

foreach ($single['likes'] as $like) {

    array_push($userIdArray,$like['pivot']->user_id);
}


?>
<h1>{{ $single->title }}</h1>

<div class="post_commentbox">
    <a href="#"><i class="fa fa-user"></i>{{ $single['author']->first_name . " " .  $single['author']->last_name }}</a>
    <span><i class="fa fa-calendar"></i>{{ date('F jS Y H:i',strtotime($single->created_at)) }}</span>
    <a href="#"><i class="fa fa-tags"></i>{{  $single['categories']->category_name }}</a>
    <a href="#"><i class="fa fa-eye">{{ $hits }}</i></a>
    @if (isset($single['edited']) && $single['edited'] != null)

    <a href="#"><i class="fa fa-edit"></i> {{ $single['edited']->first_name . " " . $single['edited']->last_name   }} </a>

    @endif

</div>

<div class="single_page_content">



    @if($controller->returnFirstImg($single['files']))

         <img class="img-center"  src="{{ asset('/assets/upload/'. $controller->returnFirstImg($single['files'])) }}" alt="single post"  style="width: 700px;height: 400px;">

    @else

        <img class="img-center" src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="single post" style="width: 700px;height: 400px;" />

    @endif


    <p> {{ $single->content }} </p>
    <div class="col-lg-offset-0">


        @if (isset($single['files']))
            <?php
            $count = count($single['files']);
            ?>

            @for($i = 1; $i< $count; $i++)


                <?php

                $ext = pathinfo($single['files'][$i]->file_name, PATHINFO_EXTENSION);

                ?>


                @if (in_array($ext, $images))

                    <img src="{{ asset('/assets/upload/'.$single['files'][$i]->file_name ) }}" alt="post file" width="100px" height="100px" />


                @elseif (in_array($ext, $videos))


                    <video controls src="{{ asset('/assets/upload/'.$single['files'][$i]->file_name ) }}" alt="post file" width="100px" height="100px%" ></video>

                @elseif (in_array($ext, $audios))


                    <audio controls src="{{ asset('/assets/upload/'.$single['files'][$i]->file_name ) }}" alt="post file" width="100px" height="100px" ></audio>



                @endif


                @endfor
            @endif

    </div>

    <h4>TAGS</h4>

    @if (isset($single['tags']) && count($single['tags']) > 0  )

        @foreach ($single['tags'] as $tag)

           <p><a href=''>  {{ $tag->keyword }}</a></p>

        @endforeach

    @else
        {{ "NO TAGS" }}
    @endif

    @if (!auth()->check())

    <a href="{{ route('login') }}"><h3> Like <i class="fa fa-thumbs-o-up"></i> {{ $countLikes > 0 ?  " ( ". $countLikes . " ) "   : "No likes yet" }} </h3></a>


    @elseif (auth()->check() &&  in_array(auth()->user()->id , $userIdArray))



    <form action="{{ route('unlikePost' , [ 'postID' => $postID]) }}" method="POST">
        @CSRF
        @method('DELETE')
        <button class=" btn-danger"><h3> Unlike <i class="fa fa-thumbs-o-up"></i>{{ " " . $countLikes  }} </h3> </button>
    </form>

    @else
    <a href="{{ route('likePost' , [ 'postID' => $postID]) }}"><h3> Like <i class="fa fa-thumbs-o-up"></i>{{ $countLikes > 0 ? "(". $countLikes . ")" : " ( No likes yet ) "}} </h3></a>

    @endif



   @include("inc.front.comments.comments")
    <br/>
    <h4>Leave commment</h4>

    <form action="{{ (session()->has('comment')) ? route('frontUpdateComment', ['commentID' => session()->get('comment')->id , 'postID' => $postID ]) : route('storeComment', ['id' => $postID] ) }}" method="POST" class="contact_form">
        @csrf
        @if(session()->has('comment'))
            @method('PUT')
        @endif
        <input class="form-control" type="text" placeholder="Email" name="email" value="{{ (session()->has('comment')) ? session()->get('comment')->email : '' }}">

        <textarea class="form-control" cols="30" rows="5" placeholder="Comment" name="content">{{ (session()->has('comment')) ? session()->get('comment')->content : '' }}</textarea>

        <input type="submit" value="{{ (session()->has('comment')) ? 'Update' : 'Send' }}" name="submitComment">

    </form>
        @empty(!session('success'))
            <div class="alert alert-success">  <span class="glyphicon glyphicon-ok-sign"></span>    {{ session('success') }}</div>
        @endempty
        @empty(!session('unsuccess'))
            <div class="alert alert-danger"> <span class="glyphicon glyphicon-remove-sign"></span>   {{ session('unsuccess') }}</div>
        @endempty


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


@else {{ "POST DOES NOT EXIST" }}

@endisset
<?php
session()->forget('comment');

?>
