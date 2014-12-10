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
            <h3>Kategori Silme İşlemi</h1>
          </div>

          <div class="col-lg-2">
         
          </div>

        </div> 
      </div>
      
      <div class="row">
            <div class="col-xs-6 col-centered">
                <?php 

                  $query = $pdo->prepare("DELETE FROM kategori WHERE id = ? ");
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
