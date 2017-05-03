<?php include "menu.php"; ?>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <div class="row">
          
          <div class="col-lg-10">
            <h3>Kategori Listesi Haberler...</h1>
          </div>

          <div class="col-lg-2">
         
          </div>

        </div> 
      </div>
      
      <div class="row">
            <div class="col-xs-6 col-centered">
                <ul class="list-group">
                  

                  <?php 
                   $query = $pdo->query("SELECT * FROM kategori Where aktif=0 ")->fetchAll(PDO::FETCH_ASSOC);
                  if ( $query || count($query) > 1 ){
                      for ($i=0; $i < count($query) ; $i++) { 
                     
                  ?>
                  <li class="list-group-item"> 

                    <?php if(isset($_SESSION['username'])){ ?>
                    <span class="badge label-danger"><a href="<?php echo uri; ?>/kategori/edit/<?php  echo $query[$i]['id']; ?>" style="color:#fff;">Düzenle</a></span>
                    <span class="badge label-danger"><a href="<?php echo uri; ?>/kategori/delete/<?php  echo $query[$i]['id']; ?>" style="color:#fff;">Sil</a></span>
                    <?php } ?>
                    <span class="badge"> gdf </span>
                    <?php  echo $query[$i]['baslik']; ?>
                  </li>
                  <?php    
                    } 
                  }else{
                  
                  ?>
                  
                  <h4>Hiç Kategori Bulanmamakta</h4>

                  <?php

                  } 

                  ?>
                </ul>
            </div>
      </div>

    </div>
