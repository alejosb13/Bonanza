$(document).ready(function() {

    $('.navbar a.dropdown-toggle').on('click', function(e) 
    {
        var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if(!$parent.parent().hasClass('nav')) {
            $el.next().css({"top": $el[0].offsetTop -1, "left": $parent.outerWidth() - 4});
        }

        $('.nav li.open').not($(this).parents("li")).removeClass("open");
        return false;
    });


});



    function modificar(id_registro)
    {
        var parametros = { "id_registro" : id_registro };

        $.ajax({
                data:  parametros,
                url:   'modificar.ajax.php',
                type:  'post',
                success:  function (response) {
                        $("#modalcuerpo").html(response);
                       
                }

        });
    }

    function eli(id)
    {
        var parametros = { "id" : id};

        $.ajax({
                data:  parametros,
                url:   'eliminar.ajax.php',
                type:  'post',
                // beforeSend: function () {
                //         $("#resultado").html("Procesando, espere por favor...");
                // },
                success:  function (response) {
                        $("#eliminar").html(response);
                       
                }
        });
    }
 