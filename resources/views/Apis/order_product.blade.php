@extends('layouts.master')

@section('content')
<main class="flex-shrink-0">
    <div class="container">
        <form data-action="http://127.0.0.1:8000/api/order_ajax/" method="POST" enctype="multipart/form-data" id="add-user-form">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="name" placeholder="Enter your name" name="name" required>
            </div>
            <div class="form-group">
                <label for="name">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
            </div>
            <div class="form-group">
                <label for="name">Phone:</label>
                <input type="name" class="form-control" id="phone" placeholder="Enter your phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="name">Address:</label>
                <input type="name" class="form-control" id="address" placeholder="Enter your address" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>

<script>
    $(document).ready(function() {

        var form = '#add-user-form';

        $(form).on('submit', function(event) {
            event.preventDefault();

            var url = $(this).attr('data-action');

            $.ajax({
                url: url,
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $(form)[0].reset();
                    alert(response.success);
                },
                error: function(response) {
                    alert(response.error)
                }
            });
        });

    });
</script>
@endsection