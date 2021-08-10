

@if (isset($comments) && count($comments) > 0)


<div class="box-comments">
    <h2>Comments ( {{ count($comments) }} )</h2> <br/>
    <ul class="list-comments">

        @foreach ($comments as $comm )

        <li class="comment-children">
            <div class="comment-details">
                <h4 class="comment-author"> {{ $comm->email   }}</h4>
                <span style="color: blue">{{ date('F jS Y H:i',strtotime($comm->created_at))  }}</span>
                <p class="comment-description">
                    {{  $comm->content }}
                </p>

                @can('update', $comm)

               <button > <a href="{{ route('frontEditComment', ['commentID' => $comm->id , 'postID' => $comm->post_id ]) }}"><i class="fa fa-edit"></i></a></button>

                @endcan

                    @can('delete', $comm)
                    <form action="{{ route('frontDeleteComment', ['commentID' => $comm->id , 'postID' => $comm->post_id ]) }}" method="POST">
                        @CSRF
                        @method('DELETE')

                        <button ><i class="fa fa-trash"> </i> </button>

                    </form>

                @endcan

            </div>
        </li>

        @endforeach

    </ul>
</div>



@else {{ "No commets yet" }}

@endif
