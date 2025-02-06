<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>

    *, html{
        padding: 0;
        margin: 0;
        box-sizing: border-box
    }

    body{
            margin: 0;
            overflow-x: hidden;
            background: #121212 no-repeat center center fixed;
            background-size: cover;
            font-family: Montserrat, sans-serif;
            color: white;
    }
    
    nav{
        background-color: black;  
        display: flex;
        justify-content: space-between;
        padding : 1rem 2rem;
    }

    nav div img{
        width: 90px;
        border:1px solid white;
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

        /* Pencarian */
        .navbar {
            position: relative; /* Atur posisi relatif untuk navbar */
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #FE7C45;
            padding: 10px 20px;
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
        }
        .navbar form {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .navbar select, .navbar input[type="text"], .navbar button {
            padding: 5px;
            font-size: 16px;
            font-family: Montserrat, sans-serif;
            border: none;
            border-radius: 4px;
        }
        .navbar input[type="text"] {
            width: 200px;
        }
        .navbar button {
            background-color: white;
            color: #FE7C45;
            cursor: pointer;
        }

        .navbar .image-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        .navbar img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            transition: transform 0.3s ease;
        }
        .navbar .text-overlay {
            position: absolute;
            white-space: nowrap;
            top: 50%;
            left: 50%;
            transform: translate(-80%, -50%);
            color: white;
            font-size: 18px;
            font-weight: bold;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        .navbar .text-overlay img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-85%, -60%);
            width: 40px;
            height: 40px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .navbar .image-container:hover img:first-child {
            opacity: 0;
        }
        .navbar .image-container:hover img:last-child {
            opacity: 1;
        }
        .navbar .image-container:hover .text-overlay {
            opacity: 1;
        }
        .navbar .image-container:hover .text-overlay span {
            display: inline-block;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.5s forwards;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(1) {
            animation-delay: 0.1s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(2) {
            animation-delay: 0.2s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(3) {
            animation-delay: 0.3s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(4) {
            animation-delay: 0.4s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(5) {
            animation-delay: 0.5s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(6) {
            animation-delay: 0.6s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(7) {
            animation-delay: 0.7s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(8) {
            animation-delay: 0.8s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(9) {
            animation-delay: 0.9s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(10) {
            animation-delay: 1.0s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(11) {
            animation-delay: 1.1s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(12) {
            animation-delay: 1.2s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(13) {
            animation-delay: 1.3s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(14) {
            animation-delay: 1.4s;
        }
        .navbar .image-container:hover .text-overlay span:nth-child(15) {
            animation-delay: 1.5s;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        /* Pencarian sampai sini */

        /* PILIHAN OLAHRAGA */
        .bar {
            width: 100%;
            height: 50px;
            text-align: center;
            line-height: 50px;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .bar form {
            display: inline-block;
        }
        .bar select {
            padding: 5px;
            font-size: 16px;
            font-family: Montserrat, sans-serif;
            background-color: white;
            color: black;
            border: none;
            border-radius: 4px;
        }
        /* PILIHAN OLAHRAGA SAMPAI SINI */

        /* FRAME KEGIATAN KOMUNTAS */
        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 40px;
            padding: 20px;
        }
        .frame {
            width: 339px;
            height: 506px;
            background: white;
            border-radius: 9px;
            position: relative;
            margin-bottom: 20px;
        }
        .frame img {
            width: 312px;
            height: 292px;
            margin: 44px auto 0 auto;
            display: block;
            border-radius: 15px;
        }
        
        .frame .provinsi {
        position: absolute; /* Atur posisi absolut untuk provinsi */
        top: 8px; /* Atur jarak dari atas */
        left: 20%; /* Pusatkan horizontal ke tengah */
        transform: translateX(-50%); /* Geser ke kiri 50% dari lebar sendiri */
        color: black;
        font-size: 18px; /* Ubah ukuran font jika perlu */
        font-weight: 500;
        padding: 5px 10px; /* Atur padding sesuai kebutuhan */
        border-radius: 5px; /* Atur sudut border-radius */
    }


    .frame .content {
        position: relative; /* Tambahkan posisi relatif kembali untuk content */
        padding: 20px;
    }

    .frame .content .nama_komunitas {
        color: black;
        font-size: 19px;
        font-weight: 500;
        margin-top: 0px;
    }
    .frame .content .pilihan_olahraga {
        color: black;
        font-size: 20px;
        font-weight: bold;
        margin-top: 0px;
    }
    .frame .content .level {
        color: black;
        font-size: 19px;
        font-weight: 500;
        margin-top: 0px;
    }
    .frame .content .keterangan_harga{
        color: black;
        font-size: 20px;
        font-weight: 500;
        margin-top: 20px;
    }
    .frame .content .nama_lapangan {
        color: black;
        font-size: 24px;
        font-weight: 600;
        margin-top: 10px;
    }
    .frame .content .harga {
        color: black;
        font-size: 24px;
        font-weight: 600;
        margin-top: 1px;
    }
    .frame .content .provinsi {
        color: black;
        font-size: 24px;
        font-weight: 600;
        margin-top: 10px;
    }
    .frame .content .kabupaten {
        color: black;
        font-size: 24px;
        font-weight: 600;
        margin-top: 10px;
    }
    .frame .content .adress {
        color: black;
        font-size: 24px;
        font-weight: 600;
        margin-top: 10px;
    }
    .frame .content .tanggal {
        color: black;
        font-size: 24px;
        font-weight: 600;
        margin-top: 10px;
    }
    .frame .content .waktu_mulai {
        color: black;
        font-size: 24px;
        font-weight: 600;
        margin-top: 10px;
    }
    .frame .content .waktu_selesai {
        color: black;
        font-size: 24px;
        font-weight: 600;
        margin-top: 10px;
    }

    .frame .button {
        width: 284px;
        height: 40px;
        position: absolute;
        top:108px;
        left:30px;
        background: #FE7C45;
        color: white;
        font-size: 22px;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 40px auto 0 auto;
        border-radius: 5px;
        cursor: pointer;
    }
    .blur {
        filter: blur(5px);
    }
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }
    .modal-content {
        background: white;
        color: black;
        padding: 20px;
        border-radius: 10px;
        max-width: 600px;
        width: 80%;
    }
    .close-btn {
        background: #FE7C45;
        color: white;
        padding: 2px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        display: block;
        text-align: center;
    }
    .btn {
        width: 30%;
        background: #FE7C45;
        color: white;
        padding: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        display: block;
        text-align: center;
        position:absolute;
        left:220px;
        top:10px;
        font-size:12px;
    }

    .modal-content a {
        text-decoration: none;
    }
        /* FRAME KEGIATAN KOMUNITAS SAMPAI SINI  */


    </style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.button');
    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const frame = this.closest('.frame');
            showModal(frame);
        });
    });

    const imageContainer = document.querySelector('.image-container');
    const overlay = document.querySelector('.text-overlay');
    const originalImg = imageContainer.querySelector('img:first-child');
    const hoverImg = overlay.querySelector('img');

    // Mouse enter event
    imageContainer.addEventListener('mouseenter', function () {
        originalImg.style.opacity = '0';
        hoverImg.style.opacity = '1';

        // Trigger text animation
        overlay.classList.add('animate-text');
    });

    // Mouse leave event
    imageContainer.addEventListener('mouseleave', function () {
        originalImg.style.opacity = '1';
        hoverImg.style.opacity = '0';

        // Reset text animation
        overlay.classList.remove('animate-text');
        overlay.querySelectorAll('span').forEach(span => {
            span.style.opacity = '0';
            span.style.transform = 'translateY(20px)';
        });
    });
});

function showModal(frame) {
    const container = document.querySelector('.container');
    container.classList.add('blur');

    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.innerHTML = `
        <div class="modal-content">
            <div class="nama_komunitas">nama komunitas : ${frame.querySelector('.nama_komunitas').innerHTML}</div>
            <div class="pilihan_olahraga">Jenis Olahraga : ${frame.getAttribute('pilihan_olahraga')}</div>
            <div class="level">Level: ${frame.getAttribute('data-level')}</div>
            <div class="harga">Harga : ${frame.querySelector('.harga').innerHTML}</div>
            <div class="keterangan_harga">Keterangan Harga: ${frame.getAttribute('data-keterangan_harga')}</div>
            <div class="nama_lapangan">Nama Lapangan: ${frame.getAttribute('data-nama_lapangan')}</div>
            <div class="provinsi">Provinsi: ${frame.getAttribute('data-provinsi')}</div>
            <div class="kabupaten">Kabupaten: ${frame.getAttribute('data-kabupaten')}</div>
            <div class="adress">Alamat: ${frame.getAttribute('data-alamat')}</div>
            <div class="kontak">Kontak: ${frame.getAttribute('data-kontak')}</div>
            <div class="tanggal">Tanggal: ${frame.getAttribute('data-tanggal')}</div>
            <div class="waktu_mulai">Waktu Mulai: ${frame.getAttribute('data-waktu_mulai')}</div>
            <div class="waktu_selesai">Waktu Selesai: ${frame.getAttribute('data-waktu_selesai')}</div>

            <button class="close-btn">Tutup</button>
        </div>
    `;
    document.body.appendChild(modal);

    // Event listener for closing modal
    modal.addEventListener('click', function () {
        container.classList.remove('blur');
        modal.remove();
    });
    modal.querySelector('.close-btn').addEventListener('click', function () {
        container.classList.remove('blur');
        modal.remove();
    });
}

// Function to submit the form and save the selected value in localStorage
function submitForm() {
    const selectedSport = document.querySelector('select[name="pilihan_olahraga"]').value;

    if (selectedSport !== 'all') {
        localStorage.setItem('selectedSport', selectedSport);
        document.getElementById('selectForm').submit();
    } else {
        // If "Semua" is selected, redirect directly to agenda page
        window.location.href = '{{ route('agenda') }}'; // Replace 'agenda' with appropriate route name
    }
}

// Function to set the dropdown value based on localStorage
function setDropdownValue() {
    const selectedSport = localStorage.getItem('selectedSport');
    if (selectedSport) {
        document.querySelector('select[name="pilihan_olahraga"]').value = selectedSport;
    }
}

// Set the dropdown value when the page loads
document.addEventListener('DOMContentLoaded', setDropdownValue);

// Clear the selectedSport from localStorage when the page loads
document.addEventListener('DOMContentLoaded', function() {
    localStorage.removeItem('selectedSport');
});
</script>
</head>
<body>


    <nav>
        <div class="">
                <img src="{{ asset('storage/LogoBIR.jpg') }}" alt="LOGO">
        </div>
        <ul>
        <li>
            <a href="{{ route('landingpageafterlogin') }}">Home</a>
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

    <!-- Form Pencarian -->
<div class="navbar">
    <form id="searchForm" method="POST" action="{{ route('searchByProvince') }}">
        @csrf
        <input type="text" name="provinsi" placeholder="Cari berdasarkan Provinsi">
        <!-- Add hidden input to store selected sport value -->
        <input type="hidden" name="pilihan_olahraga" value="{{ $pilihan_olahraga ?? 'all' }}">
        <button type="submit">Cari</button>
    </form>
    <div class="image-container">
        <a href="{{ route('formagenda') }}">
            <img src="{{ asset('storage/tandaplus.png') }}" alt="Image">
            <div class="text-overlay">
                <span><img src="{{ asset('storage/tandaplus.png') }}" alt="Image"></span>
                <span>T</span><span>a</span><span>m</span><span>b</span><span>a</span><span>h</span> <span>k</span><span>e</span><span>g</span><span>i</span><span>a</span><span>t</span><span>a</span><span>n</span>
            </div>
        </a>
    </div>
</div>


<!-- Berdasarkan Pilihan Olahraga -->
<div class="bar">
    Pilih Olahraga yang Anda Inginkan:
    <form id="selectForm" method="POST" action="{{ route('searchBySport') }}">
        @csrf
        <select name="pilihan_olahraga" onchange="submitForm()">
            <option value="all">Semua</option>
            <option value="BADMINTON">BADMINTON</option>
            <option value="BASKET">BASKET</option>
            <option value="FUTSAL">FUTSAL</option>
            <option value="MINI SOCCER">MINI SOCCER</option>
            <option value="SEPAK BOLA">SEPAK BOLA</option>
        </select>
    </form>
</div>

<!-- Frame komunitas -->
<div class="container">
    @foreach ($agendas as $agenda)
        <div class="frame" 
        data-gambar="{{ $agenda->gambar }}"
        data-kontak="{{ $agenda->kontak }}" data-level="{{ $agenda->level }}" 
        data-alamat="{{ $agenda->alamat }}" pilihan_olahraga="{{ $agenda->pilihan_olahraga }}" 
        data-keterangan_harga="{{ $agenda->keterangan_harga }}" data-kabupaten="{{ $agenda->nama_kabupaten }}" 
        data-waktu_mulai="{{ $agenda->waktu_mulai }}" data-waktu_selesai="{{ $agenda->waktu_selesai }}" 
        data-tanggal="{{ $agenda->tanggal }}" data-nama_lapangan="{{ $agenda->nama_lapangan }}"
        data-provinsi="{{ $agenda->provinsi }}">
            <div class="provinsi">{{ $agenda->provinsi }}</div>
            <a href="https://wa.me/{{ $agenda->kontak }}?text=Hello%20there!">
            <button class="btn" id="whatsappButton">Hubungi</button>
            </a>
            <div class="image">
            <img src="{{ url($agenda->gambar) }}" alt="Gambar Agenda">
            </div>
            <div class="content">
                <div class="nama_komunitas">{{ $agenda->nama_komunitas }}</div>
                <div class="pilihan_olahraga">{{ $agenda->pilihan_olahraga }}</div>
                <div class="level">{{ $agenda->level }}</div>
                <div class="harga">Rp. {{ number_format($agenda->harga, 0, ',', '.') }}</div>
                <div class="button">Selengkapnya</div>
            </div>
        </div>
    @endforeach
</div>
@include('sweetalert::alert')
</body>
</html>