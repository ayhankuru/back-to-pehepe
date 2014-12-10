<?php include "menu.php"; ?>
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <div class="row">
          
          <div class="col-lg-10">
            <h3>Kategori Düzenleme Alanı</h1>
          </div>
 
      </div>
      
      <div class="row">
       
       <div class="col-xs-10 col-centered">
           <?php 
                   $query = $pdo->prepare("SELECT * FROM kategori WHERE id = ? ");
                   $query->execute(array($id)); 
                   $data =$query->fetch(PDO::FETCH_ASSOC);
                  if ( $data  ){ 
            ?>
              <form method="POST" action="/kategori/edit">
                  <div class="form-group"> 
                    <input type="text" class="form-control" name="kat_baslik" value="<?php echo $data['baslik']; ?>">
                  </div>
                  <div class="form-group">  
                  <textarea name="kat_aciklama" id="contentx" cols="30" rows="10" class="form-control"><?php echo $data['aciklama']; ?></textarea>
                  </div> 
                  <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                 
              <button type="submit" class="btn btn-primary btn-lg">Haberi Ekle</button>
            </form> 
            <?php }else{ ?>
              <div class="alert alert-danger" role="alert">Bir Sorun Olmuş Olabilir, siz anasayfaya geçin</div>
            <?php } ?>
          
          </div>

      </div>

    </div>
