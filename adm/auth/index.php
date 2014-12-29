<?php include_once "inc/protection.php"; 
//session_start(); 
//error_reporting(E_ALL); ini_set('display_errors', 'on'); 
require_once "inc/config/config.inc.php";
//var_dump($_SESSION); 
//print_r($_SERVER);
//var_dump($_SERVER);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs">
  <head>
  <title>Lsystems CMS v. 1.0 - Kompletní správa webového obsahu</title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<meta http-equiv="Content-Language" content="cs" />
		<meta name="description" content="Lsystems CMS v. 1.0 - Kompletní správa webového obsahu" />
		<meta name="keywords" content="Lsystems CMS" />
		<meta name="Author" content="Lsystems" />
		<meta name="Language" content="czech" />
		<link rel="Shortcut icon" type="image/x-icon" href="imgs/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/style-main.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/uploadify.css">
    <link rel="stylesheet" href="script/datedit/datedit.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" charset="utf-8" />
    
    <!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="css/style-ie6.css" media="screen" />
    <![endif]-->
    <?php include_once "inc/tiny-mce.php"; ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="script/jquery.ifixpng.js"></script>
    <script type="text/javascript" src="script/jquery.tooltip.js"></script>
    <script src="script/jquery.uploadify.min.js" type="text/javascript"></script>
    <script src="script/jquery.validationEngine-en.js" type="text/javascript"></script>
		<script src="script/jquery.validationEngine.js" type="text/javascript"></script>    
		<script>	
// Validace
		$(document).ready(function() {			
			$("#contact-form").validationEngine()
		});
// Login form
    $(document).ready(function(){

      $("#log-menu").hide(0);

            $("#log-menu-slide-btn").click(function(){
                    $("#log-menu").slideToggle("fast");
                    $(this).toggleClass("btn-user_log_info-active");
                    return false;
            });
    });
// Answer
    $(document).ready(function(){

      $("#tips-answer").hide(0);

            $("#tips-answer-slide-btn").click(function(){
                    $("#tips-answer").slideToggle("fast");
                    $(this).toggleClass("btn-tips-answer-active");
                    return false;
            });
    });
// Tooltip
        $(function() {
        $('span.edit-list-tooltip').tooltip({
        	track: true,
        	delay: 0,
        	showURL: false,
        	showBody: " - ",
        	fade: 250
        });
    });
// Hide/show foto
        $(document).ready(function(){
        
          $("#company-hide-form").hide(0);
        
        	$("#show-me").click(function(){
        		$("#company-hide-form").slideToggle("fast");
        	});
        });  
//
			$(document).ready(function(){
			$('.tonus').tooltip({ 
    		delay: 0, 
    		showURL: false, 
    		bodyHandler: function() { 
        return $("<img/>").attr({
				src: this.src,
				height: "500px"
				}); 
    } 
	});
});	
//
    </script>
    
    <script type="text/javascript" charset="iso-8859-1" src="script/datedit/datedit.js"></script>
    <script type="text/javascript" charset="utf-8" src="script/datedit/lang/cz.js"></script>
<script type="text/javascript">
  datedit("date","dd.mm.yyyy");
  //datedit("date2","dd.mm.yyyy");
</script>
    
  </head>
  <body>  
  <?php //var_dump($_SESSION); ?>
      <?php if(isset($_GET['page'])){include_once "inc/pages/menu.inc.php";}else{include_once "inc/pages/head.inc.php";}?>
      <?php if(isset($_GET['page'])){include_once "inc/head-switcher.inc.php";}else{echo "";}?>
      <div id="main-case">
      
          <div id="main">
                 <?php include_once "inc/mainPage.inc.php"; // Vložení podmínky pro výpis článků z db(2 vl. záznam) ?>
                 <?php if(isset($_GET['page'])){echo "";}else{include_once "inc/pages/tips-wrap.inc.php";}?>
          
              <div class="clear"></div> 
              
          </div>
      
      </div>
     
      <div id="bottom">
              
              <p id="copyright">
                      Lsystems CMS ver. 1.0 - Kompletní správa Vašeho webového obsahu<br />
                      Copyright © 2014 Lsystems<br />
                      Webové stránky vytvořila společnost <a href="http://lsystems.cz" title="tvorba webových stránek Profi - Seo s.r.o.">Lsystems</a>
              </p>
              <a id="link_top" href="#top" title="Kliknutím se vrátíte na vrchol stránky">Nahoru</a>
              <div class="clear"></div>
      </div>  
               
  </body>
</html>