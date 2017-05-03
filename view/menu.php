<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Haberbox</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link" href="<?php echo uri; ?>/">Anasayfa</a>
        <a class="mdl-navigation__link" href="<?php echo uri; ?>/kategoriler">Kategoriler</a>
        <?php if(!isset($_SESSION['username'])){ ?>
        <a class="mdl-navigation__link" href="<?php echo uri; ?>/login">Giriş Yap</a>
        <?php } 
            if(isset($_SESSION['username'])){ ?>
        <a class="mdl-navigation__link" href="<?php echo uri; ?>/ekle/haber">Haber Ekle</a>
        <a class="mdl-navigation__link" href="<?php echo uri; ?>/ekle/kategori">Kategori Ekle</a>
          <button id="demo-menu-lower-right"
                  class="mdl-button mdl-js-button mdl-button--icon">
            <i class="material-icons">more_vert</i>
          </button>
            <?php  } ?>

          <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
              for="demo-menu-lower-right">
            <li disabled class="mdl-menu__item"><?php echo $_SESSION['username']; ?></li>
            <a class="mdl-menu__item" href="<?php echo uri; ?>/logout">Çıkış Yap</a>
          </ul>

      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Title</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
      