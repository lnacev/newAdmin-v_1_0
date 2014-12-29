              <h1 class="edit-list-title">Vytvoření nového uživatelského účtu</span></h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" action="./inc/akce-users-create.php" method="post">

                                  <fieldset>
                                      <label for="page-name">Uživatelské jméno:</label>
                                      <input class="text-input" type="text" value="" id="page-name" name="page-name" title="Název stránky"/>
                                      <span class="edit-list-tooltip" title="Uživateslké jméno, které slouží pro přihlášení uživatele.">?</span>
                                      <label for="firstname">Jméno:</label>
                                      <input class="text-input" type="text" value="" id="firstname" name="firstname" title="Jméno uživatele"/>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                      <label for="password">Heslo:</label>
                                      <input class="text-input" type="password" value="" id="password" name="password-new" title="Heslo"/>
                                      <span class="edit-list-tooltip" title="Heslo sloužící pro přihlášení.">?</span>
                                  </fieldset>
                                  <fieldset>
                                      <label for="email">E-mail:</label>
                                      <input class="text-input" type="text" value="" id="email" name="email" title="E-mail"/>
                                      <span class="edit-list-tooltip" title="E-mail uživatele.">?</span>
                                      <label for="lastname">Příjmení:</label>
                                      <input class="text-input" type="text" value="" id="lastname" name="lastname" title="Příjmení uživatele"/>
                                      <span class="edit-list-tooltip" title="Příjmení uživatele.">?</span>
                                      <!--<label for="password2">Heslo (kontrola):</label>
                                      <input class="text-input" type="password" value="" id="password2" name="password2" title="Heslo (kontrola)"/>
                                      <span class="edit-list-tooltip" title="Heslo zadejte pro kontrolu ještě jednou.">?</span>-->
                                  </fieldset>
                        

                                  <fieldset>
                                      <label for="role">Práva:</label>
                                      <select class="selection" name="role" id="role" size="1"> 
                                      <option value="Administrátor">Administrátor - kompletní přístup ke všem funkcím CMS</option>
                                      <option value="Moderátor">Moderátor - pouze editace obsahu bez možnosti smazání</option>
                                      </select>
                                      <span class="edit-list-tooltip" title="Jednotlivým uživatelům můžete přidělit jejich role, podle kterých jim budou zpřístupněny jednotlivé části administračního systému.">?</span>
                                  </fieldset>
                                  <p>
                                      <input type="submit" value="Vytvořit nový účet" class="btn-red-grey" onclick="" title="Kliknutím vytvoříte nový uživatelský účet."/>
                                      <a href="index.php?page=editace_uzivatel-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
