/*! modernizr 3.6.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-webp-setclasses !*/
!function(e,n,A){function o(e,n){return typeof e===n}function t(){var e,n,A,t,a,i,l;for(var f in r)if(r.hasOwnProperty(f)){if(e=[],n=r[f],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(A=0;A<n.options.aliases.length;A++)e.push(n.options.aliases[A].toLowerCase());for(t=o(n.fn,"function")?n.fn():n.fn,a=0;a<e.length;a++)i=e[a],l=i.split("."),1===l.length?Modernizr[l[0]]=t:(!Modernizr[l[0]]||Modernizr[l[0]]instanceof Boolean||(Modernizr[l[0]]=new Boolean(Modernizr[l[0]])),Modernizr[l[0]][l[1]]=t),s.push((t?"":"no-")+l.join("-"))}}function a(e){var n=u.className,A=Modernizr._config.classPrefix||"";if(c&&(n=n.baseVal),Modernizr._config.enableJSClass){var o=new RegExp("(^|\\s)"+A+"no-js(\\s|$)");n=n.replace(o,"$1"+A+"js$2")}Modernizr._config.enableClasses&&(n+=" "+A+e.join(" "+A),c?u.className.baseVal=n:u.className=n)}function i(e,n){if("object"==typeof e)for(var A in e)f(e,A)&&i(A,e[A]);else{e=e.toLowerCase();var o=e.split("."),t=Modernizr[o[0]];if(2==o.length&&(t=t[o[1]]),"undefined"!=typeof t)return Modernizr;n="function"==typeof n?n():n,1==o.length?Modernizr[o[0]]=n:(!Modernizr[o[0]]||Modernizr[o[0]]instanceof Boolean||(Modernizr[o[0]]=new Boolean(Modernizr[o[0]])),Modernizr[o[0]][o[1]]=n),a([(n&&0!=n?"":"no-")+o.join("-")]),Modernizr._trigger(e,n)}return Modernizr}var s=[],r=[],l={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var A=this;setTimeout(function(){n(A[e])},0)},addTest:function(e,n,A){r.push({name:e,fn:n,options:A})},addAsyncTest:function(e){r.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=l,Modernizr=new Modernizr;var f,u=n.documentElement,c="svg"===u.nodeName.toLowerCase();!function(){var e={}.hasOwnProperty;f=o(e,"undefined")||o(e.call,"undefined")?function(e,n){return n in e&&o(e.constructor.prototype[n],"undefined")}:function(n,A){return e.call(n,A)}}(),l._l={},l.on=function(e,n){this._l[e]||(this._l[e]=[]),this._l[e].push(n),Modernizr.hasOwnProperty(e)&&setTimeout(function(){Modernizr._trigger(e,Modernizr[e])},0)},l._trigger=function(e,n){if(this._l[e]){var A=this._l[e];setTimeout(function(){var e,o;for(e=0;e<A.length;e++)(o=A[e])(n)},0),delete this._l[e]}},Modernizr._q.push(function(){l.addTest=i}),Modernizr.addAsyncTest(function(){function e(e,n,A){function o(n){var o=n&&"load"===n.type?1==t.width:!1,a="webp"===e;i(e,a&&o?new Boolean(o):o),A&&A(n)}var t=new Image;t.onerror=o,t.onload=o,t.src=n}var n=[{uri:"data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAAwA0JaQAA3AA/vuUAAA=",name:"webp"},{uri:"data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA==",name:"webp.alpha"},{uri:"data:image/webp;base64,UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA",name:"webp.animation"},{uri:"data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA=",name:"webp.lossless"}],A=n.shift();e(A.name,A.uri,function(A){if(A&&"load"===A.type)for(var o=0;o<n.length;o++)e(n[o].name,n[o].uri)})}),t(),a(s),delete l.addTest,delete l.addAsyncTest;for(var p=0;p<Modernizr._q.length;p++)Modernizr._q[p]();e.Modernizr=Modernizr}(window,document);

/*!
 * bootstrap-star-rating v4.0.2
 * http://plugins.krajee.com/star-rating
 *
 * Author: Kartik Visweswaran
 * Copyright: 2013 - 2017, Kartik Visweswaran, Krajee.com
 *
 * Licensed under the BSD 3-Clause
 * https://github.com/kartik-v/bootstrap-star-rating/blob/master/LICENSE.md
 */

!function(t){"use strict";"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof module&&module.exports?module.exports=t(require("jquery")):t(window.jQuery)}(function(t){"use strict";var e,a;t.fn.ratingLocales={},t.fn.ratingThemes={},e={NAMESPACE:".rating",DEFAULT_MIN:0,DEFAULT_MAX:5,DEFAULT_STEP:1,isEmpty:function(e,a){return null===e||void 0===e||0===e.length||a&&""===t.trim(e)},getCss:function(t,e){return t?" "+e:""},addCss:function(t,e){t.removeClass(e).addClass(e)},getDecimalPlaces:function(t){var e=(""+t).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);return e?Math.max(0,(e[1]?e[1].length:0)-(e[2]?+e[2]:0)):0},applyPrecision:function(t,e){return parseFloat(t.toFixed(e))},handler:function(t,a,n,i,r){var l=r?a:a.split(" ").join(e.NAMESPACE+" ")+e.NAMESPACE;i||t.off(l),t.on(l,n)}},(a=function(e,a){this.$element=t(e),this._init(a)}).prototype={constructor:a,_parseAttr:function(t,a){var n,i,r,l,s=this.$element,o=s.attr("type");if("range"===o||"number"===o){switch(i=a[t]||s.data(t)||s.attr(t),t){case"min":r=e.DEFAULT_MIN;break;case"max":r=e.DEFAULT_MAX;break;default:r=e.DEFAULT_STEP}n=e.isEmpty(i)?r:i,l=parseFloat(n)}else l=parseFloat(a[t]);return isNaN(l)?r:l},_parseValue:function(t){var e=parseFloat(t);return isNaN(e)&&(e=this.clearValue),!this.zeroAsNull||0!==e&&"0"!==e?e:null},_setDefault:function(t,a){e.isEmpty(this[t])&&(this[t]=a)},_initSlider:function(t){var a=this,n=a.$element.val();a.initialValue=e.isEmpty(n)?0:n,a._setDefault("min",a._parseAttr("min",t)),a._setDefault("max",a._parseAttr("max",t)),a._setDefault("step",a._parseAttr("step",t)),(isNaN(a.min)||e.isEmpty(a.min))&&(a.min=e.DEFAULT_MIN),(isNaN(a.max)||e.isEmpty(a.max))&&(a.max=e.DEFAULT_MAX),(isNaN(a.step)||e.isEmpty(a.step)||0===a.step)&&(a.step=e.DEFAULT_STEP),a.diff=a.max-a.min},_initHighlight:function(t){var e,a=this,n=a._getCaption();t||(t=a.$element.val()),e=a.getWidthFromValue(t)+"%",a.$filledStars.width(e),a.cache={caption:n,width:e,val:t}},_getContainerCss:function(){var t=this;return"rating-container"+e.getCss(t.theme,"theme-"+t.theme)+e.getCss(t.rtl,"rating-rtl")+e.getCss(t.size,"rating-"+t.size)+e.getCss(t.animate,"rating-animate")+e.getCss(t.disabled||t.readonly,"rating-disabled")+e.getCss(t.containerClass,t.containerClass)},_checkDisabled:function(){var t=this,e=t.$element,a=t.options;t.disabled=void 0===a.disabled?e.attr("disabled")||!1:a.disabled,t.readonly=void 0===a.readonly?e.attr("readonly")||!1:a.readonly,t.inactive=t.disabled||t.readonly,e.attr({disabled:t.disabled,readonly:t.readonly})},_addContent:function(t,e){var a=this.$container,n="clear"===t;return this.rtl?n?a.append(e):a.prepend(e):n?a.prepend(e):a.append(e)},_generateRating:function(){var a,n,i,r=this,l=r.$element;n=r.$container=t(document.createElement("div")).insertBefore(l),e.addCss(n,r._getContainerCss()),r.$rating=a=t(document.createElement("div")).attr("class","rating-stars").appendTo(n).append(r._getStars("empty")).append(r._getStars("filled")),r.$emptyStars=a.find(".empty-stars"),r.$filledStars=a.find(".filled-stars"),r._renderCaption(),r._renderClear(),r._initHighlight(),n.append(l),r.rtl&&(i=Math.max(r.$emptyStars.outerWidth(),r.$filledStars.outerWidth()),r.$emptyStars.width(i)),l.appendTo(a)},_getCaption:function(){return this.$caption&&this.$caption.length?this.$caption.html():this.defaultCaption},_setCaption:function(t){this.$caption&&this.$caption.length&&this.$caption.html(t)},_renderCaption:function(){var a,n=this,i=n.$element.val(),r=n.captionElement?t(n.captionElement):"";if(n.showCaption){if(a=n.fetchCaption(i),r&&r.length)return e.addCss(r,"caption"),r.html(a),void(n.$caption=r);n._addContent("caption",'<div class="caption">'+a+"</div>"),n.$caption=n.$container.find(".caption")}},_renderClear:function(){var a,n=this,i=n.clearElement?t(n.clearElement):"";if(n.showClear){if(a=n._getClearClass(),i.length)return e.addCss(i,a),i.attr({title:n.clearButtonTitle}).html(n.clearButton),void(n.$clear=i);n._addContent("clear",'<div class="'+a+'" title="'+n.clearButtonTitle+'">'+n.clearButton+"</div>"),n.$clear=n.$container.find("."+n.clearButtonBaseClass)}},_getClearClass:function(){return this.clearButtonBaseClass+" "+(this.inactive?"":this.clearButtonActiveClass)},_toggleHover:function(t){var e,a,n,i=this;t&&(i.hoverChangeStars&&(e=i.getWidthFromValue(i.clearValue),a=t.val<=i.clearValue?e+"%":t.width,i.$filledStars.css("width",a)),i.hoverChangeCaption&&((n=t.val<=i.clearValue?i.fetchCaption(i.clearValue):t.caption)&&i._setCaption(n+"")))},_init:function(e){var a,n=this,i=n.$element.addClass("rating-input");return n.options=e,t.each(e,function(t,e){n[t]=e}),(n.rtl||"rtl"===i.attr("dir"))&&(n.rtl=!0,i.attr("dir","rtl")),n.starClicked=!1,n.clearClicked=!1,n._initSlider(e),n._checkDisabled(),n.displayOnly&&(n.inactive=!0,n.showClear=!1,n.showCaption=!1),n._generateRating(),n._initEvents(),n._listen(),a=n._parseValue(i.val()),i.val(a),i.removeClass("rating-loading")},_initEvents:function(){var t=this;t.events={_getTouchPosition:function(a){return(e.isEmpty(a.pageX)?a.originalEvent.touches[0].pageX:a.pageX)-t.$rating.offset().left},_listenClick:function(t,e){return t.stopPropagation(),t.preventDefault(),!0!==t.handled&&(e(t),void(t.handled=!0))},_noMouseAction:function(e){return!t.hoverEnabled||t.inactive||e&&e.isDefaultPrevented()},initTouch:function(a){var n,i,r,l,s,o,c,u,h=t.clearValue||0;("ontouchstart"in window||window.DocumentTouch&&document instanceof window.DocumentTouch)&&!t.inactive&&(n=a.originalEvent,i=e.isEmpty(n.touches)?n.changedTouches:n.touches,r=t.events._getTouchPosition(i[0]),"touchend"===a.type?(t._setStars(r),u=[t.$element.val(),t._getCaption()],t.$element.trigger("change").trigger("rating.change",u),t.starClicked=!0):(s=(l=t.calculate(r)).val<=h?t.fetchCaption(h):l.caption,o=t.getWidthFromValue(h),c=l.val<=h?o+"%":l.width,t._setCaption(s),t.$filledStars.css("width",c)))},starClick:function(e){var a,n;t.events._listenClick(e,function(e){return!t.inactive&&(a=t.events._getTouchPosition(e),t._setStars(a),n=[t.$element.val(),t._getCaption()],t.$element.trigger("change").trigger("rating.change",n),void(t.starClicked=!0))})},clearClick:function(e){t.events._listenClick(e,function(){t.inactive||(t.clear(),t.clearClicked=!0)})},starMouseMove:function(e){var a,n;t.events._noMouseAction(e)||(t.starClicked=!1,a=t.events._getTouchPosition(e),n=t.calculate(a),t._toggleHover(n),t.$element.trigger("rating.hover",[n.val,n.caption,"stars"]))},starMouseLeave:function(e){var a;t.events._noMouseAction(e)||t.starClicked||(a=t.cache,t._toggleHover(a),t.$element.trigger("rating.hoverleave",["stars"]))},clearMouseMove:function(e){var a,n,i;!t.events._noMouseAction(e)&&t.hoverOnClear&&(t.clearClicked=!1,a='<span class="'+t.clearCaptionClass+'">'+t.clearCaption+"</span>",n=t.clearValue,i={caption:a,width:t.getWidthFromValue(n)||0,val:n},t._toggleHover(i),t.$element.trigger("rating.hover",[n,a,"clear"]))},clearMouseLeave:function(e){var a;t.events._noMouseAction(e)||t.clearClicked||!t.hoverOnClear||(a=t.cache,t._toggleHover(a),t.$element.trigger("rating.hoverleave",["clear"]))},resetForm:function(e){e&&e.isDefaultPrevented()||t.inactive||t.reset()}}},_listen:function(){var a=this,n=a.$element,i=n.closest("form"),r=a.$rating,l=a.$clear,s=a.events;return e.handler(r,"touchstart touchmove touchend",t.proxy(s.initTouch,a)),e.handler(r,"click touchstart",t.proxy(s.starClick,a)),e.handler(r,"mousemove",t.proxy(s.starMouseMove,a)),e.handler(r,"mouseleave",t.proxy(s.starMouseLeave,a)),a.showClear&&l.length&&(e.handler(l,"click touchstart",t.proxy(s.clearClick,a)),e.handler(l,"mousemove",t.proxy(s.clearMouseMove,a)),e.handler(l,"mouseleave",t.proxy(s.clearMouseLeave,a))),i.length&&e.handler(i,"reset",t.proxy(s.resetForm,a),!0),n},_getStars:function(t){var e,a='<span class="'+t+'-stars">';for(e=1;e<=this.stars;e++)a+='<span class="star">'+this[t+"Star"]+"</span>";return a+"</span>"},_setStars:function(t){var e=this,a=arguments.length?e.calculate(t):e.calculate(),n=e.$element,i=e._parseValue(a.val);return n.val(i),e.$filledStars.css("width",a.width),e._setCaption(a.caption),e.cache=a,n},showStars:function(t){var e=this._parseValue(t);return this.$element.val(e),this._setStars()},calculate:function(t){var a=this,n=e.isEmpty(a.$element.val())?0:a.$element.val(),i=arguments.length?a.getValueFromPosition(t):n,r=a.fetchCaption(i),l=a.getWidthFromValue(i);return{caption:r,width:l+="%",val:i}},getValueFromPosition:function(t){var a,n,i=this,r=e.getDecimalPlaces(i.step),l=i.$rating.width();return n=i.diff*t/(l*i.step),n=i.rtl?Math.floor(n):Math.ceil(n),a=e.applyPrecision(parseFloat(i.min+n*i.step),r),a=Math.max(Math.min(a,i.max),i.min),i.rtl?i.max-a:a},getWidthFromValue:function(t){var e,a,n=this.min,i=this.max,r=this.$emptyStars;return!t||n>=t||n===i?0:(e=(a=r.outerWidth())?r.width()/a:1,t>=i?100:(t-n)*e*100/(i-n))},fetchCaption:function(t){var a,n,i,r=this,l=parseFloat(t)||r.clearValue,s=r.starCaptions,o=r.starCaptionClasses;return l&&l!==r.clearValue&&(l=e.applyPrecision(l,e.getDecimalPlaces(r.step))),i="function"==typeof o?o(l):o[l],n="function"==typeof s?s(l):s[l],a=e.isEmpty(n)?r.defaultCaption.replace(/\{rating}/g,l):n,'<span class="'+(e.isEmpty(i)?r.clearCaptionClass:i)+'">'+(l===r.clearValue?r.clearCaption:a)+"</span>"},destroy:function(){var a=this.$element;return e.isEmpty(this.$container)||this.$container.before(a).remove(),t.removeData(a.get(0)),a.off("rating").removeClass("rating rating-input")},create:function(t){var e=t||this.options||{};return this.destroy().rating(e)},clear:function(){var t=this,e='<span class="'+t.clearCaptionClass+'">'+t.clearCaption+"</span>";return t.inactive||t._setCaption(e),t.showStars(t.clearValue).trigger("change").trigger("rating.clear")},reset:function(){return this.showStars(this.initialValue).trigger("rating.reset")},update:function(t){return arguments.length?this.showStars(t):this.$element},refresh:function(e){var a=this.$element;return e?this.destroy().rating(t.extend(!0,this.options,e)).trigger("rating.refresh"):a}},t.fn.rating=function(n){var i=Array.apply(null,arguments),r=[];switch(i.shift(),this.each(function(){var l,s=t(this),o=s.data("rating"),c="object"==typeof n&&n,u=c.theme||s.data("theme"),h=c.language||s.data("language")||"en",d={},p={};o||(u&&(d=t.fn.ratingThemes[u]||{}),"en"===h||e.isEmpty(t.fn.ratingLocales[h])||(p=t.fn.ratingLocales[h]),l=t.extend(!0,{},t.fn.rating.defaults,d,t.fn.ratingLocales.en,p,c,s.data()),o=new a(this,l),s.data("rating",o)),"string"==typeof n&&r.push(o[n].apply(o,i))}),r.length){case 0:return this;case 1:return void 0===r[0]?this:r[0];default:return r}},t.fn.rating.defaults={theme:"",language:"en",stars:5,filledStar:'<i class="glyphicon glyphicon-star"></i>',emptyStar:'<i class="glyphicon glyphicon-star-empty"></i>',containerClass:"",size:"md",animate:!0,displayOnly:!1,rtl:!1,showClear:!0,showCaption:!0,starCaptionClasses:{.5:"label label-danger",1:"label label-danger",1.5:"label label-warning",2:"label label-warning",2.5:"label label-info",3:"label label-info",3.5:"label label-primary",4:"label label-primary",4.5:"label label-success",5:"label label-success"},clearButton:'<i class="glyphicon glyphicon-minus-sign"></i>',clearButtonBaseClass:"clear-rating",clearButtonActiveClass:"clear-rating-active",clearCaptionClass:"label label-default",clearValue:null,captionElement:null,clearElement:null,hoverEnabled:!0,hoverChangeCaption:!0,hoverChangeStars:!0,hoverOnClear:!0,zeroAsNull:!0},t.fn.ratingLocales.en={defaultCaption:"{rating} Stars",starCaptions:{.5:"Half Star",1:"One Star",1.5:"One & Half Star",2:"Two Stars",2.5:"Two & Half Stars",3:"Three Stars",3.5:"Three & Half Stars",4:"Four Stars",4.5:"Four & Half Stars",5:"Five Stars"},clearButtonTitle:"Clear",clearCaption:"Not Rated"},t.fn.rating.Constructor=a,t(document).ready(function(){var e=t("input.rating");e.length&&e.removeClass("rating-loading").addClass("rating-loading").rating()})});
/*!
*
*
*
 ------------------------------CUSTOM.JS-----------------------------------------
*
*
*
*
 */

 $(document).ready(function(){
 	  $('.collapsed').click(function(){
 		$('body').toggleClass('body_h');
 	});

 	// if menu is open then true, if closed then false
 	// we start with false
 	var open = false;
 	// just a function to print out message
 	function isOpen(){
 			if(open)
 				 return "menu is open";
 			else
 				 return "menu is closed";
 	}
 	// on each click toggle the "open" variable
 	$("#type").on("click", function() {
 				open = !open;
 				if(isOpen()=="menu is open"){
 					$("#type").css("border-radius","10px 10px 0 0");
 				}else if(isOpen()=="menu is closed"){
 					$("#type").css("border-radius","10px 10px 10px 10px");
 				}
 				console.log(isOpen());
 	});
 	// on each blur toggle the "open" variable
 	// fire only if menu is already in "open" state
 	$("#type").on("blur", function() {
 				if(open){
 					 open = !open;
 					 if(isOpen()=="menu is open"){
 	 					$("#type").css("border-radius","10px 10px 0 0");
 	 				}else if(isOpen()=="menu is closed"){
 	 					$("#type").css("border-radius","10px 10px 10px 10px");
 	 				}

 				}
 	});
 	// on ESC key toggle the "open" variable only if menu is in "open" state
 	$(document).keyup(function(e) {
 			if (e.keyCode == 27) {
 				if(open){
 					 open = !open;
 					 if(isOpen()=="menu is open"){
 	 					$("#type").css("border-radius","10px 10px 0 0");
 	 				}else if(isOpen()=="menu is closed"){
 	 					$("#type").css("border-radius","10px 10px 10px 10px");
 	 				}

 				}
 			}
 	});




 	$(window).resize(function(){
 		var y=window.matchMedia("(max-width: 990px)");
 		if (y.matches){
 			if( $("#mob_register").hasClass("register_design") ){
 			$(".mob_login").removeClass('login_design');
 			$(".mob_s_login").fadeIn();
 			$(".mob_s_register").hide();
 			$(".socila_img").hide();
 		}else if( $("#mob_login").hasClass("login_design") ){
 			$(".mob_register").removeClass('register_design');
 			$(".mob_s_login").hide();
 		}else{
 			$(".mob_register").addClass('register_design');
 			$(".mob_s_register").hide();
 			$(".socila_img").hide();
 		}

 			$(".mob_login").click(function(){
 				$(".mob_login").removeClass('login_design');
 				$(".mob_register").addClass('register_design');
 				$(".mob_s_login").fadeIn();
 				$(".mob_s_register").hide();
 				$(".socila_img").hide();
 			});

 			$(".mob_register").click(function(){
 				$(".mob_register").removeClass('register_design');
 				$(".mob_login").addClass('login_design');
 				$(".mob_s_login").hide();
 				$(".mob_s_register").fadeIn();
 				$(".socila_img").fadeIn();
 			});
 		}
 		else{
 			$(".mob_s_register").show();
 			$(".socila_img").show();
 			$(".mob_s_login").show();
 		}
 	});

     $(".dropdown_hover").hover(
         function() {
             $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).show();
             $(this).toggleClass('open');
         },
         function() {
             $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).hide();
             $(this).toggleClass('open');
         }
     );

 var y=window.matchMedia("(max-width: 990px)");
 if (y.matches){
 	$(".mob_register").addClass('register_design');
 	$(".mob_s_register").hide();
 	$(".socila_img").hide();

 	$(".mob_login").click(function(){
 		$(".mob_login").removeClass('login_design');
 		$(".mob_register").addClass('register_design');
 		$(".mob_s_login").fadeIn();
 		$(".mob_s_register").hide();
 		$(".socila_img").hide();
 	});

 	$(".mob_register").click(function(){
 		$(".mob_register").removeClass('register_design');
 		$(".mob_login").addClass('login_design');
 		$(".mob_s_login").hide();
 		$(".mob_s_register").fadeIn();
 		$(".socila_img").fadeIn();
 	});
 }


 var x = window.matchMedia("(max-width: 990px)");

 if (x.matches) {
 	  $(".select_dropdown").click(
         function() {
 				/*	var classList = $('.dropdown-menu').attr('class').split(/\s+/);
 					$.each(classList, function(index, item) {
 						//	if (item === 'someClass') {
 									//do something
 							//}
 							console.log(item);
 					});
 					//console.log(classList); */
 					$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).toggle();
 					$(this).toggleClass('open');
 					$('#sort_by').hide();
 					localStorage.setItem('sortby_status',0);
 					//	$(".select_dropdown").toggleClass('open');
         }
     );
 	$(".dropdown-menu").bind('click', function(){
 		// $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).show();
      $(this).toggle();
 	});

  $(".selects_dropdown").click(
     function() {
          $(".selects_dropdown .for-border .dropdown-menu").first().toggle();
           $('#sort_by').hide();
           localStorage.setItem('sortby_status',0);
     }
 );
 $(".close_selects").bind('click', function(){
 // $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).show();
     $(".selects_dropdown .for-border .dropdown-menu").first().toggle();
 });
 $('.dropdown-submenu a.test').on("click", function(e){
     $(this).next('ul').toggle();
     e.stopPropagation();
     e.preventDefault();
   });
 }
 else {
 	$(".p_hover").hover(
 			function() {
 					$('.ul_left_m').show();
 					$(".caret_change").html('<span class="caret-up"></span>');
 			},
 			function() {
 					$('.ul_left_m').hide();
 					$(".caret_change").html('<span class="caret "></span>');
 			}
 	);
 	$(".p_hover").bind('click', function(){
 	// $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).show();
 			$('.ul_left_m').hide();
 	});



 	$(".select_dropdown").hover(
 			function() {
 					$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).show();
 					$(this).toggleClass('open');
 						$('#sort_by').hide();
 						localStorage.setItem('sortby_status',0);
 			},
 			function() {
 					$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).hide();
 					$(this).toggleClass('open');
 			}
 	);
 	$(".select_dropdown").bind('click', function(){
 	// $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).show();
 			$(this).toggleClass('open');
 	});


  $(".selects_dropdown").hover(
     function() {
          //$(".selects_dropdown .for-border .dropdown-menu").first().removeClass('open');
          $(".selects_dropdown .for-border .dropdown-menu").first().show();
           $('#sort_by').hide();
           localStorage.setItem('sortby_status',0);
     },
     function() {
         $(".selects_dropdown .for-border .dropdown-menu").first().hide();
     }
 );
 $(".close_selects").bind('click', function(){
 // $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).show();
     $(".selects_dropdown").toggleClass('open');
 });
 $('.dropdown-submenu a.test').on("click", function(e){
     $(this).next('ul').toggle();
     e.stopPropagation();
     e.preventDefault();
   });

 $(".edde_hover").hover(
 	function(){
 		$(this).toggleClass('open');

 	},
 	function(){
 		$(this).toggleClass('open');

 	}
 );
 $(".edde_hover").bind('click', function(){
 	$(this).toggleClass('open');
 });
 }



 	$('.more_images').click(function(){
 		$('.moreandless').slideDown("400");
 		$('.more_images').slideUp("400");
 	});
 	$('.makePlain').hover(function(){
 		$('option').show();
 	});
 });
 $('#search_show').click(function(){
 		$('#msearch_show').addClass('msearch_show');
 	});



 $(document).ready(function(){

     loadGallery(true, 'a.thumbnail');

     //This function disables buttons when needed
     function disableButtons(counter_max, counter_current){
         $('#show-previous-image, #show-next-image').show();
         if(counter_max == counter_current){
             $('#show-next-image').hide();
         } else if (counter_current == 1){
             $('#show-previous-image').hide();
         }
     }

     /**
      *
      * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
      * @param setClickAttr  Sets the attribute for the click handler.
      */

     function loadGallery(setIDs, setClickAttr){
         var current_image,
             selector,
             counter = 0;

         $('#show-next-image, #show-previous-image').click(function(){
             if($(this).attr('id') == 'show-previous-image'){
                 current_image--;
             } else {
                 current_image++;
             }

             selector = $('[data-image-id="' + current_image + '"]');
             updateGallery(selector);
         });

         function updateGallery(selector) {
             var $sel = selector;
             current_image = $sel.data('image-id');
             $('#image-gallery-caption').text($sel.data('caption'));
             $('#image-gallery-title').text($sel.data('title'));
             $('#image-gallery-image').attr('src', $sel.data('image'));
             disableButtons(counter, $sel.data('image-id'));
         }

         if(setIDs == true){
             $('[data-image-id]').each(function(){
                 counter++;
                 $(this).attr('data-image-id',counter);
             });
         }
         $(setClickAttr).on('click',function(){
             updateGallery($(this));
         });
     }
 });


 (function () {
 	/* if($('input[type="range"]').val()!=undefined){
 		$('input[type="range"]').val(0).change();
 		var  selector = '[data-rangeSlider]';
 		var  elements = document.querySelectorAll(selector);
 		function valueOutput(element) {
 			var value = element.value;
 			var output = $("#re_rating").val(value);
 		}

 		for (var i = elements.length - 1; i >= 0; i--) {
 			valueOutput(elements[i]);
 		}

 		Array.prototype.slice.call(document.querySelectorAll('input[type="range"]')).forEach(function (el) {
 			el.addEventListener('input', function (e) {
 				valueOutput(e.target);
 			}, false);
 		});
 		rangeSlider.create(elements, { });
 	} */
 })();


/*
*
*
*
--------------------------------------------END OF CUSTOM.JS------------------------------
*
*
*
*/






/*!
 * jQuery Cookie Plugin v1.4.0
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD. Register as anonymous module.
		define(['jquery'], factory);
	} else {
		// Browser globals.
		factory(jQuery);
	}
}(function ($) {

	var pluses = /\+/g;

	function encode(s) {
		return config.raw ? s : encodeURIComponent(s);
	}

	function decode(s) {
		return config.raw ? s : decodeURIComponent(s);
	}

	function stringifyCookieValue(value) {
		return encode(config.json ? JSON.stringify(value) : String(value));
	}

	function parseCookieValue(s) {
		if (s.indexOf('"') === 0) {
			// This is a quoted cookie as according to RFC2068, unescape...
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}

		try {
			// Replace server-side written pluses with spaces.
			// If we can't decode the cookie, ignore it, it's unusable.
			s = decodeURIComponent(s.replace(pluses, ' '));
		} catch(e) {
			return;
		}

		try {
			// If we can't parse the cookie, ignore it, it's unusable.
			return config.json ? JSON.parse(s) : s;
		} catch(e) {}
	}

	function read(s, converter) {
		var value = config.raw ? s : parseCookieValue(s);
		return $.isFunction(converter) ? converter(value) : value;
	}

	var config = $.cookie = function (key, value, options) {

		// Write
		if (value !== undefined && !$.isFunction(value)) {
			options = $.extend({}, config.defaults, options);

			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setDate(t.getDate() + days);
			}

			return (document.cookie = [
				encode(key), '=', stringifyCookieValue(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}

		// Read

		var result = key ? undefined : {};

		// To prevent the for loop in the first place assign an empty array
		// in case there are no cookies at all. Also prevents odd result when
		// calling $.cookie().
		var cookies = document.cookie ? document.cookie.split('; ') : [];

		for (var i = 0, l = cookies.length; i < l; i++) {
			var parts = cookies[i].split('=');
			var name = decode(parts.shift());
			var cookie = parts.join('=');

			if (key && key === name) {
				// If second argument (value) is a function it's a converter...
				result = read(cookie, value);
				break;
			}

			// Prevent storing a cookie that we couldn't decode.
			if (!key && (cookie = read(cookie)) !== undefined) {
				result[name] = cookie;
			}
		}

		return result;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		if ($.cookie(key) !== undefined) {
			// Must not alter options, thus extending a fresh object...
			$.cookie(key, '', $.extend({}, options, { expires: -1 }));
			return true;
		}
		return false;
	};

}));



/*
*
*
*
--------------------------------------------END OF JQUERY.COOKIE------------------------------
*
*
*
*/

var d = new Date();
var time = d.getTime();
function redirectPage(pageName){
	if(pageName=='home'){
		window.location = baseUrl + 'home';
	}else if(pageName=='abt'){
        window.location = baseUrl + 'about-us';
        localStorage.setItem('type','viewed');
		localStorage.setItem('page_name',1);
	}else if(pageName=='digi'){
		window.location = baseUrl + 'digital-assets';
		localStorage.setItem('type','viewed');
		localStorage.setItem('page_name',2);
	}else if(pageName=='events'){
		window.location = baseUrl + 'events';
		localStorage.setItem('type','viewed');
		localStorage.setItem('page_name',4);
	}else if(pageName=='ico'){
		localStorage.setItem('type','edtA');
		localStorage.setItem('page_name',3);
		window.location = baseUrl + 'ico-tracker';
	}
}
$(document).ready(function() {
    var remember = $.cookie('remember');
    $('#loginErrorMsg').hide();
    $('#loginErrorMsg').removeClass("show").addClass("hide");
    if (remember == 'true') {
        var email = $.cookie('email');
        var password = $.cookie('password');
        $('#u_email').val(email);
        $('#u_password').val(password);
    } else {
        $("#u_email").focus();
    }
    $('#loginForm').formValidation();
    $('#regForm').formValidation();
    $("#o_u_password").val('');
    $('#uChangePwd').formValidation();
    $('#uresetpassword').formValidation();
    $("#n_u_password").val('');
    $('#forgotPwdd').formValidation();
    $("#fg_u_email").focus();
    $('#profile_edit').formValidation();
    $("#p_u_firstname").focus();
});

function userProfileUpdate() {
    $('#successMsg').html('');
    $('#profile_edit').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var fname = $("#p_u_firstname").val();
        var lname = $("#p_u_lastname").val();
        var uname = $("#p_u_username").val();
        var about = $("#p_u_about").val();
        var uImage = $('#userhidImage').val();
        var form_data = new FormData();
        form_data.append('u_firstname', fname);
        form_data.append('u_lastname', lname);
        form_data.append('u_username', uname);
        form_data.append('u_about', about);
        form_data.append('u_picture', uImage);
        $('#loadAddUser').show();
        $.ajax({
            url: baseUrl + 'User/updateUserProfile?id=' + time,
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            dataType: 'json',
            success: function(data) {
                $('#loadAddUser').hide();
                if (data.output == 'success') {
                    $('#successMsg').html('Profile updated successfully.').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl;
                    }, 3000);
                } else {
                    $('#successMsg').html('Server Fail.').css("color", "red");
                }
            }
        });
        e.preventDefault();
    });
}

function varifiedLink() {
    var uid = $("#hid_uid").val();
    $('#loadingmine').removeClass("hide").addClass("show");
    $.ajax({
        type: 'POST',
        url: baseUrl + '/Login/verifiedAuthReg?expireTime=' + time,
        data: { uid: uid, verifyid: time },
        dataType: 'json',
        success: function(data) {
            $('#loadingmine').removeClass("show").addClass("hide");
            if (data.output == 'success') {
                window.location = baseUrl + 'login';
            } else {
                window.location = baseUrl;
            }
        }
    });
}

function userRegister() {
    $('#regForm').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        $("#loadingmine").removeClass("hide").addClass("show");
        $('#emailverified').removeClass("show").addClass("hide");
        $('#usernameverified').removeClass("show").addClass("hide");
        var uemail = $("#uemail").val();
        var upassword = $("#upassword").val();
        var username = $("#username").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/Login/userRegister?expireTime=' + time,
            data: { uemail: uemail, upassword: upassword, username: username },
            dataType: 'json',
            success: function(data) {
                $('#loadingmine').removeClass("show").addClass("hide");
                if (data.output == 'success') {
                    // var token_uid = data.uid;
                    // window.location = baseUrl+'activate-link?revificationid='+token_uid;
                    $('#myModalLabelw').html('Registration Confirmation');
                    $('#alert-message').html('Thank you for registering with us. Please check your email for confirmation link.');
                    $('#hidden_common').modal('show');
                    $("#uemail").val('');
                    $("#upassword").val('');
                    $("#username").val('');
                    $("#regForm").trigger('reset');
                    $('#regForm').formValidation('resetForm', true);
                    $('#regForm').data('formValidation').resetForm();
                } else if (data.output == 'fail') {
                    $('#emailverified').removeClass("hide").addClass("show");
                } else if (data.output == 'failed') {
                    $('#usernameverified').removeClass("hide").addClass("show");
                }
            }
        });
        e.preventDefault();
    });
}

function resetPassword() {
    $('#errMesg').html('');
    $('#success').html('');
    var flag = true;
    $('#uresetpassword').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var confirmPass = $('#u_password').val();
        var u_id = $('#u_id').val();
        $('#loadingError').show();
        $.ajax({
            type: 'POST',
            url: baseUrl + 'Login/resetUpdatePassword?id=' + time,
            data: { confirmPass: confirmPass, u_id: u_id },
            success: function(data) {
                $('#loadingError').hide();
                if (data == '1') {
                    $('#errMesg').html('');
                    $('#success').html('Password resetted successfully');
                    window.location = baseUrl + 'login';
                }
            }
        });
        e.preventDefault();
    });
}


function userlogoutmode() {
    $('#userlogoutmodal').modal('show');
}

function userLogin() {
    $('#loginForm').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var uemail = $("#u_email").val();
        var upassword = $("#u_password").val();
        var rememberme = $("#remember").val();
        var redirectPage = $("#redirectPage").val();
				var redirectPageName = $("#redirectPageName").val();
        $('#loading').removeClass("hide").addClass("show");
        $.ajax({
            type: 'POST',
            url: baseUrl + '/Login/userLogin?expireTime=' + time,
            data: { uemail: uemail, upassword: upassword },
            dataType: 'json',
            success: function(data) {
                $('#loading').removeClass("show").addClass("hide");
                if (data.output == 'success') {
                    if ($('#remember').is(':checked')) {
                        $.cookie('email', uemail, { expires: 24 });
                        $.cookie('password', upassword, { expires: 24 });
                        $.cookie('remember', true, { expires: 24 });
                    } else {
                        $.cookie('email', null);
                        $.cookie('password', null);
                        $.cookie('remember', null);
                    }
                    if (redirectPage == 1) {
                        window.location = baseUrl + 'add-digital-asset';
                    } else if (redirectPage == 2) {
                        window.location = baseUrl + 'add-ico-tracker';
                    } else if (redirectPage == 3) {
                        window.location = baseUrl + 'add-event';
                    } else if (redirectPage == 4) {
                        window.location = baseUrl + 'write-a-review/'+redirectPageName;
                    }else {
                        window.location = baseUrl;
                    }
                } else {
                    $('#loginErrorMsg').html('');
                    $('#loginErrorMsg').removeClass("hide").addClass("show");
                    $('#loginErrorMsg').show();
                    $('#loginErrorMsg').html('Please enter valid Email and Password.');
                }
            }
        });
        e.preventDefault();
    });
}

function forgotPasswordd() {
    $('#errMesg').html('');
    $('#success').html('');
    var flag = true;
    $('#forgotPwdd').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var u_email = $('#fg_u_email').val();
        $('#loadingError').show();
        $.ajax({
            type: 'POST',
            url: baseUrl + 'Login/forgotPassword?id=' + time,
            data: { u_email: u_email },
            dataType: 'json',
            success: function(data) {
                $('#loadingError').hide();
                if (data.output == 'fail') {
                    $('#errMesg').html('Entered email is not on records.');
                } else {
                    // var token = data.token;
                    $('#fg_u_email').val('');
                    $('#success').html('Password reset link sent to your EmailID,\n Please check your email.');
                    $("#forgotPwdd").trigger('reset');
                    $('#forgotPwdd').formValidation('resetForm', true);
                    $('#forgotPwdd').data('formValidation').resetForm();
                    setTimeout(function() {
                        window.location = baseUrl + 'login';
                    }, 3000);
                }
            }
        });
        e.preventDefault();
    });
}

function changePassword() {
    $('#errMesg').html('');
    $('#success').html('');
    var flag = true;
    $('#uChangePwd').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var currentPass = $('#o_u_password').val();
        var newPass = $('#n_u_password').val();
        var confirmPass = $('#u_password').val();
        if (typeof(currentPass) != "undefined" && currentPass != "") {
            if (currentPass == newPass) {
                $('#errMesg').html('');
                flag = false;
            } else {
                flag = true;
            }
            if (newPass != confirmPass) {
                $('#errMesg').html('The new password and its confirm password are not same.');
                flag = false;
            } else {
                flag = true;
            }
        }
        if (flag == true) {
            $('#loadingError').show();
            $.ajax({
                type: 'POST',
                url: baseUrl + 'User/updatePassword?id=' + time,
                data: { newPass: newPass, currentPass: currentPass },
                success: function(data) {
                    $('#loadingError').hide();
                    if (data == '1') {
                        $('#o_u_password').val('');
                        $('#n_u_password').val('');
                        $('#u_password').val('');
                        $("#uChangePwd").trigger('reset');
                        $('#uChangePwd').formValidation('resetForm', true);
                        $('#uChangePwd').data('formValidation').resetForm();
                        $('#errMesg').html('');
                        $('#success').html('Password updated successfully');
                    } else {
                        $('#errMesg').html('');
                        $('#errMesg').html('Entered current password is wrong.');
                    }
                }
            });
        }
        e.preventDefault();
    });
}
function filterEvents(type,country,cityName,countryName) {
	$("#offsetpage").val(1);
    $("#limitpage").val(9);
    if(type=='de'){
      var filterTitle="Select";
    }else{
      var filterTitle = type;
    }
    if(cityName=='de'){
      var cityName ="Select";
    }else{
      var cityName  = cityName;
    }
    if(countryName=='de'){
      var countryName ="";
    }else{
      var countryName  = ' ('+countryName+')';
    }
    $("#filter_id").val(type);
    $("#filter_countryid").val(country);
    var htmlReload = cityName+countryName + '<div class="arrow_down"><span class="caret"></span></div>';
    $("#filtername").html(htmlReload);
    var offsetpage = 0;
    var limitpage = $("#limitpage").val();
    var pageMode = $("#pageMode").val();
    var filterId = $("#filter_id").val();
    var filterCountryId = $("#filter_countryid").val();
		if($("#searchterms1").val() ==""){
				var searchterms = $("#searchterms").val();
			} else {
				var searchterms = $("#searchterms1").val();
			}
    if (searchterms.length >= 3) {
        searchterms = searchterms;
    } else {
        searchterms = "";
    }
    $('.company_list').html('');
    var url = baseUrl + 'Company/loadmoreEvents?expireTime=' + time;
    var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
    $('.company_list').html(relaoding);
    $('#loadingHash1').hide();
    $.ajax({
        type: "POST",
        url: url,
        cache: false,
        data: {
            limitpage: limitpage,
            offsetpage: offsetpage,
            pageMode: pageMode,
            filterId: filterId,
           filterCountryId: filterCountryId,
            filter: "filetrfrom",
            searchterms: searchterms
        },
        dataType: "json",
        success: function(data) {

            console.log(data.output);
            if (data.output == 'success') {
                setTimeout(function() {
                    $(".company_list").html(data.resData);
                    $('#loadingHash1').show();
                    if (data.cnt > 12) {
                        $('#loadingHash1').show();
                        $('#loadingHash1').removeClass('mm_bttom hide');
                    }
                    $('#offsetpage').val(parseInt($('#limitpage').val()) + parseInt(offsetpage));
                    var $input = $('.rating-loading');
                    $input.rating();
                    $('.caption').hide();
                    $('.clear-rating').hide();
                }, 1000);

            } else if (data.output == 'norecoreds') {
                setTimeout(function() {
                    $(".company_list").html(data.resData);
                    // $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt(offsetpage) );
                }, 1000);
            }
        }
    });
    $(".hide_menu").css("display", "none");
}
function filterCompanies(type,pagemode,limit) {
	localStorage.setItem('type',type);
	localStorage.setItem('page_name',pagemode);
	$("#offsetpage").val(1);
	if(limit!=null){
		$("#limitpage").val(limit);
	}else{
    $("#limitpage").val(9);
	}
    if ($("#pageMode").val() == 'digital' || $("#pageMode").val() == 'mylist_digital') {
        var filterTitle = 'Most reviewed';
        $("#filter_id").val(2);
    } else {
        var filterTitle = 'Ending soon';
        $("#filter_id").val(6);

    }
    if (type == 'rating') {
        $("#filter_id").val(1);
	    filterTitle = "Highest rating";
    } else if (type == 'viewed') {
		$("#filter_id").val(2);
		filterTitle = "Most reviewed";
    } else if (type == 'mch') {
        $("#filter_id").val(3);
        filterTitle = "Market cap (High to Low)";
    } else if (type == 'mcl') {
        $("#filter_id").val(4);
        filterTitle = "Market cap (Low to High)";
    } else if (type == 'sdtA') {
        $("#filter_id").val(5);
        filterTitle = "ICO start date (Asc to Desc)";
    } else if (type == 'sdtD') {
        $("#filter_id").val(6);
        filterTitle = "ICO start date (Desc to Asc)";
    } else if (type == 'edtA') {
        $("#filter_id").val(7);
        filterTitle = "Ending soon";
    } else if (type == 'edtD') {
        $("#filter_id").val(8);
        filterTitle = "ICO end date (Desc to Asc)";
    }
    var htmlReload = filterTitle + '<div class="arrow_down"><span class="caret"></span></div>';
    $("#filtername").html(htmlReload);
    var offsetpage = 0;
    var limitpage = $("#limitpage").val();
    var pageMode = $("#pageMode").val();
    var filterId = $("#filter_id").val();
		if($("#searchterms1").val() ==""){
				var searchterms = $("#searchterms").val();
			} else {
				var searchterms = $("#searchterms1").val();
			}
    if (searchterms.length >= 3) {
        searchterms = searchterms;
    } else {
        searchterms = "";
    }
    $('.company_list').html('');
    var url = baseUrl + 'Company/loadmoreCompanies?expireTime=' + time;
    var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
    $('.company_list').html(relaoding);
    $('#loadingHash1').hide();
    $.ajax({
        type: "POST",
        url: url,
        cache: false,
        data: {
            limitpage: limitpage,
            offsetpage: offsetpage,
            pageMode: pageMode,
            filterId: filterId,
            filter: "filetrfrom",
            searchterms: searchterms
        },
        dataType: "json",
        success: function(data) {

            console.log(data.output);
            if (data.output == 'success') {
                setTimeout(function() {
									if($("#home_no_display").val()==3){
										  $(".company_list").fadeOut();
									}else{
                    $(".company_list").html(data.resData);
									}
                    $('#loadingHash1').show();
                    if (data.cnt > 6) {
                        $('#loadingHash1').show();
                        $('#loadingHash1').removeClass('mm_bttom hide');
                    }
                    $('#offsetpage').val(parseInt($('#limitpage').val()) + parseInt(offsetpage));
                    var $input = $('.rating-loading');
                    $input.rating();
                    $('.caption').hide();
                    $('.clear-rating').hide();
                }, 1000);

            } else if (data.output == 'norecoreds') {
                setTimeout(function() {
                    $(".company_list").html(data.resData);
                    // $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt(offsetpage) );
                }, 1000);
            }
        }
    });
    $(".hide_menu").css("display", "none");
}

function sreachtermhome() {
    $("#offsetpage").val(1);
    // $("#limitpage").val(4);
    $('#loadingHash1').hide();
		if($("#home_no_display").val()==3){
				$(".company_list").fadeIn();
		}
		if($("#searchterms").val() ==""){
    		var searchterms = $("#searchterms1").val();
			} else {
				var searchterms = $("#searchterms").val();
			}
    if (searchterms == '' || searchterms == 'undefined') {
        var type = $("#filter_id").val();
        filterCompanies(type);
    } else if (searchterms.length >= 3) {
        var offsetpage = 0;
        var limitpage = $("#limitpage").val();
        var pageMode = $("#pageMode").val();
        var filterId = $("#filter_id").val();
		if(filterId == '1'){
			var type = "rating";
		}else if(filterId == '2'){
			var type = "viewed";
		}else if(filterId == '3'){
			var type = "mch";
		}else if(filterId == '4'){
			var type = "mcl";
		}else if(filterId == '5'){
			var type = "sdtA";
		}else if(filterId == '6'){
			var type = "sdtD";
		}else if(filterId == '7'){
			var type = "edtA";
		}else if(filterId == '8'){
			var type = "edtD";
		}
		if(pageMode=='digital'){
			var pagemodebtn = 1;
		}else if(pageMode=='icos'){
			var pagemodebtn = 2;
		}else if(pageMode=='mylist_digital'){
			var pagemodebtn = 3;
		}else if(pageMode=='mylist_icos'){
			var pagemodebtn = 4;
		}
		localStorage.setItem('type',type);
		localStorage.setItem('page_name',pagemodebtn);

        $('.company_list').html('');
        var url = baseUrl + 'Company/loadmoreCompaniesHome?expireTime=' + time;
        var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
        $('.company_list').html(relaoding);
        $.ajax({
            type: "POST",
            url: url,
            cache: false,
            data: {
                limitpage: limitpage,
                offsetpage: offsetpage,
                pageMode: pageMode,
                filterId: filterId,
                filter: "filetrfrom",
                searchterms: searchterms
            },
            dataType: "json",
            success: function(data) {
                console.log(data.output);
                if (data.output == 'success') {
                    setTimeout(function() {
                        $(".company_list").html(data.resData);
                        if (data.cnt > 6) {
                            $('#loadingHash1').show();
                            $('#loadingHash1').removeClass('mm_bttom hide');
                        }
                        $('#offsetpage').val(parseInt($('#limitpage').val()) + parseInt(offsetpage));
                        var $input = $('.rating-loading');
                        $input.rating();
                        $('.caption').hide();
                        $('.clear-rating').hide();
                    }, 1000);
                } else if (data.output == 'norecoreds') {
                    setTimeout(function() {
                        $(".company_list").html(data.resData);
                        // $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt(offsetpage) );
                    }, 1000);
                }
            }
        });
    }
}
function sreachterm2() {
    $("#offsetpage").val(1);
    // $("#limitpage").val(4);
  //  $('#loadingHash1').hide();

	if($("#searchterms").val() ==""){
			var searchterms = $("#searchterms1").val();
		} else {
			var searchterms = $("#searchterms").val();
		}
    if (searchterms == '' || searchterms == 'undefined') {
        var type = $("#filter_id").val();
        filterEvents(type);
    } else if (searchterms.length >= 3) {
        var offsetpage = 0;
        var limitpage = $("#limitpage").val();
        var pageMode = $("#pageMode").val();
        var filterId = $("#filter_id").val();
        $('.company_list').html('');
        var url = baseUrl + 'Company/loadmoreEvents?expireTime=' + time;
        var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
        $('.company_list').html(relaoding);
        $.ajax({
            type: "POST",
            url: url,
            cache: false,
            data: {
                limitpage: limitpage,
                offsetpage: offsetpage,
                pageMode: pageMode,
                filterId: filterId,
                filter: "filetrfrom",
                searchterms: searchterms
            },
            dataType: "json",
            success: function(data) {
                console.log(data.output);
                if (data.output == 'success') {
                    setTimeout(function() {
                        $(".company_list").html(data.resData);
                        if (data.cnt > 12) {
                            $('#loadingHash1').show();
                            $('#loadingHash1').removeClass('mm_bttom hide');
                        }
                        $('#offsetpage').val(parseInt($('#limitpage').val()) + parseInt(offsetpage));
                        var $input = $('.rating-loading');
                        $input.rating();
                        $('.caption').hide();
                        $('.clear-rating').hide();
                    }, 1000);
                } else if (data.output == 'norecoreds') {
                    setTimeout(function() {
                        $(".company_list").html(data.resData);
                        // $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt(offsetpage) );
                    }, 1000);
                }
            }
        });
    }
}
function sreachterm() {
    $("#offsetpage").val(1);
    // $("#limitpage").val(4);
    $('#loadingHash1').hide();
		if($("#home_no_display").val()==3){
				$(".company_list").fadeIn();
		}
		if($("#searchterms").val() ==""){
    		var searchterms = $("#searchterms1").val();
			} else {
				var searchterms = $("#searchterms").val();
			}
    if (searchterms == '' || searchterms == 'undefined') {
        var type = $("#filter_id").val();
        filterCompanies(type);
    } else if (searchterms.length >= 3) {
        var offsetpage = 0;
        var limitpage = $("#limitpage").val();
        var pageMode = $("#pageMode").val();
        var filterId = $("#filter_id").val();
		if(filterId == '1'){
			var type = "rating";
		}else if(filterId == '2'){
			var type = "viewed";
		}else if(filterId == '3'){
			var type = "mch";
		}else if(filterId == '4'){
			var type = "mcl";
		}else if(filterId == '5'){
			var type = "sdtA";
		}else if(filterId == '6'){
			var type = "sdtD";
		}else if(filterId == '7'){
			var type = "edtA";
		}else if(filterId == '8'){
			var type = "edtD";
		}
		if(pageMode=='digital'){
			var pagemodebtn = 1;
		}else if(pageMode=='icos'){
			var pagemodebtn = 2;
		}else if(pageMode=='mylist_digital'){
			var pagemodebtn = 3;
		}else if(pageMode=='mylist_icos'){
			var pagemodebtn = 4;
		}
		localStorage.setItem('type',type);
		localStorage.setItem('page_name',pagemodebtn);

        $('.company_list').html('');
        var url = baseUrl + 'Company/loadmoreCompanies?expireTime=' + time;
        var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
        $('.company_list').html(relaoding);
        $.ajax({
            type: "POST",
            url: url,
            cache: false,
            data: {
                limitpage: limitpage,
                offsetpage: offsetpage,
                pageMode: pageMode,
                filterId: filterId,
                filter: "filetrfrom",
                searchterms: searchterms
            },
            dataType: "json",
            success: function(data) {
                console.log(data.output);
                if (data.output == 'success') {
                    setTimeout(function() {
                        $(".company_list").html(data.resData);
                        if (data.cnt > 6) {
                            $('#loadingHash1').show();
                            $('#loadingHash1').removeClass('mm_bttom hide');
                        }
                        $('#offsetpage').val(parseInt($('#limitpage').val()) + parseInt(offsetpage));
                        var $input = $('.rating-loading');
                        $input.rating();
                        $('.caption').hide();
                        $('.clear-rating').hide();
                    }, 1000);
                } else if (data.output == 'norecoreds') {
                    setTimeout(function() {
                        $(".company_list").html(data.resData);
                        // $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt(offsetpage) );
                    }, 1000);
                }
            }
        });
    }
}

function eidtCompanyView(cm_id, cmtype) {
    if (cmtype == '1') {
        window.location = baseUrl + 'digital-asset-edit/' + cmtype + '-' + cm_id;
    } else {
        window.location = baseUrl + 'ico-tracker-edit/' + cmtype + '-' + cm_id;
    }
}

function deleteCompanyview(cm_id, cmtype) {
    $("#hidcmid").val(cm_id);
    $("#hidcType").val(cmtype);
    if (cmtype == 1) {
        var textType = 'digital asset';
    } else {
        var textType = 'ico tracker';
    }
    $('#confirmation_delete_heading').html('Delete Confirmation');
    $('#confirmation_delete_message').html('Are you sure want to delete the ' + textType + '.');
    $("#delete_confirmation_modal_pop").modal('show');
}

function confirmDeleteActions() {
    var hidcmid = $("#hidcmid").val();
    var hidcType = $("#hidcType").val();
    $("#successfullDelete").html('');
    $("#delete_confirmation_modal_pop").modal('hide');
    var url = baseUrl + 'Company/deleteCompaniesMethod?expireTime=' + time;
    $.ajax({
        type: "POST",
        url: url,
        cache: false,
        data: { hidcType: hidcType, hidcmid: hidcmid },
        dataType: "json",
        success: function(data) {
            console.log(data.output);
            if (data.output == 'success') {
                $("#successfullDelete").html('Company deleted successfully.');
                setTimeout(function() {
                    if (hidcType == 1) {
                        window.location = baseUrl + 'my-digital-assets';
                    } else {
                        window.location = baseUrl + 'my-ico-trackers';
                    }
                }, 2000);
            }
        }
    });
}

function contactMails() {
    $('#errMesg').html('');
    $('#s').html('');
    $("#sucess_msg").html('');
    var flag = true;
    $('#cont_us_mail').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var message_sub = $("#message_sub").val();
        var type = $("#type").val();
        var email = $("#email").val();
        var body = $("#body").val();
        //alert(email);
        $.ajax({
            type: 'POST',
            url: baseUrl + '/Careers/contactMail?expireTime=' + time,
            data: { message_sub: message_sub, type: type, email: email, body: body },
            dataType: 'json',
            success: function(data) {
                console.log(data.output);
                if (data.output == 'success') {
                    $("#sucess_msg").html('Email sent sucessfully.');
                    setTimeout(function() {

                        window.location = baseUrl + 'contact-us';

                    }, 2000);
                } else {
                    $("#sucess_msg").html('Email sent failed.');
                }
            }
        });
        e.preventDefault();
    });
}

function subFeedback() {
    $('#err_msg').html('');
    $('#s').html('');
    $("#sucess_msg").html('');
    var flag = true;
    $('#suggeform').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var feedbackemail = $("#feedbackemail").val();
        var comments = $("#comments").val();
        var countryid = $("#countryid").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/Careers/feedbackMail?expireTime=' + time,
            data: { feedbackemail: feedbackemail, comments: comments, countryid: countryid },
            dataType: 'json',
            success: function(data) {
                console.log(data.output);
                if (data.output == 'success') {
                    $("#sucess_msg").html('Email sent sucessfully.');
                    setTimeout(function() {

                        window.location = baseUrl;

                    }, 2000);
                } else {
                    $("#err_msg").html('Email sent failed.');
                }
            }
        });
        e.preventDefault();
    });
}
/* function addEmail(){
	//alert();
	$('#successMsg').html('');
	var flag = true;
	$('#add_email').formValidation().on('success.form.fv', function(e) {
		e.stopImmediatePropagation();
		var email     = $("#email").val();
		$('#loadAddUser').show();
		$.ajax({
			type:'POST',
			url:  baseUrl+'/Careers/addEmails?expireTime='+time,
			data:{email:email},
			dataType	:	'json',
			success: function(data){
				console.log(data.output);
				if(data.output=='success'){
				$("#successMsg").html('Email added sucessfully.');
				setTimeout(function(){

						window.location=baseUrl;

				}, 1000);
			}
			}
		});
		e.preventDefault();
	});
} */
function subscriber() {
    $('#successMsg').html('');
    var email = $("#subemail").val();
    var flag = true;
    if (email == "") {
        $("#successMsg").html('Email Required').css("color", "#BD3518");
        flag = false;
    } else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        $("#successMsg").html('Please enter the correct email address').css("color", "#BD3518");
        flag = false;
    } else if (flag == true) {
        $("#successMsg").html('');
        $.ajax({
            type: 'POST',
            url: baseUrl + '/Careers/addEmails?expireTime=' + time,
            data: { email: email },
            dataType: 'json',
            success: function(data) {
                console.log(data.output);
                if (data.output == 'success') {
                    $("#successMsg").html('You have Successfully subscribed').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl;
                    }, 1000);
                } else {
                    $("#successMsg").html('There is some error while adding your email, please contact us later').css("color", "#BD3518");

                }
            }
        });
    }
    //e.preventDefault();
    //});
}
