

@isset($sport)

<?php
$count = count($sport)-1;
$controller = new \App\Http\Controllers\Controller();
?>

<div class="fashion">
    <div class="single_post_content">
        <h2><span>{{$sport[0]['categories']->category_name}}</span></h2>
        <ul class="business_catgnav wow fadeInDown">
            <li>
                <figure class="bsbig_fig"> <a href="{{ route('singlePost', ['id' => $sport[0]->id ]) }}" class="featured_img">



                        @if($controller->returnFirstImg($sport[0]['files']))

                           <img alt="post picture" src="{{ asset('/assets/upload/'. $controller->returnFirstImg($sport[0]['files'])) }}" style="height: 300px; width: 100%;">

                        @else

                           <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="post picture" style="height: 300px; width: 100%;" />

                        @endif


                        <figcaption> <a href="{{ route('singlePost', ['id' => $sport[0]->id ]) }}"> {{$sport[0]->title }} </a> </figcaption>

                </figure>
            </li>
        </ul>
        <ul class="spost_nav">



            @for ($i = 1; $i <= $count; $i++)

            <li>
                <div class="media wow fadeInDown"> <a href="{{ route('singlePost', ['id' => $sport[$i]->id ]) }}" class="media-left">



                         @if($controller->returnFirstImg($sport[$i]['files']))

                            <img alt="post picture" src="{{ asset('/assets/upload/'. $controller->returnFirstImg($sport[$i]['files'])) }}">

                        @else

                        <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="post picture"  />

                       @endif
                    </a>
                    <div class="media-body"> <a href="{{ route('singlePost', ['id' => $sport[$i]->id ]) }}" class="catg_title"> {{ $sport[$i]->title }}</a> </div>
                </div>
            </li>

            @endfor
        </ul>
    </div>
</div>



@else {{ "NO POSTS WITH THIS CATEGORY" }}

@endisset
