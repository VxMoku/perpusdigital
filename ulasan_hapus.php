<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM ulasan WHERE ulasan_id=$id");
?>

<script>
    alert('Penghapusan data berhasil!');
    location.href = "index.php?page=ulasan";
</script>