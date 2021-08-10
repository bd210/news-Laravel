<?php
$number = 1;

?>

@if (isset($_GET['keyword']) && $_GET['keyword'] != null )

<?php

$counts = count($posts) + count($comments) + count($users);
?>

    <h2> Results for : <b style="color:#0b5ed7;"> {{ $_GET['keyword']}} </b> {{ " Total records =  " .  $counts  }}  </b></h2>

@if(isset($posts[0]))




    <div id="search_list">

<table class="table text-nowrap">

    <h2>Posts</h2>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Details</th>
    </tr>


    @foreach ($posts as $post)


    <tr>
        <td> {{  $number ++ }}</td>
        <td> {{  $post->title }}</td>
        <td><a href="{{ route('editPost', ['id' => $post->id ])  }}"><input type="submit" value="Detail" class="btn-primary"></a> </td>
    </tr>


    @endforeach

    </table>


    @endif
    @if ( isset($users[0]))

    <table class="table text-nowrap">


        <h2>Users</h2>

        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Details</th>
        </tr>



          @foreach ($users as $user)



        <tr>
            <td> {{  $number ++ }}</td>
            <td> {{  $user->first_name  . " " . $user->last_name }}</td>
            <td> {{   $user->email }}</td>
            <td><a href="{{ route('editUser', ['id' => $user->id ])  }}"><input type="submit" value="Detail" class="btn-primary"></a> </td>
        </tr>



        @endforeach

         </table>



        @endif
        @if( isset($comments[0]))

        <table  class="table text-nowrap">

            <h2>Comments</h2>

            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Content</th>
                <th>Delete</th>
            </tr>

            @foreach ( $comments as $comment)


            <tr >
                <td> {{   $number ++ }}</td>
                <td> {{  $comment->email }}</td>
                <td> {{   $comment->content }}</td>
                <td><a href="{{ route('deleteComment', ['id' => $comment->id ]) }}"><input type="submit" value="Delete" class="btn-primary"></a> </td>
            </tr>



            @endforeach
        </table>


        @endif


@else {{ "NO RESULTS" }}

@endif

    </div>

