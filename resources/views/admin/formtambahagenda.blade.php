<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Custom styles */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #fe7c45;
        }
        .container {
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            font-family: "Poppins", sans-serif;
        }
        .container header {
            font-size: 1.5rem;
            color: #333;
            font-weight: 500;
            text-align: center;
        }
        .input-box {
            margin-top: 20px;
        }
        .address input, .select-box select {
            margin-top: 15px;
        }
        .form button {
            height: 55px;
            width: 100%;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 30px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #00000f;
        }
        .form button:hover {
            background: #fe7c45;
        }
        @media screen and (max-width: 500px) {
            .column {
                flex-wrap: wrap;
            }
        }
        /* Disable arrow increment/decrement in number input */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong>Success:</strong> Mohon Maaf status anda belum VIP 🙏
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="container">
        <header>Registration Form</header>
        <form action="{{ route('form') }}" method="POST" enctype="multipart/form-data" class="form needs-validation" novalidate>
            @csrf
            <div class="input-box">
                <label>Nama Lapangan</label>
                <input type="text" class="form-control" name="nama_lapangan" placeholder="Masukan nama lapangan" required />
                <div class="invalid-feedback">Nama lapangan diperlukan.</div>
            </div>

            <div class="input-box address">
                <label>Pilihan Olahraga</label>
                <div class="column">
                    <div class="select-box">
                        <select name="pilihan_olahraga" class="form-control" required>
                            <option hidden>Olahraga apa yang ingin anda buat</option>
                            <option value="BADMINTON">BADMINTON</option>
                            <option value="BASKET">BASKET</option>
                            <option value="FUTSAL">FUTSAL</option>
                            <option value="MINI SOCCER">MINI SOCCER</option>
                            <option value="SEPAK BOLA">SEPAK BOLA</option>
                        </select>
                        <div class="invalid-feedback">Pilihan olahraga diperlukan.</div>
                    </div>
                </div>
                <input type="text" class="form-control" name="harga" placeholder="Masukan Harga" required />
                <div class="invalid-feedback">Harga diperlukan.</div>
                <input type="text" class="form-control" name="keterangan_harga" placeholder="Keterangan Harga" required />
                <div class="invalid-feedback">Keterangan harga diperlukan.</div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="number" class="form-control" name="kontak" placeholder="Enter phone number" required />
                    <div class="invalid-feedback">Nomor telepon diperlukan.</div>
                </div>
                <div class="input-box">
                    <label>Date</label>
                    <input type="date" class="form-control" name="tanggal" placeholder="Enter birth date" required />
                    <div class="invalid-feedback">Tanggal diperlukan.</div>
                </div>
            </div>
            <div class="input-box address">
                <label>Address</label>
                <div class="column">
                    <div class="select-box">
                        <select name="provinsi" id="provinsi" class="form-control" required>
                            <option value="" hidden>Pilih Provinsi</option>
                            @foreach($provinsis as $provinsi)
                                <option value="{{ $provinsi->nama_provinsi }}" data-id="{{ $provinsi->id_provinsi }}">{{ $provinsi->nama_provinsi }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Provinsi diperlukan.</div>
                    </div>

                    <div class="select-box">
                        <select name="kabupaten" id="kabupaten" class="form-control" required>
                            <option value="" hidden>Pilih Kabupaten</option>
                            <!-- Kabupaten akan diisi menggunakan JavaScript -->
                        </select>
                        <div class="invalid-feedback">Kabupaten diperlukan.</div>
                    </div>

                    <input type="text" class="form-control" name="alamat" placeholder="Enter street address" required />
                    <div class="invalid-feedback">Alamat diperlukan.</div>

                    <!-- Elemen input tersembunyi untuk menyimpan id provinsi -->
                    <input type="hidden" id="id_provinsi" name="id_provinsi" />
                </div>

                <div class="input-box address">
                    <label>Masukan Gambar</label>
                    <input type="file" class="form-control-file" name="gambar" required />
                    <div class="invalid-feedback">Gambar diperlukan.</div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-secondary w-100" onclick="window.location.href='{{ route('lapanganadmin') }}'">Cancel</button>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100" id="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var provinsiSelect = document.getElementById('provinsi');
            var kabupatenSelect = document.getElementById('kabupaten');
            var idProvinsiInput = document.getElementById('id_provinsi');

            // Event listener untuk perubahan pada dropdown provinsi
            provinsiSelect.addEventListener('change', function() {
                var selectedProvinsiId = this.options[this.selectedIndex].getAttribute('data-id'); // Ambil id_provinsi yang dipilih
                var selectedProvinsiName = this.value; // Ambil nama_provinsi yang dipilih

                // Simpan id_provinsi dalam elemen tersembunyi
                idProvinsiInput.value = selectedProvinsiId;

                // Kosongkan opsi kabupaten terlebih dahulu
                // Kosongkan opsi kabupaten terlebih dahulu
                kabupatenSelect.innerHTML = '<option value="" hidden>Pilih Kabupaten</option>';

                // Ambil data kabupaten dari server berdasarkan id_provinsi yang dipilih
                fetch('/getKabupaten/' + selectedProvinsiId)
                    .then(response => response.json())
                    .then(data => {
                        // Tambahkan opsi kabupaten ke dalam dropdown
                        data.forEach(kabupaten => {
                            var option = document.createElement('option');
                            option.value = kabupaten.nama_kabupaten; // Menggunakan nama_kabupaten sebagai nilai
                            option.textContent = kabupaten.nama_kabupaten;
                            kabupatenSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching kabupaten:', error));
            });
        });

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                            alert('Tolong isi semua kolom yang diperlukan.');
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>
