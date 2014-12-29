              <h1 class="edit-list-title">Seznam novinek pro Mailer list</h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form" action="index.php?page=mail" method="post">

                                  <fieldset>
                                      <label for="categories">Výběr novinek:</label>
                                      <select class="selection" size="1" name="categories">
                                      <?php 
                                      $url=mysql_query("SELECT * FROM `news`");
while ($dotaz=MySQL_Fetch_Array($url)) 
{         
echo "<option value='".$dotaz['id']."'>".$dotaz['nazev-novinky']."</option>"; }
?>
                                      </select>
                                      <span class="edit-list-tooltip">?</span>
                                  </fieldset>

                                  <p>
                                      <input type="submit" value="Vybrat novinku" class="btn-red-grey" onclick="" title="Vybrat novinku"/>
                                      <!--<a href="index.php?page=mail-seznam" title="Návrat zpět bez uložení provedených úprav">Vrátit se zpět</a>-->
                                  </p>

                  </form>
                  
              </div>

              <div class="clear"></div> 
              
                
