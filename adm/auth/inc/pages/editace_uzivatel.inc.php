              <h1 class="edit-list-title">Změna informací o zákazníkovi</h1>
              
              <div class="edit-list-wrap">

<form method="post" action="./inc/akce-users-registr-edit.php" class="edit-list-form">

                                  <?php
require_once "./inc/config/config.inc.php";
$id = $_GET['id'];     // Do proměnné $id si dáme číslo volaného článku. Tuto proměnnou raději z bezpečnostních důvodů přetypujeme na INTEGER
$vysledek=mysql_query("SELECT * FROM users_registred WHERE id='$id'");
while ($zaznam=MySQL_Fetch_Array($vysledek)): 
                                echo '<fieldset>
                                      <input class="text-input" type="hidden" value="'.$id.'" id="firstnamexx" name="id"/>
																			<label for="firstname">Jméno:</label>
                                      <input class="text-input" type="text" value="'.$zaznam['username'].'" id="firstname" name="firstname" title="Jméno uživatele"/>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                      <label for="email">E-mail:</label>
                                      <input class="text-input" type="text" value="'.$zaznam['email'].'" id="email" name="email" title="E-mail"/>
                                      <span class="edit-list-tooltip" title="E-mail uživatele.">?</span>
                                      <label for="firstname">Ulice:</label>
                                      <input class="text-input" type="text" value="'.$zaznam['ulice'].'" id="firstname" name="ulice" title="Jméno uživatele"/>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                      <label for="firstname">Město:</label>
                                      <input class="text-input" type="text" value="'.$zaznam['mesto'].'" id="firstname" name="mesto" title="Jméno uživatele"/>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                      <label for="firstname">Souhlas s newsletterem:</label>
                                      <select size="1" name="souhlas" class="selection">'; 
$vysledek2=mysql_query("SELECT * FROM users_registred WHERE id='$id'");
while ($zaznam2=MySQL_Fetch_Array($vysledek2)): 
                                echo '<option value="'.$zaznam2['souhlas'].'">';if($zaznam2['souhlas']==0){echo"Ne";}else{echo"Ano";} 
																echo '</option>';
endwhile;
																echo '<option value="">-- Vyberte --</option>
																      <option value="1">Ano</option>
                                      <option value="0">Ne</option>
                                      </select>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                  </fieldset>
                                  <fieldset>
                                      <label for="lastname">Příjmení:</label>
                                      <input class="text-input" type="text" value="'.$zaznam['surename'].'" id="lastname" name="lastname" title="Příjmení uživatele"/>
                                      <span class="edit-list-tooltip" title="Příjmení uživatele.">?</span>
                                      <label for="password">Heslo:</label>
                                      <input class="text-input" type="password" value="'.$zaznam['password'].'" id="password" name="password" title="Heslo"/>
                                      <span class="edit-list-tooltip" title="Heslo sloužící pro přihlášení.">?</span>
                                      <label for="firstname">ČP:</label>
                                      <input class="text-input" type="text" value="'.$zaznam['cp'].'" id="firstname" name="cp" title="Jméno uživatele"/>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                      <label for="firstname">PSČ:</label>
                                      <input class="text-input" type="text" value="'.$zaznam['psc'].'" id="firstname" name="psc" title="Jméno uživatele"/>
                                      <span class="edit-list-tooltip" title="Jméno uživatele.">?</span>
                                      <!--<label for="password2">Heslo (kontrola):</label>
                                      <input class="text-input" type="password" value="" id="password2" name="password2" title="Heslo (kontrola)"/>
                                      <span class="edit-list-tooltip" title="Heslo zadejte pro kontrolu ještě jednou.">?</span>-->
                                  </fieldset>';
endwhile; ?>
                                  <p>
                                      <input type="submit" title="Kliknutím vytvoříte nový uživatelský účet." onclick="" class="btn-red-grey" value="Změnit informace">
                                      <a title="Návrat zpět bez uložení provedených úprav" href="index.php?page=editace_uzivatel-seznam-registr">Vrátit se zpět</a>
                                  </p>

                  </form>
                  
                  <!--<form class="edit-list-form" action="editace_page.html" method="post">

                                  <fieldset>
                                      <label for="password">Staré heslo:</label>
                                      <input class="text-input" type="password" value="" id="password" name="password" title="Staré heslo"/>
                                      <span class="edit-list-tooltip" title="Staré heslo.">?</span>
                                      <label for="password-new2">Nové heslo (kontrola):</label>
                                      <input class="text-input" type="password" value="" id="password-new2" name="password-new2" title="Nové heslo (kontrola)"/>
                                      <span class="edit-list-tooltip" title="Nové heslo pro kontrolu ještě jednou.">?</span>
                                      
                                  </fieldset>
                                  <fieldset>
                                      <label for="password-new">Nové heslo:</label>
                                      <input class="text-input" type="password" value="" id="password-new" name="password-new" title="Nové heslo"/>
                                      <span class="edit-list-tooltip" title="Nové heslo sloužící pro přihlášení.">?</span>
                                  </fieldset>

                                  <p>
                                      <input type="submit" value="Změnit heslo" class="btn-red-grey" onclick="" title="Kliknutím uložíte provedené změny"/>
                                      <a href="index.php?page=editace_uzivatel-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>
                                  </p>

                  </form>-->
                  
              </div>

              <div class="clear"></div> 
