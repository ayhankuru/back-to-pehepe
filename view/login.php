
    <div class="container">
      <div class="header">
        <?php include "menu.php"; ?>
        <h3 class="text-muted"><b> Haber Box </b></h3>
      </div>
 
      <div class="row marketing row-centered"> 
          
          <div class="col-xs-6 col-centered">
           
            
            <form role="form" action="/giris" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Kullanıcı Adınız?</label>
                <input type="text" class="form-control" id="username" placeholder="Kullanıcı Adı">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Şifreniz?</label>
                <input type="password" class="form-control " id="parola" placeholder="Şifre">
              </div>
              <button type="submit" class="btn btn-info">Giriş Yap</button>
            </form>
 
          </div>

          

      </div>

