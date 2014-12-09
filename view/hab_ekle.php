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
            <h3>Haber Ekleme Alanı</h1>
          </div>
 
      </div>
      
      <div class="row">
       
       <div class="col-xs-10 col-centered">
           
              <form method="POST" action="/ekle/haber">
                  <div class="form-group"> 
                    <input type="text" class="form-control" name="baslik" placeholder="Haber Başlığı">
                  </div>
                  <div class="form-group">  
                  <textarea name="" id="" cols="30" rows="10" class="form-control">Haber İçeriği</textarea>
                  </div>
                  <div class="form-group"> 
                  <label for="exampleInputFile">Haber Görseli</label>
                  <input type="file" id="exampleInputFile"> 
                  </div>
                <div class="checkbox">
                <b>Haber Kategorileri</b><br>
                <label>
                  <input type="checkbox"> Check me out
                </label>
              </div>
              <button type="submit" class="btn btn-primary btn-lg">Haberi Ekle</button>
            </form> 
            
          
          </div>

      </div>

    </div>
