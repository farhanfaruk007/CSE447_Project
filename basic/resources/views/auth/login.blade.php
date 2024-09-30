<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login | Admin </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
        <style>
            /* Basic Resets */
/* Basic Resets */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    transition: all 0.3s ease-out;
}

body.auth-body-bg {
    font-family: 'Arial', sans-serif;
    background-color: #1a1a1a;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.bg-overlay {
    display: none;
}

.wrapper-page {
    position: relative;
}

.card {
    background: #2a2a2a;
    border-radius: 50%; /* Making it a circle */
    padding: 20px;
    width: 350px; /* Adjust width and height equally to maintain the circle shape */
    height: 350px;
    box-shadow: 5px 5px 15px #121212, -5px -5px 15px #3a3a3a;
    display: flex;
    align-items: center; /* Center the card content vertically */
}

.card-body {
    padding: 20px;
    text-align: center; /* Center content for a balanced look */
}

h4.text-muted.text-center.font-size-20 {
    font-size: 24px;
    color: #ddd;
    margin-bottom: 30px;
}

.form-horizontal .form-group {
    margin-bottom: 25px;
}

.form-control {
    height: 50px;
    border: none;
    border-radius: 15px;
    font-size: 16px;
    padding: 10px 15px;
    outline: none;
    background: #2a2a2a;
    box-shadow: inset 3px 3px 6px #121212, inset -3px -3px 6px #3a3a3a;
    color: #ddd;
}

.form-control:focus {
    box-shadow: inset 2px 2px 4px #121212, inset -2px -2px 4px #3a3a3a;
}

.btn-info {
    background: linear-gradient(145deg, #128a98, #17a2b8);
    border: none;
    height: 50px;
    border-radius: 25px;
    box-shadow: 3px 3px 6px #121212, -3px -3px 6px #3a3a3a;
    cursor: pointer;
}

.btn-info:hover {
    background: linear-gradient(145deg, #0f7a86, #149198);
}

.text-muted {
    color: #aaa;
    font-size: 14px;
}

.mdi {
    margin-right: 5px;
    vertical-align: middle;
}

.mdi-lock, .mdi-account-circle {
    font-size: 20px;
    color: #ddd;

}
.mt-3{
    padding:2px!important;
}

        </style>
    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-20"><b>Admin Log In</b></h4>
    
                        <div class="p-3">
     

                        <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group mb-3 row">
        <div class="col-12">
            <input class="form-control" id="username" name="username" type="text" required="" placeholder="Username">
        </div>
    </div>

    <div class="form-group mb-3 row">
        <div class="col-12">
            <input class="form-control" id="password" name="password" type="password" required="" placeholder="Password">
        </div>
    </div>

    <div class="form-group mb-3 text-center row mt-3 pt-1">
        <div class="col-12">
            <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
        </div>
    </div>

    <div class="form-group mb-0 row mt-2">
        <div class="col-sm-7 mt-3">
            <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i>Reset Pass</a>
        </div>
        <div class="col-sm-5 mt-3">
            <a href="{{ route('register') }}" class="text-muted"><i class="mdi mdi-account-circle"></i>New User</a>
        </div>
    </div>
</form>

                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('backend/assets/js/app.js') }}"></script>

         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

    </body>
</html>
