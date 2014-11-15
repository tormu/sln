/*
CSS Browser Selector v0.3.5 (Feb 05, 2010)
Rafael Lima (http://rafael.adm.br)
http://rafael.adm.br/css_browser_selector
License: http://creativecommons.org/licenses/by/2.5/
Contributors: http://rafael.adm.br/css_browser_selector#contributors
*/
function css_browser_selector(u){var ua = u.toLowerCase(),is=function(t){return ua.indexOf(t)>-1;},g='gecko',w='webkit',s='safari',o='opera',h=document.documentElement,b=[(!(/opera|webtv/i.test(ua))&&/msie\s(\d)/.test(ua))?('ie ie'+RegExp.$1):is('firefox/2')?g+' ff2':is('firefox/3.5')?g+' ff3 ff3_5':is('firefox/3')?g+' ff3':is('gecko/')?g:is('opera')?o+(/version\/(\d+)/.test(ua)?' '+o+RegExp.$1:(/opera(\s|\/)(\d+)/.test(ua)?' '+o+RegExp.$2:'')):is('konqueror')?'konqueror':is('chrome')?w+' chrome':is('iron')?w+' iron':is('applewebkit/')?w+' '+s+(/version\/(\d+)/.test(ua)?' '+s+RegExp.$1:''):is('mozilla/')?g:'',is('j2me')?'mobile':is('iphone')?'iphone':is('ipod')?'ipod':is('mac')?'mac':is('darwin')?'mac':is('webtv')?'webtv':is('win')?'win':is('freebsd')?'freebsd':(is('x11')||is('linux'))?'linux':'','js']; c = b.join(' '); h.className += ' '+c; return c;}; css_browser_selector(navigator.userAgent);

/* Too tired for today.. other copypaste from http://stackoverflow.com/questions/19491336/get-url-parameter-jquery */
function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1);
  var sURLVariables = sPageURL.split('&');
  for (var i = 0; i < sURLVariables.length; i++) {
    var sParameterName = sURLVariables[i].split('=');
    if (sParameterName[0] == sParam) {
      return sParameterName[1];
    }
  }
}  

(function ($) {
  Drupal.behaviors.sln_teema = {
    attach: function (context, settings) {
      //Views-moduulilla ei voi sortata roolin eikä iän mukaan, joten tehdään kaikki JS:llä.
      if($('.view-id-kayttajat table').length > 0) {
        if($('.view-id-kayttajat table th.views-field-name').length > 0) {
          var order = getUrlParameter("order");
          $.tablesorter.defaults.widgets = ['zebra'];

          //Jossei laiteta järjestykseen "sln:llä jo"-kentän mukaan, niin tehdään default-sorttaus
          if(order != 'created') {
            $(".view-id-kayttajat table").tablesorter({ headers: { 7: { sorter: false} }, sortList: [[0,1],[1,0]] });
          }
          else {
            $(".view-id-kayttajat table").tablesorter({ headers: { 7: { sorter: false} } });
          }
        }
      }
    }
  };
})(jQuery);