<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>

<body style="background-image: url(../asset/Img/Landing\ Page\ User\ Bg.png);" class="bg-cover">
    <div class="container">
        <!-- Navbar -->
        <nav style="background-color: #F1FF52;" class="bg-white border-gray-200 ">
            <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="../asset/Img/Frame 1.png" class="h-16 lg:ml-10" alt="Flowbite Logo" />

                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <?php if ($isLoggedIn) : ?>
                        <button type="button" class="flex text-sm bg-gray-800 lg:mr-10 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="../asset/img/3d_avatar_12.png" alt="user photo">
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-gray-900 dark:text-white"><?php echo $_SESSION['username']; ?></span>
                                <span class="block text-sm text-gray-500 truncate dark:text-gray-400"></span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="../.././Config/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <a href="login.php" class="text-black text-xl font-semibold">Login</a>
                    <?php endif; ?>
                    <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden -ml-20 w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul style="background-color: #F1FF52;" class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white ">
                        <li>
                            <a href="#" class="block py-2 px-3 text-black text-xl hover:bg-white rounded">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-black rounded text-xl hover:bg-white ">About</a>
                        </li>
                        <li>
                            <?php if ($isLoggedIn) : ?>
                                <a href="lihatTiket.php" class="block py-2 px-3 text-black rounded text-xl hover:bg-white">Lihat_tiket</a>
                            <?php else : ?>
                                <a href="" class="block py-2 px-3 text-black rounded text-xl hover:bg-white">Services</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Search -->
        <!-- Search -->
        <form onsubmit="searchConcerts(event)" class="flex items-center max-w-sm mx-auto mt-16">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <input id="simple-search" type="text" class="backdrop-blur-sm bg-white/30 shadow-2xl bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full text-center focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Konser Apa Lagi Besok?" required />
            </div>
            <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-black w-32 rounded-full border hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 hover:text-white">
                Search
                <span class="sr-only">Search</span>
            </button>
        </form>
        <!-- Akhir Search -->

        <!-- Card -->
        <!-- Card 1 -->
        <div class="flex flex-wrap justify-center items-center mt-20 gap-20 ">
            <div class="max-w-sm backdrop-blur-sm bg-white/30 border border-gray-200 rounded-lg shadow">
                <?php if ($isLoggedIn) : ?>
                    <a href="deskripsi/JKT_48.php">
                        <img class="rounded-t-lg" src="../asset/img/Foto Jkt Resize.jpg" alt="" />
                    </a>
                <?php else : ?>
                    <a href="#" onclick="alert('Anda harus login terlebih dahulu')">
                        <img class="rounded-t-lg" src="../asset/img/Foto Jkt Resize.jpg" alt="" />
                    </a>
                <?php endif; ?>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">JKT48 INDONESIA MILENIAL & GE..</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Jakarta, 24-26 November 2024</p>
                    <p class="mb-3 font-mono text-2xl font-semibold text-red-600">Rp 450.000</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="max-w-sm backdrop-blur-sm bg-white/30 border border-gray-200 rounded-lg shadow">
                <?php if ($isLoggedIn) : ?>
                    <a href="deskripsi/nadin_hamzah.php">
                        <img class="rounded-t-lg" src="../asset/img/Market-East-Festival.jpg" alt="" />
                    </a>
                <?php else : ?>
                    <a href="#" onclick="alert('Anda harus login terlebih dahulu')">
                        <img class="rounded-t-lg" src="../asset/img/Market-East-Festival.jpg" alt="" />
                    </a>
                <?php endif; ?>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Market East Festival! Nadin Amizah</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ternate, 1-2 Juni 2024</p>
                    <p class="mb-3 font-mono text-2xl font-semibold text-red-600">Rp 850.000</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="max-w-sm backdrop-blur-sm bg-white/30 border border-gray-200 rounded-lg shadow">
                <?php if ($isLoggedIn) : ?>
                    <a href="deskripsi/IVE.php">
                        <img class="rounded-t-lg" src="../asset/img/konser-ive-resize.jpg" alt="" />
                    </a>
                <?php else : ?>
                    <a href="#" onclick="alert('Anda harus login terlebih dahulu')">
                        <img class="rounded-t-lg" src="../asset/img/konser-ive-resize.jpg" alt="" />
                    </a>
                <?php endif; ?>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">IVE THE 1ST WORLD TOUR SHOW.. </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Jakarta, 24 Agustus 2024</p>
                    <p class="mb-3 font-mono text-2xl font-semibold text-red-600">Rp 2.200.000</p>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="max-w-sm backdrop-blur-sm bg-white/30 border border-gray-200 rounded-lg shadow">
                <?php if ($isLoggedIn) : ?>
                    <a href="deskripsi/Avenged.php">
                        <img class="rounded-t-lg" src="../asset/img/THZa07MrVO.jpg" alt="" />
                    </a>
                <?php else : ?>
                    <a href="#" onclick="alert('Anda harus login terlebih dahulu')">
                        <img class="rounded-t-lg" src="../asset/img/THZa07MrVO.jpg" alt="" />
                    </a>
                <?php endif; ?>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Avenged Sevenfold THE ONLY STO..</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Jakarta, 25 Mei 2024</p>
                    <p class="mb-3 font-mono text-2xl font-semibold text-red-600">Rp 1.600.000</p>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="max-w-sm backdrop-blur-sm bg-white/30 border border-gray-200 rounded-lg shadow">
                <?php if ($isLoggedIn) : ?>
                    <a href="deskripsi/Westlife.php">
                        <img class="rounded-t-lg" src="../asset/img/poster-konser-westlife-di-candi-prambanan.jpeg.jpg" alt="" />
                    </a>
                <?php else : ?>
                    <a href="#" onclick="alert('Anda harus login terlebih dahulu')">
                        <img class="rounded-t-lg" src="../asset/img/poster-konser-westlife-di-candi-prambanan.jpeg.jpg" alt="" />
                    </a>
                <?php endif; ?>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Westlife The Hits Tour 2024</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Yogyakarta, 7 Juni 2024</p>
                    <p class="mb-3 font-mono text-2xl font-semibold text-red-600">Rp 1.400.000</p>
                </div>
            </div>
            <!-- Card 6 -->
            <div class="max-w-sm backdrop-blur-sm bg-white/30 border border-gray-200 rounded-lg shadow">
                <?php if ($isLoggedIn) : ?>
                    <a href="deskripsi/AlanWalker.php">
                        <img class="rounded-t-lg" src="../asset/img/alan-walker-1.jpeg (1).jpg" alt="" />
                    </a>
                <?php else : ?>
                    <a href="#" onclick="alert('Anda harus login terlebih dahulu')">
                        <img class="rounded-t-lg" src="../asset/img/alan-walker-1.jpeg (1).jpg" alt="" />
                    </a>
                <?php endif; ?>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Alan Walker World South East Asia..</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Jakarta, 8 Juni 2024</p>
                    <p class="mb-3 font-mono text-2xl font-semibold text-red-600">Rp 750.000</p>
                </div>
            </div>
            <!-- Card 7 -->
            <div class="max-w-sm backdrop-blur-sm bg-white/30 border border-gray-200 rounded-lg shadow">
                <?php if ($isLoggedIn) : ?>
                    <a href="deskripsi/Soora.php">
                        <img class="rounded-t-lg" src="../asset/img/Soora-Music-Festival-resize.jpg" alt="" />
                    </a>
                <?php else : ?>
                    <a href="#" onclick="alert('Anda harus login terlebih dahulu')">
                        <img class="rounded-t-lg" src="../asset/img/Soora-Music-Festival-resize.jpg" alt="" />
                    </a>
                <?php endif; ?>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Soora Music Festival!</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Bandung, 8-9 Juni 2024</p>
                    <p class="mb-3 font-mono text-2xl font-semibold text-red-600">Rp 200.000</p>
                </div>
            </div>
            <!-- Card 8 -->
            <div class="max-w-sm backdrop-blur-sm bg-white/30 border-gray-200 rounded-lg shadow">
                <?php if ($isLoggedIn) : ?>
                    <a href="deskripsi/Baekhyun.php">
                        <img class="rounded-t-lg" src="../asset/img/Baekhyun-resize.jpg" alt="" />
                    </a>
                <?php else : ?>
                    <a href="#" onclick="alert('Anda harus login terlebih dahulu')">
                        <img class="rounded-t-lg" src="../asset/img/Baekhyun-resize.jpg" alt="" />
                    </a>
                <?php endif; ?>
                <div class="p-5">
                    <a href="#  ">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Baekhyun Asia Tour “LONSDALEITE” </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Jakarta, 1-2 Juni 2024</p>
                    <p class="mb-3 font-mono text-2xl font-semibold text-red-600">Rp 2.200.000</p>
                </div>
            </div>
            <!-- Card 9 -->
            <div class="max-w-sm backdrop-blur-sm bg-white/30 border border-gray-200 rounded-lg shadow">
                <?php if ($isLoggedIn) : ?>
                    <a href="deskripsi/AlloBank.php">
                        <img class="rounded-t-lg" src="../asset/img/Allo-Bank-Festival-2024-resize.jpg" alt="" />
                    </a>
                <?php else : ?>
                    <a href="#" onclick="alert('Anda harus login terlebih dahulu')">
                        <img class="rounded-t-lg" src="../asset/img/Allo-Bank-Festival-2024-resize.jpg" alt="" />
                    </a>
                <?php endif; ?>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Allo Bank Festival 2024</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Jakarta, 21-22 Juni 2024</p>
                    <p class="mb-3 font-mono text-2xl font-semibold text-red-600">Rp 300.000</p>
                </div>
            </div>
        </div>
        <!-- Akhir Card -->
    </div>

    <script>
        function searchConcerts(event) {
            event.preventDefault(); // Mencegah pengiriman form

            // Ambil nilai pencarian
            var query = document.getElementById('simple-search').value.toLowerCase();

            // Ambil semua card konser
            var cards = document.querySelectorAll('.max-w-sm');

            // Loop melalui setiap card dan sembunyikan/munculkan sesuai dengan pencarian
            cards.forEach(function(card) {
                var concertName = card.querySelector('h5').innerText.toLowerCase();
                var concertLocation = card.querySelector('p:nth-of-type(2)').innerText.toLowerCase();
                var concertDate = card.querySelector('p:nth-of-type(3)').innerText.toLowerCase();

                if (concertName.includes(query) || concertLocation.includes(query) || concertDate.includes(query)) {
                    card.style.display = 'block'; // Tampilkan card jika sesuai dengan pencarian
                } else {
                    card.style.display = 'none'; // Sembunyikan card jika tidak sesuai dengan pencarian
                }
            });
        }
    </script>
</body>

</html>