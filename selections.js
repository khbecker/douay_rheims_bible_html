function getUrlVar(key){
var result = new RegExp(key + "=([^&]*)", "i").exec(window.location.search);
return result && unescape(result[1]) || "";
}

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
