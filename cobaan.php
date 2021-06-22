<?php

    $title = "Home ";
    require "includes/header.php";

    if(isset($_GET['filter'])){

        $query = mysql_query("select * from barang where id_kategori = '".$_GET['filter']."'");
        $data = mysql_fetch_assoc($query);
    }else 
    if(isset($_GET['s'])){
        $key = "%".$_GET['s']."%";
        $query = mysql_query("select * from barang where nama_barang like '$key'");
        $data = mysql_fetch_assoc($query);
    }else{
        $query = mysql_query("select * from barang order by id_barang DESC");
        $data = mysql_fetch_assoc($query);
    }
?>


<div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">Shop Name</h1>
                <div class="list-group">
                    <?php
                        $Qkategori = mysql_query("select * from kategori order by nama_kategori ASC");
                        $kategori = mysql_fetch_assoc($Qkategori);

                        do{
                    ?>
                    <a href="?filter=<?=$kategori['id_kategori'];?>" class="list-group-item"><?=$kategori['nama_kategori'];?></a>
                    <?php
                        }while($kategori = mysql_fetch_assoc($Qkategori));
                    ?>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                <div class="col-lg-12 mt-3">
                    <form action="?s=">
                        <div class="form-group">
                            <input class="form-control" type="search" value="<?php if(isset($_GET['s'])){echo $_GET['s'];}?>" name="s" placeholder="Masukkan Nama Produk Yang Diinginkan">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info btn-sm" value="Cari Produk">
                        </div>    


                    </form>
                </div>
                
                <?php
                
                if(mysql_num_rows($query) > 0){
                do{



                
                ?>
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="tampil.php?id=<?=$data['id_barang'];?>"><img class="card-img-top" src="<?=BASE_URL;?>assets/barang/<?=$data['gambar_barang'];?>" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="tampil.php?id=<?=$data['id_barang'];?>"><?=$data['nama_barang'];?></a>
                                </h4>
                                <h5>Rp. <?=$data['harga_barang'];?></h5>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            </div>
                        </div>
                    </div>

                    <?php
                }while($data = mysql_fetch_assoc($query));
            }else{
                echo "Tidak Ada Produk Yang Dapat Ditampilkan... :(";
            }
            ?>

        </div>
      </div>
  </div>   



<?php require "includes/footer.php"; ?>        