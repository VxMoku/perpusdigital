<h1 class="mt-4">Edit Category</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-mb-12">
            <form method="post">
                <?php
                    $id = $_GET['id'];
                    if(isset($_POST['submit'])) {
                        $kategori = $_POST['kategori'];
                        $query = mysqli_query($koneksi, "UPDATE kategori set kategori='$kategori' where kategori_id=$id");
                        
                        if($query) {
                            echo '<script>alert("Pengubahan data behasil!");</script>';
                        }else{
                            echo '<script>alert("Pengubahan data gagal!");</script>';
                        }
                    }
                    $query = mysqli_query($koneksi, "SELECT * FROM kategori where kategori_id=$id");
                    $data = mysqli_fetch_array($query);
                
                ?>
                <div class="row mb-3">
                    <div class="col-mb-4">Nama Kategori</div>
                    <div class="col-mb-8"><input type="text" class="form-control" value="<?php echo $data['kategori']; ?>" name="kategori"></div>
                </div>
                <div class="row">
                    <div class="col-mb-4"></div>
                    <div class="col-mb-8">
                            <button type="submit" class="btn btn-success" name="submit" value="submit"><i class="fa fa-floppy-disk"></i></button>
                            <a href="?page=kategori" class="btn btn-danger"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>
</div>