
@isset($business)
<?php
$count = count($business)-1;
$controller = new \App\Http\Controllers\Controller();
?>
<div class="single_post_content">
    <h2><span>{{ $business[0]['categories']->category_name }}</span></h2>
    <div class="single_post_content_left">
        <ul class="business_catgnav  wow fadeInDown">
            <li>
                <figure class="bsbig_fig"> <a href="{{ route('singlePost', ['postID' => $business[0]->id ]) }} " class="featured_img">



                        @if($controller->returnFirstImg($business[0]['files']))

                            <img alt="post picture" src="{{ asset('/assets/upload/'. $controller->returnFirstImg($business[0]['files'])) }}" style="height: 300px; width: 100%;">

                        @else

                            <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="post picture" style="height: 300px; width: 100%;" />

                        @endif


                        <span class="overlay"></span> </a>
                    <figcaption> <a href="{{ route('singlePost', ['postID' => $business[0]->id ]) }}"> {{   $business[0]->title  }}</a> </figcaption>
                    <p> {{  $business[0]->content  }} </p>
                </figure>
            </li>
        </ul>
    </div>
    <div class="single_post_content_right">
        <ul class="spost_nav">


            @for ($i = 1; $i <= $count; $i++)

            <li>
                <div class="media wow fadeInDown"> <a href="{{ route('singlePost', ['postID' => $business[$i]->id ]) }}" class="media-left">


                        @if($controller->returnFirstImg($business[$i]['files']))

                            <img alt="post picture" src="{{ asset('/assets/upload/'. $controller->returnFirstImg($business[$i]['files'])) }}">

                        @else

                            <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="post picture"  />

                       @endif

                    </a>
                    <div class="media-body"> <a href="{{ route('singlePost', ['postID' => $business[$i]->id ]) }}" class="catg_title"> {{ $business[$i]->title }}  </a> </div>
                </div>
            </li>

            @endfor
        </ul>
    </div>
</div>



@else {{ "NO POSTS WITH BUSINESS CATEGORY" }}

@endisset
