
<header id="header">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="header_top">
                <div class="header_top_left">
                    <ul class="top_nav">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="contact">Contact</a></li>
                    </ul>
                </div>
                <div class="header_top_right">

                    @if (!auth()->check())
                    <p >  <a href="{{ route('login') }}" style="color: white">Login</a> /
                        <a href="{{ route('register') }}" style="color: white">Register</a> </p>
                    @else
                    <p><a href="{{ route('myLogout') }}" style="color: white">Logout</a> </p>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="header_bottom">
                <div class="logo_area"><a href="{{ route('index') }}" class="logo"><img src="{{asset('/')}}assets/front/upload/posts/logo.jpg" alt=""></a></div>
            </div>


        </div>

    </div>
    @empty(!session('unsuccess'))
        <div class="alert alert-danger">  <span class="glyphicon glyphicon-remove-sign"></span>    {{ session('unsuccess') }}</div>
    @endempty
</header>
