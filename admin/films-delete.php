<?php

require "config/app.php";

$id_film = (int)$_GET['id'];

$getDataById = query("SELECT * FROM films WHERE id_film = $id_film")[0];

if (!$getDataById) {
    echo "<script>
                alert('Film not found');
                document.location.href = 'films.php';
            </script>";
}

if (delete_film($id_film) > 0) {
    echo "<script>
                alert('Film has been deleted');
                document.location.href = 'films.php';
            </script>";
} else {
    echo "<script>
                alert('Film has not been deleted');
                document.location.href = 'films.php';
            </script>";
}
