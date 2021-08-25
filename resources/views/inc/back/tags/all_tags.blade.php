
@isset($tags)
<?php
$number = 1;
?>
<h2>Tags</h2>


<a href="{{ route('createTagView') }}"> <i class="fas fa-plus"><b>NEW</b></i></a>


<table class="table text-nowrap">
    <tr>
        <th>#</th>
        <th>CreatedAt</th>
        <th>UpdatedAt</th>
        <th>Tag</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

    @foreach ($tags as $tag)
    <tr>
        <td> {{ $number++ }}</td>
        <td> {{  date("F jS Y H:i", strtotime($tag->created_at)) }}</td>
        <td>
            @if ($tag->updated_at != null)

                {{ date("F jS Y H:i", strtotime($tag->updated_at)) }}

            @else {{ "Not updated" }}

            @endif
        </td>
        <td> {{ $tag->keyword }}</td>
        <td>

            <a href="{{ route('editTag', ['tagID' => $tag->id]) }}"><i class="fas fa-edit"></i>  </a>

        </td>


        <td>
            @can('delete', $tag)
            <form action="{{ route('deleteTag', ['tagID' => $tag->id]) }}" method="POST">
                @CSRF
                @method('DELETE')

                <button class="btn btn-danger"><i class="fas fa-trash-alt"> </i> </button>

            </form>
            @endcan
        </td>

    </tr>
     @endforeach

</table>




@else  {{ "NO TAGS" }}

@endisset
