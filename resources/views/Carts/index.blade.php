@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Carts
                    <!-- <a href="{{ route('carts.create') }}" class="btn btn-primary float-right">Create category</a> -->
                </div>

                <div class="card-body">

                    @include('partials.alerts')

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carts as $cart)
                            <tr>
                                <td>{{ $cart->product->name}}</td>
                                <td>
                                    {{ $cart->product->price}}
                                </td>
                                <td>{{ $cart->quantity}}</td>
                                <td>
                                    <a href="{{ route('carts.edit', ['cart'=> $cart->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    <form action="{{ route('carts.destroy', ['cart'=> $cart->id]) }}" method="POST" style="display: inline-block;">
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