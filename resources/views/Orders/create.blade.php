@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Create Order
                    <!-- <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Create Product</a> -->
                </div>

                <div class="card-body">

                    @include('partials.alerts')

                    <form action="{{ route('orders.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="name" class="form-control" id="name" placeholder="Enter your name" name="name" required>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">Phone:</label>
                            <input type="name" class="form-control" id="phone" placeholder="Enter your phone" name="phone" required>
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">Address:</label>
                            <input type="name" class="form-control" id="address" placeholder="Enter your address" name="address" required>
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection