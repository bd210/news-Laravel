
@isset($categories)
<?php
$number = 1;
?>
<h2>Categories</h2>

<a href="{{ route('createCategoryView') }}"> <i class="fas fa-plus"><b>NEW</b></i></a>


<table class="table text-nowrap">
    <tr>
        <th>#</th>
        <th>CreatedAt</th>
        <th>UpdatedAt</th>
        <th>Category</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

    @foreach ($categories as $category)
    <tr>
        <td> {{ $number++ }}</td>
        <td> {{ date("F jS Y H:i", strtotime($category->created_at)) }}</td>
        <td>
            @if ($category->updated_at != null)

                {{ date("F jS Y H:i", strtotime($category->updated_at)) }}

            @else {{ "Not updated" }}

            @endif

        </td>
        <td> {{ $category->category_name }}</td>
        <td>


            <a href=" {{ route('editCategory', ['cat' => $category->id ]) }}"><i class="fas fa-edit"></i>  </a>

        </td>

        <td>

            @can('delete', $category)
            <form action="{{ route('deleteCategory', ['cat' => $category->id ]) }}" method="POST">
                @CSRF
                @method('DELETE')

                <button class="btn btn-danger"><i class="fas fa-trash-alt"> </i> </button>

            </form>
            @endcan
        </td>

    </tr>
    @endforeach

</table>




@else {{ "NO CATEGORIES" }}

@endisset
