@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="panel" class="panel">
            <table class="table table-striped table-bordered mt-2">
                <thead class="thead-dark">
                    <tr>   
                        <th scope="col">Name</th>
                        <th scope="col">Show</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="w-75"> <h3>{{ $category->name }}</h3> </td>
                            <td class="text-center"> <a href="{{ $category->showProducts() }}" class="btn btn-primary">Show all items</a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        {{ $categories->links() }}
    </div>
@endsection