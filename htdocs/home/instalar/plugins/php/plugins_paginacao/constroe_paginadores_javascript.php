<?php

// constroe os paginadores javascript
function constroe_paginadores_javascript(){

// valida configuracao
if(USAR_PAGINADOR_NUMERICO == true){
	
	// retorno nulo
    return null;
	
};

// html
$html = "

<!-- pagina ao carregar a pagina -->
<script language='javascript'>
$(document).ready(function(){

carrega_publicacoes_miniatura();

});
</script>
<!-- --------------------------- -->


<!-- evento ao atingir o bottom da pagina -->
<script language='javascript'>
$(window).scroll(function(){
if($(window).scrollTop() + $(window).height() == $(document).height()) {

carrega_publicacoes_miniatura();

};
});
<!-- --------------------------- -->
</script>
";

// retorno
return $html;

};

?>