
<section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav main_nav">
                <li class="active"><a href="{{ route('index') }}"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>


                @isset($categories)

                @foreach ($categories as $cat)



                <li><a href="{{ route('singleCategory', ['id' => $cat->id ]) }}">{{ $cat->category_name }}</a></li>

                @endforeach

                @else {{ "NO NAVIGATIONS" }}
                @endisset

                @if(auth()->check() && auth()->user()->role_id != 2)

                <li><a href="{{ route('allUsers') }}">Admin Panel</a>

                @endif


                <li><a href="contact">Contact Us</a></li>

            </ul>
        </div>
    </nav>
</section>

