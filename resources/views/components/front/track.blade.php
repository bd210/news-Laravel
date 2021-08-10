<?php

$controller = new \App\Http\Controllers\Controller();
?>
<section id="newsSection">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="latest_newsarea"> <span>Latest News</span>
                <ul id="ticker01" class="news_sticker">

                    @isset($latestTrack)

                    @foreach ($latestTrack as $latest)

                    <li><a href="{{ route('singlePost', ['id' => $latest->id ]) }}" >



                            @if($controller->returnFirstImg($latest['files']))

                                <img alt="track news" src="{{ asset('/assets/upload/'. $controller->returnFirstImg($latest['files'])) }}">

                            @else

                                <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="track news"  />

                            @endif

                            {{ $latest->title }}</a></li>


                    @endforeach


                    @else {{ "NO ENTITY" }}

                    @endisset
                </ul>

            </div>
        </div>
    </div>



</section>
