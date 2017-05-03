<?php include "menu.php"; ?>
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <div class="row">
       
        
        
        
        <?php 

        $query = $pdo->prepare("Select haber.baslik,haber.id,haber.content,fotograf.foto_dizin,tag.content tcontent from haber
                                INNER JOIN haber_kat ON haber_kat.haber_id = haber.id 
                                INNER JOIN fotograf ON haber.foto_id = fotograf.id 
                                INNER JOIN tag ON haber.tag_id = tag.id
                                Where haber.id=? ");
         $query->execute(array($id));
         $datas = $query->fetch(PDO::FETCH_ASSOC);
          
        if($datas){
 
        ?>
          
                   
      <div class="col-lg-10">
         <h3><?php echo substr($datas['baslik'], 0, 25).'...'; ?></h1>
       </div>

      <div class="col-lg-2">
          
      </div> 
      </div>
      
      <div class="row">

        <div class="col-lg-12">
          
            <p><?php echo $datas['content'] ?></p>
        <hr>
        <p><?php  
                     $tags =explode(',', $datas['tcontent']);
                      foreach ($tags  as $key => $value) {
                        ?>
                          <mark><a href="#"><?php  echo $value; ?></a></mark>
                        <?php 
                      }

                      ?>
        </p>
        <hr>
         <?php if(isset($_SESSION['username'])){  ?>
        <a href="<? echo $temp->variables['uri']; ?>/haber/delete/<?php echo $datas['id'] ?>"> <b>Haber'i Sil</b> </a> | <a href="<? echo $temp->variables['uri']; ?>/haber/edit/<?php echo $datas['id'] ?>"> <b>Haber'i Düzenle</b> </a>

        <?php } ?>
        </div>

        <?php

        }else{
        
        ?>
        <div class="alert alert-danger" role="alert">Bu Haberi Bulamadık..</div>
      <?php
        }
       ?>
       
      
      </div>

    </div>
