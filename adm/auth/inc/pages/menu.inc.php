<div id="top-case">
          
          <div id="top">
          
              <div id="logo">
                  <a title="Kliknutím přejdete na úvodní stranu" href="index.php">
                      <img width="274" height="61" alt="Logo Lsystems CMS ver. 1.0" src="imgs/lsystems-cms-logo.png">
                  </a> 
              </div>

              <div id="log-info">
                  <p id="log-menu" style="display: none;">
                      <!--<a title="Změna nastavení účtu" href="#">Změna nastavení</a>-->
                      <a title="Odhlášení z administračního systému" href="./../logout.php" class="log-menu-border">Odhlásit se</a>
                  </p>
                  <p id="log-user-info">
                      <?php echo $_SESSION['login']; ?><a id="log-menu-slide-btn" href="#"><!-- --></a>
                  </p>
              </div>
              
              <ul id="menu">
                  <li <?php if($_GET['page']=="editace_uzivatel-seznam" or $_GET['page']=="editace_uzivatel-novy" or $_GET['page']=="editace_uzivatel-novy-registr" or $_GET['page']=="editace_uzivatel-seznam-registr" or $_GET['page']=="uzivatele-registr" or $_GET['page']=="editace_uzivatel"){echo "class=\"selected\"";}else{echo "";} ?> id="menu-users"><a title="Modul UŽIVATELÉ" href="index.php?page=editace_uzivatel-seznam-registr">ZÁKAZNÍCI</a></li>
									<li <?php if($_GET['page']=="novinky-seznam" or $_GET['page']=="novinky-nova-strana" or $_GET['page']=="novinky-nova-kategorie" or $_GET['page']=="novinky-edit"){echo "class=\"selected\"";}else{echo "";} ?> id="menu-news"><a title="Modul NOVINKY" href="index.php?page=novinky-seznam">NOVINKY</a></li>
                  <!--<li <?php if($_GET['page']=="editace_seo-seznam" or $_GET['page']=="editace_seo"){echo "class=\"selected\"";}else{echo "";} ?> id="menu-seo"><a title="Modul SEO" href="index.php?page=editace_seo-seznam">SEO</a></li>-->

                  <li <?php if($_GET['page']=="editace_obsahu-seznam" or $_GET['page']=="editace_obsahu" or $_GET['page']=="editace_obsahu-nova-strana" or $_GET['page']=="editace_obsahu-nova-kategorie"){echo "class=\"selected\"";}else{echo "";} ?> id="menu-edit"><a title="Modul EDITACE OBSAHU" href="index.php?page=editace_obsahu-seznam">EDITACE OBSAHU</a></li>
                  <!--<li <?php //if($_GET['page']=="download-seznam" or $_GET['page']=="download-novy-soubor"){echo "class=\"selected\"";}else{echo "";} ?> id="menu-download"><a title="Modul DOWNLOAD" href="index.php?page=download-seznam">DOWNLOAD</a></li>-->
                  <li <?php if($_GET['page']=="galerie-kategorie-seznam" or $_GET['page']=="galerie-nova-kategorie" or $_GET['page']=="galerie-nova-strana" or $_GET['page']=="galerie-seznam"){echo "class=\"selected\"";}else{echo "";} ?> id="menu-gallery"><a title="Modul GALERIE" href="index.php?page=galerie-kategorie-seznam">GALERIE</a></li>
									<!--<li <?php //if($_GET['page']=="investice-seznam" or $_GET['page']=="investice-nova-strana" or $_GET['page']=="investice-nova-kategorie" or $_GET['page']=="investice-edit" or $_GET['page']=="investice-nova-kategorie" or $_GET['page']=="investice-kategorie-seznam" or $_GET['page']=="investice-kategorie-del"){echo "class=\"selected\"";}else{echo "";} ?> id="menu-investice"><a title="Modul INVESTICE" href="index.php?page=investice-seznam">INVESTICE</a></li>-->
                  <li <?php if($_GET['page']=="eshop-seznam" or $_GET['page']=="eshop-nova-strana" or $_GET['page']=="eshop-edit-strana"){echo "class=\"selected\"";}else{echo "";} ?> id="menu-eshop"><a title="Modul E-SHOP" href="index.php?page=eshop-seznam">E-SHOP</a></li>
                  <li <?php if($_GET['page']=="fakturace-hlavni" or $_GET['page']=="fakturace"){echo "class=\"selected\"";}else{echo "";} ?> id="menu-faktura"><a title="Modul FAKTURACE" href="index.php?page=fakturace-hlavni">FAKTURACE</a></li>
									<li <?php if($_GET['page']=="editace_obsahu-reference" or $_GET['page']=="editace_reference-nova-strana" or $_GET['page']=="editace_reference-edit"){echo "class=\"selected\"";}else{echo "";} ?> id="menu-forum"><a title="Modul REFERENCE" href="index.php?page=editace_obsahu-reference">REFERENCE</a></li>
									<!--<li <?php //if($_GET['page']=="uredni-deska" or $_GET['page']=="editace_obsahu-uredni-deska" or $_GET['page']=="uredni-deska-nova-strana" or $_GET['page']=="uredni-deska-del"){echo "class=\"selected\"";}else{echo "";} ?>id="menu-manual"><a title="Modul UŘEDNÍ DESKA" href="index.php?page=uredni-deska">DESKA</a></li>
                  <li <?php //if($_GET['page']=="sluzby-seznam" or $_GET['page']=="sluzby-seznam" or $_GET['page']=="sluzby-seznam" or $_GET['page']=="sluzby-del"){echo "class=\"selected\"";}else{echo "";} ?>id="menu-eshop"><a title="Modul SLUŽBY V OBCI" href="index.php?page=sluzby-seznam">SLUŽBY V OBCI</a></li>-->
                  
              </ul> 
                
          </div>
          
      <div class="clear clear-menu"></div>
          
      </div>