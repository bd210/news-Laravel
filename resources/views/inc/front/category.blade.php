

@if (isset($category) && count($category) > 0)

<?php
$controller = new \App\Http\Controllers\Controller();
?>

<div class="single_sidebar">
    <h2><span> {{ $category[0]['categories']->category_name }}</span></h2>
    <ul class="spost_nav">


        @foreach ($category as $cat)

        <li>
            <div class="media wow fadeInDown"> <a href="{{ route('singlePost', ['postID' => $cat->id ]) }}" class="media-left">





                    @if ($controller->returnFirstImg($cat['files']))

                        <img alt="post picture" src="{{ asset('/assets/upload/' . $controller->returnFirstImg($cat['files'])) }}">

                    @else
                      <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="post picture"  />

                    @endif


                </a>

                <div class="media-body"> <a href="{{ route('singlePost', ['postID' => $cat->id ]) }}" class="catg_title">
                        {{ $cat->title }}</a> </div>
            </div>
        </li>

        @endforeach
    </ul>
</div>





@else {{ "NO POSTS WITH THIS CATEGORY" }}

@endif
