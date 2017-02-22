<?php

// campo disqus
function campo_disqus(){

// globals
global $idioma;

// valida id de disqus existe
if(ID_DISQUS == null){

    // retorno nulo	
    return null;
	
};

// id de disqus
$id_disqus = ID_DISQUS;
$id_disqus = "http-$id_disqus-com.disqus.com/embed.js";

// html
$html = "

<div id=\"disqus_thread\"></div>
<script>

var disqus_config = function () {
this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');

s.src = '//$id_disqus.disqus.com/embed.js';

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>

<noscript>Please enable JavaScript to view the <a href=\"https://disqus.com/?ref_noscript\" rel=\"nofollow\">$idioma[67]</a></noscript>

";

// retorno
return $html;

};

?>