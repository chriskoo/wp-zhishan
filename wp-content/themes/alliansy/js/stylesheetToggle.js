/**
* Stylesheet toggle variation on styleswitch stylesheet switcher.
* Built on jQuery.
* Under an CC Attribution, Share Alike License.
* By Kelvin Luck ( http://www.kelvinluck.com/ )
**/

(function(a){var d=[],c=0;a.stylesheetToggle=function(){c++;c%=d.length;a.stylesheetSwitch(d[c])};a.stylesheetSwitch=function(b){a("link[@rel*=style][title]").each(function(a){this.disabled=!0;this.getAttribute("title")==b&&(this.disabled=!1,c=a)});createCookie("style",b,365)};a.stylesheetInit=function(){a("link[rel*=style][title]").each(function(){d.push(this.getAttribute("title"))});var b=readCookie("style");b&&a.stylesheetSwitch(b)}})(jQuery);
function createCookie(a,d,c){if(c){var b=new Date;b.setTime(b.getTime()+864E5*c);c="; expires="+b.toGMTString()}else c="";document.cookie=a+"="+d+c+"; path=/"}function readCookie(a){for(var a=a+"=",d=document.cookie.split(";"),c=0;c<d.length;c++){for(var b=d[c];" "==b.charAt(0);)b=b.substring(1,b.length);if(0==b.indexOf(a))return b.substring(a.length,b.length)}return null}function eraseCookie(a){createCookie(a,"",-1)};