<h1 class="mt-4"></h1>
<body style="background-image: url('assets/img/bgperp2.jpg');background-position:center;background-repeat:no-repeat;height:100px;background-size:cover;">

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>

                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-mb-6">
                                <div class="card bg-warning text-dark mb-4">
                                    <div class="card-body"><?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori"));
                                    ?>
                                    Total Categories</div>
                                    
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-mb-6">
                                <div class="card bg-warning text-dark mb-4">
                                    
                                    <div class="card-body">
                                        <?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku"));
                                    ?>
                                    Total Books</div>
                                    
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-mb-6">
                                <div class="card bg-warning text-dark mb-4">
                                    <div class="card-body"><?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ulasan"));
                                    ?>
                                    Total Reviews</div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-3 col-mb-6">
                                <div class="card bg-warning text-dark mb-4">
                                    <div class="card-body"><?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user"));
                                    ?>
                                    Total Users</div>
                                    
                                </div>
                            </div>
                        </div>

        
 