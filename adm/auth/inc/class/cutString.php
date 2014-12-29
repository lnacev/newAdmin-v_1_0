<?php 
//class cutString {
// public 
 function orez($text, $end ="...", $limit = 25)
 {
    if (strlen($text) <= $limit) {
       echo $text;
    } else {
       $text = substr($text, 0, $limit+1);
       $pos = strrpos($text, " "); 
       echo substr($text, 0, ($pos ? $pos : -1)) . $end;
    }
 }
//}
?>