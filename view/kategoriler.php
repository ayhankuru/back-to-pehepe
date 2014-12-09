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
            <h3>Kategori Listesi Haberler...</h1>
          </div>

          <div class="col-lg-2">
         
          </div>

        </div> 
      </div>
      
      <div class="row">
            <div class="col-xs-6 col-centered">
                <ul class="list-group">
                  <li class="list-group-item"> 

                    <?php if(isset($_SESSION['username'])){ ?>
                    <span class="badge label-danger"><a href="#" style="color:#fff;">Düzenle</a></span>
                    <span class="badge label-danger"><a href="#" style="color:#fff;">Sil</a></span>
                    <?php } ?>
                    <span class="badge">14</span>
                    Cras justo odio
                  </li>
                </ul>
            </div>
      </div>

    </div>
