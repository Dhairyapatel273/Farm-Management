@push('title')
    Registration Page
@endpush

@extends('components.layout')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header" align="center">
            <h1>Registration Form</h1>
        </div>
        <div class="card-body">
    <form id="register">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
</div>
</div>
@endsection

@section('js')
    <script>
         $("#register").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "api/register",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response.status == 200)
                    {
                        toastr.success(response.message,"", {
                            "closeButton": true,
                            "debug": false,
                            "progressBar": true,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": false,
                            "onclick": null,
                            "timeOut": "1500",
                            "onHidden": function () {
                                window.location.replace("/");
                            }
                        });
                    }
                    else if(response.status == 201)
                    {
                        toastr.error(response.message,"", {
                            "closeButton": true,
                            "debug": false,
                            "progressBar": true,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": false,
                            "onclick": null,
                            "timeOut": "1500",
                        });
                    }
                }
            });
        });
    </script>
@endsection