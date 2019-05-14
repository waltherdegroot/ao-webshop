@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <a href="{{ action('CategoryController@create') }}" class="btn btn-primary">Add</a>
    </div>
    <div class="container">
        <div id="panel" class="panel">
            @foreach ($categories->chunk(3) as $items)
                <div class="row">
                    @foreach($items as $category)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $category->name }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        {{ $categories->links() }}
    </div>
@endsection