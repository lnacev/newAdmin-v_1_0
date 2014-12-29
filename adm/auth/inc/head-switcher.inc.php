<?php 
if (isset($_GET["page"]))
{
  switch ($_GET['page'])
  {
    case "editace_obsahu-seznam": include_once"inc/pages/top-case-edit.inc.php"; break;
    case "editace_obsahu-nova-strana": include_once"inc/pages/top-case-edit.inc.php"; break;
    case "editace_obsahu-nova-kategorie": include_once"inc/pages/top-case-edit.inc.php"; break;
    case "editace_obsahu": include_once"inc/pages/top-case-edit.inc.php"; break;
    case "download-seznam": include_once"inc/pages/top-case-download.inc.php"; break;
    case "download-novy-soubor": include_once"inc/pages/top-case-download.inc.php"; break;
    case "editace_seo-seznam": include_once"inc/pages/top-case-seo.inc.php"; break;
    case "editace_seo": include_once"inc/pages/top-case-seo.inc.php"; break;
    case "novinky-seznam": include_once"inc/pages/top-case-news.inc.php"; break;
    case "novinky-nova-strana": include_once"inc/pages/top-case-news.inc.php"; break;
    case "novinky-nova-kategorie": include_once"inc/pages/top-case-news.inc.php"; break;
    case "novinky-edit": include_once"inc/pages/top-case-news.inc.php"; break;
    case "editace_uzivatel-seznam": include_once"inc/pages/top-case-user.inc.php"; break;
    case "uzivatele-registr": include_once"inc/pages/top-case-user.inc.php"; break;
    case "editace_uzivatel-seznam-registr": include_once"inc/pages/top-case-user.inc.php"; break;
    case "editace_uzivatel-novy": include_once"inc/pages/top-case-user.inc.php"; break;
    case "editace_uzivatel-novy-registr": include_once"inc/pages/top-case-user.inc.php"; break;
    case "editace_uzivatel": include_once"inc/pages/top-case-user.inc.php"; break;
    case "investice-seznam": include_once"inc/pages/top-case-investice.inc.php"; break;
    case "investice-nova-strana": include_once"inc/pages/top-case-investice.inc.php"; break;
    case "investice-nova-kategorie": include_once"inc/pages/top-case-investice.inc.php"; break;
    case "investice-kategorie-seznam": include_once"inc/pages/top-case-investice.inc.php"; break;
    case "investice-kategorie-del": include_once"inc/pages/top-case-investice.inc.php"; break;
    case "forum-seznam": include_once"inc/pages/top-case-forum.inc.php"; break;
    case "mail-seznam": include_once"inc/pages/top-case-mail.inc.php"; break;
    case "mail": include_once"inc/pages/top-case-mail.inc.php"; break;
    case "uredni-deska": include_once"inc/pages/top-case-deska.inc.php"; break;
    case "uredni-deska-nova-strana": include_once"inc/pages/top-case-deska.inc.php"; break;
    case "uredni-deska-del": include_once"inc/pages/top-case-deska.inc.php"; break;
    case "editace_obsahu-uredni-deska": include_once"inc/pages/top-case-deska.inc.php"; break;
    case "galerie-seznam": include_once"inc/pages/top-case-galerie.inc.php"; break;
    case "galerie-kategorie-seznam": include_once"inc/pages/top-case-galerie.inc.php"; break;
    case "galerie-nova-strana": include_once"inc/pages/top-case-galerie.inc.php"; break;
    case "galerie-nova-kategorie": include_once"inc/pages/top-case-galerie.inc.php"; break;
    case "eshop-nova-strana": include_once"inc/pages/top-case-eshop.inc.php"; break;
    case "eshop-seznam": include_once"inc/pages/top-case-eshop.inc.php"; break;
    case "eshop-edit-strana": include_once"inc/pages/top-case-eshop.inc.php"; break;    
		case "fakturace-hlavni": include_once"inc/pages/top-case-fakturace.inc.php"; break;
    case "fakturace": include_once"inc/pages/top-case-fakturace.inc.php"; break;
    case "editace_obsahu-reference": include_once"inc/pages/top-case-reference.inc.php"; break;
    case "editace_reference-nova-strana": include_once"inc/pages/top-case-reference.inc.php"; break;
    case "editace_reference-edit": include_once"inc/pages/top-case-reference.inc.php"; break;
  }
}
/* elseif(isset($_GET["kategorie"]))
{
  switch ($_GET['kategorie'])
  {
case "prace": include_once"inc/pages/kat-head.inc.php"; break;
  }
} 
else 
{
  include_once"inc/pages/top-case.inc.php";
} */
?>


