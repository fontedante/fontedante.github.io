<?php

$title = "Bayar Produk";
require "includes/header.php";

if(isset($_POST['bayar'])){
    $nama = $_POST['nama'];
    $telp = $_POST['phone'];
    $alamat = $_POST['alamat'];
    
    $insert = mysql_query("insert into kostumer (nama_kostumer, alamat_kostumer, telp_kostumer) value ('$nama','$alamat','$telp')");
    if($insert){
        $kost_id = mysql_query("select id_kostumer from kostumer order by id_kostumer DESC");
        $res_kost = mysql_fetch_assoc($kost_id);
        $kostumer_id = $res_kost['id_kostumer'];
        $qty = $_POST['qty'];
        $id = $_POST['id'];
        $setPenjualan = mysql_query("insert into penjualan(qty_penjualan, id_barang, id_kostumer)value ('$qty', '$id', '$kostumer_id')");

        if($setPenjualan){

            $Qbarang = mysql_query("select * from barang where id_barang = '$id'");
            $data = mysql_fetch_assoc($Qbarang);

?>            

    <div class="row">
        <div class="col-md-12">
            <h2>Detail Pembayaran</h2>
            <table class="table">
                <thead>
                    <tr> 
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Qty</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td><?=$data['nama_barang'];?></td>
                        <td>Rp. <?=number_format($data['harga_barang']);?></td>
                        <td><?=$qty;?></td>
                        <td>Rp. <?=number_format($data['harga_barang'] * $qty);?></td>
                    </tr>
                </tbody>
            </table>
            <h3>Total Yang Harus Di bayar : Rp. <?=number_format($data['harga_barang'] * $qty);?></h3>
        </div>
        <div class="col-md-12">
            <hr>
            <p>Informasi Pembayaran:</p>
            <p>What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

Why do we use it?
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</P>
        </div>
    </div>   
<?php
        }
    
    }
   
}

?>
<?php require "includes/footer.php"; ?> 
 ?>