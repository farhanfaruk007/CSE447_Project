<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Register | Admin </title>
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
    <style>
        /* Add your custom CSS styles here */
        /* Ensure proper styling for the new fields */
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
                            <!-- Add your logo or branding here -->
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-20"><b>Register</b></h4>

                    <div class="p-3">

                        <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="name" type="text" name="name" required="" placeholder="Name">
                                </div>
                            </div>

                            <!-- Username -->
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="username" type="text" name="username" required="" placeholder="UserName">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="email" type="email" name="email" required="" placeholder="Email">
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="password" type="password" name="password" required="" placeholder="Password">
                                </div>
                            </div>

                            <!-- Password Confirmation -->
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required="" placeholder="Password Confirmation">
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="date_of_birth" type="date" name="date_of_birth" required="" placeholder="Date of Birth">
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="address" type="text" name="address" required="" placeholder="Address">
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" id="phone_number" type="text" name="phone_number" required="" placeholder="Phone Number">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>

                            <!-- Already have account? -->
                            <div class="form-group mt-2 mb-0 row">
                                <div class="col-12 mt-3 text-center">
                                    <a href="{{ route('login') }}" class="text-muted">Already have an account?</a>
                                </div>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>
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

</body>

</html>
