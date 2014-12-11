<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          <a class="navbar-brand" href="#">Haber Box</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
           <ul class="nav navbar-nav">
         
            <li><a href="/">Anasayfa</a></li>
            <li><a href="/kategoriler">Kategoriler</a></li>
            <?php if(!isset($_SESSION['username'])){ ?>
            <li><a href="/login">Giriş Yap</a></li>
            <?php } 
                if(isset($_SESSION['username'])){ ?>
            <li><a href="/ekle/haber">Haber Ekle</a></li>
            <li><a href="/ekle/kategori">Kategori Ekle</a></li>
            <li><a href="/logout">Çıkış Yap</a></li>
            <?php  } ?>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
