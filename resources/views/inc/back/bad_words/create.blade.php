
<div class="col-lg-8 col-xlg-9 col-md-12">
    <h2>CREATE FORBIDDEN WORD</h2>
    <div class="card">

        <div class="card-body">

            <form action="{{ route('createForbiddenWord') }}" method="POST" class="form-horizontal form-material">
                @csrf
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Forbidden Word Name</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" placeholder="Forbidden Word name"
                               class="form-control p-0 border-0" name="word"
                               value="{{ old('word')  }}"> </div>
                </div>


                <div class="form-group mb-4">
                    <div class="col-sm-12">


                        @can('create', $word)
                        <button class="btn btn-success" name="btnCreateBadWord">Create Forbidden Word</button>
                        @endcan

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
