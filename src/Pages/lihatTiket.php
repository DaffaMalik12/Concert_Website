<?php
session_start();
include '../../Config/config.php'; // Sesuaikan jalur ke file konfigurasi Anda
require_once('display/fpdf185/fpdf.php'); // Sesuaikan jalur ke file FPDF Anda

// Fungsi untuk membuat dan mengunduh PDF
function downloadPDF($ticketData)
{
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();

    // Add a card-like rectangle with an image background
    $pdf->Image('../asset/img/Landing Page User Bg.png', 10, 10, 190, 50); // Sesuaikan jalur gambar Anda

    // Add content to the card
    $pdf->SetXY(15, 15);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(120, 10, $ticketData["nama_konser"], 0, 1); // Adjusted width to leave space for QR code

    $pdf->SetFont('Arial', '', 12);
    $pdf->SetXY(15, 25);
    $pdf->Cell(120, 10, $ticketData["tanggal_event"], 0, 1); // Adjusted width to leave space for QR code

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetXY(15, 35);
    $pdf->Cell(120, 10, 'Kelas: ' . $ticketData["kelas"], 0, 1); // Adjusted width to leave space for QR code

    // Add QR code image
    $pdf->Image('../asset/img/QR CODE_qrcode.png', 150, 15, 40, 40); // Sesuaikan jalur gambar QR code Anda

    // Output PDF to browser
    $pdf->Output('I', 'tiket_konser.pdf');
    exit;
}

// Periksa apakah form telah disubmit untuk mendownload PDF
if (isset($_POST['download_pdf'])) {
    $id_konser = intval($_POST['id_konser']);
    $sql = "SELECT * FROM konser_table WHERE id_konser = $id_konser";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $ticketData = $result->fetch_assoc();
        downloadPDF($ticketData);
    } else {
        echo "No ticket data available.";
    }
}

// Ambil semua data tiket dari database
$sql = "SELECT * FROM konser_table";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="display/fpdf186/fpdf.css       ">
</head>

<body>
    <div style="background-image: url(../asset/img/Home\ Bg.png); height: 1000px;" class="bg-cover container mx-auto">
        <!-- Header -->
        <header style="background-color: #F1FF52;" class="w-full flex justify-between items-center p-4 ">
            <div class="flex items-center">
                <img src="../asset/img/Frame 1.png" alt="Santicket" class="h-16 mr-2 ml-6">
            </div>
            <a href="tiketing.php" class="text-black font-semibold mr-6 hover:text-white">Home</a>
        </header>

        <!-- Main Content -->
        <main class="flex flex-col items-center mt-10">
            <h2 class="text-red-500 text-3xl font-bold mb-4">Daftar Tiket</h2>
            <div class="bg-white shadow-lg rounded-lg p-4 w-full max-w-4xl">
                <?php if ($result->num_rows > 0) : ?>
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nama Konser</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Tanggal Event</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Kelas</th>
                                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td class="w-1/4 py-3 px-4"><?= $row["nama_konser"] ?></td>
                                    <td class="w-1/4 py-3 px-4"><?= $row["tanggal_event"] ?></td>
                                    <td class="w-1/4 py-3 px-4"><?= $row["kelas"] ?></td>
                                    <td class="w-1/4 py-3 px-4">
                                        <form method="post">
                                            <input type="hidden" name="id_konser" value="<?= $row['id_konser'] ?>">
                                            <button type="submit" name="download_pdf" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-700">Cetak Tiket</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="text-black">Tidak ada tiket yang tersedia.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>

</html>

<?php
$conn->close();
?>