<?php include "menu.php"; ?>
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <div class="row">
          
          <div class="col-lg-10">
            <h3>Gündemden Haberler...</h1>
          </div>

          <div class="col-lg-2">
            

           <?php 

               $query = $pdo->query("SELECT * FROM kategori")->fetchAll(PDO::FETCH_ASSOC);
                   if ( $query || count($query) > 1 ){
                   ?>
                   <select class="form-control" id="kat">
                   <option> Hepsi </option>
                   <?php
                     for ($i=0; $i < count($query) ; $i++) { 
                   ?>
                   <option value="<?php  echo $query[$i]['id']; ?>"><?php  echo $query[$i]['baslik']; ?></option>
                  <?php  }  ?>                           
                    </select> 
               <?php } ?>
          </div>
        <script type="text/javascript">
        $(function(){
            $( "#kat" ).change(function() {
              var value =$( "select option:selected" ).val();
              if(value !=="Hepsi") window.location.href =window.location.href+'haber/kat/'+value;
            });
        });
        </script>
        </div> 
      </div>
      
      <div class="row">
        
        
        
        <?php 

        $query = $pdo->query("SELECT haber.*,fotograf.foto_dizin,tag.content tcontent FROM haber INNER JOIN fotograf ON haber.foto_id = fotograf.id INNER JOIN tag ON haber.tag_id = tag.id ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        
          if($query || count($query) > 0 ){
             for ($i=0; $i < count($query) ; $i++) { 
        ?>
            <div class="col-lg-4"> 
                    <h3 class="text-center"><a href="/haber/show/<?php  echo $query[$i]['id']; ?>"><?php echo substr($query[$i]['baslik'], 0, 15).'...'; ?></a></h4>
                     <img src="<?php echo uri; ?><?php  echo $query[$i]['foto_dizin']; ?>" alt="..." class="img-rounded cover">
                     <p class="lead"><?php  echo substr($query[$i]['content'], 0, 200).'...'; ?></p>
                     <p><?php  
                     $tags =explode(',', $query[$i]['tcontent']);
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
          <div class="alert alert-danger" role="alert">Hiç Haber Eklenmemiş</div>
        <?php } ?>
      </div>

    </div>
