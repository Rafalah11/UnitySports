<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile {{ $user->fullname }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Roboto, sans-serif;
        }
        
        #profileImage {
            width: 34vw;
            height: auto;
            position: absolute; 
            border-radius: 500px;
            left: 2vw;
            top: 28vh;
        }
        
        .hidden-file-input {
            display: none;
        }

        .edit-profile-btn {
            width: 100%;
            border: 2px #FF7008 solid;
            height: 53px;
            background: #FF7008;
            border-radius: 5px;
            text-align: center;
            transition: background-color 1.2s, color 1.2s;
        }

        .edit-profile-btn:hover {
            background-color: white;
            color: #FF7008;
            border: 2px #FF7008 solid;
        }

        .edit-profile-btn span {
            color: white;
            font-size: 30px;
            font-weight: 600;
            line-height: 56px;
            transition: color 1.0s;
        }

        .edit-profile-btn:hover span {
            color: #FF7008;
            
        }

        .back-button {
            width: 25vw; 
            height: 56px; 
            position: absolute; 
            background: white; 
            border-radius: 5px; 
            border: 2px #FF7008 solid;
            cursor: pointer;
            transition: background-color 1.2s ease, color 1.2s ease;
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

        .icon-text-container {
            display: flex;
            align-items: center;
            border-radius: 9px;
            width: fit-content;
            height: fit-content;
            padding: 5px;
            box-sizing: border-box;
            position: absolute;
        }

        .icon {
            width: 56px;
            height: 53px;
            margin-right: 10px;
        }

        .text {
            color: #1C1C1C;
            font-size: 24px;
            font-family: Roboto;
            font-weight: 500;
            word-wrap: break-word;
        }

        .profile-section {
            position: absolute;
            background: white;
            border-radius: 15px;
            border: 4px #858585 solid;
            width: 50vw;
            padding: 20px;
        }

        .profile-section h3 {
            font-size: 26px;
            font-weight: 600;
            margin: 0;
        }

        .profile-section p {
            color: #858585;
            font-size: 24px;
            font-weight: 500;
            margin: 5px 0 0;
        }

        @media (max-width: 600px) {
            .icon-text-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .text {
                margin-left: 0;
                margin-top: 5px;
            }

            #profileImage {
                width: 80vw;
                left: 10vw;
                top: 10vh;
            }

            .profile-section {
                width: 80vw;
                left: 10vw;
                top: 30vh;
            }
        }

        @media (min-width: 601px) {
            .profile-section.fullname { left: 38vw; top: 20vh; }
            .profile-section.address { left: 38vw; top: 40vh; }
            .profile-section.city { left: 38vw; top: 60vh; }
            .profile-section.birthdate { left: 38vw; top: 80vh; }
            .profile-section.gender { left: 38vw; top: 100vh; }
            .profile-section.role { left: 38vw; top: 120vh; }
        }

    </style>
</head>
<body>
    <div style="width: 100%; height: auto; position: relative; background: white">
        <div style="width: 100%; text-align: center; padding-top: 0px;">
            <h1 style="color: #1C1C1C; font-size: 55px; font-weight: 700;">Profile</h1>
            <hr style="border: 1px #858585 solid; width: 80%; margin: 20px auto;">
        </div>

        <img id="profileImage" src="{{ $user->image ? asset('storage/' .$user->image) : 'https://via.placeholder.com/389x503' }}" alt="Profile Image" />

        <div class="profile-section fullname">
            <h3>Full Name</h3>
            <p>{{ $user->fullname }}</p>
        </div>

        <div class="profile-section address">
            <h3>Address</h3>
            <p>{{ $user->address }}</p>
        </div>

        <div class="profile-section city">
            <h3>City</h3>
            <p>{{ $user->city }}</p>
        </div>

        <div class="profile-section birthdate">
            <h3>Place and Date of Birth</h3>
            <p>{{ $user->birthdate }}</p>
        </div>

        <div class="profile-section gender">
            <h3>Gender</h3>
            <p>{{ $user->gender }}</p>
        </div>

        <div class="profile-section role">
            <h3>Role</h3>
            <p>{{ $user->role }}</p>
        </div>

        <div style="width: 27.5vw; left: 38.5vw; top: 145vh; position: absolute; text-align: center;">
        <a href="/editprofile" style="text-decoration: none;">
            <div class="edit-profile-btn">
                <span>Edit Profile</span>
            </div>
        </a>
        </div>

        <div class="icon-text-container" style="left: 2vw; top: 110vh;">
            <img src="{{ asset('storage/a.png') }}" alt="WhatsApp Icon" class="icon">
            <div class="text">{{ $user->WA }}</div>
        </div>

        <div class="icon-text-container" style="left: 2vw; top: 120vh;">
            <img src="{{ asset('storage/b.png') }}" alt="Instagram Icon" class="icon">
            <div class="text">{{ $user->IG }}</div>
        </div>

        <div class="icon-text-container" style="left: 2vw; top: 130vh;">
            <img src="{{ asset('storage/c.png') }}" alt="Facebook Icon" class="icon">
            <div class="text">{{ $user->FB }}</div>
        </div>

        <div class="icon-text-container" style="left: 2vw; top: 140vh;">
            <img src="{{ asset('storage/d.png') }}" alt="Gmail Icon" class="icon">
            <div class="text">{{ $user->gmail }}</div>
        </div>

        <div style="width: 180px; height: 55px; left: 67vw; top: 145vh; position: absolute;">
            <button class="back-button" onclick="window.location.href='/landingpageafterlogin'">
                <div class="back-button-text">Back</div>
            </button>
        </div>
    </div>
    <div style="width: 180px; height: 55px; left: 67vw; top: 155vh; position: absolute;">
    @include('sweetalert::alert')
</body>
</html>
