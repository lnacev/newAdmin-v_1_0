              <h1>Galerie</h1>
              
              <div class="clear"></div>
              
              <div class="box-wrap">
                  <div class="box-top">
                      <h2>Seznam obrázků - Galerie</h2>
                      <ul class="tabs">
                            <!--<li class="selected"><a href="#" title="Zveřejněné">Seznam stránek</a></li>-->
                            <!--<li><a href="#" title="Nezveřejněné">Nezveřejněné</a></li>-->
                      </ul>
                  </div>
                          <div class="box-content">

<br /><br />
<?php
$slozka = dir("./../../upload");
//Comment
while($soubor=$slozka->read()) {
  if ($soubor=="." || $soubor==".." || $soubor=="_thumbs") continue;
    echo "<img class=\"galerie\" src=\"./../../upload/$soubor\" width=\"90\" height=\"90\">\n"; 
    echo "<span class=\"menu\">Jméno souboru:&nbsp;$soubor</span><br>\n";
    echo "<span class=\"menu\"><a href=\"?page=tester&amp;soubor=$soubor\">Smazat</a></span><br>\n"; 

}
$slozka->close();
?>
<br /><br />
<?php
    //echo "Vaše IP je: {$_SERVER['REMOTE_ADDR']}";
    $ip = $_SERVER['REMOTE_ADDR'];
$mesic = date('j-n-Y');
$cas = date('H:i:s')."\n";
echo $ip."\n";
echo"<br />";
echo $mesic."\n";
echo "<br />";
echo $cas;
?>

                          </div>
                      <span class="box-bottom"><!-- --></span>        
                  </div>
