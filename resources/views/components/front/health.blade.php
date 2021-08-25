

@isset($health)
<?php
$count = count($health)-1;
$controller = new \App\Http\Controllers\Controller();
?>

<div class="technology">
    <div class="single_post_content">
        <h2><span>{{ $health[0]['categories']->category_name }}</span></h2>
        <ul class="business_catgnav">
            <li>
                <figure class="bsbig_fig wow fadeInDown"> <a href="{{ route('singlePost', ['postID' => $health[0]->id ]) }}" class="featured_img">



                        @if($controller->returnFirstImg($health[0]['files']))

                           <img alt="post picture" src="{{ asset('/assets/upload/'. $controller->returnFirstImg($health[0]['files'])) }}" style="height: 300px; width: 100%;">

                        @else

                            <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="post picture" style="height: 300px; width: 100%;" />

                        @endif

                        <span class="overlay"></span> </a>
                    <figcaption> <a href="{{ route('singlePost', ['postID' => $health[0]->id ]) }}">{{ $health[0]->title }}</a> </figcaption>

                </figure>
            </li>
        </ul>
        <ul class="spost_nav">


            @for ($i = 1; $i <= $count; $i++)

            <li>
                <div class="media wow fadeInDown"> <a href="{{ route('singlePost', ['postID' => $health[$i]->id ]) }}" class="media-left">



                        @if($controller->returnFirstImg($health[$i]['files']))

                         <img alt="post picture" src="{{ asset('/assets/upload/'. $controller->returnFirstImg($health[$i]['files'])) }}" >

                        @else

                            <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="post picture"  />

                        @endif



                    </a>
                    <div class="media-body"> <a href="{{ route('singlePost', ['postID' => $health[$i]->id ]) }}" class="catg_title"> {{ $health[$i]->title }}</a> </div>
                </div>
            </li>
            @endfor
        </ul>
    </div>
</div>
</div>


@else  {{ "NO POSTS WITH THIS CATEGORY" }}

@endisset
