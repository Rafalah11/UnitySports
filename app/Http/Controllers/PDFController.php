<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Roleuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;
use PDOException;

class PDFController extends Controller
{
    private $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'kbt';
        $username = 'root';
        $password = '';

        try {
            // Membuat koneksi PDO
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Koneksi gagal: ' . $e->getMessage();
            // Atau, jika Anda ingin menangani kesalahan dengan melemparkan exception:
            // throw new Exception('Koneksi database gagal: ' . $e->getMessage());
        }
    }

    public function downloadPDF()
    {
        $roleusers = Roleuser::all();

        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Data Roleuser</title>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
                img {
                    width: 100px;
                    height: auto;
                }
                .head {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align:center;
                    background-color:#827f7c;
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
               <div class="head">TABEL TRANSAKSI MEMBERSHIP</div>  
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>User ID</th>
                        <th>Jenis Transaksi</th>
                        <th>Metode Pembayaran</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($roleusers as $index => $user) {
            $html .= '<tr>
                <td>' . ($index + 1) . '</td>
                <td>' . htmlspecialchars($user->user_id) . '</td>
                <td>' . htmlspecialchars($user->jenis_transaksi) . '</td>
                <td>' . htmlspecialchars($user->metode_pembayaran) . '</td>
                <td><img src="' . $user->gambar . '" alt="gambar" style="width: 100px; height: auto;"></td>
            </tr>';
        }

        $html .= '</tbody></table>
        </body>
        </html>';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("tabel_lapangan.pdf", ["Attachment" => 1]);
    }

    public function downloadPDFNVIP()
    {
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Data NVIP</title>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
                img {
                    width: 100px;
                    height: auto;
                }
                .head {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align:center;
                    background-color:#827f7c;
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
               <div class="head">TABEL USER NVIP</div>  
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>User ID</th>
                        <th>Nama Lengkap</th>
                        <th>Role</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Kabupaten</th>
                        <th>Kontak Whatsapp</th>
                        <th>Instagram</th>
                        <th>Kontak Gmail</th>
                        <th>Facebook</th>
                        <th>Username Account</th>
                        <th>Password Account</th>
                    </tr>
                </thead>
                <tbody>';

        try {
            $stmt = $this->pdo->query(
                "SELECT *
                FROM users 
                WHERE role = 'NVIP';"
            );

            $index = 0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $html .= '<tr>
                    <td>' . ($index + 1) . '</td>
                    <td>' . htmlspecialchars($row['id']) . '</td>
                    <td>' . htmlspecialchars($row['fullname']) . '</td>
                    <td>' . htmlspecialchars($row['role']) . '</td>
                    <td>' . htmlspecialchars($row['gender']) . '</td>
                    <td>' . htmlspecialchars($row['birthplace']) . '</td>
                    <td>' . htmlspecialchars($row['birthdate']) . '</td>
                    <td>' . htmlspecialchars($row['city']) . '</td>
                    <td>' . htmlspecialchars($row['WA']) . '</td>
                    <td>' . htmlspecialchars($row['IG']) . '</td>
                    <td>' . htmlspecialchars($row['gmail']) . '</td>
                    <td>' . htmlspecialchars($row['FB']) . '</td>
                    <td>' . htmlspecialchars($row['username']) . '</td>
                    <td>' . htmlspecialchars($row['password']) . '</td>
                </tr>';
                $index++;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            // Atau, throw exception jika diperlukan:
            // throw new Exception('Error saat mengambil data: ' . $e->getMessage());
        }

        $html .= '</tbody></table>
        </body>
        </html>';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A1', 'landscape');
        $dompdf->render();
        $dompdf->stream("Data_User_NVIP.pdf", ["Attachment" => 1]);
    }

    public function downloadPDFVIP()
    {
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Data NVIP</title>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
                img {
                    width: 100px;
                    height: auto;
                }
                    .head {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align:center;
                    background-color:#827f7c;
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
         <div class="head">TABEL USER VIP</div>   
        <table>
           <thead>
                    <tr>
                        <th>NO</th>
                        <th>User ID</th>
                        <th>Nama Lengkap</th>
                        <th>Role</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Kabupaten</th>
                        <th>Kontak Whatsapp</th>
                        <th>Instagram</th>
                        <th>Kontak Gmail</th>
                        <th>Facebook</th>
                        <th>Username Account</th>
                        <th>Password Account</th>
                    </tr>
                </thead>
                <tbody>';

        try {
            $stmt = $this->pdo->query(
                "SELECT *
                FROM users 
                WHERE role = 'VIP';"
            );

            $index = 0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $html .= '<tr>
                    <td>' . ($index + 1) . '</td>
                    <td>' . htmlspecialchars($row['id']) . '</td>
                    <td>' . htmlspecialchars($row['fullname']) . '</td>
                    <td>' . htmlspecialchars($row['role']) . '</td>
                    <td>' . htmlspecialchars($row['gender']) . '</td>
                    <td>' . htmlspecialchars($row['birthplace']) . '</td>
                    <td>' . htmlspecialchars($row['birthdate']) . '</td>
                    <td>' . htmlspecialchars($row['city']) . '</td>
                    <td>' . htmlspecialchars($row['WA']) . '</td>
                    <td>' . htmlspecialchars($row['IG']) . '</td>
                    <td>' . htmlspecialchars($row['gmail']) . '</td>
                    <td>' . htmlspecialchars($row['FB']) . '</td>
                    <td>' . htmlspecialchars($row['username']) . '</td>
                    <td>' . htmlspecialchars($row['password']) . '</td>
                </tr>';
                $index++;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            // Atau, throw exception jika diperlukan:
            // throw new Exception('Error saat mengambil data: ' . $e->getMessage());
        }

        $html .= '</tbody></table>
        </body>
        </html>';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A1', 'landscape');
        $dompdf->render();
        $dompdf->stream("Data_User_VIP.pdf", ["Attachment" => 1]);
    }
}
