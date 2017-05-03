<?php include "menu.php"; ?>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <div class="row">
          
          <div class="col-lg-10">
            <h3>Kategori Silme İşlemi</h1>
          </div>

          <div class="col-lg-2">
         
          </div>

        </div> 
      </div>
      
      <div class="row">
            <div class="col-xs-6 col-centered">
                <?php 

                  $query = $pdo->prepare("UPDATE kategori SET aktif='1' WHERE id = ? "); 
                  $delete = $query->execute(array($id));

                  if($delete){
                ?>
                  <div class="alert alert-success" role="alert">Kategori Başarıyla Silindi..</div>
                <?php }else{ ?>
                  <div class="alert alert-danger" role="alert">Bir Sorun Olmuş Olabilir, siz anasayfaya geçin</div>
                <?php } ?>
            </div>
      </div>

    </div>
