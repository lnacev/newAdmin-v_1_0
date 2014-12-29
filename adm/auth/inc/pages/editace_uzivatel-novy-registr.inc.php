              <h1 class="edit-list-title">Vytvoření nového uživatelského účtu</span></h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" action="./inc/akce-users-registr-create.php" method="post">

                                  <fieldset>
                                      <label for="firstname">Jméno:</label>
                                      <input class="text-input" type="text" value="" id="firstname" name="firstname" title="Jméno uživatele"/>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                      <label for="email">E-mail:</label>
                                      <input class="text-input" type="text" value="" id="email" name="email" title="E-mail"/>
                                      <span class="edit-list-tooltip" title="E-mail uživatele.">?</span>
                                      <label for="firstname">Ulice:</label>
                                      <input class="text-input" type="text" value="" id="firstname" name="ulice" title="Jméno uživatele"/>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                      <label for="firstname">Město:</label>
                                      <input class="text-input" type="text" value="" id="firstname" name="mesto" title="Jméno uživatele"/>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                      <label for="firstname">Souhlas s newsletterem:</label>
                                      <select size="1" name="souhlas" class="selection"> 
                                      <option value="1">Ano</option>
                                      <option value="0">Ne</option>
                                      </select>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                  </fieldset>
                                  <fieldset>
                                      <label for="lastname">Příjmení:</label>
                                      <input class="text-input" type="text" value="" id="lastname" name="lastname" title="Příjmení uživatele"/>
                                      <span class="edit-list-tooltip" title="Příjmení uživatele.">?</span>
                                      <label for="password">Heslo:</label>
                                      <input class="text-input" type="password" value="" id="password" name="password" title="Heslo"/>
                                      <span class="edit-list-tooltip" title="Heslo sloužící pro přihlášení.">?</span>
                                      <label for="firstname">ČP:</label>
                                      <input class="text-input" type="text" value="" id="firstname" name="cp" title="Jméno uživatele"/>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                      <label for="firstname">PSČ:</label>
                                      <input class="text-input" type="text" value="" id="firstname" name="psc" title="Jméno uživatele"/>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                      <!--<label for="password2">Heslo (kontrola):</label>
                                      <input class="text-input" type="password" value="" id="password2" name="password2" title="Heslo (kontrola)"/>
                                      <span class="edit-list-tooltip" title="Heslo zadejte pro kontrolu ještě jednou.">?</span>-->
                                  </fieldset>
                                  <p>
                                      <input type="submit" value="Vytvořit nový účet" class="btn-red-grey" onclick="" title="Kliknutím vytvoříte nový uživatelský účet."/>
                                      <a href="index.php?page=editace_uzivatel-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
