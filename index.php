<?php
 require("includes/arruma_link.php");
header("Content-Type: text/html; charset=ISO-8859-1",true);
session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.1.0.46558
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title>30 SEMANAS - IBRN</title>



    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
     <script type="text/javascript" src="includes/micoxAjax.js"></script>

</head>
<body>
<?php include_once("analyticstracking.php") ?>
<div id="art-page-background-glare-wrapper">
    <div id="art-page-background-glare">
    
    </div>
</div>
<div id="art-main">
    <div class="cleared reset-box"></div>
<div class="art-bar art-nav">
<div class="art-nav-outer">
<div class="art-nav-wrapper">
<div class="art-nav-inner">
	<?php
	 
	 if($_SESSION["nivel"] == 10)
     		include("menuM.php"); 
		else
		    include("menuS.php");
				
	 ?>
</div>
</div>
</div>
</div>
<div class="cleared reset-box"></div>
<div class="art-box art-sheet">
        <div class="art-box-body art-sheet-body">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
<div class="art-post-inner art-article">
            <!--                    <h2 class="art-postheader">&nbsp;<a href="#">&nbsp;</a>&nbsp;<a class="visited" href="#">&nbsp;</a>&nbsp;<a class="hovered" href="#">&nbsp;</a>
                                </h2>
                                                                <div class="art-postheadericons art-metadata-icons">
                    <span class="art-postdateicon">&nbsp;</span>&nbsp;<span class="art-postauthoricon">&nbsp;</span>&nbsp;<span class="art-postpdficon"></span>&nbsp;<span class="art-postprinticon"></span>&nbsp;<span class="art-postemailicon"></span>&nbsp;<span class="art-postediticon"></span> -->
                </div>
                <div class="art-postcontent">
<center>
<img src="images/30-semanas-logo.png" alt="an image" id="preview-image"  width="250" height="100"/>&nbsp;&nbsp;&nbsp;
<!--<br /><br /><br /><br /><br />
<img src="images/30Semanas.jpg" alt="an image" id="preview-image"  width="400" height="400"/>
 -->
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="cleared"></div>
                                <div class="art-postfootericons art-metadata-icons">
                    <span class="art-postcategoryicon">&nbsp;<span class="art-post-metadata-category-name"><a href="#">&nbsp;</a></span></span>
                </div>
                </div>

		<div class="cleared"></div>
    </div>
</div>

                          <div class="cleared"></div>
                  </div>
              </div>
          </div>
    </div>-->
            <div class="cleared"></div> 
            <div class="art-footer">
                <div class="art-footer-body">
                    <a href="#" class="art-rss-tag-icon" title="RSS"></a>
                            <div class="art-footer-text">
                              <? include ("footer.php"); ?>
                  </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
  </div>
</div>
<div class="cleared"></div>
    
    <div class="cleared"></div>
</div>

</body>
</html>
