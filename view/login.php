<?php include "menu.php"; ?>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <div class="row">
          
          <div class="col-lg-10">
            <h3>Üyelik Giriş Alanı</h1>
          </div>
 
      </div>
      
      <div class="row">
       
       <div class="col-xs-6 col-centered">
           
              <form method="POST" action="<?php echo uri; ?>/giris">
              <div class="form-group">
                <label for="exampleInputEmail1">Kullanıcı Adınız?</label>
                <input type="text" class="form-control" name="username" placeholder="Kullanıcı Adı">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Şifreniz?</label>
                <input type="password" class="form-control " name="parola" placeholder="Şifre">
              </div>
              <button type="submit" class="btn btn-info">Giriş Yap</button>
            </form> 
        
          
          </div>

      </div>

    </div>
