<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .bg-maroon {
            background-color: #800000;
        }
        .card {
            background-color: #1e1e1e;
            border: 1px solid #333;
            color: #ffffff;
        }
        .form-label {
            color: #ffffff;
        }
        .form-check-label {
            color: #ffffff;
        }
        .form-control {
            background-color: #2c2c2c;
            color: #ffffff;
            border: 1px solid #555;
        }
        .form-control:focus {
            background-color: #2c2c2c;
            color: #ffffff;
            border-color: #800000;
            box-shadow: 0 0 0 0.2rem rgba(128, 0, 0, 0.25);
        }
        .btn-maroon {
            background-color: #800000;
            color: #ffffff;
        }
        .btn-maroon:hover {
            background-color: #a00000;
        }
        a {
            color: #ffffff;
        }
        a:hover {
            color: #ffcccc;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header text-center bg-maroon">
                    <h4 class="text-white">Sign In</h4>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('signin') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        <button type="submit" class="btn btn-maroon w-100">Sign In</button>

                        <div class="mt-3 text-center">
                            <a href="{{ route('signup.form') }}">Belum punya akun? Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
