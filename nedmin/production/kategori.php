<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$kategorisor=$db->prepare("SELECT kategori_id,kategori_ad,kategori_sira,kategori_ust,kategori_durum FROM kategori order by kategori_sira ASC");
$kategorisor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kategori Listeleme <small>,

              <?php 
              if(!empty($_GET['durum'])){
                if ($_GET['durum']=="ok") {?>

                  <b style="color:green;">İşlem Başarılı...</b>

                <?php } elseif ($_GET['durum']=="no") {?>

                  <b style="color:red;">İşlem Başarısız...</b>

                <?php } }

                ?>


              </small></h2>
              
              <div class="clearfix"></div>
              <div align="right">
                <a href="kategori-ekle.php"><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
              </div>
              
            </div>
            <div class="x_content">


              <!-- Div İçerik Başlangıç -->

              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Sıra No</th>
                    <th>Kategori Id</th>
                    <th>Kategori Ad</th>
                    <th>Kategori Sıra</th>
                    <th>Kategori Üst</th>
                    <th>Kategori durum</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>

                  <?php 
                  $siraNo=0;
                  while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { $siraNo++?>


                    <tr>
                      <td width="20"><?php echo $siraNo ?></td>
                      <td><?php echo $kategoricek['kategori_id'] ?></td>
                      <td><?php echo $kategoricek['kategori_ad'] ?></td>   
                      <td><?php echo $kategoricek['kategori_sira'] ?></td>
                      <td><?php echo $kategoricek['kategori_ust'] ?></td>
                      <td><center><?php    if($kategoricek['kategori_durum']==1){?>
                        <button class="btn btn-success btn-xs">Aktif</button>
                      <?php  }
                      else{ ?>
                        <button class="btn btn-danger btn-xs">Pasif</button>
                      <?php   } ?>

                      
                      <td><center><a href="kategori-duzenle.php?kategori_id=<?php echo $kategoricek['kategori_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                      <td><center><a href="../netting/islem.php?kategori_id=<?php echo $kategoricek['kategori_id'];  ?>&kategorisil=ok"><button class="btn btn-danger btn-xs">Sil</button></center></td>
                      </tr>



                    <?php  }

                    ?>


                  </tbody>
                </table>

                <!-- Div İçerik Bitişi -->


              </div>
            </div>
          </div>
        </div>




      </div>
    </div>
    <!-- /page content -->

    <?php include 'footer.php'; ?>
