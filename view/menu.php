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