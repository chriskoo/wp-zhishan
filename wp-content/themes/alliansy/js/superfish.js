
/*
 * Superfish v1.4.8 - jQuery menu widget
 * Copyright (c) 2008 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 * CHANGELOG: http://users.tpg.com.au/j_birch/plugins/superfish/changelog.txt
 */

(function(a){a.fn.superfish=function(d){var c=a.fn.superfish,b=c.c,k=a(['<span class="',b.arrowClass,'"> &#187;</span>'].join("")),g=function(){var c=a(this),b=i(c);clearTimeout(b.sfTimer);c.showSuperfishUl().siblings().hideSuperfishUl()},j=function(){var b=a(this),d=i(b),e=c.op;clearTimeout(d.sfTimer);d.sfTimer=setTimeout(function(){e.retainPath=-1<a.inArray(b[0],e.$path);b.hideSuperfishUl();e.$path.length&&1>b.parents(["li.",e.hoverClass].join("")).length&&g.call(e.$path)},e.delay)},i=function(a){a=
a.parents(["ul.",b.menuClass,":first"].join(""))[0];c.op=c.o[a.serial];return a};return this.each(function(){var l=this.serial=c.o.length,f=a.extend({},c.defaults,d);f.$path=a("li."+f.pathClass,this).slice(0,f.pathLevels).each(function(){a(this).addClass([f.hoverClass,b.bcClass].join(" ")).filter("li:has(ul)").removeClass(f.pathClass)});c.o[l]=c.op=f;a("li:has(ul)",this)[a.fn.hoverIntent&&!f.disableHI?"hoverIntent":"hover"](g,j).each(function(){f.autoArrows&&a(">a:first-child",this).addClass(b.anchorClass).append(k.clone())}).not("."+
b.bcClass).hideSuperfishUl();var e=a("a",this);e.each(function(a){var b=e.eq(a).parents("li");e.eq(a).focus(function(){g.call(b)}).blur(function(){j.call(b)})});f.onInit.call(this)}).each(function(){var d=[b.menuClass];c.op.dropShadows&&!(a.browser.msie&&7>a.browser.version)&&d.push(b.shadowClass);a(this).addClass(d.join(" "))})};var b=a.fn.superfish;b.o=[];b.op={};b.IE7fix=function(){var d=b.op;a.browser.msie&&(6<a.browser.version&&d.dropShadows&&void 0!=d.animation.opacity)&&this.toggleClass(b.c.shadowClass+
"-off")};b.c={bcClass:"sf-breadcrumb",menuClass:"sf-js-enabled",anchorClass:"sf-with-ul",arrowClass:"sf-sub-indicator",shadowClass:"sf-shadow"};b.defaults={hoverClass:"sfHover",pathClass:"overideThisToUse",pathLevels:1,delay:800,animation:{opacity:"show"},speed:"normal",autoArrows:!0,dropShadows:!0,disableHI:!1,onInit:function(){},onBeforeShow:function(){},onShow:function(){},onHide:function(){}};a.fn.extend({hideSuperfishUl:function(){var d=b.op,c=!0===d.retainPath?d.$path:"";d.retainPath=!1;var c=
a(["li.",d.hoverClass].join(""),this).add(this).not(c).removeClass(d.hoverClass).find(">ul").slideUp(),h=c.parent();h.not(".active").find(".mText").stop(!0).animate({top:"0px"},500,"easeOutExpo");h.not(".active").find(".menuTextOver").stop(!0).animate({top:"-50px"},500,"easeOutExpo");d.onHide.call(c);return this},showSuperfishUl:function(){var a=b.op,c=this.addClass(a.hoverClass).find(">ul:hidden").css("visibility","visible");b.IE7fix.call(c);a.onBeforeShow.call(c);c.animate(a.animation,a.speed,function(){b.IE7fix.call(c);
a.onShow.call(c)});return this}})})(jQuery);