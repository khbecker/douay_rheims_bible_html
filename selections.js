function init() {
    var chapter = getUrlVar("chapter");
    var verse = getUrlVar("verse");
    var verses = verse.split("-", 2);
    
    vstart = verses[0];
    
    if( verses.length == 1 )
    {
        vend = vstart;
    }
    else
    {
        vend = verses[1];
    }
    
    for(var i = vstart; i<=vend; i++) 
    {
        $('div.chapter:nth-of-type(' + chapter + ') li:nth-child(' + i + ')').addClass("highlighted");
    }
    
}

window.onload = init;
