<?php
$host = 'localhost'; // Sesuaikan dengan host Anda
$dbname = 'kbt'; // Nama database Anda
$username = 'root'; // Username database
$password = ''; // Password database

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Tidak dapat terhubung ke database: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Komunitas</title>
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
            overflow:auto;
            overflow-x: auto;
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
            gap: 20px;
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
        font-size: 22px;
        font-weight: 500;
        margin-top: 20px;
    }
    .frame .content .harga {
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

    .frame .button {
        width: 284px;
        height: 40px;
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
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        display: block;
        text-align: center;
    }
        /* FRAME KEGIATAN KOMUNITAS SAMPAI SINI  */


                /* TABEL JUMLAH LAPANGAN */

                .tabel_lapangan {
    width: 100%;
    overflow-x: auto;
    margin-top:250px;
}

.responsive-table {
    width: 100%;
    border-collapse: collapse;
    
}

.responsive-table th, .responsive-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.responsive-table th {
    background-color: #FE7C45;
}


.btn-edit, .btn-delete, .btn-tambah {
    padding: 6px 12px;
    margin-right: 5px;
    cursor: pointer;
}

.btn-edit {
    background-color: #4CAF50;
    color: white;
    border: none;
    margin-right: 10px; 
}

.btn-delete {
    background-color: #f44336;
    color: white;
    border: none;
    margin-left: 5px; 
}


.btn-tambah {
    margin-top: 10px;
    padding: 8px 16px;
    background-color: #008CBA;
    color: white;
    border: none;
    cursor: pointer;
}

.btn-tambah:hover, .btn-edit:hover, .btn-delete:hover {
    opacity: 0.8;
}

@media screen and (max-width: 600px) {
    .responsive-table {
        overflow-x: auto;
        display: block;
        white-space: nowrap;
    }
    .responsive-table thead, .responsive-table tbody, .responsive-table th, .responsive-table td, .responsive-table tr {
        display: block;
    }
    .responsive-table td, .responsive-table th {
        height: 35px;
    }
    .responsive-table thead {
        float: left;
    }
    .responsive-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        white-space: nowrap;
        float: left;
    }
    .responsive-table td, .responsive-table th {
        border-bottom: 1px solid #ddd;
    }
    .responsive-table td:nth-child(1), .responsive-table th:nth-child(1) {
        background-color: #f2f2f2;
    }
    .responsive-table tr {
        display: inline-block;
        vertical-align: top;
    }
    .btn-edit, .btn-delete, .btn-tambah {
        float: right;
    }
    .btn-tambah {
        width: 100%;
        padding: 8px 16px;
        margin-top: 10px;
        background-color: #008CBA;
        color: white;
        border: none;
        cursor: pointer;
    }
    .btn-tambah:hover, .btn-edit:hover, .btn-delete:hover {
        opacity: 0.8;
    }
}


.modal2 {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: black;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    max-width: 80%;
    max-height: 80%;
    overflow-y: auto; 
}

.modal2-content {
    margin: auto;
    text-align: left;
}
.blur {
    filter: blur(5px);
}
.close-btn {
    margin-top: 20px;
}

.button-btn {
    background-color: #007bff;
    padding: 10px 15px;
    color: white;
    border: none;
    margin-right: 10px; 
}
.head {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    text-align:center;
    background-color:#8c4501;
}
    </style>


<div class="modal2">
    <div class="modal2-content">
        <span class="close-btn">Tutup</span>
        <p><span class="nama_komunitas"></span></p>
        <p><span class="pilihan_olahraga"></span></p>
        <p><span class="level"></span></p>
        <p><span class="harga"></span></p>
        <p><span class="keterangan_harga"></span></p>
        <p><span class="nama_lapangan"></span></p>
        <p><span class="provinsi"></span></p>
        <p><span class="nama_kabupaten"></span></p>
        <p><span class="alamat"></span></p>
        <p><span class="kontak"></span></p>
        <p><span class="tanggal"></span></p>
        <p><span class="waktu_mulai"></span></p>
        <p><span class="waktu_selesai"></span></p>
        <p>GAMBAR LAPANGAN :</p>
        <p><img src="" alt="Gambar" class="gambar" style="width: 350px; height: auto;"></p>        
        <p><span class="updated_at"></span></p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.button-btn');
    const modal = document.querySelector('.modal2');
    const closeBtn = document.querySelector('.close-btn');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            modal.querySelector('.nama_komunitas').textContent = 'Nama Komunitas: ' + button.getAttribute('data-nama_komunitas');
            modal.querySelector('.pilihan_olahraga').textContent = 'Pilihan Olahraga: ' + button.getAttribute('data-pilihan_olahraga');
            modal.querySelector('.harga').textContent = 'Harga: ' + button.getAttribute('data-harga');
            modal.querySelector('.level').textContent = 'Level: ' + button.getAttribute('data-level');
            modal.querySelector('.alamat').textContent = 'Alamat: ' + button.getAttribute('data-alamat');
            modal.querySelector('.kontak').textContent = 'Kontak: ' + button.getAttribute('data-kontak');
            modal.querySelector('.provinsi').textContent = 'Provinsi: ' + button.getAttribute('data-provinsi');
            modal.querySelector('.gambar').setAttribute('src', button.getAttribute('data-gambar'));
            modal.querySelector('.keterangan_harga').textContent = 'Keterangan Harga: ' + button.getAttribute('data-keterangan_harga');
            modal.querySelector('.tanggal').textContent = 'Tanggal: ' + button.getAttribute('data-tanggal');
            modal.querySelector('.waktu_mulai').textContent = 'Waktu Mulai: ' + button.getAttribute('data-waktu_mulai');
            modal.querySelector('.waktu_selesai').textContent = 'Waktu Selesai: ' + button.getAttribute('data-waktu_selesai');
            modal.querySelector('.nama_lapangan').textContent = 'Nama Lapangan: ' + button.getAttribute('data-nama_lapangan');
            modal.querySelector('.nama_kabupaten').textContent = 'Nama Kabupaten: ' + button.getAttribute('data-nama_kabupaten');
            modal.querySelector('.updated_at').textContent = 'Updated At: ' + button.getAttribute('data-updated_at');

            modal.style.display = 'block';
        });
    });

    closeBtn.addEventListener('click', function () {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});
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

// Function to show modal
function showModal(frame) {
    const container = document.querySelector('.container');
    container.classList.add('blur');

    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.innerHTML = `
        <div class="modal-content">
            <div class="nama_komunitas">nama komunitas : ${frame.querySelector('.nama_komunitas').innerHTML}</div>
            <div class="harga">Harga : ${frame.querySelector('.harga').innerHTML}</div>
            <div class="adress">Alamat: ${frame.getAttribute('data-alamat')}</div>
            <div class="kontak">Kontak: ${frame.getAttribute('data-kontak')}</div>
            <div class="level">Level: ${frame.getAttribute('data-level')}</div>
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
        window.location.href = '{{ route('komunitasadmin') }}'; 
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

    <!-- Bootstrap alert for VIP message -->
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <strong>Error:</strong> Mohon Maaf status anda belum VIP 🙏
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <nav>
        <div class="">
                <img src="{{ asset('storage/LogoBIR.jpg') }}" alt="LOGO">
        </div>
        <ul>
            <li>
            <a href="{{ route('landingpageadmin') }}">Home</a>
            </li>
            <li>
            <a href="{{ route('datavip') }}">Daftar User</a>
            </li>
            <li>
            <a href="{{ route('lapanganadmin') }}">Daftar Lapangan</a>    
            </li>
            <li>
            <a href="{{ route('komunitasadmin') }}">Daftar Kegiatan Komunitas</a>
            </li>
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
    <form id="searchForm" method="POST" action="{{ route('searchByProvincekomunitasadmin') }}">
        @csrf
        <input type="text" name="provinsi" placeholder="Cari berdasarkan Provinsi">
        <!-- Add hidden input to store selected sport value -->
        <input type="hidden" name="pilihan_olahraga" value="{{ $pilihan_olahraga ?? 'all' }}">
        <button type="submit">Cari</button>
    </form>
</div>


<!-- Berdasarkan Pilihan Olahraga -->
<div class="bar">
    Pilih Olahraga yang Anda Inginkan:
    <form id="selectForm" method="POST" action="{{ route('searchBySportkomunitasadmin') }}">
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

<div class="tabel_lapangan">
    <table class="responsive-table">
        <div class="head">TABEL KEGIATAN KOMUNITAS</div>
        <thead>
            <tr>
                <th>NO</th>
                <th>ID</th>
                <th>Nama Komunitas</th>
                <th>Olahraga</th>
                <th>Provinsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_POST['pilihan_olahraga']) || isset($_POST['provinsi'])) {
                $sql = "SELECT 
                            id, 
                            pilihan_olahraga, 
                            harga,
                            level, 
                            alamat, 
                            kontak, 
                            provinsi, 
                            gambar, 
                            nama_komunitas, 
                            remember_token, 
                            keterangan_harga, 
                            tanggal, 
                            waktu_mulai, 
                            waktu_selesai, 
                            nama_lapangan, 
                            nama_kabupaten,
                            updated_at
                        FROM agenda 
                        WHERE 1=1";

                if (isset($_POST['pilihan_olahraga']) && $_POST['pilihan_olahraga'] != 'all') {
                    $sql .= " AND pilihan_olahraga = :pilihan_olahraga";
                }
                if (isset($_POST['provinsi']) && !empty($_POST['provinsi'])) {
                    $sql .= " AND provinsi = :provinsi";
                }

                $stmt = $pdo->prepare($sql);

                if (isset($_POST['pilihan_olahraga']) && $_POST['pilihan_olahraga'] != 'all') {
                    $stmt->bindParam(':pilihan_olahraga', $_POST['pilihan_olahraga'], PDO::PARAM_STR);
                }
                if (isset($_POST['provinsi']) && !empty($_POST['provinsi'])) {
                    $stmt->bindParam(':provinsi', $_POST['provinsi'], PDO::PARAM_STR);
                }

                $stmt->execute();

                $counter = 1;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $counter++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama_komunitas']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['pilihan_olahraga']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['provinsi']) . "</td>";
                    echo "<td>";
                    echo "<button class='button-btn'  
                    data-pilihan_olahraga='" . htmlspecialchars($row['pilihan_olahraga']) . "'   
                    data-harga='" . htmlspecialchars($row['harga']) . "' 
                    data-level='" . htmlspecialchars($row['level']) ."'
                    data-alamat='" . htmlspecialchars($row['alamat']) . "'
                    data-kontak='" . htmlspecialchars($row['kontak']) . "'
                    data-provinsi='" . htmlspecialchars($row['provinsi']) . "'
                    data-gambar='" . htmlspecialchars($row['gambar']) . "'
                    data-nama_komunitas='" . htmlspecialchars($row['nama_komunitas']) . "'
                    data-keterangan_harga='" . htmlspecialchars($row['keterangan_harga']) . "'
                    data-tanggal='" . htmlspecialchars($row['tanggal']) . "'
                    data-waktu_mulai='" . htmlspecialchars($row['waktu_mulai']) . "'
                    data-waktu_selesai='" . htmlspecialchars($row['waktu_selesai']) . "'
                    data-nama_lapangan='" . htmlspecialchars($row['nama_lapangan']) . "'
                    data-nama_kabupaten='" . htmlspecialchars($row['nama_kabupaten']) . "'
                    data-updated_at='" . htmlspecialchars($row['updated_at']) . "'>Selengkapnya</button>";
                    echo "<form action='" . route('komunitas.destroy', ['id' => htmlspecialchars($row['id'])]) . "' method='POST' style='display: inline;'>";
                    echo csrf_field();
                    echo method_field('DELETE');
                    echo "<button type='submit' class='btn btn-delete'>Hapus</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                $stmt = $pdo->query("SELECT 
                                        id, 
                                        pilihan_olahraga, 
                                        harga,
                                        level, 
                                        alamat, 
                                        kontak, 
                                        provinsi, 
                                        gambar, 
                                        nama_komunitas, 
                                        remember_token, 
                                        keterangan_harga, 
                                        tanggal, 
                                        waktu_mulai, 
                                        waktu_selesai, 
                                        nama_lapangan, 
                                        nama_kabupaten,
                                        updated_at
                                    FROM agenda");

                $counter = 1;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $counter++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama_komunitas']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['pilihan_olahraga']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['provinsi']) . "</td>";
                    echo "<td>";
                    echo "<button class='button-btn' 
                    data-pilihan_olahraga='" . htmlspecialchars($row['pilihan_olahraga']) . "'     
                    data-harga='" . htmlspecialchars($row['harga']) . "' 
                    data-level='" . htmlspecialchars($row['level']) ."'
                    data-alamat='" . htmlspecialchars($row['alamat']) . "'
                    data-kontak='" . htmlspecialchars($row['kontak']) . "'
                    data-provinsi='" . htmlspecialchars($row['provinsi']) . "'
                    data-gambar='" . htmlspecialchars($row['gambar']) . "'
                    data-nama_komunitas='" . htmlspecialchars($row['nama_komunitas']) . "'
                    data-keterangan_harga='" . htmlspecialchars($row['keterangan_harga']) . "'
                    data-tanggal='" . htmlspecialchars($row['tanggal']) . "'
                    data-waktu_mulai='" . htmlspecialchars($row['waktu_mulai']) . "'
                    data-waktu_selesai='" . htmlspecialchars($row['waktu_selesai']) . "'
                    data-nama_lapangan='" . htmlspecialchars($row['nama_lapangan']) . "'
                    data-nama_kabupaten='" . htmlspecialchars($row['nama_kabupaten']) . "'
                    data-updated_at='" . htmlspecialchars($row['updated_at']) . "'>Selengkapnya</button>";
                    echo "<form action='" . route('komunitas.destroy', ['id' => htmlspecialchars($row['id'])]) . "' method='POST' style='display: inline;'>";
                    echo csrf_field();
                    echo method_field('DELETE');
                    echo "<button type='submit' class='btn btn-delete'>Hapus</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>


</div>
@include('sweetalert::alert')
</body>
</html>