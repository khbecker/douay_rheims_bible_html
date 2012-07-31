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
<link rel="shortcut icon" href="bible.ico" />
<style type="text/css">
/*<![CDATA[*/
body {
  text-align: center;
  background-image: url(/bible/sueback.jpg);
  }
/*]]>*/
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/bible/visibility.js"></script>
<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->
<?php
function fileExists($fileName, $caseSensitive = true) {

    if(file_exists($fileName)) {
        return $fileName;
    }
    if($caseSensitive) return false;

    // Handle case insensitive requests            
    $directoryName = dirname($fileName);
    $fileArray = glob($directoryName . '/*', GLOB_NOSORT);
    $fileNameLowerCase = strtolower($fileName);
    foreach($fileArray as $file) {
        if(strtolower($file) == $fileNameLowerCase) {
            return $file;
        }
    }
    return false;
}

?>
<script type="text/javascript">
function load_page()
{
	// get arguments
    var page = "/bible/Douay-Rheims.htm"
    var book = "<?php echo fileExists("./".$_GET["book"].".htm", false);?>";
    var chapter = "<?php echo $_GET["chapter"];?>";
    var verse = "<?php echo $_GET["verse"];?>";
    
	// Determine book URL
    if( book.length > 0 )
    {
        page = "/bible/" + book;
        
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
	var chapter = 0;
	var last_chapter = 0;
    
	// Scroll to correct chapter
	function scroll_page() 
	{
		last_chapter = chapter;
		chapter = document.getElementById('sbpages').contentWindow.location.hash.substring(1);
		
		if( last_chapter !== chapter )
		{
			anchor_changed = 1;
		}
		
		// Get proper index for getElementsByClassName array
		var chapterindex = chapter - 1;

		// Scroll to chapter
		if(( chapterindex > 0 ) &&
           ( resized == 1 ) && 
           ( anchor_changed == 1 ) && 
           (typeof document.getElementById('sbpages').contentWindow.document.getElementsByClassName("chapter")[chapterindex] !== 'undefined' ))
        {		
            document.getElementById('sbpages').contentWindow.document.getElementsByClassName("chapter")[chapterindex].scrollIntoView();

            if( isVisible(document.getElementById('sbpages').contentWindow.document.getElementsByClassName("chapter")[chapterindex]) )
            {
                anchor_changed = 0;
            }
		}
	}
        
	interval = setInterval(scroll_page, 100);

    iFrames.load(function() { 
        var height = this.contentWindow.document.body.offsetHeight + 50;
        this.style.height = height + 'px';
        resized = 1;
    });
});
</script>
</head>
<body onload="load_page()">
    <table align="center" width="1000px"><tr><td valign="top">
    <iframe src="/bible/menu.htm" class="iframe" scrolling="no" frameborder="0" id="menu" width="198px"></iframe>
    </td><td valign="top">
    <iframe src="" class="iframe" frameborder="0" id="sbpages" width="800px" height="1px"></iframe>
    </td></tr></table>
</body>
</html>
