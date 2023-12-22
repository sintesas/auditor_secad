$(document).ready(function(){

	$(document).on('click', '.edit-modal', function(){
        $('#footer_action_button').text("Actualizar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-info');
        $('.actionBtn').addClass('btn-block');    
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.cancelBtn').addClass('btn-danger');
        $('.cancelBtn').addClass('btn-block');    
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();

        // modal --> data-*
        $('#idmoc').val($(this).data('idmoc'))
        $('#numero').val($(this).data('numero'));
        $('#medio').val($(this).data('medio'));
        $('#codigo').val($(this).data('codigo'));
        $('#descripcion').val($(this).data('descripcion'));
        $('#myModal').modal('show');

    });



    $('.modalfooter').on('click', '.edit', function(){

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

    	$.ajax({

    		type: 'post',
    		url: 'editmoc',
    		data: {
    			// '_token': $('input[name=_token]').val(),
    			'idmoc': $("#idmoc").val(),
    			'numero': $("#numero").val(),
    			'medio': $("#medio").val(),
    			'codigo': $("#codigo").val(),
    			'descripcion': $("#descripcion").val()

    		},

    		success: function(data){
                // alert("value " + data.CodigoAC2324 + " updated");
    			$('.moc' + data.IdMOC).replaceWith("<tr class='moc" + data.IdMOC + "'> <td>" + data.Numero + "</td><td>" + data.Medio + "</td><td>" + data.CodigoAC2324 + "</td><td>" + data.DescripcionAC2324 + "</td> <td> <div class='col-sm-6'><button class='delete-modal btn btn-danger' data-id='" + data.IdMOC + "' ><span class='glyphicon glyphicon-trash'></span></button></div> <div class='col-sm-6'> <button class='edit-modal btn btn-info' data-idmoc='" + data.IdMOC + "' data-numero='" + data.Numero + "' data-medio='" + data.Medio + "' data-codigo='" + data.CodigoAC2324 + "' data-descripcion= '" + data.DescripcionAC2324 + "'><span class='glyphicon glyphicon-edit'></span></button> </div> </td> </tr>");
    		}
            

    	});

    });


// END EDIT

// START DELETE

$(document).on('click','.delete-record',function(){
        
        var idmoc = $(this).val();
         
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        $.ajax({
            type: "DELETE",
            url: 'deletemoc' + '/' + idmoc,
            success: function (data) {
                console.log(data);
                $(".moc" + idmoc).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    
});


