@push('title')
    Login
@endpush

@extends('components.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title" align="center">Login</h5>
            <form id="login" method="POST">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
              </div>
              <p>If you don't have an account <a href="/register">Click here</a></p>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')    
<script>
$(document).ready(function() {
    $("#login").submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "api/login",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.status == 200)
                {
                    localStorage.setItem('token', response.Token);
                    toastr.success(response.message,"", {
                        "closeButton": true,
                        "debug": false,
                        "progressBar": true,
                        "positionClass": "toast-top-center",
                        "preventDuplicates": false,
                        "onclick": null,
                        "timeOut": "1500",
                        "onHidden": function () {
                                window.location.replace("/dashboard");
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
});
</script>
@endsection
