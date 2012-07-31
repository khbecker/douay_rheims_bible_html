/*
 * This library was written by bobince and has been modified by Kurtis LoVerde.
 *
 * Bobince
 *    Profile:  http://stackoverflow.com/users/18936/bobince
 *    Code obtained from:  http://stackoverflow.com/questions/2158991/fire-javascript-event-when-a-div-is-in-view
 *
 * Kurtis LoVerde
 *    Homepage:  http://www.loverde.org
 *
 *
 * Changes by Kurtis:
 *
 *    1.  Chrome has a bug which puts scrollTop/scrollLeft in the wrong object when
 *        operating in standards mode, breaking logic bobince used to determine
 *        where to pull the values from.  As of the date this comment was written,
 *        the Chrome bug was marked "won't fix" without explanation:
 *
 *        http://code.google.com/p/chromium/issues/detail?id=2891
 *
 *        I changed bobince's logic to look at document.documentElement *and*
 *        document.body, favoring document.documentElement.  Standards/quirks mode
 *        detection has been removed.
 *
 *    2.  Added isVisible(element) to perform one-off visibility checks.
 */

/*
 * Perform a one-time check of an item's visibility.
 * Returns true if the element is in view, false if not.
 */
function isVisible(element)
{
   return rectsIntersect( getPageRect(), getElementRect(element) );
}

/*
 * Assign a VisibilityMonitor to an element.  The monitor will check
 * the element's visibility after every scroll or resize event and will
 * execute a function whenever the element enters or leaves view.
 */
function VisibilityMonitor(element, showfn, hidefn)
{
   var isshown= false;

   function check()
   {
      if (rectsIntersect(getPageRect(), getElementRect(element)) !== isshown)
      {
         isshown= !isshown;
         isshown? showfn() : hidefn();
      }
   };

   window.onscroll=window.onresize= check;
   check();
}


function getPageRect()
{
   var x= document.documentElement.scrollLeft || document.body.scrollLeft;
   var y= document.documentElement.scrollTop || document.body.scrollTop;
   var w= 'innerWidth' in window? window.innerWidth : (document.documentElement.clientWidth || document.body.clientWidth);
   var h= 'innerHeight' in window? window.innerHeight : (document.documentElement.clientHeight || document.body.clientHeight);

   return [x, y, x+w, y+h];
}

function getElementRect(element)
{
   var x= 0, y= 0;
   var w= element.offsetWidth, h= element.offsetHeight;

   while (element.offsetParent!==null)
   {
      x+= element.offsetLeft;
      y+= element.offsetTop;
      element= element.offsetParent;
   }

   return [x, y, x+w, y+h];
}

function rectsIntersect(a, b)
{
   return a[0]<b[2] && a[2]>b[0] && a[1]<b[3] && a[3]>b[1];
}
