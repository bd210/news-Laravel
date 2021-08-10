
@isset($words)

<?php
$number = 1;
?>
<h2>Forbidden Words</h2>


<a href="{{ route('createForbiddenWordView') }}"> <i class="fas fa-plus"><b>NEW</b></i></a>


<table class="table text-nowrap">
    <tr>
        <th>#</th>
        <th>CreatedAt</th>
        <th>UpdatedAt</th>
        <th>Word</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

    @foreach ($words as $word)
    <tr>
        <td> {{ $number++ }}</td>
        <td> {{ date("F jS Y H:i", strtotime($word->created_at)) }}</td>
        <td>
            @if ($word->updated_at != null)

                {{ date("F jS Y H:i", strtotime($word->updated_at)) }}

            @else {{ "Not updated"}}

            @endif

        </td>
        <td> {{ $word->word }}</td>

        <td>  <a href="{{ route('editForbiddenWord', ['id' => $word->id ]) }}"><i class="fas fa-edit"></i>  </a></td>



        <td>
            @can('delete', $word)
            <form action="{{ route('deleteForbiddenWord', ['id' => $word->id ]) }}" method="POST">
                @CSRF
                @method('DELETE')

                <button class="btn btn-danger"><i class="fas fa-trash-alt"> </i> </button>

            </form>
            @endcan
        </td>

    </tr>
     @endforeach

</table>




@else {{  "<h1>NO FORBIDDEN WORDS</h1>" }}

@endisset

