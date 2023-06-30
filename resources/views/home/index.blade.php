<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for styling */
        .btn-group-vertical .btn {
            margin-bottom: 10px;
        }
    </style>
    <title>Home</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Website</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Vendor Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Developer Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Client Sign In</a>
                </li>
            </ul>
        </div> -->
    </nav>
    <div class="container">

        <div class="row mt-3">
            <div class="col-md-6">
                <h1>Welcome to the Website</h1>
                <p>Choose an option to sign in:</p>
                <div class="btn-group-vertical">
                    <a href="{{url('/login')}}" type="button" class="btn btn-primary">Login</a>
                    <a href="{{url('/register?type=agency')}}" type="button" class="btn btn-secondary">Vendor Sign Up</a>
                    <a href="{{url('/register?type=developer')}}" type="button" class="btn btn-secondary">Developer Sign Up</a>
                    <a href="{{url('/register?type=client')}}" type="button" class="btn btn-secondary">Client Sign Up</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
