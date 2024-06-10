<?php
session_start();
include '../../Config/config.php'; // Sesuaikan jalur ke file konfigurasi Anda
require_once('tcpdf/tcpdf.php'); // Sesuaikan jalur ke file TCPDF Anda

// Fungsi untuk membuat dan mengunduh PDF
function downloadPDF($ticketData)
{
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
    </style>
    <div class="ticket-container">
        <div class="ticket-header">Cetak Tiket</div>
        <div class="ticket-details">';
    $content .= '<p>Nama Konser: ' . $ticketData["nama_konser"] . '</p>';
    $content .= '<p>Tanggal Event: ' . $ticketData["tanggal_event"] . '</p>';
    $content .= '<p>Kelas: ' . $ticketData["kelas"] . '</p>';
    $content .= '</div></div>';

    $pdf->writeHTML($content, true, false, true, false, '');

    // Output PDF ke browser
    $pdf->Output('tiket_konser.pdf', 'I');
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