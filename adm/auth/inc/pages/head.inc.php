<div id="top-case">
          
          <div id="top">
          
              <div id="logo">
                  <a href="index.php" title="Kliknutím přejdete na úvodní stranu">
                      <img src="imgs/lsystems-cms-logo.png" alt="Lsystems CMS ver. 1.0" width="274" height="61"/>
                  </a> 
              </div>

              <div id="log-info">
                  <p id="log-menu">
                      <!--<a href="#" title="Změna nastavení účtu">Změna nastavení</a>-->
                      <a class="log-menu-border" href="./../logout.php" title="Odhlášení z administračního systému">Odhlásit se</a>
                  </p>
                  <p id="log-user-info">
                      <?php echo $_SESSION['login']; ?><a href="#" id="log-menu-slide-btn"><!-- --></a>
                  </p>
              </div> 
                
          </div>
          
      <div class="clear"></div>
          
      </div>