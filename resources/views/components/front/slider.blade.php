<?php

$controller = new \App\Http\Controllers\Controller();

?>
<section id="sliderSection" style="width: 65%;">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="slick_slider">


                @isset($all)

                @foreach ($all as $post)

                <div class="single_iteam" > <a href="{{ route('singlePost', ['id' =>$post->id ]) }}">




                        @if($controller->returnFirstImg($post['files']))



                            <img src="{{ asset('/assets/upload/'. $controller->returnFirstImg($post['files'])) }}" alt="slider picture" />

                        @else

                            <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="slider picture"  />



                        @endif
                        <div class="slider_article">

                            <p>{{ $post->title  }}</p>
                        </div>
                    </a> </div>

                @endforeach
                @endisset
            </div>

        </div>
    </div>



</section>
