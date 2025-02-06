<?php
$host = 'localhost';
$dbname = 'kbt'; 
$username = 'root'; 
$password = ''; 

try {
    // Membuat koneksi PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Koneksi gagal: ' . $e->getMessage();
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

.head {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    text-align:center;
    background-color:#8c4501;
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


.tabel-lapangan-2 {
    width: 100%;
    overflow-x: auto;
    margin-top:250px;
}

.responsive-table-custom-2 {
    width: 100%;
    border-collapse: collapse;
    
}

.responsive-table-custom-2 th, .responsive-table-custom-2 td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.responsive-table-custom-2 th {
    background-color: #FE7C45;
}


.btn-edit-custom-2, .btn-delete-custom-2, .btn-tambah {
    padding: 6px 12px;
    margin-right: 5px;
    cursor: pointer;
}

.btn-edit-custom-2 {
    background-color: #4CAF50;
    color: white;
    border: none;
    margin-right: 10px; 
}

.btn-delete-custom-2 {
    background-color: #f44336;
    padding: 9px 5px;
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

.btn-tambah:hover, .btn-edit-custom-2:hover, .btn-delete-custom-2:hover {
    opacity: 0.8;
}

@media screen and (max-width: 600px) {
    .responsive-table-custom-2 {
        overflow-x: auto;
        display: block;
        white-space: nowrap;
    }
    .responsive-table-custom-2 thead, .responsive-table-custom-2 tbody, .responsive-table-custom-2 th, .responsive-table-custom-2 td, .responsive-table-custom-2 tr {
        display: block;
    }
    .responsive-table-custom-2 td, .responsive-table-custom-2 th {
        height: 35px;
    }
    .responsive-table-custom-2 thead {
        float: left;
    }
    .responsive-table-custom-2 tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        white-space: nowrap;
        float: left;
    }
    .responsive-table-custom-2 td, .responsive-table-custom-2 th {
        border-bottom: 1px solid #ddd;
    }
    .responsive-table-custom-2 td:nth-child(1), .responsive-table-custom-2 th:nth-child(1) {
        background-color: #f2f2f2;
    }
    .responsive-table-custom-2 tr {
        display: inline-block;
        vertical-align: top;
    }
    .btn-edit-custom-2, .btn-delete-custom-2, .btn-tambah {
        float: right;
    }
}

.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
}

.modal-toggle {
    display: none;
}

.modal-toggle:checked + .modal {
    display: block;
}

.btn {
    background-color: #4CAF50;
    color: white;
    border: none;
    margin-right: 10px; 
    padding: 12px 15px;
    cursor: pointer;
    text-align: center;
    display: inline-block;
}

.btn-primary {
    background-color: #007bff;
}

.modal2 {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: black;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    display:none;
}
.modal2-content {
    display: flex;
    flex-direction: column;
}
.blur {
    filter: blur(5px);
}
.close-btn {
    margin-top: 20px;
}

.button {
    background-color: #007bff;
    padding: 10px 15px;
    color: white;
    border: none;
    margin-right: 5px; 
}

.button:hover {
    background-color: #535452;
}
        
.btn-vip {
    background-color: #f60cfa;
    padding: 9px 10px;
    color: white;
    border: none; 
}

.btn-vip:hover {
    background-color: #535452;
}
    </style>

    <script>
         document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.button');
            const modal = document.querySelector('.modal2');
            const container = document.querySelector('.container');
            const closeBtn = document.querySelector('.close-btn');
            
            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    modal.querySelector('.id').textContent = 'ID account: ' + button.getAttribute('data-id');
                    modal.querySelector('.username').textContent = 'Username: ' + button.getAttribute('data-username');
                    modal.querySelector('.role').textContent = 'Role: ' + button.getAttribute('data-role');
                    modal.querySelector('.image').textContent = 'Foto: ' + button.getAttribute('data-image');
                    modal.querySelector('.FB').textContent = 'Nama Facebook: ' + button.getAttribute('data-fb');
                    modal.querySelector('.IG').textContent = 'Nama Instagram: ' + button.getAttribute('data-ig');
                    modal.querySelector('.address').textContent = 'Alamat: ' + button.getAttribute('data-address');
                    modal.querySelector('.fullname').textContent = 'Nama Lengkap: ' + button.getAttribute('data-fullname');
                    modal.querySelector('.city').textContent = 'Asal Kota: ' + button.getAttribute('data-city');
                    modal.querySelector('.WA').textContent = 'Kontak Whatsapp: ' + button.getAttribute('data-wa');
                    modal.querySelector('.gender').textContent = 'Jenis Kelamin: ' + button.getAttribute('data-gender');
                    modal.querySelector('.gmail').textContent = 'Nama Gmail: ' + button.getAttribute('data-gmail');

                    container.classList.add('blur');
                    modal.style.display = 'block';
                });
            });

            closeBtn.addEventListener('click', function () {
                container.classList.remove('blur');
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    container.classList.remove('blur');
                    modal.style.display = 'none';
                }
            });
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

    <div class="container">
        @foreach ($users as $user)
        <div class="frame" 
            data-image="{{ $user->image }}"
            data-WA="{{ $user->WA }}" 
            data-role="{{ $user->role }}" 
            data-city="{{ $user->city }}" 
            data-username="{{ $user->username }}" 
            data-FB="{{ $user->FB }}" 
            data-fullname="{{ $user->fullname }}" 
            data-gmail="{{ $user->gmail }}" 
            data-gender="{{ $user->gender }}" 
            data-IG="{{ $user->IG }}"
            data-address="{{ $user->address }}">
                
            </div>
        </div>
        @endforeach
    </div>

</div>

<div class="tabel_lapangan">
    <table class="responsive-table">
        <div class="head">TABEL USER VIP</div>
        <thead>
            <tr>
                <th>NO</th>
                <th>User ID</th>
                <th>Nama Lengkap</th>
                <th>Role</th>
                <th>Jenis Kelamin</th>
                <th>Kontak Whatsapp</th>
                <th>Aksi</th>
        </thead>
        <tbody>
            <!-- Contoh baris data, Anda dapat menambahkan data sesuai kebutuhan -->
            <?php
            $host = 'localhost';
            $dbname = 'kbt'; 
            $username = 'root'; 
            $password = ''; 
            
            try {
                // Membuat koneksi PDO
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Koneksi gagal: ' . $e->getMessage();
            }
// Mengambil data dari database
$stmt = $pdo->query(
    "SELECT id, username, fullname, role, gender, WA, image, FB, IG, address, city, gmail 
    FROM users 
    WHERE role = 'VIP';"
);
$counter = 1;

// Loop untuk menampilkan data
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $counter++ . "</td>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
    echo "<td>" . htmlspecialchars($row['WA']) . "</td>";
    echo "<td>";
    echo "<button class='button' 
            data-id='" . htmlspecialchars($row['id']) . "' 
            data-username='" . htmlspecialchars($row['username']) . "' 
            data-role='" . htmlspecialchars($row['role']) . "' 
            data-image='" . htmlspecialchars($row['image']) . "' 
            data-fb='" . htmlspecialchars($row['FB']) . "' 
            data-ig='" . htmlspecialchars($row['IG']) . "' 
            data-address='" . htmlspecialchars($row['address']) . "' 
            data-fullname='" . htmlspecialchars($row['fullname']) . "' 
            data-city='" . htmlspecialchars($row['city']) . "' 
            data-wa='" . htmlspecialchars($row['WA']) . "' 
            data-gender='" . htmlspecialchars($row['gender']) . "' 
            data-gmail='" . htmlspecialchars($row['gmail']) . "'>Selengkapnya</button>";
    echo "<form action='" . route('user.updateToNVIP', ['id' => $row['id']]) . "' method='POST' style='display: inline;'>";
    echo csrf_field(); 
    echo method_field('PATCH'); 
    echo "<button type='submit' class='btn-vip'>Ubah menjadi NVIP</button>";
    echo "</form>";
    echo "<form action='" . route('user.destroy', ['id' => $row['id']]) . "' method='POST' style='display: inline;'>";
    echo csrf_field(); 
    echo method_field('DELETE'); 
    echo "<button type='submit' class='btn-delete-custom-2'>Hapus</button>";
    echo "</form>";
    echo '<a href="' . route('downloadPDFVIP') . '" class="btn btn-secondary">Download PDF</a>';
    echo "</td>";
    echo "</tr>";

}
?>
               </tbody>
            </table>
        </div>
        </div>
        <div class="modal2">
        <div class="modal2-content">
            <div class="modal-header">
                <h2>Detail Pengguna</h2>
                <button class="close-btn">Tutup</button>
            </div>
            <div class="modal-body">
                <div class="id"></div>
                <div class="username"></div>
                <div class="role"></div>
                <div class="image"></div>
                <div class="FB"></div>
                <div class="IG"></div>
                <div class="address"></div>
                <div class="fullname"></div>
                <div class="city"></div>
                <div class="WA"></div>
                <div class="gender"></div>
                <div class="gmail"></div>
            </div>
        </div>
    </div>

    <div class="tabel_lapangan">
    <table class="responsive-table">
    <div class="head">TABEL USER NVIP</div>
        <thead>
            <tr>
                <th>NO</th>
                <th>User ID</th>
                <th>Nama Lengkap</th>
                <th>Role</th>
                <th>Jenis Kelamin</th>
                <th>Kontak Whatsapp</th>
                <th>Aksi</th>
        </thead>
        <tbody>
            <!-- Contoh baris data, Anda dapat menambahkan data sesuai kebutuhan -->
            <?php
$stmt = $pdo->query(
    "SELECT id, username, fullname, role, gender, WA, image, FB, IG, address, city, gmail 
    FROM users 
    WHERE role = 'NVIP';"
);
$counter = 1;

// Loop untuk menampilkan data
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $counter++ . "</td>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
    echo "<td>" . htmlspecialchars($row['WA']) . "</td>";
    echo "<td>";
    echo "<button class='button' 
            data-id='" . htmlspecialchars($row['id']) . "' 
            data-username='" . htmlspecialchars($row['username']) . "' 
            data-role='" . htmlspecialchars($row['role']) . "' 
            data-image='" . htmlspecialchars($row['image']) . "' 
            data-fb='" . htmlspecialchars($row['FB']) . "' 
            data-ig='" . htmlspecialchars($row['IG']) . "' 
            data-address='" . htmlspecialchars($row['address']) . "' 
            data-fullname='" . htmlspecialchars($row['fullname']) . "' 
            data-city='" . htmlspecialchars($row['city']) . "' 
            data-wa='" . htmlspecialchars($row['WA']) . "' 
            data-gender='" . htmlspecialchars($row['gender']) . "' 
            data-gmail='" . htmlspecialchars($row['gmail']) . "'>Selengkapnya</button>";
    echo "<form action='" . route('user.updateToVIP', ['id' => $row['id']]) . "' method='POST' style='display: inline;'>";
    echo csrf_field(); 
    echo method_field('PATCH'); 
    echo "<button type='submit' class='btn-vip'>Ubah menjadi VIP</button>";
    echo "</form>";
    echo "<form action='" . route('user.destroy', ['id' => $row['id']]) . "' method='POST' style='display: inline;'>";
    echo csrf_field(); 
    echo method_field('DELETE'); 
    echo "<button type='submit' class='btn-delete-custom-2'>Hapus</button>";
    echo "</form>";
    echo '<a href="' . route('downloadPDFNVIP') . '" class="btn btn-secondary">Download PDF</a>';
    echo "</td>";
    echo "</tr>";
}
?>
               </tbody>
            </table>
        </div>
        </div>
        <div class="modal2">
        <div class="modal2-content">
            <div class="modal-header">
                <h2>Detail Pengguna</h2>
                <button class="close-btn">Tutup</button>
            </div>
            <div class="modal-body">
                <div class="id"></div>
                <div class="username"></div>
                <div class="role"></div>
                <div class="image"></div>
                <div class="FB"></div>
                <div class="IG"></div>
                <div class="address"></div>
                <div class="fullname"></div>
                <div class="city"></div>
                <div class="WA"></div>
                <div class="gender"></div>
                <div class="gmail"></div>
            </div>
        </div>
    </div>

<div class="tabel-lapangan-2">
    <table class="responsive-table-custom-2">
    <div class="head">TABEL TRANSAKSI MEMBERSHIP</div>
        <thead>
            <tr>
                <th>NO</th>
                <th>ID User dalam Database</th>
                <th>User ID</th>
                <th>jenis transaksi</th>
                <th>metode pembayaran</th>
                <th>Gambar</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roleusers as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->user_id }}</td>
                <td>{{ $user->jenis_transaksi }}</td>
                <td>{{ $user->metode_pembayaran }}</td>
                <td><img src="{{ $user->gambar }}" alt="gambar" style="width: 100px; height: auto;"></td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="{{ $user->gambar }}" download="{{ basename($user->gambar) }}" class="btn btn-primary">Download Gambar</a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete-custom-2">Hapus</button>
                    </form>
                    <a href="{{ route('downloadPDF') }}" class="btn btn-secondary">Download PDF</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@include('sweetalert::alert')
</body>
</html>

