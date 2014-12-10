<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Haber Box</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <?php include "menu.php"; ?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <div class="row">
          
          <div class="col-lg-10">
            <h3>Kategori Ekleme Alanı</h1>
          </div>
 
      </div>
      
      <div class="row">
       
       <div class="col-xs-10 col-centered">
           
              <form method="POST" action="/ekle/kategori">
                  <div class="form-group"> 
                    <input type="text" class="form-control" name="kat_baslik" placeholder="Kategori Başlığı">
                  </div>
                  <div class="form-group">  
                  <textarea name="kat_aciklama" id="contentx" cols="30" rows="10" class="form-control">Kategori Açıklama</textarea>
                  </div>
                   <script>
                  $(function(){$('textarea#contentx').focus(function() { $(this).val(''); });  });
                  </script>
                 
              <button type="submit" class="btn btn-primary btn-lg">Haberi Ekle</button>
            </form> 
            
          
          </div>

      </div>

    </div>
