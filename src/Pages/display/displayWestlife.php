<?php
session_start();
include '../../../Config/config.php'; // Sesuaikan jalur ke file konfigurasi Anda
require_once('tcpdf/tcpdf.php'); // Include file TCPDF

// Ambil id_konser dari parameter URL
$id_konser = isset($_GET['id_konser']) ? intval($_GET['id_konser']) : 110; // Default ke 101 jika tidak diatur
$ticketData = null; // Inisialisasi $ticketData

// Periksa apakah id_konser valid
if ($id_konser >= 110) {
    // Ambil data dari database dimulai dari id_konser 101
    $sql = "SELECT * FROM konser_table WHERE id_konser >= $id_konser";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ambil hanya baris pertama
        $ticketData = $result->fetch_assoc();
    } else {
        echo "0 results";
    }

    $conn->close();
} else {
    echo "Invalid id_konser";
}

// Jika tombol unduh ditekan
if (isset($_POST['download_pdf'])) {
    // Buat instance TCPDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Atur informasi dokumen
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Santi');
    $pdf->SetTitle('Tiket Konser');
    $pdf->SetSubject('Tiket Konser');
    $pdf->SetKeywords('Tiket, Konser');

    // Atur font
    $pdf->SetFont('helvetica', '', 12);

    // Tambahkan halaman baru
    $pdf->AddPage();

    // Tambahkan konten ke PDF
    $content = '
    <style>
        .ticket-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .ticket-header {
            text-align: center;
            color: red;
            font-size: 24px;
            font-weight: bold;
        }
        .ticket-details {
            margin-top: 20px;
        }
        .ticket-details p {
            margin: 5px 0;
            color: black;
        }
        .ticket-qr {
            text-align: center;
            margin-top: 20px;
        }
        .ticket-qr img {
            width: 128px;
            height: 128px;
        }
    </style>
    <div class="ticket-container">
        <div class="ticket-header">Cetak Tiket</div>
        <div class="ticket-details">';
    if ($ticketData) {
        $content .= '<p>Nama Konser: ' . $ticketData["nama_konser"] . '</p>';
        $content .= '<p>Tanggal Event: ' . $ticketData["tanggal_event"] . '</p>';
        $content .= '<p>Kelas: ' . $ticketData["kelas"] . '</p>';
    } else {
        $content .= '<p>No ticket data available.</p>';
    }
    $content .= '</div>
    </div>';

    $pdf->writeHTML($content, true, false, true, false, '');

    // Output PDF ke browser atau simpan ke file
    $pdf->Output('tiket_konser.pdf', 'D');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div style="background-image: url(../asset/img/Home\ Bg.png); height: 700px;" class="bg-cover container mx-auto">
        <!-- Header -->
        <header style="background-color: #F1FF52;" class="w-full flex justify-between items-center p-4 ">
            <div class="flex items-center">
                <img src="../../asset/img/Frame 1.png" alt="Santicket" class="h-16 mr-2 ml-6">
            </div>
            <a href="../tiketing.php" class="text-black font-semibold mr-6 hover:text-white">Home</a>
        </header>

        <!-- Main Content -->
        <main class="flex flex-col items-center mt-36">
            <h2 class="text-red-500 text-3xl font-bold mb-4">Cetak Tiket</h2>
            <div class="bg-white shadow-lg rounded-lg p-4 flex">
                <div class="flex items-center">
                    <div class="text-left">
                        <?php if ($ticketData) : ?>
                            <p class="text-black font-semibold"><?= $ticketData["nama_konser"] ?></p>
                            <p class="text-black"><?= $ticketData["tanggal_event"] ?></p>
                            <p class="text-black font-bold mt-2"><?= $ticketData["kelas"] ?></p>
                        <?php else : ?>
                            <p class="text-black">No ticket data available.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="flex items-center justify-center ml-4">
                    <img src="../../asset/img/QR CODE_qrcode.png" alt="QR Code" class="h-32 w-32">
                </div>
            </div>
            <!-- Form untuk tombol unduh -->
            <form method="post">
                <button type="submit" name="download_pdf" class="mt-8 bg-black text-yellow-300 font-semibold py-2 px-4 rounded-lg flex items-center">
                    <span class="mr-2">Unduh</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4 4m0 0l4-4m-4 4V4m16 0H4" />
                    </svg>
                </button>
            </form>
        </main>
    </div>
</body>

</html>