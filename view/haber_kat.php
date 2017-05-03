<?php include "menu.php"; ?>
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <div class="row">
          
          <div class="col-lg-10">
            <h3>Haberler..</h1>
          </div>

          <div class="col-lg-2">
        </div> 
      </div>
      
      <div class="row">
        
        
        
        <?php 

        $query = $pdo->prepare("Select haber.baslik,haber.id,haber.content,fotograf.foto_dizin,tag.content tcontent from haber
                                INNER JOIN haber_kat ON haber_kat.haber_id = haber.id 
                                INNER JOIN fotograf ON haber.foto_id = fotograf.id 
                                INNER JOIN tag ON haber.tag_id = tag.id
                                Where haber_kat.kat_id=? and haber.aktif=? ORDER BY haber.id DESC ");
         $query->execute(array($kat,0));
         $datas = $query->fetchAll(PDO::FETCH_ASSOC);
          
          if($datas || count($datas) > 0 ){
             for ($i=0; $i < count($datas) ; $i++) { 
        ?>
            <div class="col-lg-4"> 
                    <h3 class="text-center"><a href="#"><?php echo substr($datas[$i]['baslik'], 0, 15).'...'; ?></a></h4>
                     <img src="<?php echo uri; ?><?php  echo $datas[$i]['foto_dizin']; ?>" alt="..." class="img-rounded cover">
                     <p class="lead"><?php  echo substr($datas[$i]['content'], 0, 200).'...'; ?></p>
                     <p><?php  
                     $tags =explode(',', $datas[$i]['tcontent']);
                      foreach ($tags  as $key => $value) {
                        ?>
                          <mark><a href="#"><?php  echo $value; ?></a></mark>
                        <?php 
                      }

                      ?>
                     </p>
                  
           </div>


        <?php }

        }else { ?>
          <div class="alert alert-danger" role="alert">Bu Kategoriye Hiç Haber Eklenmemiş</div>
        <?php } ?>
           
      </div>

    </div>
