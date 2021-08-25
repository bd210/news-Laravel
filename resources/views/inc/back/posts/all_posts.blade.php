
@isset($posts)
<?php
$number = 1 ;
$controller = new \App\Http\Controllers\Controller();

?>



<h2>News</h2>
<a href="{{ route('createPostView') }}"> <i class="fas fa-plus"><b>NEW</b></i></a>


<form action="" method="GET">
    <input type="text" name="per_page" placeholder="News per page">
    <input type="submit" name="submitPerPage" value="Go!" class="btn-primary">

</form>
<table class="table text-nowrap">
    <tr>
        <th>#</th>
        <th>CreatedAt</th>
        <th>UpdatedAt</th>
        <th>Picture</th>
        <th>Title</th>
        <th>Author</th>
        <th>Category</th>
        <th>ApprovedBy</th>
        <th>EditedBy</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

     @foreach ($posts as $post)

    <tr>
        <td> {{ $number++ }} </td>
        <td> {{ date("F jS Y H:i", strtotime($post->created_at)) }}</td>
        <td>
              @if ($post->updated_at != null)

                {{ date("F jS Y H:i", strtotime($post->updated_at)) }}

            @else {{"Not updated" }}

            @endif

        </td>
        <td>

            @if($controller->returnFirstImg($post['files']))



                <img src="{{ asset('/assets/upload/'. $controller->returnFirstImg($post['files'])) }}" alt="post picture" style="height: 50px;width: 50px;" />


            @else

                <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="post picture" style="height: 50px;width: 50px;" />

            @endif




        </td>
        <td>  {{ substr($post->title, 0, 8). "..." }} </td>

        <td> <a href="{{ route('editUser', ['userID' =>  $post->author_id ]) }}"> {{  optional($post->author)->first_name . " " . substr( optional($post->author)->last_name, 0, 1) }}</a></td>

        <td> {{ $post['categories']->category_name }}</td>

        <td>  <a href="{{ route('editUser', ['userID' => $post->approved->id ]) }}"> {{ $post->approved->first_name  }} </a></td>

        <td>
            @if ($post['edited'] != null)
                <a href="{{ route('editUser', ['userID' => $post->edited->id ]) }}">{{ $post->edited->first_name  }}</a>

             @else  {{  "Not updated" }}
            @endif
        </td>


        <td>  <a href="{{ route('editPost', ['postID' => $post->id ]) }}"><i class="fas fa-edit"></i>  </a></td>



        @can('delete', $post)
        <td>

            <form action="{{ route('deletePost', ['postID' => $post->id ]) }}" method="POST">
                @CSRF
                @method('DELETE')

                <button class="btn btn-danger"><i class="fas fa-trash-alt"> </i> </button>

            </form>
        </td>
        @endcan

    </tr>

    @endforeach

</table>
<a href="">{{ $posts->links() }}</a>

@else {{ "NO POSTS" }}

@endif

