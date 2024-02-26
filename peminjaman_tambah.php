<h1 class="mt-4">Create Loan</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $buku_id = $_POST['buku_id'];
                        $user_id = $_SESSION['user']['user_id'];
                        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                        $status = $_POST['status'];

                        $query_stok_sebelum = mysqli_query($koneksi, "SELECT stok FROM buku WHERE buku_id = '$buku_id'");
                        $data_stok_sebelum = mysqli_fetch_assoc($query_stok_sebelum);
                        $stok_sebelum = $data_stok_sebelum['stok'];

                        if ($status == 'dipinjam') {
                            if ($stok_sebelum > 0) {
                                // Melakukan peminjaman buku
                                $query_pinjam = mysqli_query($koneksi, "INSERT INTO peminjaman(buku_id,user_id,tanggal_peminjaman,tanggal_pengembalian,status) values ('$buku_id','$user_id','$tanggal_peminjaman','$tanggal_pengembalian','$status')");

                                if ($query_pinjam) {
                                    // Mengurangi stok buku setelah peminjaman
                                    $stok_sesudah = $stok_sebelum - 1;
                                    mysqli_query($koneksi, "UPDATE buku SET stok = '$stok_sesudah' WHERE buku_id = '$buku_id'");

                                    echo '<script>alert("Penambahan data berhasil!");</script>';
                                } else {
                                    echo '<script>alert("Penambahan data gagal!");</script>';
                                }
                            } else {
                                // Menampilkan pesan kesalahan jika stok buku habis
                                echo '<script>alert("Stok buku sedang habis!");</script>';
                            }
                        } elseif ($status == 'dikembalikan') {
                            // Menambah stok buku saat pengembalian
                            $query_pengembalian = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE buku_id='$buku_id' AND user_id='$user_id' AND status='dipinjam'");

                            if ($query_pengembalian) {
                                // Menambah stok buku
                                $stok_sesudah = $stok_sebelum + 1;
                                mysqli_query($koneksi, "UPDATE buku SET stok = '$stok_sesudah' WHERE buku_id = '$buku_id'");

                                echo '<script>alert("Buku berhasil dikembalikan!");</script>';
                            } else {
                                echo '<script>alert("Gagal mengembalikan buku!");</script>';
                            }
                        }
                    }
                    ?>

                    <div class="row mb-3">
                        <div class="col-md-4">Buku</div>
                        <div class="col-md-8">
                            <select name="buku_id" class="form_control">
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                                while ($buku = mysqli_fetch_array($buk)) {
                                ?>
                                    <option value="<?php echo $buku['buku_id']; ?>"><?php echo $buku['judul']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Tanggal Peminjaman</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="tanggal_peminjaman">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Tanggal pengembalian</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="tanggal_pengembalian">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Status</div>
                        <div class="col-md-8">
                            <select name="status" class="form-control">
                                <option value="dipinjam">Dipinjam</option>
                                <option value="dikembalikan">Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-success" name="submit" value="submit"><i class="fa fa-floppy-disk"></i></button>
                            <a href="?page=peminjaman" class="btn btn-danger"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
