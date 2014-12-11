<?php include "menu.php"; ?>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <div class="row">
          
          <div class="col-lg-10">
            <h3>Haber Düzenleme Alanı</h1>
          </div>
 
      </div>
      
      <div class="row">
       
       <div class="col-xs-10 col-centered">
       
       <?php 
        $query = $pdo->prepare("Select haber.baslik,haber.id,haber.content,haber_kat.kat_id,fotograf.foto_dizin,tag.id tid,tag.content tcontent from haber
                                INNER JOIN haber_kat ON haber_kat.haber_id = haber.id 
                                INNER JOIN fotograf ON haber.foto_id = fotograf.id 
                                INNER JOIN tag ON haber.tag_id = tag.id
                                Where haber.id=? ");
         $query->execute(array($id));
         $datas = $query->fetch(PDO::FETCH_ASSOC);
          
        if($datas){

        ?>    
              <form method="POST" action="/haber/edit" enctype="multipart/form-data">
                  <div class="form-group"> 
                    <input type="text" class="form-control" name="baslik"  value="<?php echo $datas['baslik']; ?>">
                  </div>
                  <div class="form-group">  
                  <textarea name="content" id="contentx" cols="30" rows="10" class="form-control"><?php echo $datas['content']; ?></textarea>
                  </div> 
                  <input type="hidden" name="id" value="<?php echo $datas['id']; ?>">
                  <input type="hidden" name="tagid" value="<?php echo $datas['tid']; ?>">
                  <div class="checkbox">
                  <b>Haber Kategorileri</b><br>
                  
                   <?php 

                    $query = $pdo->query("SELECT * FROM kategori Where aktif=0 ")->fetchAll(PDO::FETCH_ASSOC);
                    if ( $query || count($query) > 1 ){
                    ?>
                    <select class="form-control" name="kat">
                    <?php
                      for ($i=0; $i < count($query) ; $i++) { 
                    ?>
                    <option value="<?php  echo $query[$i]['id']; ?>" <?php  if($query[$i]['id'] ==$datas['kat_id'] ){ echo "selected"; } ?> ><?php  echo $query[$i]['baslik']; ?></option>

                    <?php 
                      }
                    ?>
                    </select>
                    <?php 
                    }else{
                  
                  ?>
                    <div class="alert alert-danger" role="alert"> Önce Kategori Eklemelisin</div>
                  <?php } ?>

                  
              </div>
              <div class="form-group"> 
                    <b>Haber Etiketleri</b><br>
                    <input type="text" class="form-control" name="tag" value="<?php echo $datas['tcontent']; ?>">
                  </div>
             
              <button type="submit" class="btn btn-primary btn-lg">Haberi Düzenle</button>

            </form> 
          <?php }else{ ?>  
           <div class="alert alert-danger" role="alert">Bir sorun oluştu..</div>
          <?php } ?>
          </div>

      </div>

    </div>
