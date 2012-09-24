/**
 * jQuery.ScrollTo - Easy element scrolling using jQuery.
 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 5/25/2009
 * @author Ariel Flesler
 * @version 1.4.2
 *
 * http://flesler.blogspot.com/2007/10/jqueryscrollto.html
 */
;(function(d){var k=d.scrollTo=function(a,i,e){d(window).scrollTo(a,i,e)};k.defaults={axis:'xy',duration:parseFloat(d.fn.jquery)>=1.3?0:1};k.window=function(a){return d(window)._scrollable()};d.fn._scrollable=function(){return this.map(function(){var a=this,i=!a.nodeName||d.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!i)return a;var e=(a.contentWindow||a).document||a.ownerDocument||a;return d.browser.safari||e.compatMode=='BackCompat'?e.body:e.documentElement})};d.fn.scrollTo=function(n,j,b){if(typeof j=='object'){b=j;j=0}if(typeof b=='function')b={onAfter:b};if(n=='max')n=9e9;b=d.extend({},k.defaults,b);j=j||b.speed||b.duration;b.queue=b.queue&&b.axis.length>1;if(b.queue)j/=2;b.offset=p(b.offset);b.over=p(b.over);return this._scrollable().each(function(){var q=this,r=d(q),f=n,s,g={},u=r.is('html,body');switch(typeof f){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(f)){f=p(f);break}f=d(f,this);case'object':if(f.is||f.style)s=(f=d(f)).offset()}d.each(b.axis.split(''),function(a,i){var e=i=='x'?'Left':'Top',h=e.toLowerCase(),c='scroll'+e,l=q[c],m=k.max(q,i);if(s){g[c]=s[h]+(u?0:l-r.offset()[h]);if(b.margin){g[c]-=parseInt(f.css('margin'+e))||0;g[c]-=parseInt(f.css('border'+e+'Width'))||0}g[c]+=b.offset[h]||0;if(b.over[h])g[c]+=f[i=='x'?'width':'height']()*b.over[h]}else{var o=f[h];g[c]=o.slice&&o.slice(-1)=='%'?parseFloat(o)/100*m:o}if(/^\d+$/.test(g[c]))g[c]=g[c]<=0?0:Math.min(g[c],m);if(!a&&b.queue){if(l!=g[c])t(b.onAfterFirst);delete g[c]}});t(b.onAfter);function t(a){r.animate(g,j,b.easing,a&&function(){a.call(this,n,b)})}}).end()};k.max=function(a,i){var e=i=='x'?'Width':'Height',h='scroll'+e;if(!d(a).is('html,body'))return a[h]-d(a)[e.toLowerCase()]();var c='client'+e,l=a.ownerDocument.documentElement,m=a.ownerDocument.body;return Math.max(l[h],m[h])-Math.min(l[c],m[c])};function p(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);
/**
 * jQuery.LocalScroll - Animated scrolling navigation, using anchors.
 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 3/11/2009
 * @author Ariel Flesler
 * @version 1.2.7
 **/
;(function($){var l=location.href.replace(/#.*/,'');var g=$.localScroll=function(a){$('body').localScroll(a)};g.defaults={duration:1e3,axis:'y',event:'click',stop:true,target:window,reset:true};g.hash=function(a){if(location.hash){a=$.extend({},g.defaults,a);a.hash=false;if(a.reset){var e=a.duration;delete a.duration;$(a.target).scrollTo(0,a);a.duration=e}i(0,location,a)}};$.fn.localScroll=function(b){b=$.extend({},g.defaults,b);return b.lazy?this.bind(b.event,function(a){var e=$([a.target,a.target.parentNode]).filter(d)[0];if(e)i(a,e,b)}):this.find('a,area').filter(d).bind(b.event,function(a){i(a,this,b)}).end().end();function d(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,'')==l&&(!b.filter||$(this).is(b.filter))}};function i(a,e,b){var d=e.hash.slice(1),f=document.getElementById(d)||document.getElementsByName(d)[0];if(!f)return;if(a)a.preventDefault();var h=$(b.target);if(b.lock&&h.is(':animated')||b.onBefore&&b.onBefore.call(b,a,f,h)===false)return;if(b.stop)h.stop(true);if(b.hash){var j=f.id==d?'id':'name',k=$('<a> </a>').attr(j,d).css({position:'absolute',top:$(window).scrollTop(),left:$(window).scrollLeft()});f[j]='';$('body').prepend(k);location=e.hash;k.remove();f[j]=d}h.scrollTo(f,b).trigger('notify.serialScroll',[f])}})(jQuery);
/*
 * jQuery.SerialScroll - Animated scrolling of series
 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 06/14/2009
 * @author Ariel Flesler
 * @version 1.2.2
 * http://flesler.blogspot.com/2008/02/jqueryserialscroll.html
 */
;(function(a){var b=a.serialScroll=function(c){return a(window).serialScroll(c)};b.defaults={duration:1e3,axis:"x",event:"click",start:0,step:1,lock:!0,cycle:!0,constant:!0};a.fn.serialScroll=function(c){return this.each(function(){var t=a.extend({},b.defaults,c),s=t.event,i=t.step,r=t.lazy,e=t.target?this:document,u=a(t.target||this,e),p=u[0],m=t.items,h=t.start,g=t.interval,k=t.navigation,l;if(!r){m=d()}if(t.force){f({},h)}a(t.prev||[],e).bind(s,-i,q);a(t.next||[],e).bind(s,i,q);if(!p.ssbound){u.bind("prev.serialScroll",-i,q).bind("next.serialScroll",i,q).bind("goto.serialScroll",f)}if(g){u.bind("start.serialScroll",function(v){if(!g){o();g=!0;n()}}).bind("stop.serialScroll",function(){o();g=!1})}u.bind("notify.serialScroll",function(x,w){var v=j(w);if(v>-1){h=v}});p.ssbound=!0;if(t.jump){(r?u:d()).bind(s,function(v){f(v,j(v.target))})}if(k){k=a(k,e).bind(s,function(v){v.data=Math.round(d().length/k.length)*k.index(this);f(v,this)})}function q(v){v.data+=h;f(v,this)}function f(B,z){if(!isNaN(z)){B.data=z;z=p}var C=B.data,v,D=B.type,A=t.exclude?d().slice(0,-t.exclude):d(),y=A.length,w=A[C],x=t.duration;if(D){B.preventDefault()}if(g){o();l=setTimeout(n,t.interval)}if(!w){v=C<0?0:y-1;if(h!=v){C=v}else{if(!t.cycle){return}else{C=y-v-1}}w=A[C]}if(!w||t.lock&&u.is(":animated")||D&&t.onBefore&&t.onBefore(B,w,u,d(),C)===!1){return}if(t.stop){u.queue("fx",[]).stop()}if(t.constant){x=Math.abs(x/i*(h-C))}u.scrollTo(w,x,t).trigger("notify.serialScroll",[C])}function n(){u.trigger("next.serialScroll")}function o(){clearTimeout(l)}function d(){return a(m,p)}function j(w){if(!isNaN(w)){return w}var x=d(),v;while((v=x.index(w))==-1&&w!=p){w=w.parentNode}return v}})}})(jQuery);
/*
 * coda-slider
 */
if (document.getElementById("slider")) {
$(document).ready(function(){var $panels=$('#slider .scrollContainer > div');var $container=$('#slider .scrollContainer');var horizontal=true;if(horizontal){$panels.css({'float':'left','position':'relative'});$container.css('width',$panels[0].offsetWidth*$panels.length);}
var $scroll=$('#slider .scroll').css('overflow','hidden');function selectNav(){$(this).parents('ul:first').find('a').removeClass('selected').end().end().addClass('selected');}
$('#slider .navigation').find('a').click(selectNav);function trigger(data){var el=$('#slider .navigation').find('a[href$="'+data.id+'"]').get(0);selectNav.call(el);}
if(window.location.hash){trigger({id:window.location.hash.substr(1)});}else{$('ul.navigation a:first').click();}
var offset=parseInt((horizontal?$container.css('paddingTop'):$container.css('paddingLeft'))||0)*-1;var scrollOptions={target:$scroll,items:$panels,navigation:'.navigation a',prev:'img.left',next:'img.right',axis:'xy',onAfter:trigger,offset:offset,duration:500,easing:'swing'};$('#slider').serialScroll(scrollOptions);$.localScroll(scrollOptions);scrollOptions.duration=1;$.localScroll.hash(scrollOptions);});
}
/*
 *
 *  Extra Stuff
 *
 */
$(function() {
    if ($("#email-form").length) {
        $.watermark.options.useNative = false;
        $("input#contact-name").watermark("contact name");
        $("input#contact-email").watermark("contact email");
        $("input#contact-phone").watermark("contact phone");
        $("textarea#contact-message").watermark("write us a brief message here");

        $("#email-form").validationEngine({
            ajaxFormValidation: true,
        });

        $("button#contact-submit").click(function(event) {
            event.preventDefault();

            var data = $("form#email-form").serialize();
            $.getJSON('classes/ajaxmailer.php', data, function(results) {
                switch(results.result) {
                    case "fail":
                        if (results.info == "invalid contact") {
                            var out = 'Awww snap!  We can\' contact you without a valid email address or phone number.  Try again.';
                            var fbclass = 'notice';
                        } else {
                            var out = 'Awww snap!  Mail was not delivered successfully.  We don\'t want to miss your request, so please try calling or emailing using the email address listed above.';
                            var fbclass = 'error';
                        }
                        break;
                    case "success":
                        var out = 'Sweet!  Mail successfully sent to us, and we will respond directly.';
                        var fbclass = 'success';
                        document.forms['email-form'].reset();
                        break;
                }
                $("textarea#email-form-feedback")
                    .removeClass('success')
                    .removeClass('notice')
                    .removeClass('error')
                    .addClass(fbclass)
                    .html(out).fadeIn('fast');
            });
        });
    }

    if ($(".latest-twitter").length) {

        $('div#tweet-list').twitterSearch({
            term:  'w3geekery',
            title: '@w3geekery tweets',
            titleLink: 'http://twitter.com/w3geekery',
            birdLink:  'http://twitter.com/w3geekery',
            birdSrc: '/media/images/twitter.png',
            css:    {
                a:     { textDecoration: 'none', color: '#3B5998' },
    			bird:  { 'float':'left',position: 'absolute', left: '-32px', top: '-30px', border: 'none', height: 'auto', width: 'auto' },
    			container: { overflow: 'hidden', backgroundColor: 'transparent', height: '95%', width: '320px', padding: '0 0 10px' },
    			fail:  { background: '#6cc5c3 url(http://cloud.github.com/downloads/malsup/twitter/failwhale.png) no-repeat 50% 50%', height: '100%', padding: '10px' },
    			frame: { border:"none",borderBottom:"10px solid #FFFEB5"},
    			tweet: { padding: '5px 10px', clear: 'left' },
    			img:   { 'float': 'left', margin: '5px', width: 'auto', height: 'auto' },
    			loading: { padding: '20px', textAlign: 'center', color: '#888' },
    			text:  { fontSize: '85%'},
    			time:  { fontSize: 'smaller', color: '#888' },
    			title: { color: 'maroon', backgroundColor: 'transparent', fontWeight: 'bold', margin: '0', padding: '0 0 5px 30px', fontSize: '145%', textAlign: 'left' },
    			titleLink: { textDecoration: 'none', color: 'maroon' },
    			user:  { fontWeight: 'bold' }
			}
        });
    }

    $("#ac_search").on('keyup',function() {
        var data = { "ac_search": $("#ac_search").val()};
        $.ajax({
            url: "/autocomplete",
            data: data,
            type: "GET",
            dataType: "JSON",
            success: function(r) {
                if ((!r.errors) && (r.matches.length)) {
                    if (r.matches !== false) {
                        $('.response ol').empty();
                        $.each(r.matches, function(ix,obj) {
                            $('.response ol').append("<li>"+obj+"</li>");
                        });
                    }
                }
            }
        });
    });
});

