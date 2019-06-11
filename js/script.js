$(function (){
	$('#dt_hs_comunicado').datetimepicker({format:'d/m/Y H:i:s',formatDate:'Y-m-d H:i:s'});
    $('.money').mask('##0.00', {reverse: true});
    $('.money2').mask('##0.000000000', {reverse: true});
    $('.taxas').mask('##0.00000', {reverse: true});
    $('.cep').mask('00000-000', {reverse: true});
    $('.cpf').mask('000.000.000-00', {reverse: true});

    $('.money3').mask('#.##0,00', {reverse: true});
    $('.money4').mask('#.##0,000000000', {reverse: true});
    $('.money5').mask('#.##0,00000', {reverse: true});

});