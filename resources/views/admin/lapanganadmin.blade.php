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
    <title>Daftar Lapangan</title>
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

    .frame .content .nama_lapangan {
        color: black;
        font-size: 22px;
        font-weight: 500;
    }
    .frame .content .pilihan_olahraga {
        color: black;
        font-size: 22px;
        font-weight: bold;
        margin-top: 10px;
    }
    .frame .content .harga {
        color: black;
        font-size: 24px;
        font-weight: 400;
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
        margin: 8px auto 0 auto;
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

/* TABEL JUMLAH LAPANGAN SAMPAI SINI */
.head {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    text-align:center;
    background-color:#8c4501;
}
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

// Function to show modal
function showModal(frame) {
    const container = document.querySelector('.container');
    container.classList.add('blur');

    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.innerHTML = `
        <div class="modal-content">
            <div class="nama_lapangan">Nama Lapangan: ${frame.querySelector('.nama_lapangan').innerHTML}</div>
            <div class="pilihan_olahraga">Olahraga: ${frame.getAttribute('data-pilihan_olahraga')}</div>
            <div class="provinsi">Provinsi: ${frame.getAttribute('data-provinsi')}</div>
            <div class="kabupaten">Kabupaten: ${frame.getAttribute('data-kabupaten')}</div>
            <div class="adress">Alamat: ${frame.getAttribute('data-alamat')}</div>
            <div class="kontak">Kontak: ${frame.getAttribute('data-kontak')}</div>
            <div class="harga">Harga: ${frame.querySelector('.harga').innerHTML}</div>
            <div class="ketharga">Keterangan Harga: ${frame.getAttribute('data-ketharga')}</div>
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
        window.location.href = '{{ route('lapanganadmin') }}'; // Replace 'agenda' with appropriate route name
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
            <a href="{{ route('profile.showadmin') }}">My Account</a>
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
    <form id="searchForm" method="POST" action="{{ route('searchByProvincelapanganadmin') }}">
        @csrf
        <input type="text" id="provinsi" name="provinsi" placeholder="Cari berdasarkan Provinsi"/>
        <!-- Add hidden input to store selected sport value -->
        <input type="hidden" name="pilihan_olahraga" value="{{ $pilihan_olahraga ?? 'all' }}">
        <button type="submit">Cari</button>
    </form>
    <div class="image-container">
        <a href="{{ route('form') }}" id="openForm">
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
    <form id="selectForm" method="POST" action="{{ route('searchBySportlapanganadmin') }}">
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
    @foreach ($lapangans as $lapangan)
        <div class="frame" data-provinsi="{{ $lapangan->provinsi }}" data-kontak="{{ $lapangan->kontak }}" data-alamat="{{ $lapangan->alamat }}" data-kabupaten="{{ $lapangan->kabupaten }}" data-pilihan_olahraga="{{ $lapangan->pilihan_olahraga }}" data-ketharga="{{ $lapangan->keterangan_harga }}">
            <div class="provinsi">{{ $lapangan->provinsi }}</div>
            <div class="image">
            <img src="{{ $lapangan->gambar }}" alt="Image" name="gambar">
            </div>
            <div class="content">
                <div class="nama_lapangan">{{ $lapangan->nama_lapangan }}</div>
                <div class="pilihan_olahraga">{{ $lapangan->pilihan_olahraga }}</div>
                <div class="harga">Rp. {{ number_format($lapangan->harga, 0, ',', '.') }}</div>
                <div class="button">Selengkapnya</div>
            </div>
        </div>
    @endforeach
</div>

<div class="tabel_lapangan">
    <table class="responsive-table">
        <div class="head">TABEL DAFTAR LAPANGAN</div>
        <thead>
            <tr>
                <th>NO</th>
                <th>ID</th>
                <th>Nama Lapangan</th>
                <th>Olahraga</th>
                <th>Kontak</th>
                <th>Created At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_POST['provinsi']) || isset($_POST['pilihan_olahraga'])) {
                $sql = "SELECT 
                            id, 
                            nama_lapangan, 
                            pilihan_olahraga, 
                            kontak, 
                            tanggal 
                        FROM lapangan 
                        WHERE 1=1";

                if (isset($_POST['provinsi']) && !empty($_POST['provinsi'])) {
                    $sql .= " AND provinsi = :provinsi";
                }

                if (isset($_POST['pilihan_olahraga']) && $_POST['pilihan_olahraga'] != 'all') {
                    $sql .= " AND pilihan_olahraga = :pilihan_olahraga";
                }

                $stmt = $pdo->prepare($sql);

                if (isset($_POST['provinsi']) && !empty($_POST['provinsi'])) {
                    $stmt->bindParam(':provinsi', $_POST['provinsi'], PDO::PARAM_STR);
                }

                if (isset($_POST['pilihan_olahraga']) && $_POST['pilihan_olahraga'] != 'all') {
                    $stmt->bindParam(':pilihan_olahraga', $_POST['pilihan_olahraga'], PDO::PARAM_STR);
                }

                $stmt->execute();
            } else {
                $stmt = $pdo->query("SELECT 
                                        id, 
                                        nama_lapangan, 
                                        pilihan_olahraga, 
                                        kontak, 
                                        tanggal 
                                    FROM lapangan");
            }

            $counter = 1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $counter++ . "</td>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama_lapangan']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pilihan_olahraga']) . "</td>";
                echo "<td>" . htmlspecialchars($row['kontak']) . "</td>";
                echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
                echo "<td>";
                echo "<a href='" . route('admin.editform', ['id' => htmlspecialchars($row['id'])]) . "' class='btn btn-primary'>Edit</a>";
                echo "<form action='" . route('lapangan.destroy', ['id' => htmlspecialchars($row['id'])]) . "' method='POST' style='display: inline;'>";
                echo csrf_field(); // @csrf diubah menjadi csrf_field()
                echo method_field('DELETE'); // @method('DELETE') diubah menjadi method_field('DELETE')
                echo "<button type='submit' class='btn btn-delete'>Hapus</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</div>
@include('sweetalert::alert')
</body>
</html>