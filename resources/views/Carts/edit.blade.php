@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Edit Cart
                    <!-- <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">Create category</a> -->
                </div>

                <div class="card-body">

                    @include('partials.alerts')

                    <form action="{{ route('carts.update', ['cart'=>$cart->id] ) }}" method="post">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group">
                            <label for="{{ $cart->product->id }}">Product Name:</label>
                            <input type="name" class="form-control" id="product_id" name="{{ $cart->product->id }}" value="{{ $cart->product->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="price">Product Price:</label>
                            <input type="name" class="form-control" id="price" name="price" value="{{ $cart->product->price }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Product Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $cart->quantity }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection