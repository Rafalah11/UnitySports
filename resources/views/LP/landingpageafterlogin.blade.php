<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing Page</title>
    <style>
        /* CSS untuk transisi gambar yang halus */
        #bolaBasket {
            transition: opacity 1s ease-in-out;
        }

        *, html{
        padding: 0;
        margin: 0;
        box-sizing: border-box
    }

        body {
            margin: 0; /* Menghapus margin default dari body */
            overflow-x: hidden;
            background: #121212 no-repeat center center fixed; /* Atur background dan tetapkan ke tengah */
            background-size: cover; /* Sesuaikan background agar sesuai dengan ukuran halaman */
        }

        nav{
        background-color: #121212;  
        display: flex;
        justify-content: space-between;
        padding : 3rem 9rem;
    }

    nav div img{
        width: 100px;
        border:1px solid white;
        position: absolute;
        top:14px;
        left: 10px;
    }

    nav ul{
        display: flex;
        align-items: center; 
        list-style:none;
        gap: 5rem;
    }

    nav ul li a{
        text-decoration: none;
        font-family : "Segoe UI", Tahoma;
        color : white;
        font-weight: 600;
        padding: 5px 0;
        transition: all;
        transition-duration: 2000ms;
    }

    nav ul li a:hover {
        border-bottom: 1px solid black;
    }


            /* untuk hi (username) */
    .dropdown {
        position: relative;
        display: inline-block;
        
     }

        .username-container {
        background: #FE7C45;
        padding: 5px 25px;
        border-radius: 55px;
        color: black; 
        display: inline-block;
        position: relative;
        z-index: 10;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #000000;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }

        .dropdown:hover .dropdown-content {
        display: block; 
        z-index: 1;
        }

        .dropdown-content a {
        color: white; 
        padding: 12px 5px;
        text-decoration: none;
        display: block;
        
        }

         .dropdown-content a:hover {
        background-color: #000000; 
        }

        /* untuk hi (username) sampai sini */
        .container {
    width: 100%;
    max-width: 1916px;
    height: auto;
    position: absolute;
    top: 500px;
}

.overlay {
    width: 100%;
    max-width: 1916px;
    height: auto;
    position: absolute;
    top: 200px;
    left: 0;
}

.background {
    width: 100%;
    max-width: 1916px;
    height: 427px;
    background: black;
    position: absolute;
    top: 0;
    left: 0;
}

.text {
    width: 400px;
    height: 53px;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    top: 197px;
    opacity: 0.50;
    color: #E3EDFF;
    font-size: 17px;
    font-weight: 500;
    word-wrap: break-word;
    text-align: justify;
}

.nav-links {
    width: 421px;
    height: 24px;
    padding-top: 3px;
    padding-bottom: 3px;
    position: absolute;
    left: 50%;
    transform: translateX(-48%);
    top: 310px;
    display: inline-flex;
    justify-content: space-around;
    align-items: flex-start;
    gap: 20px;
}

.nav-item {
    color: #E3EDFF;
    font-size: 17px;
    font-weight: 500;
    opacity: 0.50;
}

.icons {
        width: 178.24px;
        height: 29.27px;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 360px;
    }

    .icon-part1 {
      width: 50px;
      height: 50px;
        position: absolute;
        left: 0;
        top: 0px;
    }

    .icon-part1 img {
      width: 50px;
      height: 50px;
        display: block; 
    }

    .icon-part2 {
      width: 50px;
      height: 50px;
        position: absolute;
        left: 76.48px;
        top: 0px;
    }

    .icon-part2 img {
      width: 50px;
      height: 50px;
        display: block; 
    }

    .icon {
        width: 50px;
        height: 50px;
        position: absolute;
        left: 148.97px;
        top: 0px;
    }

    .icon img {
        width: 50px;
        height: 50px;
        position: absolute;
    }

    .logo {
        width: 183.62px;
        height: 49.78px;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 209px;
        text-align: center;
        width: 100px;
        order:1px solid white;
    }

    .logo-text1 {
        color: white;
        font-size: 24px;
        font-family: 'Avenir', sans-serif;
        font-weight: 900;
        word-wrap: break-word;
    }

    .logo-text1 {
        width: 1000px;
        height: 23.95px;
        letter-spacing: 4.08px;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 140px;
    }

    .logo img {
      width: 100px;
            border:1px solid white;
            position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 6.65px;
    }9

    /* Responsive design */
    @media (max-width: 1200px) {
        .nav-links {
            width: 100%;
            padding: 0 20px;
            box-sizing: border-box;
            gap: 10px;
        }
    }

    @media (max-width: 768px) {
        .nav-links {
            flex-direction: column;
            align-items: center;
        }

        .icons {
            top: 300px;
        }
    }

    @media (max-width: 480px) {
        .text {
            width: 80%;
            font-size: 14px;
        }

        .nav-links {
            width: 100%;
        }

        .nav-item {
            font-size: 12px;
        }

        .icons {
            width: 80%;
            top: 320px;
        }

        .logo {
            width: 100%;
        }

        .logo-text1 {
            font-size: 18px;
        }

        .logo img {
            width: 30px;
            height: 30px;
        }


    }

    </style>
</head>
<body>
    
  <div style="width: 1170.47px; height: 485px; left: 9px; top: 113px; position: absolute">
    <div style="width: 1170.47px; height: 485px; left: 0px; top: 0px; position: absolute">
      <div style="width: 545.33px; height: 321.84px; left: 72.90px; top: 30px; position: absolute; transform: rotate(13.09deg); transform-origin: 0 0; background: rgba(255, 255, 255, 0.13); box-shadow: 105px 105px 105px; filter: blur(90px)"></div>
      <div style="width: 302px; height: 164px; left: 830px; top: 106.75px; position: absolute; transform: rotate(-20.70deg); transform-origin: 0 0; background: rgba(255, 255, 255, 0.09); box-shadow: 105px 105px 105px; filter: blur(105px)"></div>
    </div>
    <div style="width: 636px; height: 311px; left: 748px; top: 104px; position: absolute; text-align: justify">
      <span style="color: white; font-size: 35px; font-family: Montserrat; font-weight: 600; word-wrap: break-word">
      What is UNITY SPORTS ?<br/>
      </span>
      <span style="color: white; font-size: 25px; font-family: Montserrat; font-weight: 600; word-wrap: break-word">
        <br/>
      </span>
      <span style="color: white; font-size: 18px; font-family: Montserrat; font-weight: 600; word-wrap: break-word">
        <br/>
      </span>
      <span style="color: white; font-size: 18px; font-family: Montserrat; font-weight: 500; word-wrap: break-word;">
      Website "UNITY SPORTS" adalah platform yang dirancang untuk membantu orang yang ingin berolahraga tetapi tidak memiliki partner bermain. Pengguna dapat dengan mudah mencari dan menemukan partner atau komunitas untuk berbagai jenis olahraga sesuai dengan preferensi mereka. pengguna dapat meningkatkan produktivitas dalam berolahraga dengan menemukan partner atau komunitas bermain yang cocok, meningkatkan motivasi, dan membangun komunitas yang mendukung untuk mencapai tujuan kebugaran fisik.
       </span>
    </div>
    <img id="bolaBasket" style="width: 420px; height: 377px; left: 121px; top: 22px; position: absolute" src="{{ asset('storage/bolabasket.png') }}" onclick="changeImage()" />
  </div>

  <!-- NAVBAR PALING ATAS -->
  <nav>
        <div class="">
        </div>
        <ul>
            <li>
            <a href="{{ route('landingpageafterlogin') }}">Halaman Utama</a>
            </li>
            <li>
            <a href="{{ route('lapangan') }}">Daftar Lapangan</a>  
            </li>
            <li>
            <a href="{{ route('agenda') }}">Daftar Kegiatan Komunitas</a>
            </li>
            <li><a href="{{ route('a') }}">Daftar Membership</a></li>
            <li>
            <div class="dropdown" >
            @if(Auth::check())
            <div class="username-container">{{ 'Hi, ' . ($user->fullname) }}</div>
            <div class="dropdown-content">
            <a href="{{ route('profile.show') }}">My Account</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    @else
        <button>
            <a href="{{ route('login') }}" style="color: inherit; text-decoration: none;">Login</a>
        </button>
    @endif
</div>  
          </li>
        </ul>
    </nav>
        <!-- NAVBAR PALING ATAS SAMPAI SINI -->

    </div>
  </div>
</div>

<div class="container">
        <div class="overlay">
            <div class="background"></div>
            <div class="text">"Platform komunitas yang menghubungkan orang-orang yang ingin berolahraga bersama dan menyediakan informasi lengkap bagi mereka yang ingin memulai aktivitas olahraga."</div>
            <div class="nav-links">
                <div class="nav-item">Кontak Kami :</div>
            </div>
                <div class="icons">
                <div class="icon-part1">
                  <a href="">
                  <img src="{{ asset('storage/d.png') }}" alt="Icon">
                  </a>
                </div>
                <div class="icon-part2">
                  <a href="">
                <img src="{{ asset('storage/b.png') }}" alt="Icon-part2">
                </a>  
                </div>
                <div class="icon">
                  <a href="https://wa.me/+6285748444633?text=Hello%20there!">
                    <img src="{{ asset('storage/whatsapp.png') }}" alt="Icon">
                    </a>
                  </div>
            </div>
        </div>
        <div class="logo">
            <div class="logo-text1">UNITY SPORTS</div>
            <img src="{{ asset('storage/LogoBIR.jpg') }}" alt="LOGO">
        </div>
    </div>

<script>
  var currentImage = 0;
  var images = [
    '{{ asset('storage/bolabasket.png') }}',
    '{{ asset('storage/kock.png') }}',
    '{{ asset('storage/futsal.png') }}'
  ];

  function changeImage() {
    var img = document.getElementById('bolaBasket');
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
