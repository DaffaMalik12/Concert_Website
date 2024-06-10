<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_konser = "IVE THE 1ST WORLD TOUR SHOW WHAT i HAVE IN JAKARTA";
    $tanggal_event = "Sabtu, 24 Agustus";
    $nama_lengkap = $_POST["nama_lengkap"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $email = $_POST["email"];
    $nomor_ktp = $_POST["nomor_ktp"];
    $no_rek = $_POST["nomor_rekening"];
    $masa_berlaku = "24 Agustus";
    $kelas = "REGULER 1";
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "santi_db";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO konser_table (nama_konser, tanggal_event, nama_lengkap, nomor_telepon, email, nomor_ktp, no_rek, masa_berlaku, kelas) 
            VALUES ('$nama_konser', '$tanggal_event', '$nama_lengkap', '$nomor_telepon', '$email', '$nomor_ktp', '$no_rek', '$masa_berlaku', '$kelas')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the same page to prevent form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div class="container mx-auto">
        <!-- Navbar -->
        <nav style="background-color: #F1FF52;" class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="../../asset/img/Frame 1.png" class="h-16 lg:relative lg:left-10" alt="Flowbite Logo" />
                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse lg:relative lg:right-10">
                    <?php if ($isLoggedIn) : ?>
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="../../asset/Img/3d_avatar_12.png" alt="user photo">
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white"><?php echo $_SESSION['username']; ?></span>
                                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"></span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="../../../Config/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <a href="../login.php" class="text-black text-xl font-semibold">Login</a>
                    <?php endif; ?>
                    <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul style="background-color: #F1FF52;" class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
                        <li>
                            <a href="../tiketing.php" class="block py-2 px-3 text-black text-xl rounded hover:text-blue-600 " aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-black text-xl rounded hover:text-blue-500">About</a>
                        </li>
                    </ul>
                    <!-- search -->
                    <form class="max-w-md relative left-80 w-80">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Konser Apa lagi?" required />
                            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 ">Search</button>
                        </div>
                    </form>

                </div>
            </div>
        </nav>
        <!-- Akhir Navbar -->
        <!-- Jumbotron -->
        <section>
            <div class="pembungkus-gambar">
                <img style="height: 500px;" src="../../asset/img/3cceddcc55b886a1ac1b2911cf2646c0.jpg" alt="" class="  blur-sm mx-auto w-full relative -z-0">
                <img style="margin-top: -500px; height: 500px;  " src="../../asset/img/3cceddcc55b886a1ac1b2911cf2646c0.jpg" alt=" " class="relative z-10 w-11/12 mx-auto ">
            </div>
        </section>
        <!-- Akhir Jumbotron -->
        <!-- Artikel -->
        <!-- Article -->
        <article class="flex ">
            <h1 style="width: 1200px;" class="font-bold text-5xl p-10">IVE THE 1ST WORLD TOUR SHOW WHAT i HAVE IN JAKARTA</h1>
            <div class="pembungkus flex flex-col lg:ml-12">
                <p class="text-xl font-semibold p-10">Mulai Dari</p>
                <p class="text-2xl font-semibold text-red-600 lg:-mt-9 mb-3">IDR. 1.225.000</p>
                <button id="lihatPaketButton" style="display: none;" type="button" class="mt-20 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Lihat Paket</button>
            </div>
        </article>

        <div class="pembungkus-lokasi flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 lg:ml-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
            <p class="lg:pl-2 text-lg font-medium">ICE BSD City, Jalan BSD Grand Boulevard, Pagedangan, Tangerang Regency, Banten, Indonesia</p>
        </div>
        <div class="pembungkus-kalender flex lg:mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 lg:ml-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
            </svg>
            <p class="lg:pl-2 text-lg font-medium">24 Agustus 2024</p>
        </div>
        <!-- Akhir Artikel -->

        <!-- Deskripsi -->
        <section>
            <div class="card lg:w-11/12 bg-slate-200 lg:h-96 lg:relative lg:top-28 lg:mx-auto rounded-lg">
                <div class="pembungkus-tulisan p-10">
                    <h1 class="font-semibold text-xl">Info Penting</h1>
                    <ul>
                        <li class="font-medium text-lg">General Sales dimulai pada 28 Desember 2023 pukul 14.00 WIB</li>
                        <li class="font-medium text-lg">Maks. pembelian 2 tiket per akun/ID per show day.</li>
                        <li class="font-medium text-lg">Wajib login ke akun tiket.com untuk melakukan pembelian.</li>
                        <li class="font-light text-lg">Tiket Kategori Blue Soundcheck tidak dapat dipindahtangkan. Akan ada pemeriksaan kartu identitas dan pencocokan wajah.</li>
                        <li class="font-light text-lg">Semua kategori menggunakan nomor kursi (Numbered Seating). Penentuan kursi akan diatur oleh sistem tiket.com berdasarkan ketersediaan tiket, sehingga kemungkinan bisa terpisah meskipun dengan satu order ID yang sama.</li>
                        <li class="font-medium text-lg">Semua penonton berusia 18 tahun ke atas wajib sudah mendapatkan vaksinasi booster.</li>
                        <li class="font-light text-lg">Selesaikan pembayaran maksimal 15 menit setelah melakukan pemesanan. E-tiket tidak akan terbit jika pembayaran dilakukan setelah waktu pembayaran habis.</li>
                        <li class="font-light text-lg">Jika ditemukan penggunaan bot dalam pembelian tiket ini, maka tiket.com berhak melakukan pembatalan tiket tersebut.</li>
                        <li class="font-light text-lg">Informasi lebih lanjut: <a href="bit.ly/iveinjkt2024" class="text-blue-600">bit.ly/iveinjkt2024</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Akhir Deskripsi -->
        <!-- Card Tiket -->
        <section class="lg:relative top-40">
            <h1 class="font-bold text-3xl  lg:pl-16 font-mono">Paket</h1>
            <!-- Card 1 -->
            <div class="pembungkus-card flex items-center justify-center lg:mt-10 flex-wrap lg:gap-10">
                <div class="bg-white rounded-lg shadow-md p-6 w-80">
                    <form action="JKT_48.php" method="POST">
                        <h2 class="text-lg font-semibold mb-2">REGULER 1</h2>
                        <div class="text-gray-700 mb-4">
                            <div class="flex justify-between">
                                <span>Tanggal Event</span>
                                <span>Sabtu, 24 Agustus</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Masa berlaku:</span>
                                <span>24 Agustus</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-gray-700">Jumlah Tiket</span>
                            <div class="flex items-center space-x-2">
                                <button class="text-gray-600 hover:text-gray-800 focus:outline-none" onclick="decrementTicket()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <span name="jumlah_tiket" class="text-gray-700" id="ticketCount">1</span>
                                <button class="text-gray-600 hover:text-gray-800 focus:outline-none" onclick="incrementTicket()">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="border-t pt-4">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-700">Total (1 Pax)</span>
                                <span class="text-red-600 font-semibold" id="totalPrice">Rp. 1.225.000</span>
                            </div>
                            <!-- Button to open modal -->
                            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="w-full bg-red-600 text-white font-semibold py-2 rounded-lg">Pesan</button>

                            <!-- Pop up -->
                            <!-- Main modal -->
                            <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative backdrop-blur-sm bg-white/30 rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900">
                                                Pembayaran
                                            </h3>
                                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5">
                                            <div>
                                                <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Lengkap" required />
                                            </div>
                                            <div>
                                                <label for="nomor_telepon" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon</label>
                                                <input type="text" name="nomor_telepon" id="nomor_telepon" placeholder="Nomor Telepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                            </div>
                                            <div>
                                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                                <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                            </div>
                                            <div>
                                                <label for="nomor_ktp" class="block mb-2 text-sm font-medium text-gray-900">Nomor KTP</label>
                                                <input type="text" name="nomor_ktp" id="nomor_ktp" placeholder="Nomor KTP" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5 mt-5 mb-5">
                                                        <input type="radio" id="bri" class="me-2" name="payment_method" value="BRI">
                                                        <label for="bri">BRI</label>
                                                        <input type="radio" id="dana" class="me-2 ms-24" name="payment_method" value="DANA">
                                                        <label for="dana">DANA</label>
                                                        <input type="radio" id="ovo" class="me-2 ms-24" name="payment_method" value="OVO">
                                                        <label for="ovo">OVO</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="numberInputContainer" style="display: none;" class="flex flex-col">
                                                <label for="nomor_rekening" class="block mb-2 text-sm font-medium text-gray-900">Masukkan Nomor:</label>
                                                <input type="text" name="nomor_rekening" id="nomor_rekening" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full mb-5" />
                                                <label for="harga_total" class="block mb-2 text-sm font-medium text-gray-900">Harga Total:</label>
                                                <input type="number" value="1225000" name="harga_total" id="harga_total" disabled class="total_price bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" placeholder="Rp." />
                                            </div>
                                            <form id="paymentForm" action="tes.php" method="POST">
                                                <!-- Button pertama (Bayar) -->
                                                <button type="submit" class="w-full mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-n  one focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Bayar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir modal -->
                    </form>
                </div>
                <!-- Card 2 -->
                <div class="bg-white rounded-lg shadow-md p-6 w-80">
                    <h2 class="text-lg font-semibold mb-2">REGULER 2</h2>
                    <div class="text-gray-700 mb-4">
                        <div class="flex justify-between">
                            <span>Tanggal Event</span>
                            <span>Sabtu, 24 Agustus</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Masa berlaku:</span>
                            <span>24 Agustus</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-700">Jumlah Tiket</span>
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <span class="text-gray-700">0</span>
                            <button class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="border-t pt-4">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-700">Total (0 Pax)</span>
                            <span class="text-red-600 font-semibold"></span>
                        </div>
                        <button class="w-full bg-red-600 text-white font-semibold py-2 rounded-lg">Pesan</button>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-white rounded-lg shadow-md p-6 w-80">
                    <h2 class="text-lg font-semibold mb-2">REGULER 3</h2>
                    <div class="text-gray-700 mb-4">
                        <div class="flex justify-between">
                            <span>Tanggal Event</span>
                            <span>Sabtu, 24 Agustus</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Masa berlaku:</span>
                            <span>24 Agustus</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-700">Jumlah Tiket</span>
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <span class="text-gray-700">0</span>
                            <button class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="border-t pt-4">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-700">Total (0 Pax)</span>
                            <span class="text-red-600 font-semibold"></span>
                        </div>
                        <button class="w-full bg-red-600 text-white font-semibold py-2 rounded-lg">Pesan</button>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="bg-white rounded-lg shadow-md p-6 w-80">
                    <h2 class="text-lg font-semibold mb-2">VIP</h2>
                    <div class="text-gray-700 mb-4">
                        <div class="flex justify-between">
                            <span>Tanggal Event</span>
                            <span>Sabtu, 24 Agustus</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Masa berlaku:</span>
                            <span>24 Agustus</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-700">Jumlah Tiket</span>
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <span class="text-gray-700">0</span>
                            <button class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="border-t pt-4">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-gray-700">Total (0 Pax)</span>
                            <span class="text-red-600 font-semibold"></span>
                        </div>
                        <button class="w-full bg-red-600 text-white font-semibold py-2 rounded-lg">Pesan</button>
                    </div>

                </div>

            </div>
    </div>
    </section>
    <!-- Akhir Card Tiket -->
    <!-- Footer -->
    <footer class="bg-white  shadow dark:bg-gray-900 lg:mt-48 ">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="../../asset/img/Frame 1.png" class="h-16" alt="Flowbite Logo" />
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.</span>
        </div>
    </footer>
    <!-- akhir Footer -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="../../script/TombolMuncul.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#paymentForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah form dari submit secara default

                // Proses submit form menggunakan AJAX
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        // Logika tambahan setelah berhasil submit form
                        alert('Pembayaran Berhasil');
                        bayarSuccess();
                    },
                    error: function(response) {
                        // Logika tambahan jika submit form gagal
                        alert('Pembayaran Gagal');
                    }
                });
            });
        });

        function bayarSuccess() {
            // Menampilkan tombol "Lihat Paket" setelah pembayaran berhasil
            document.getElementById("lihatPaketButton").style.display = 'block';
        }
    </script>
    <script src="../../script/functionIcrementDecrement.js">
    </script>
    <script src="../../script/formRadio.js">
    </script>
    </script>
    <script script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script script src="https://cdn.tailwindcss.com"></script>
    </script>
</body>

</html>