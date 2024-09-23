<?php

require "config/app.php";

$id_category = (int)$_GET['id'];

$getDataById = query("SELECT * FROM categories WHERE id_category = $id_category")[0];

if (!$getDataById) {
    echo "<script>
                alert('Category not found');
                document.location.href = 'categories.php';
            </script>";
}

if (delete_category($id_category) > 0) {
    echo "<script>
                alert('Category has been deleted');
                document.location.href = 'categories.php';
            </script>";
} else {
    echo "<script>
                alert('Category has not been deleted');
                document.location.href = 'categories.php';
            </script>";
}
