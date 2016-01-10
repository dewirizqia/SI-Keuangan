
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Halaman Login SI Keuangan FT UNLAM</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{ asset('css/assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/assets/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/assets/css/form-elements.css') }}">
        <link rel="stylesheet" href="{{ asset('css/assets/css/style.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body style="background-image:url('{{ asset('css/assets/img/backgrounds/bg.jpg') }}'); background-size:cover">

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><b>Form Login</b></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                             <a class="navbar-brand" ><img src="{{asset('user/images/logo.png') }}" alt="" width="90" height="90"/></a>
                                 
                                    <h3>SI Keuangan FT UNLAM</h3>
                                    <p>Masukkan username dan password</p>

                                </div>
                               <br>
                                <div class="form-top-right">
                                    
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                                    @if (count($errors) > 0)
                                                        <div class="alert alert-danger">
                                                            <strong>Whoops!</strong> Sepertinya ada yang salah. <br><br>
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                
                                    
                                <form role="form" action="{{ url('/auth/login') }}" method="POST" class="login-form">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="name" placeholder="Username..." class="form-username form-control" id="form-username" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="remember"> Ingat Saya
                                    </div>
                                    <button type="submit" class="btn">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="{{ asset('css/assets/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('css/assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('css/assets/js/jquery.backstretch.min.js') }}"></script>
        <script src="{{ asset('css/assets/js/scripts.js') }}"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>

