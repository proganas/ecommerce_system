@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Products
                    <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Create Product</a>
                </div>

                <div class="card-body">

                    @include('partials.alerts')

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)

                            <tr>
                                <td>{{ $product->name}}</td>
                                <td>
                                    @foreach($categories as $category)
                                    @if ($category->id == $product->category_id )
                                    {{ $category->name}}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{ $product->price}}</td>
                                <td>
                                    <a href="{{ route('products.edit', ['product'=> $product->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    <form action="{{ route('products.destroy', ['product'=> $product->id]) }}" method="POST" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-xs btn-danger" onclick="return myFunction();">Delete</button>
                                    </form>
                                    <!-- <button class="btn btn-xs btn-primary">Add To Cart</button> -->
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