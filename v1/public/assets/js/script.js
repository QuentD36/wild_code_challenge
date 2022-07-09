$(function (){


    $('#btn').on('click', function (e){
        e.preventDefault();

        check_member().done(function (data){
            if (data == 'success'){
                add_member();
            }
        });


    });

    $('#test').on('click', function (e){
        e.preventDefault();

        $.ajax({
            url : "index.php?gestion=member",
            type: "get",
        })
    })

    function check_member(){
         return $.ajax({
            url: "index.php?gestion=member&action=checkMember",
            type: "post",
            data: {
                'name' : $('#name').val()
            },
            success: function (data){
                if (data == "success"){
                    $('#name').removeClass("is-invalid");
                    $('#name').addClass("is-valid");
                    $('#output_name').hide();
                    // $('table:last-child').append("<td>"+ $('#name').val() +"</td>");
                    return true
                } else{
                    $('#name').removeClass("is-valid");
                    $('#name').addClass("is-invalid");
                    $('#output_name').show();
                    $('#output_name').html('Ce membre existe déjà !');
                }
            }
        })
    }

    function add_member(){
        $.ajax({
            url: "index.php?gestion=member&action=addMember",
            type: "post",
            data: {
                'name' : $('#name').val()
            },
            success: function (data){
                if (data == "success"){
                    $('#name').removeClass("is-invalid");
                    $('#name').addClass("is-valid");
                    $('#output_name').show();
                    $('#output_name').html('Membre ajouté à la liste !');
                    $('#name').val('');

                } else{
                    $('#name').removeClass("is-valid");
                    $('#name').addClass("is-invalid");
                    $('#output_name').show();
                    $('#output_name').html('Erreur, ce membre ne peut être ajouté !');
                }
            }
        })
    }

})