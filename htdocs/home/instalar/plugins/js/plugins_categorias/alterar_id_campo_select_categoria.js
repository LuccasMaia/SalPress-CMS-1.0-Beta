
// altera o valor de id de campo de categoria
function alterar_id_campo_select_categoria(campo_1, campo_2, campo_3){

// select option
var select_option = document.getElementById(campo_1);

// passando o nome
document.getElementById(campo_3).value = document.getElementById(campo_1).value;

// passando o id
document.getElementById(campo_2).value = select_option.options[select_option.selectedIndex].text;

};
