
@isset($comments)

<?php
$number = 1;
?>
<h2>Comments</h2>
<table class="table text-nowrap">
    <tr>
        <th>#</th>
        <th>CreatedAt</th>
        <th>UpdatedAt</th>
        <th>Email</th>
        <th>Content</th>
        <th>Delete</th>

    </tr>

    @foreach ($comments as $comment)
    <tr>
        <td> {{$number++}} </td>
        <td>  {{date("F jS Y H:i", strtotime($comment->created_at))}} </td>
        <td>
            @if ($comment->updated_at != null)

            {{ date("F jS Y H:i", strtotime($comment->updated_at)) }}

            @else  {{"Not updated"}}

            @endif
        </td>
        <td> {{ $comment->email }} </td>
        <td> {{ substr($comment->content, 0, 20). "..." }} </td>

        <td>

            @can('delete', $comment)
            <form action="{{ route('deleteComment', ['com' => $comment->id ]) }}" method="POST">
                @CSRF
                @method('DELETE')

                <button class="btn btn-danger"><i class="fas fa-trash-alt"> </i> </button>

            </form>
            @endcan
        </td>

    </tr>
    @endforeach

</table>


@else {{"NO COMMENTS"}}

@endisset
