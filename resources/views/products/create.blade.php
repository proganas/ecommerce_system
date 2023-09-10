@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Create Product
                    <!-- <a href="{{ route('products.create') }}" class="btn btn-primary float-right">Create Product</a> -->
                </div>

                <div class="card-body">

                    @include('partials.alerts')

                    <form action="{{ route('products.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" required>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">Product Price:</label>
                            <input type="number" step="0.01" class="form-control" id="price" placeholder="Enter Price" name="price" required>
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Categorios</label>
                            <select class="form-control" name="category_id" required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection