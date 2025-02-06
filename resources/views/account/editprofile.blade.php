<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <style>
        body {
            overflow-x: hidden;
        }

input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number] {
    -moz-appearance: textfield;
}
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const input = document.querySelector('input[name="WA"]');

            // Membatasi panjang input
            input.addEventListener('input', function(e) {
                if (this.value.length > 15) {
                    this.value = this.value.slice(0, 15);
                }
            });

            // Mencegah perubahan nilai dengan tombol panah
            input.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowUp' || e.key === 'ArrowDown') {
                    e.preventDefault();
                }
            });
        });
    </script>

</head>
<body>
<div style="width: 1000px; height: 1117px; position: relative; background: white">

@if (session('success'))
        <div style="color: green; font-size: 20px; font-family: Roboto; font-weight: 600;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="color: red; font-size: 20px; font-family: Roboto; font-weight: 600;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div style="width: 1417px; height: 0px; left: 462px; top: 0px; position: absolute; transform: rotate(90deg); transform-origin: 0 0; border: 1px #858585 solid"></div>
        <div style="width: 232px; height: 53px; left: 596px; top: 33px; position: absolute; color: black; font-size: 45px; font-family: Roboto; font-weight: 600; word-wrap: break-word">Edit profile</div>

        <!-- Full Name -->

        <div style="width: 876px; height: 108px; left: 593px; top: 250px; position: absolute">
            <div style="width: 276.86px; left: 0px; top: -100px; position: absolute; color: #1C1C1C; font-size: 26px; font-family: Roboto; font-weight: 600; word-wrap: break-word">Full Name</div>
            <input type="text" name="fullname" maxlength="30" style="width: 876px; height: 70px; left: 0px; top: -55px; position: absolute; background: white; font-size: 28px; border-radius: 5px; border: 2px #858585 solid; font-family: Roboto; font-weight: 600;" placeholder="Full Name" value="{{ old('fullname', $user->fullname) }}" required>
        </div>


        <!-- Address -->
        <div style="width: 876px; height: 108px; left: 593px; top: 382px; position: absolute">
            <div style="width: 276.86px; left: 0px; top: -100px; position: absolute; color: #1C1C1C; font-size: 26px; font-family: Roboto; font-weight: 600; word-wrap: break-word">Address</div>
            <input type="text" name="address"  maxlength="100" style="width: 876px; height: 70px; left: 0px; top: -55px; position: absolute; background: white; font-size: 28px; border-radius: 5px; border: 2px #858585 solid; font-family: Roboto; font-weight: 600;" placeholder="Address" value="{{ $user->address }}" required>
        </div>

        <!-- City -->
        <div style="width: 876px; height: 108px; left: 593px; top: 514px; position: absolute">
            <div style="width: 276.86px; left: 0px; top: -100px; position: absolute; color: #1C1C1C; font-size: 26px; font-family: Roboto; font-weight: 600; word-wrap: break-word">City</div>
            <input type="text" name="city" maxlength="20" style="width: 876px; height: 70px; left: 0px; top: -55px; position: absolute; background: white; font-size: 28px; border-radius: 5px; border: 2px #858585 solid; font-family: Roboto; font-weight: 600;" placeholder="City" value="{{ $user->city }}" required>
        </div>

        <!-- Place and Date of Birth -->
        <div style="width: 876px; height: 108px; left: 593px; top: 646px; position: absolute">
            <div style="width: 276.86px; left: 0px; top: -100px; position: absolute; color: #1C1C1C; font-size: 26px; font-family: Roboto; font-weight: 600; word-wrap: break-word">Place and Date of Birth</div>
            <input type="text" name="birthplace" style="width: 400px; height: 70px; left: 0px; top: -55px; position: absolute; background: white; font-size: 28px; border-radius: 5px; border: 2px #858585 solid; font-family: Roboto; font-weight: 600;" placeholder="Birthplace" value="{{ $user->birthplace }}" required>
            <input type="date" name="birthdate" style="width: 400px; height: 70px; left: 420px; top: -55px; position: absolute; background: white; font-size: 28px; border-radius: 5px; border: 2px #858585 solid; font-family: Roboto; font-weight: 600;" value="{{ $user->birthdate }}" required>
        </div>

        <!-- Gender -->
        <div style="width: 405px; height: 108px; left: 593px; top: 778px; position: absolute">
            <div style="width: 300px; left: 0px; top: -100px; position: absolute; color: #1C1C1C; font-size: 26px; font-family: Roboto; font-weight: 600; word-wrap: break-word">Gender</div>
            <select name="gender" style="width: 400px; height: 70px; left: 0px; top: -55px; position: absolute; background: white; font-size: 28px; border-radius: 5px; border: 2px #858585 solid; font-family: Roboto; font-weight: 600;" required>
                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>

            </select>
        </div>

        <!-- WA -->
        <div style="width: 405px; height: 108px; left: 600px; top: 1080px; position: absolute">
            <div style="width: 300px; left: 0px; top: -100px; position: absolute; color: #1C1C1C; font-size: 26px; font-family: Roboto; font-weight: 600; word-wrap: break-word">Whatsapp</div>
            <input type="number" name="WA" maxlength="15" style="width: 400px; height: 70px; left: 0px; top: -55px; position: absolute; background: white; font-size: 28px; border-radius: 5px; border: 2px #858585 solid font-family: Roboto; font-weight: 600;"  placeholder="No Whatsapp" value="{{ $user->WA }}" required>
        </div>

        <!-- IG -->
        <div style="width: 405px; height: 108px; left: 1064px; top: 778px; position: absolute">
            <div style="width: 300px; left: 0px; top: -100px; position: absolute; color: #1C1C1C; font-size: 26px; font-family: Roboto; font-weight: 600; word-wrap: break-word">Instagram</div>
            <input type="text" name="IG"  style="width: 400px; height: 70px; left: 0px; top: -55px; position: absolute; background: white; font-size: 28px; border-radius: 5px; border: 2px #858585 solid font-family: Roboto; font-weight: 600;"  placeholder="Instagram" value="{{ $user->IG }}" >
        </div>


         <!-- FB -->
        <div style="width: 405px; height: 108px; left: 600px; top: 930px; position: absolute">
            <div style="width: 300px; left: 0px; top: -100px; position: absolute; color: #1C1C1C; font-size: 26px; font-family: Roboto; font-weight: 600; word-wrap: break-word">Facebook</div>
            <input type="text" name="FB" style="width: 400px; height: 70px; left: 0px; top: -55px; position: absolute; background: white; font-size: 28px; border-radius: 5px; border: 2px #858585 solid font-family: Roboto; font-weight: 600;"  placeholder="Facebook" value="{{ $user->FB }}">
        </div>

         <!-- gmail -->
        <div style="width: 405px; height: 108px; left: 1064px; top: 930px; position: absolute">
            <div style="width: 300px; left: 0px; top: -100px; position: absolute; color: #1C1C1C; font-size: 26px; font-family: Roboto; font-weight: 600; word-wrap: break-word">Gmail</div>
            <input type="text" name="gmail" style="width: 400px; height: 70px; left: 0px; top: -55px; position: absolute; background: white; font-size: 28px; border-radius: 5px; border: 2px #858585 solid font-family: Roboto; font-weight: 600;"  placeholder="Gmail" value="{{ $user->gmail }}">
        </div>

        <!-- Image Upload -->
        <div style="width: 876px; height: 108px; left: 1064px; top: 1080px; position: absolute">
            <div style="width: 276.86px; left: 0px; top: -100px; position: absolute; color: #1C1C1C; font-size: 26px; font-family: Roboto; font-weight: 600; word-wrap: break-word">Profile Picture</div>
            <input type="file" name="image" style="width: 400px; height: 70px; left: 0px; top: -55px; position: absolute; background: white; font-size: 28px; border-radius: 5px; border: 2px #858585 solid; font-family: Roboto; font-weight: 600;">
        </div>

        <!-- Button Cancel -->
        <div style="width: 180px; height: 55px; left: 593px; top: 1200px; position: absolute">
            <a href="{{ route('profile.show') }}">
                <div style="width: 180px; height: 55px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 5px; border: 2px #FF7008 solid"></div>
                <div style="left: 47px; top: 11px; position: absolute; color: #FF7008; font-size: 28px; font-family: Roboto; font-weight: 400; word-wrap: break-word">Cancel</div>
            </a>
        </div>

        <!-- Button Save -->
        <div style="width: 180px; height: 55px; left: 813px; top: 1200px; position: absolute">
             <button type="submit" style="width: 180px; height: 55px; left: 0px; top: 0px; position: absolute; background: #FF7008; border-radius: 5px; border: none; cursor: pointer;">
             <div style="left: 60px; top: 11px; position: absolute; color: white; font-size: 28px; font-family: Roboto; font-weight: 600; word-wrap: break-word">Save</div>
             </button>
        </div>
    </form>

    <!-- Profile Picture Display -->
    <img style="width: 389px; height: 653px; left: 33px; top: 136px; position: absolute; border-radius: 500px" src="{{ $user->image ? asset('storage/' . $user->image) : 'https://via.placeholder.com/389x653' }}" />

</div>
</body>
</html>
