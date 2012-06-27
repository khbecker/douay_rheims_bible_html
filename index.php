<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="generator" content="HTML Tidy for Linux/x86 (vers 25 March 2009), see www.w3.org" />
<title>The 1899 Douay-Rheims Catholic Bible</title>
<meta name="language" content="En" />
<meta name="classification" content="global" />
<meta name="keywords" content=
"free bible downloads, bible, on-line, free bible software, free software,free downloads, bible downloads,bible software,html bible,internet bible,christian resources,free,onlinebible,Douay-Rheims, Catholic Bible,catholic" />
<meta name="description" content="The 1899 Douay-Rheims Catholic Bible" />
<link rel="shortcut icon" href="http://www.saintbenedicts.com/bible/bible.ico" />
<style type="text/css">
/*<![CDATA[*/
body {
  background-image: url(sueback.jpg);
  text-align: center;
  }
/*]]>*/
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
<script type="text/javascript">
function load_page()
{
    var page = "Douay-Rheims.htm"
    var book = "<?php echo $_GET["book"];?>";
    var chapter = "<?php echo $_GET["chapter"];?>";
    var verse = "<?php echo $_GET["verse"];?>";
    
    if( book.length > 0 )
    {
        page = "http://www.saintbenedicts.com/bible/" + book + ".htm";
        
        if( chapter.length > 0 )
        {
            page = page + "?chapter=" + chapter;
            
            if( verse.length > 0 )
            {
                page = page + "&verse=" + verse;
            }
            
            page = page + "#" + chapter;
        }
    }
    
    sbpages.location = page;
    //alert(page);
};
    
$(function(){

    var iFrames = $('iframe');
  
    function iResize() {
    
        for (var i = 0, j = iFrames.length; i < j; i++) {
          iFrames[i].style.height = iFrames[i].contentWindow.document.body.offsetHeight + 'px';
        }
    }
        
    if ($.browser.safari || $.browser.opera) { 
    
       iFrames.load(function(){
           setTimeout(iResize, 0);
       });
    
       for (var i = 0, j = iFrames.length; i < j; i++) {
            var iSource = iFrames[i].src;
            iFrames[i].src = '';
            iFrames[i].src = iSource;
       }
       
    } else {
       iFrames.load(function() { 
           var height = this.contentWindow.document.body.offsetHeight + 50;
           this.style.height = height + 'px';
       });
    }

});
</script>
</head>
<body onload="load_page()">
    <table align="center" width="1000px"><tr><td valign="top">
    <iframe src="http://www.saintbenedicts.com/bible/menu.htm" class="iframe" scrolling="no" frameborder="0" width="198px"></iframe>
    </td><td valign="top">
    <iframe src="" class="iframe" scrolling="no" frameborder="0" id="sbpages" width="800px"></iframe>
    </td></tr></table>
</body>
</html>
