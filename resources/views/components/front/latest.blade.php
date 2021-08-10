<?php

$controller = new \App\Http\Controllers\Controller();
?>
<div class="col-lg-4 col-md-4 col-sm-4">
    <div class="latest_post">
        <h2><span>Latest post</span></h2>
        <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
                @isset($latest)

                @foreach ($latest as $post)

                <li>
                    <div class="media"> <a href="{{ route('singlePost', ['id' =>$post->id ]) }}" class="media-left">



                            @if($controller->returnFirstImg($post['files']))

                                <img alt="latest post picture" src="{{ asset('/assets/upload/'. $controller->returnFirstImg($post['files'])) }}">

                           @else

                                <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="latest post picture"  />


                            @endif

                        </a>
                        <div class="media-body"> <a href="post?postID={{ $post->id }}" class="catg_title"> <?= $post->title . " - " . $post->categories->category_name ?></a> </div>
                    </div>
                </li>


                @endforeach

                @else {{ "NO ENTITY" }}

                @endisset

            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
        </div>
    </div>
</div>
