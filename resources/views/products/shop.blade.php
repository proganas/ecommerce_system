@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Products
                    <!-- <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Create Product</a> -->
                </div>

                <div class="card-body">

                    @include('partials.alerts')

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
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
                                <td>1</td>
                                <td>
                                    <form action="{{ route('carts.store') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" class="form-control" id="product_id" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" class="form-control" id="price" name="price" value="{{ $product->price }}">
                                        <input type="hidden" class="form-control" id="quantity" name="quantity" value="1">
                                        <button type="submit" class="btn btn-xs btn-primary">Add To Cart</button>
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