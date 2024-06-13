<?php
session_start();
include '../../../Config/config.php'; // Sesuaikan jalur ke file konfigurasi Anda
require_once('fpdf185/fpdf.php'); // Include file FPDF

// Ambil id_konser terbesar dari database
$sql = "SELECT MAX(id_konser) AS max_id FROM konser_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_konser = $row['max_id'];
} else {
    echo "No concerts found.";
    exit;
}

// Ambil data dari database berdasarkan id_konser terbesar
$sql = "SELECT * FROM konser_table WHERE id_konser = $id_konser";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil hanya baris pertama
    $ticketData = $result->fetch_assoc();
} else {
    echo "No results found.";
    exit;
}

$conn->close();

// Jika tombol unduh ditekan
if (isset($_POST['download_pdf'])) {
    // Buat instance FPDF
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();

    // Tambahkan gambar latar belakang
    $backgroundPath = '../../asset/img/Landing Page User Bg.png'; // Sesuaikan jalur gambar latar belakang Anda
    if (file_exists($backgroundPath)) {
        $pdf->Image($backgroundPath, 10, 10, 190, 50);
    } else {
        echo "Background image not found.";
        exit;
    }

    // Tambahkan konten ke PDF
    $pdf->SetXY(15, 15); // Atur posisi X dan Y
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(120, 10, $ticketData["nama_konser"], 0, 1);

    $pdf->SetFont('Arial', '', 12);
    $pdf->SetXY(15, 25); // Atur posisi X dan Y
    $pdf->Cell(120, 10, $ticketData["tanggal_event"], 0, 1);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetXY(15, 35); // Atur posisi X dan Y
    $pdf->Cell(120, 10, 'Kelas: ' . $ticketData["kelas"], 0, 1);

    // Tambahkan QR code ke PDF jika ada
    $qrCodePath = '../../asset/img/QR_CODE_TIKET_qrcode.png'; // Sesuaikan jalur gambar QR code Anda
    if (file_exists($qrCodePath)) {
        $pdf->Image($qrCodePath, 150, 15, 40, 40);
    }

    // Output PDF ke browser atau simpan ke file
    $pdf->Output('D', 'tiket_konserBaekhyun.pdf');
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
                    <img src="../../asset/img/QR_CODE_TIKET_qrcode.png" alt="QR Code" class="h-32 w-32">
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