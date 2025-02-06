<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        #gambarlogin {
            transition: opacity 1s ease-in-out;
        }

        body {
            margin: 0;
            overflow: hidden;
            background: #121212 no-repeat center center fixed;
            background-size: cover;
        }

        .move-group {
            transform: translateX(120px) translateY(-69px);
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

        .button {
            width: 450px;
            height: 53px; 
            display: inline-block;
            padding: 13px 24px;
            border-radius: 5px;
            background-color: white;
            transition: background-color 200ms ease, box-shadow 200ms ease;         
            letter-spacing: 0.5px;
            text-decoration: none;
            cursor: pointer;
            position: absolute;
            left: 147px;
            top: 430px;
            transition: background-color 1.2s ease, color 1.2s ease;
            border: 2px #FF7008 solid;
        }
        .button-text{
            color: #FF7008; 
            font-size: 28px; 
            font-family: Roboto; 
            font-weight: 400; 
            text-align: center;
            transition: color 1.0s ease;
        }

        .button:hover {
            background-color: #fe7c45;
        }

        .button:hover .button-text {
            color: white;
        }

        .alert {
            width: 424px;
            height: 20px;
            left: 147px;
            top: 400px;
            position: absolute;
            color: white;
            background-color: red;
            text-align: center;
            padding: 10px;
            border-radius: 13px;
            font-family: Montserrat;
            font-weight: 600;
        }

        .back-button {
            width: 450px;
            height: 53px; 
            background: white; 
            border-radius: 5px; 
            border: 2px #FF7008 solid;
            cursor: pointer;
            transition: background-color 1.2s ease, color 1.2s ease;
            position: absolute;
            bottom: 245px; 
            left: 267px; 
            z-index: 100;
        }

        .back-button-text {
            color: #FF7008; 
            font-size: 28px; 
            font-family: Roboto; 
            font-weight: 400; 
            text-align: center;
            transition: color 1.0s ease;
        }

        .back-button:hover {
            background-color: #fe7c45;
        }

        .back-button:hover .back-button-text {
            color: white;
        }

    </style>
</head>
<body>
  
<div style="width: 1261px; height: 860px; position: relative; background: #121212">
  <div style="width: 1099px; height: 704px; left: 220px; top: 10px; position: absolute">
    <div style="width: 1099px; height: 704px; left: 0px; top: 0px; position: absolute; background: #272626"></div>
    <img id="gambarlogin" style="width: 650px; height: 704px; left: 552px; top: 0px; position: absolute" src="{{ asset('storage/badminton.png') }}" />
  </div>
  <div class="move-group">
    <div style="width: 123px; height: 21px; left: 294px; top: 127px; position: absolute; color: white; font-size: 30px; font-family: Montserrat; font-weight: 600; word-wrap: break-word">Log in</div>


    <form id="login-form" action="{{ route('login') }}" method="POST">
        @csrf
        <div style="width: 424px; height: 83px; left: 147px; top: 173px; position: absolute">
            <div style="left: 0.13px; top: 0px; position: absolute; color: white; font-size: 22px; font-family: Montserrat; font-weight: 500; word-wrap: break-word">
                <label for="username">Email or Username</label>
                <input id="username" name="username" type="text" placeholder="Email address or user name" style="width: 424px; height: 40px; left: 0px; top: 43px; position: absolute;" autofocus required/>
            </div>
        </div>
        <div style="width: 424px; height: 82px; left: 147px; top: 291px; position: absolute">
            <div style="left: 1.13px; top: 0px; position: absolute; color: white; font-size: 22px; font-family: Montserrat; font-weight: 500; word-wrap: break-word">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Password" style="width: 424px; height: 39px; left: 0px; top: 43px; position: absolute;" />
            </div>
        </div>
        <button type="submit" class="button">
        <div class="button-text">Log in</div>
        </button>
    </form>
  </div>
</div>
<button class="back-button" onclick="window.location.href='/landingpageNVIP'">
                <div class="back-button-text">Back</div>
            </button>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
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
    }, 500);
  }

  setInterval(changeImage, 6000);

  // Add event listener to the login form
  document.getElementById('login-form').addEventListener('submit', function(event) {
    var button = document.querySelector('.button');
    button.textContent = 'Please wait...';
    button.disabled = true;
  });
</script>
@include('sweetalert::alert')
</body>
</html>
