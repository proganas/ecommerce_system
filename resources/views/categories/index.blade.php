@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Categories
                    <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">Create category</a>
                </div>

                <div class="card-body">

                    @include('partials.alerts')

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Parent Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name}}</td>
                                <td>
                                    @if ($category->parent)
                                    {{ $category->parent->name}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', ['category'=> $category->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    <form action="{{ route('categories.destroy', ['category'=> $category->id]) }}" method="POST" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-xs btn-danger" onclick="return myFunction();">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function myFunction() {
        if (!confirm("Are You Sure to delete this"))
            event.preventDefault();
    }
</script>