<!doctype html>
<html lang="en">

<head>
    <title>Login Perpustakaan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/png" href="{{asset('img/icon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('login/css/style.css')}}">

</head>

<body class="img js-fullheight" style="background-image: url({{asset('login/images/bg.jpg')}}); ">
    <div></div>
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                @if(Session::has('status'))
                <div class="alert alert-warning" role="alert">
                    {{Session::get('message')}}
                </div>
                @endif
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login Perpustakaan Unilak</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <form action="" class="signin-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="Password"
                                    required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Login</button>
                            </div>
                            <div class="form-group">
                                <a href="/" class="form-control btn btn-primary submit px-3">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('login/js/jquery.min.js')}}"></script>
    <script src="{{asset('login/js/popper.js')}}"></script>
    <script src="{{asset('login/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login/js/main.js')}}"></script>

</body>

</html>