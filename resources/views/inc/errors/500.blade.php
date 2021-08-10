<div class="error-box">
    <div class="error-body text-center">
        <h1 class="error-title text-danger">500</h1>
        <h3 class="text-uppercase error-subtitle">AN ERROR OCCURRED, PLEASE CONTACT ADMINISTRATOR !</h3>
        <a href="{{  ( !session()->has('user') || session()->get('user')->roles->role_name == "User") ?  route('index') : route('allUsers') }}" class="btn btn-danger btn-rounded waves-effect waves-light mb-5 text-white">Back to home</a>
    </div>
</div>
