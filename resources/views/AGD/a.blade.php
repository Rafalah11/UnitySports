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
        
        .hidden-file-input {
            display: none;
        }

        .edit-profile-btn {
            width: calc(50% - 10px); /* Menggunakan calc untuk menghitung lebar 50% dengan jarak antar elemen */
            border: 2px #FF7008 solid;
            height: 53px;
            background: #FF7008;
            border-radius: 5px;
            text-align: center;
            transition: background-color 1.2s, color 1.2s;  
            float: left; 
            cursor:pointer;
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
            width: calc(50% - 10px); /* Menggunakan calc untuk menghitung lebar 50% dengan jarak antar elemen */
            height: 53px; 
            background: white; 
            border-radius: 5px; 
            border: 2px #FF7008 solid;
            cursor: pointer;
            transition: background-color 1.2s ease, color 1.2s ease;
            float: right; /* Floating button untuk menyusun di sebelah kanan */
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

        .text {
            color: #1C1C1C;
            font-size: 18px; /* Kecilkan ukuran teks */
            font-family: Roboto;
            font-weight: 500;
            word-wrap: break-word;
        }

        .profile-container {
            max-width: 500px; /* Lebar maksimum box */
            margin: 50px auto; /* Margin atas dan bawah 50px, otomatis di tengah */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 500px rgba(0, 0, 0, 0.6);
            border: 3px #FF7008 solid;
            overflow: hidden; /* Mengatasi overflow */
        }

        .profile-section {
            margin-bottom: 15px; /* Jarak antar bagian profil */
        }

        .profile-section h3 {
            font-size: 20px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 5px; /* Jarak bawah judul */
        }

        .profile-section p, 
        .profile-section select,
        .profile-section input[type="file"] {
            font-size: 16px; /* Kecilkan ukuran teks */
            padding: 8px;
            border: 2px solid #FF7008;
            border-radius: 5px;
            box-sizing: border-box;
            width: 100%;
        }

        @media (max-width: 600px) {
            .profile-container {
                width: 80vw; /* Lebar box di layar kecil */
            }
            .edit-profile-btn,
            .back-button {
                width: 100%; /* Mengubah lebar tombol menjadi 100% di layar kecil */
                float: none; /* Hapus floating di layar kecil */
                margin-bottom: 10px; /* Jarak bawah antar tombol di layar kecil */
            }
        }

        .header{
            color: white;
            position:relative;
            top:40px;
            margin: 34px auto; /* Margin atas dan bawah 50px, otomatis di tengah */
            background-color: #FF7008;
            max-width: 500px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
        }

        .transaksi{
            color: white;
            position:relative;
            background-color: #FF7008;
            font-size:12px;
            max-width: 700px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
        }

        .transaksi a{
            color:black;
            font-size:20px;
        }

        /* #qrisDiv a {
            color:black;
            font-size:20px;
            height:0px;
            text-decoration: none; /* Menghilangkan garis bawah */
            /* display: inline-block;
        } */ 

    </style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var roleSelect = document.getElementById('role');
        var role1Select = document.getElementById('role1');

        var transferBankDiv = document.getElementById('transferBankDiv');
        var danaDiv = document.getElementById('danaDiv');
        var gopayDiv = document.getElementById('gopayDiv');
        // var qrisDiv = document.getElementById('qrisDiv');

        // Fungsi untuk menampilkan div yang sesuai berdasarkan metode pembayaran yang dipilih
        function showPaymentMethodDetails(selectedRole) {
            // Sembunyikan semua div
            transferBankDiv.style.display = 'none';
            danaDiv.style.display = 'none';
            gopayDiv.style.display = 'none';
            // qrisDiv.style.display = 'none';

            // Kosongkan pilihan pada role1Select
            role1Select.innerHTML = '<option hidden>Pilih Sesuai Metode Pembayaran</option>';

            // Tampilkan div yang sesuai dan tambahkan opsi pada role1Select
            switch (selectedRole) {
                case 'Transfer Bank':
                    transferBankDiv.style.display = 'block';
                    addOption(role1Select, 'BCA', 'BCA');
                    break;
                case 'Dompet Virtual':
                    addOption(role1Select, 'DANA', 'Dana');
                    addOption(role1Select, 'Gopay', 'Go-pay');
                    break;
                // case 'Qris':
                //     qrisDiv.style.display = 'block';
                //     addOption(role1Select, 'barcode', 'Download foto qris');
                //     break;
                default:
                    // Tambahkan opsi default jika diperlukan
                    break;
            }
        }

        // Fungsi untuk menampilkan div yang sesuai berdasarkan metode sesuai pembayaran yang dipilih
        function showPaymentOptionDetails(selectedOption) {
            // Sembunyikan semua div
            danaDiv.style.display = 'none';
            gopayDiv.style.display = 'none';

            // Tampilkan div yang sesuai
            switch (selectedOption) {
                case 'DANA':
                    danaDiv.style.display = 'block';
                    break;
                case 'Gopay':
                    gopayDiv.style.display = 'block';
                    break;
                default:
                    // Tambahkan opsi default jika diperlukan
                    break;
            }
        }

        // Event listener untuk perubahan pada roleSelect
        roleSelect.addEventListener('change', function () {
            // Ambil nilai yang dipilih pada roleSelect
            var selectedRole = roleSelect.value;

            // Tampilkan div yang sesuai
            showPaymentMethodDetails(selectedRole);
        });

        // Event listener untuk perubahan pada role1Select
        role1Select.addEventListener('change', function () {
            // Ambil nilai yang dipilih pada role1Select
            var selectedOption = role1Select.value;

            // Tampilkan div yang sesuai
            showPaymentOptionDetails(selectedOption);
        });

        // Fungsi untuk menambahkan opsi pada select element
        function addOption(selectElement, value, text) {
            var option = document.createElement('option');
            option.value = value;
            option.textContent = text;
            selectElement.appendChild(option);
        }
    });

    document.getElementById('profileForm').addEventListener('submit', function (event) {
        event.preventDefault();

        var statusVIP = document.getElementById('statusVIP').value;

        if (statusVIP === 'NVIP') {
            this.submit();
        } else {
            alert('ID anda sudah terdaftar menjadi status VIP');
        }
    });
</script>
</head>
<body>
        <div class="header">
        <h2>Halaman Transaksi</h2>
        </div>

    <div class="profile-container">
    <form action="{{ route('roleuser.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        
        <div class="profile-section">
            <h3>Full Name</h3>
            <p>{{ $user->fullname }}</p>
        </div>

        <div class="profile-section">
            <h3>ID</h3>
            <p>{{ $user->id }}</p>
            <input type="hidden" name="user_id" value="{{ $user->id }}"></input>
        </div>

        <div class="profile-section">
            <h3>Nomor Whatsapp</h3>
            <p>{{ $user->WA }}</p>
        </div>

        <div class="profile-section">
            <h3>Gender</h3>
            <p>{{ $user->gender }}</p>
        </div>
        <input type="hidden" id="statusVIP" value="{{ $user->role ? 'NVIP' : 'VIP' }}">
        <div class="profile-section">
            <h3>Metode Pembayaran</h3>	
            <select name="jenis_transaksi" id="role" required>
                <option hidden>Pilih Metode Pembayaran</option>
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="Dompet Virtual">Dompet Virtual</option>
            </select>
            </div>
            <div class="profile-section">
            <select name="metode_pembayaran" id="role1" required>
                <option hidden>Pilih Sesuai Metode Pembayaran </option>
            </select>
        </div>

        <!-- Div untuk Transfer Bank -->
        <div id="transferBankDiv" class="payment-method-details" style="display:none;">
        <div class="profile-section">
            <div class="transaksi">
                BANK BCA : 7641806548 -> RAKHMAT FADHILAH
            </div>
        </div>
    </div>

        <!-- Div untuk Dompet Virtual -->
        <div id="danaDiv" class="payment-method-details" style="display:none;">
        <div class="profile-section">
            <div class="transaksi">
                DANA : 085891791600 -> RAKHMAT FADHILAH
            </div>
        </div>
        </div>

        <!-- Div untuk Dompet Virtual: Gopay -->
        <div id="gopayDiv" class="payment-method-details" style="display:none;">
        <div class="profile-section">
            <div class="transaksi">
                GO-PAY : 085891791600 -> RAKHMAT FADHILAH
            </div>
        </div>
        </div>

        <!-- Div untuk QRIS -->
        <!-- <div id="qrisDiv" class="payment-method-details" style="display:none;">
        <div class="transaksi">
        <a href="https://qris.online/homepage/images/assets/pay/services-center/qris/old.jpg" download="qris.jpg">lihat Gambar Qris</a>
            </div>

        </div> -->

        <div class="profile-section">
            <h3>Gambar</h3>
            <input type="file" id="gambar" name="gambar" accept="image/*" required>
        </div>

        <div style="clear: both; text-align: center;">
                <button type="submit" class="edit-profile-btn">
                    <span>Kirim</span>
                </button>
            </div>
            </a>
            </form>
            <button class="back-button" onclick="window.location.href='/landingpageafterlogin'">
                <div class="back-button-text">Back</div>
            </button>
        </div>
    </div>

    @include('sweetalert::alert')

</body>
</html>
