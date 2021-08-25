

@isset($popular)

<?php

$controller = new \App\Http\Controllers\Controller();

?>

<div class="single_sidebar">
    <h2><span>Popular Post</span></h2>
    <ul class="spost_nav">

        @foreach ($popular as $popular)
        <li>
            <div class="media wow fadeInDown"> <a href="{{ route('singlePost', ['postID' =>$popular->id ]) }}" class="media-left">


                        @if($controller->returnFirstImg($popular['files']))

                        <img alt="post picture" src="{{ asset('/assets/upload/'. $controller->returnFirstImg($popular['files'])) }}">

                   @else

                       <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="post picture"  />

                   @endif

                </a>
                <div class="media-body"> <a href="post?postID={{ $popular->id }}" class="catg_title"> {{ $popular->title . " -  ". $popular['categories']->category_name .'  -  '. $popular->visits_count }}   <i class='fa fa-eye'></i></a> </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>



@else {{ "NO POSTS WITH THIS CATEGORY" }}

@endisset
