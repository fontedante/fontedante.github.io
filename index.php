<?php

    $title = "Home";
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
                <h1 style="font-size:45px" class="my-4">Kategori</h1>
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
                    <form action="" class="form-search-c">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input class="form-control" type="search" value="<?php if(isset($_GET['s'])){echo $_GET['s'];}?>" name="s" placeholder="Masukkan Nama Produk Yang Diinginkan">
                                </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="submit" class="btn btn-info btn-sm" value="Cari Produk">
                            </div>    
                        </div> 
                    </form>
                </div>
                <?php
                
                if(mysql_num_rows($query) > 0){
                do{

                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a class="link-image-product" href="tampil.php?id=<?=$data['id_barang'];?>">
                                <img class="card-img-top" src="<?=BASE_URL;?>assets/barang/<?=$data['gambar_barang'];?>" alt="">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="tampil.php?id=<?=$data['id_barang'];?>"><?=$data['nama_barang'];?></a>
                                </h4>
                                <h5>Rp. <?=number_format($data['harga_barang']);?></h5>
                            </div>
                            <div class="card-footer">
                                <a class="btn-beli" href="tampil.php?id=<?=$data['id_barang'];?>">BELI</a>
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