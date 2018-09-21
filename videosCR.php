<?php
 require("includes/arruma_link.php");
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
    <title>CR - IBRN</title>



    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
     <script type="text/javascript" src="includes/micoxAjax.js"></script>

</head>
<body>
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
	 
	 if($_SESSION["nivelid"] == 10)
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
<video width="320" height="240" controls>
  <source src="movie1.avi" type="video/avi">
  <source src="movie2.avi" type="video/avi">
Your browser does not support the video tag.
</video>
</center>
 <!--     <img src="images/Logo_IBRN.jpg" alt="an image" class="preview-cms-logo" width="80" height="100"/> 
  <p>Lorem <sup>superscript</sup> dolor <sub>subscript</sub> amet, consectetuer adipiscing
        elit, <a href="#" title="link">link</a>, <a class="visited" href="#" title="visited link">visited link</a>,
 <a class="hover" href="#" title="hovered link">hovered link</a>. Nullam dignissim convallis est.
        Quisque aliquam. <cite>cite</cite>. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.
        Donec sed tellus eget sapien fringilla nonummy. <acronym title="National Basketball Association">NBA</acronym> Mauris a
        ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc.
        <abbr title="Avenue">
            AVE</abbr></p>
	
	<p>Aliquam pharetra. Nulla in tellus eget odio sagittis blandit.Maecenas at nisl. Nullam lorem mi, eleifend a,
    fringilla vel, semper at, ligula. Mauris eu wisi. Ut ante dui, aliquet nec, congue non,
    accumsan sit amet, lectus. Mauris et mauris. Duis sed massa id mauris pretium venenatis.
    Suspendisse cursus velit vel ligula. Mauris elit.
	</p>

<p>Aliquam pharetra. Nulla in tellus eget odio sagittis blandit.Maecenas at nisl. Nullam
 lorem mi, eleifend a, fringilla vel, semper at, ligula. Mauris eu wisi. Ut ante
 dui, aliquet nec, congue non, accumsan sit amet, lectus. Mauris et mauris. Duis
 sed massa id mauris pretium venenatis. Suspendisse cursus velit vel ligula. Mauris
 elit.</p>
  <p>
	<span class="art-button-wrapper">
		<span class="art-button-l"> </span>
		<span class="art-button-r"> </span>
		<a class="readon art-button" href="javascript:void(0)">Read more...</a>
	</span>
  </p>

                </div>
                <div class="cleared"></div> 
                                <div class="art-postfootericons art-metadata-icons">
                    <span class="art-postcategoryicon">Category: <span class="art-post-metadata-category-name"><a href="#">News</a></span></span>
                </div>
                </div>

		<div class="cleared"></div>
    </div>
</div>
 <!--***********************************************************************************************************************************  -->
 
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
<div class="art-post-inner art-article">
  <!--                              <h2 class="art-postheader">Community Portal
                                </h2>
                               
                                                            <div class="art-postheadericons art-metadata-icons">
                    <span class="art-postdateicon">&nbsp;</span> | <span class="art-postauthoricon">&nbsp;</span>&nbsp;<span class="art-postpdficon"></span>&nbsp;<span class="art-postprinticon"></span>&nbsp;<span class="art-postemailicon"></span>&nbsp;<span class="art-postediticon"></span>-->
                </div> 
     <div class="art-postcontent">
    


 
 <!--     <p>Lorem <sup>superscript</sup> dolor <sub>subscript</sub> amet, consectetuer adipiscing
        elit, <a href="#" title="test link">test link</a>. Nullam dignissim convallis est.
        Quisque aliquam. <cite>cite</cite>. Nunc iaculis suscipit dui. Nam sit amet sem.
        Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Praesent
        mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim
        diam eget metus. Maecenas ornare tortor. Donec sed tellus eget sapien fringilla
        nonummy. <acronym title="National Basketball Association">NBA</acronym> Mauris a
        ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc. Morbi
        imperdiet augue quis tellus.
        <abbr title="Avenue">
        
           </abbr></p>
   <h3>List</h3>
    <ul>
        <li>List Item 1</li>
        <li>List Item 2</li>
        <li>List Item 3</li>
    </ul>
   
    <blockquote>
        <p>
            “This stylesheet is going to help so freaking much.”
            <br />
            -Blockquote
        </p>
    </blockquote>
    <h3>Table</h3>
    <table class="art-article" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
    <th>Header</th>
    <th>Header</th>
    <th>Header</th>
    </tr>
    <tr>
    <td>Data</td>
    <td>Data</td>
    <td>Data</td>
    </tr>
    <tr class="even">
    <td>Data</td>
    <td>Data</td>
    <td>Data</td>
    </tr>
    <tr>
    <td>Data</td>
    <td>Data</td>
    <td>Data</td>
    </tr>
    </tbody></table>
    <p>
		<span class="art-button-wrapper">
			<span class="art-button-l"> </span>
			<span class="art-button-r"> </span>
			<a class="readon art-button" href="javascript:void(0)">Read more...</a>
		</span>
    </p>
-->
                </div>
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
                                <p><a href="http://www.idbras.com.br" target="_blank">IDBRAS</a></p><p>Copyright &copy; 2014. Todos os direitos reservados.</p>
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
