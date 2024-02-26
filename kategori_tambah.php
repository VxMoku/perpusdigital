<h1 class="mt-4">Create Category</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form method="post">
                <?php
                    if(isset($_POST['submit'])) {
                        $kategori = $_POST['kategori'];
                        $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) values('$kategori')");
                        
                        if($query) {
                            echo '<script>alert("Penambahan data berhasil!");</script>';
                        }else{
                            echo '<script>alert("Penambahan data gagal!");</script>';
                        }
                    }

                
                ?>
                <div class="row mb-3">
                    <div class="col-md-4">Nama Kategori</div>
                    <div class="col-md-8"><input type="text" class="form-control" name="kategori"></div>
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