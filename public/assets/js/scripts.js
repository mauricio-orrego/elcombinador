/* Boton Borrar Campos De Formulario*/
$(document).ready(function () {
    //Cerrar Las Alertas Automaticamente
    $('.alert[data-auto-dismiss]').each(function (index, element) {
        const $element = $(element),
            timeout = $element.data('auto-dismiss') || 5000;
        setTimeout(function () {
            $element.alert('close');
        }, timeout);
    });
    //TOOLTIPS
    $('body').tooltip({
        trigger: 'hover',
        selector: '.tooltipsC',
        placement: 'top',
        html: true,
        container: 'body'
    });
    $('ul.sidebar-menu').find('li.active').parents('li').addClass('active');

//nuevo script captura variable en url
$(document).ready(function(){
    var busprod = parametroURL('busprod');
    if((busprod != "") && (busprod != null)){     
            $('#modal1').modal({show: true});
        }
    })
//fin script    
});
