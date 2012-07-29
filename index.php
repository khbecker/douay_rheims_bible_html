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
	// get arguments
    var page = "http://" + document.domain + "/bible/" + "Douay-Rheims.htm"
    var book = "<?php echo $_GET["book"];?>";
    var chapter = "<?php echo $_GET["chapter"];?>";
    var verse = "<?php echo $_GET["verse"];?>";
	
	// Set background image
	document.body.style.backgroundImage="url('http://" + document.domain + "/bible/" + "sueback.jpg')";
	
	// Set menu URL
	document.getElementById('menu').src = "http://" + document.domain + "/bible/" + "menu.htm"
    
	// Determine book URL
    if( book.length > 0 )
    {
        page = "http://" + document.domain + "/bible/" + book + ".htm";
        
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
    
	// Set book URL
    document.getElementById('sbpages').src = page;
};
    
$(function(){

    var iFrames = $('iframe');
	var interval = 0;
	var resized = 0;
  
    function iResize() {
    
        for (var i = 0, j = iFrames.length; i < j; i++) {
          iFrames[i].style.height = iFrames[i].contentWindow.document.body.offsetHeight + 'px';
        }
    }
	
	function rectsIntersect(a, b) {
        return a[0]<b[2] && a[2]>b[0] && a[1]<b[3] && a[3]>b[1];
    }
	
	function getPageRect() {
        var isquirks= document.compatMode!=='BackCompat';
        var page= isquirks? document.documentElement : document.body;
        var x= page.scrollLeft;
        var y= page.scrollTop;
        var w= 'innerWidth' in window? window.innerWidth : page.clientWidth;
        var h= 'innerHeight' in window? window.innerHeight : page.clientHeight;
        return [x, y, x+w, y+h];
    }

    function getElementRect(element) {
        var x= 0, y= 0;
        var w= element.offsetWidth, h= element.offsetHeight;
        while (element.offsetParent!==null) {
            x+= element.offsetLeft;
            y+= element.offsetTop;
            element= element.offsetParent;
        }
        return [x, y, x+w, y+h];
    }
	
	// Scroll to correct chapter
	function scroll_page() {
		var chapter = "<?php echo $_GET["chapter"];?>";
		
		// Get proper index for getElementsByClassName array
		var chapterindex = chapter - 1;

		// Scroll to chapter
		if( chapterindex > 0 )
		{
			if( typeof document.getElementById('sbpages').contentWindow.document.getElementsByClassName("chapter")[chapterindex] !== 'undefined' )
			{
				//alert("not yet " + resized + " " + wait);
				
				if(resized == 1)
				{
					
					document.getElementById('sbpages').contentWindow.document.getElementsByClassName("chapter")[chapterindex].scrollIntoView();
					
					if( rectsIntersect(getPageRect(), getElementRect(document.getElementById('sbpages').contentWindow.document.getElementsByClassName("chapter")[chapterindex])))
					{
						clearInterval( interval );
					}
				}
			}
		}
	}
        
	interval = setInterval(scroll_page, 100);
	
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
		   resized = 1;
       });
    }
});
</script>
</head>
<body onload="load_page()">
    <table align="center" width="1000px"><tr><td valign="top">
    <iframe src="" class="iframe" scrolling="no" frameborder="0" id="menu" width="198px"></iframe>
    </td><td valign="top">
    <iframe src="" class="iframe" scrolling="no" frameborder="0" id="sbpages" width="800px"></iframe>
    </td></tr></table>
</body>
</html>
