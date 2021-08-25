

@if (isset($pending) && count($pending) > 0)


<?php


$number = 1;
$controller  =  new \App\Http\Controllers\Controller();


?>
<h2>Pending News</h2>
<table class="table text-nowrap">
    <tr>
        <th>Num</th>
        <th>CreatedAt</th>
        <th>UpdatedAt</th>
        <th>Picture</th>
        <th>Title</th>
        <th>Author</th>
        <th>Category</th>
        <th>Approve</th>
        <th>Delete</th>
        <th>View</th>

    </tr>

    @foreach ($pending as $post)

    <tr>
        <td> {{ $number++ }} </td>
        <td> {{ date("F jS Y H:i", strtotime($post->created_at)) }}</td>
        <td>
            @if ($post->updated_at != null)

                {{  date("F jS Y H:i", strtotime($post->updated_at)) }}

            @else {{ "Not updated" }}

            @endif
        </td>
        <td>



            @if ($controller->returnFirstImg($post->files) )

                  <img src="{{ asset('/assets/upload/'. $controller->returnFirstImg($post->files)) }}" alt="post picture" style="height: 50px;width: 50px;" />

            @else


                 <img src="https://i.pinimg.com/originals/10/b2/f6/10b2f6d95195994fca386842dae53bb2.png" alt="post picture" style="height: 50px;width: 50px;" />


            @endif

        </td>
        <td> {{ substr($post->title, 0, 8). "..." }} </td>
        <td> <a href="{{ route('editUser',['userID' => $post->author->id ]) }}"> {{ $post->author->first_name . " " . $post->author->last_name }} </a></td>
        <td> {{ $post['categories']->category_name }}</td>
        <td>

            @can('approve', $post)

                <form action="{{ route('approvePost', ['postID' => $post->id ]) }}" method="POST">
                    @CSRF
                    @method('PATCH')

                    <button class="btn btn-danger"><i class="fas fa-check"> </i> </button>
                </form>
            @endcan

        </td>
        <td>
            @can('delete', $post)
            <form action="{{ route('deletePost', ['postID' => $post->id ]) }}" method="POST">
                @CSRF
                @method('DELETE')

                <button class="btn btn-danger"><i class="fas fa-trash-alt"> </i> </button>

            </form>
            @endcan

        </td>
        <td>  <a href="{{ route('editPost', ['postID' => $post->id ]) }}"><i class="fas fa-eye"> </i> </a> </td>

    </tr>
    @endforeach

</table>




@else {{  " NO PENDING POSTS " }}

@endif



