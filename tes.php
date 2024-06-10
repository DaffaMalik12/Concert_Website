<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body class="flex flex-col items-center">
    <!-- Article -->
    <article class="flex flex-col items-center mt-10">
        <h1 style="width: 1200px;" class="font-bold text-5xl p-10">IVE THE 1ST WORLD TOUR SHOW WHAT i HAVE IN JAKARTA</h1>
        <div class="pembungkus flex flex-col lg:ml-12">
            <p class="text-xl font-semibold p-10">Mulai Dari</p>
            <p class="text-2xl font-semibold text-red-600 lg:-mt-9 mb-3">IDR. 1.225.000</p>
            <button id="lihatPaketButton" style="display: none;" type="button" class="mt-20 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Lihat Paket</button>
        </div>
    </article>

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
                        <button type="submit" class="w-full mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir modal -->

    <script script src="/src/script/functionIcrementDecrement.js"></script>
    <script src="/src/script/formRadio.js"></script>
    </script>
    <script script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            document.getElementById("lihatPaketButton").style.display = "block";
        }
    </script>
</body>

</html>