<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="generator" content=
"HTML Tidy for Linux/x86 (vers 25 March 2009), see www.w3.org" />
<title>The 1899 Douay-Rheims Catholic Bible</title>
<meta name="language" content="En" />
<meta name="classification" content="global" />
<meta name="keywords" content=
"free bible downloads, bible, on-line, free bible software, free software,free downloads, bible downloads,bible software,html bible,internet bible,christian resources,free,onlinebible,Douay-Rheims, Catholic Bible,catholic" />
<meta name="description" content=
"The 1899 Douay-Rheims Catholic Bible" />
<base href="http://www.saintbenedicts.com/bible/"/>
<link rel="shortcut icon" href="http://www.saintbenedicts.com/bible/bible.ico" />
<script type="text/javascript">

function load_page()
{
    var page = "Douay-Rheims.htm"
    var book = "<?php echo $_GET["book"];?>";
    var chapter = "<?php echo $_GET["chapter"];?>";
    var verse = "<?php echo $_GET["verse"];?>";
    
    if( book.length > 0 )
    {
        page = book + ".htm";
        
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
}

</script>
</head>
<frameset cols="202,*" onload="load_page()">
<frame src="menu.htm" />
<frame name="sbpages" src="" id="sbpages" />
</frameset>
</html>
