<?php

session_start();

if (!isset($_SESSION['login'])) {
    echo "<script>
            alert('Please login first');
            document.location.href = 'login.php';
        </script>";

    exit;
}

$title = "Dashboard";

// require digunakan untuk memanggil file lain kedalam file yang sedang dijalankan
// jika file yang dipanggil tidak ditemukan maka akan menampilkan error (Fatal Error)
// dan proses akan dihentikan
require "layout/header.php";

?>

<!-- main -->
<main class="p-4">
    <div class="containter">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <i class="bi bi-pie-chart-fill"></i>
                        <?= $title; ?>
                        Welcome <?= $_SESSION['login']; ?>
                    </div>

                    <div class="card-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur voluptatum a aut
                        praesentium accusantium quos voluptas quasi voluptatem. Qui eaque dignissimos incidunt sint
                        unde illum doloribus ut magni beatae eveniet?
                    </div>

                    <div class="card-footer">
                        Footer
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

require "layout/footer.php";

?>
