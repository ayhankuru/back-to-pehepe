		<nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="/">Anasayfa</a></li>
            <li role="presentation"><a href="#">Kategoriler</a></li>
            <li role="presentation"><a href="/login">Giriş Yap</a></li>
            <?php if($foxy->Session("username")){ ?>
            <li role="presentation"><a href="#">Haber Ekle</a></li>
            <li role="presentation"><a href="#">Kategori Ekle</a></li>
            <?php  } ?>
          </ul>
        </nav>