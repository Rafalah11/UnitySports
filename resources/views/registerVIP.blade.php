<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #gambarlogin {
            transition: opacity 1s ease-in-out;
            transform: translate(100px, 100px);
        }

        body {
            margin: 0;
            overflow: hidden;
            background: #121212 no-repeat center center fixed;
            background-size: cover;
        }

        .move-group {
          transform: translate(-100px, 120px);
        }

        input {
            padding: 10px;
            background: rgba(217, 217, 217, 0);
            border-radius: 13px;
            border: 0.70px white solid;
            color: white;
            font-size: 20px;
            font-family: Montserrat;
            font-weight: 500;
        }

        .login-btn {
            width: 100%;
            height: 36px;
            background: rgba(254, 124, 69, 0.69);
            border-radius: 13px;
            border: 0.50px white solid;
            color: white;
            font-size: 20px;
            font-family: Montserrat;
            cursor: pointer;
            position: relative;
        }

        @media (max-width: 768px) {
            .move-group {
                transform: translateX(0) translateY(100);
                text-align: center;
            }
        }
    </style>
</head>
<body>
                  <!-- Login Form -->
                  @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                
                <div class="container-fluid" style="height: 10vh;">
        <div class="row h-100">
            <div class="col-lg-8 col-md-7 col-sm-12 p-0 d-none d-md-block">
                <div style="width:100vh; height: 80vh;">
                    <img id="gambarlogin" class="img-fluid h-100" src="{{ asset('storage/badminton.png') }}" alt="Login Image" />
                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 d-flex align-items-center justify-content-center">
                <div class="move-group">
                    <div class="text-white text-center mb-4" style="font-size: 30px; font-family: Montserrat; font-weight: 600;">Register Account</div>
                    
                    <form action="{{ route('register') }}" method="POST" class="w-100">
                        @csrf
                        <div class="form-group">
                            <label for="username" class="text-white" style="font-size: 22px; font-family: Montserrat; font-weight: 500;">Email or Username</label>
                            <input id="username" name="username" type="text" class="form-control" placeholder="Email address or user name" required />
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-white" style="font-size: 22px; font-family: Montserrat; font-weight: 500;">Password</label>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Password" required />
                        </div>
                        <div class="form-check">
                            <!-- <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label text-white" for="remember" style="font-size: 20px; font-family: Montserrat; font-weight: 600;">Remember me</label> -->
                        </div>
                        <div class="form-check mt-3">
                            <input type="checkbox" class="form-check-input" id="policy" name="policy" value="1">
                            <label class="form-check-label text-white" for="policy" style="font-size: 20px; font-family: Montserrat; font-weight: 600;">By continuing, you agree to the Terms of Use and Privacy Policy</label>
                        </div>
                        <button type="submit" onclick="register()" class="login-btn mt-4">Register</button>
                       </form>
                       <button class="login-btn mt-4 back-btn" onclick="navigateToLandingPage()">Back</button>
                    <div class="mt-4 w-100 border-top border-white"></div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function register() {
        var policyCheckbox = document.getElementById('policy');
        
        if (policyCheckbox.checked) {
            document.getElementById('registerForm').submit();
        }
        }

        function navigateToLandingPage() {
        window.location.href = "{{ route('landingpageNVIP') }}";
        }

        var currentImage = 0;
        var images = [
            '{{ asset('storage/badminton.png') }}',
            '{{ asset('storage/gawangfutsal.jpg') }}',
            '{{ asset('storage/ringbasket.jpg') }}'
        ];

        function changeImage() {
            var img = document.getElementById('gambarlogin');
            currentImage = (currentImage + 1) % images.length;
            img.style.opacity = 0;
            setTimeout(function() {
                img.src = images[currentImage];
                img.style.opacity = 1;
            }, 500); // 500ms is the duration of the fade-out
        }

        // Change image every 6 seconds
        setInterval(changeImage, 6000);
    </script>
    @include('sweetalert::alert')
</body>
</html>
