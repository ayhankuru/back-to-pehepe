
    <div class="container">
      <div class="header">
        <?php include "menu.php"; ?>
        <h3 class="text-muted"><b> Haber Box </b></h3>
      </div>
 
      <div class="row marketing row-centered"> 
          
          <div class="col-xs-6 col-centered">
           
              <form method="POST" action="/giris">
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

