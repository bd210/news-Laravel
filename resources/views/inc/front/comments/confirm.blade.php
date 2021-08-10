
@isset($commentConfirm)

@isset($_GET['selector'])


<?php

    $selector = $_GET['selector'];
?>

<h1>Confirm your comment</h1>

<form action="{{ route('confirmComment', ['id' => $commentConfirm->id , 'selector' => $selector ]) }}" method="POST">
    @csrf
    <input type="submit" value="Confirm" class="btn-theme" name="submitCommentVerify">

</form>

@endisset

@else  {{"Not found"}}

@endisset
@empty(!session('success'))
    <div class="alert alert-success">  <span class="glyphicon glyphicon-ok-sign"></span>    {{ session('success') }}</div>
@endempty
@empty(!session('unsuccess'))
    <div class="alert alert-danger"> <span class="glyphicon glyphicon-remove-sign"></span>   {{ session('unsuccess') }}</div>
@endempty
