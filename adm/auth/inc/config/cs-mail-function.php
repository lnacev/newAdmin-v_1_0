<?php

function autoUTF($s)
{
    // detect UTF-8
    if (preg_match('#[\x80-\x{1FF}\x{2000}-\x{3FFF}]#u', $s))
        return $s;
    // detect WINDOWS-1250
    if (preg_match('#[\x7F-\x9F\xBC]#', $s))
        return iconv('WINDOWS-1250', 'UTF-8', $s);
    // assume ISO-8859-2
    return iconv('ISO-8859-2', 'UTF-8', $s);
}

function cs_mail ($to, $predmet, $zprava, $head = "")
       {  $predmet = "=?utf-8?B?".base64_encode(autoUTF ($predmet))."?=";
          $head .= "MIME-Version: 1.0\n";
          $head .= "Content-Type: text/html; charset=\"utf-8\"\n";
          $head .= "Content-Transfer-Encoding: base64\n";
          $zprava = base64_encode (autoUTF ($zprava));
          return mail ($to, $predmet, $zprava, $head); }

?>
<?php
$mail = "Mailer@obecsrch.cz";
$predmet = "Novinky";
$zprava .= "<strong>Novinky a akce obce Srch</strong><br /><br />\n";
$zprava .= "<strong>".$_POST['page-name']."</strong><br /><br />\n";
$zprava .= $_POST['annotation']."<br /><br />\n";
$zprava .= "<a title=\"Odkaz\" href=\"".$_POST['page-file']."\">".$_POST['page-file']."</a><br /><br />\n";
$zprava .= "<strong>Datum: </strong>".$_POST['date'];
?>