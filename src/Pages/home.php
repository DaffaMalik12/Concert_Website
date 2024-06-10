<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home Page</title>
</head>

<body>
    <!-- Navbar -->
    <div style="background-color: #F1FF52;" class="navbar">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Item 1</a></li>
                    <li>
                        <a>Parent</a>
                        <ul class="p-2">
                            <li><a>Submenu 1</a></li>
                            <li><a>Submenu 2</a></li>
                        </ul>
                    </li>
                    <li><a>Item 3</a></li>
                </ul>
            </div>
            <a class="btn btn-ghost text-xl text-black">SantiTicket</a>
        </div>
        <div class="navbar-end hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a class="text-black font-semibold">About Us</a></li>
                <li><a class="text-black font-semibold">Events</a></li>
            </ul>
        </div>
        <div class="navbar-center">
            <a href="tiketing.php" style="background-color: #F1FF52;" class="btn  rounded-full text-black">Start a Guest</a>
        </div>
    </div>
    <!-- Jumbotron -->
    <div style="background-image: url(../asset/Img/Home\ Bg.png);" class="relative h-[650px] overflow-hidden  bg-cover bg-no-repeat p-12 text-center text-white">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden  bg-fixed">
            <div class="flex h-full items-center justify-center">
                <div class="text-black">
                    <h2 class="mb-4 text-4xl font-bold">SELAMAT DATANG</h2>
                    <h4 class="mb-6 text-xl font-mono">Temukan Informasi Penjualan Tiket Konser Disini !</h4>
                    <a href="register.php">
                        <button type="button" class="inline-block rounded-full border-2 bg-red-600  px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-300 hover:text-neutral-200 focus:border-neutral-300 focus:text-neutral-200 focus:outline-none focus:ring-0  dark:hover:bg-neutral-600 dark:focus:bg-neutral-600" data-twe-ripple-init data-twe-ripple-color="light">
                            Daftar
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</body>

</html>