<?php include "menu.php"; ?>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <div class="row">
          
          <div class="col-lg-10">
            <h3>Haber Ekleme Alanı</h1>
          </div>
 
      </div>
      
      <div class="row">
       
       <div class="col-xs-10 col-centered">
           
              <form method="POST" action="/ekle/haber" enctype="multipart/form-data">
                  <div class="form-group"> 
                    <input type="text" class="form-control" name="baslik" placeholder="Haber Başlığı">
                  </div>
                  <div class="form-group">  
                  <textarea name="content" id="contentx" cols="30" rows="10" class="form-control">Haber İçeriği</textarea>
                  <script>
                  $(function(){$('textarea#contentx').focus(function() { $(this).val(''); });  });
                  </script>
                  </div>
                  <div class="form-group"> 
                  <label for="exampleInputFile">Haber Görseli</label>
                  <input type="file" id="exampleInputFile" name="cover"> 
                  </div>
                  <div class="checkbox">
                  <b>Haber Kategorileri</b><br>
                  
                   <?php 

                    $query = $pdo->query("SELECT * FROM kategori")->fetchAll(PDO::FETCH_ASSOC);
                    if ( $query || count($query) > 1 ){
                    ?>
                    <select class="form-control" name="kat">
                    <?php
                      for ($i=0; $i < count($query) ; $i++) { 
                    ?>
                    <option value="<?php  echo $query[$i]['id']; ?>"><?php  echo $query[$i]['baslik']; ?></option>

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
                    <input type="text" class="form-control" name="tag" placeholder="Haber Etiketileri (örnek: bla,bla,bla)">
                  </div>
              <?php if(count($query)>0){ ?>
              <button type="submit" class="btn btn-primary btn-lg">Haberi Ekle</button>
              <?php } ?>
            </form> 
            
          
          </div>

      </div>

    </div>
