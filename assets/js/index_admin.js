/* Created by Marangelo on 30/01/2016.*/

$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger2').leanModal();
});

var bandera2 =0;
function generarPdf()
{   
    document.getElementById('reportepdf').submit();
}
function generarExcel()
{
    $('#excel_articulo').val($('#tbArticulos_filter input[type=search]').val());
    $('#excel_laboratorio').val($( "#Filtro1_wrapper #filtroLaboratorio select option:selected").text());
    $('#excel_proveedor').val($('#Filtro1_wrapper #filtroProveedor select option:selected').text());
    document.getElementById('excel').submit();
}
function generarExcel2()
{
    document.getElementById('excel').submit();
}
$('#tblAlvaro').DataTable( {
    "ordering": false,
    "info":     false,
    "bPaginate2" : false,
    "bFilter" : false,
    "language": {
        "emptyTable": "No hay datos disponibles en la tabla",
        "lengthMenu": '_MENU_ ',
        "search": '<i class="tiny material-icons">search</i>',
        "loadingRecords": "",
        "paginate": {
            "first":      "Primera",
            "last":       "Última ",
            "next":       "Anterior",
            "previous":   "Siguiente"
        }
    },
});

$('#Articulos').DataTable( {
    "ordering": false,
    "info":     false,
    "pagingType": "full_numbers",
    "lengthMenu":  [[10,-1], [10,"Todo"]] ,
    "language": {
        "emptyTable": "No hay datos disponibles en la tabla",
        "lengthMenu": '_MENU_ ',
        "search": '<i class="tiny material-icons">search</i>',
        "loadingRecords": "",
        "paginate": {
            "first":      "Primera",
            "last":       "Última ",
            "next":       "Anterior",
            "previous":   "Siguiente"
        }
    },
});

$("#chkPDF").on( 'change', function() {
    if( $(this).is(':checked') ){$( "#txtignorar" ).val("1");}
    else {$( "#txtignorar" ).val("0");
}
});

$(document).ready(function(){
    $.extend( $.fn.dataTable.defaults,{
        "bAutoWidth": true
    });   


    var tableAlder=  $('#tbArticulos').DataTable( {
        "sPaginationType": "full_numbers",
        "aaSorting": [[ 1, "asc" ]],
        "columnDefs": [{ "targets": [ 0, 1, 2 ],
        "className": 'mdl-data-table__cell--non-numeric',
    }],
    "lengthMenu": [[10,50,-1], [10,50,"Todo"]] ,
    "language": {
        "lengthMenu": " _MENU_ ",
        "search":         "",
        "paginate": {
            "first":      "Primero",
            "last":       "Ultimo",
            "next":       "Siguiente",
            "previous":   "Anterior"
        },
        "info":           "Mostrando _START_ a _END_ de _TOTAL_ registro",
        "infoEmpty":      "Mostrando 0 a 0 de 0 registro",
        "infoFiltered":   "(filtrado de _MAX_ registros totales)",
        "zeroRecords":    "No se han encontrado resultados para tu búsqueda",
    },    


    initComplete: function () {
        var contador=1;
        this.api().columns().every( function () {
            var column = this;                    
            var select = $('<select><option value=""></option></select>').appendTo($(column.footer()).empty())
            .on( 'change', function () {
                var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()                                
                    );               contador++;              
                column
                .search( val ? '^'+val+'$' : '', true, false )
                .draw();
            } );                    
            column.data().unique().sort().each( function ( d, j ) {
                select.append( '<option  value="'+d+'">'+d+'</option>' )
            } );
        } );
    }
} );          

        //$("#tbArticulos_length").hide();
        $("#TblFiltros").appendTo("#DivFiltros > #Filtro1_wrapper");
        $("#tbArticulos_length").appendTo("#DivFiltros > #Filtro2_wrapper");
        $("#tbArticulos_filter").appendTo("#DivFiltros > #Filtro3_wrapper");
        $("#tbArticulos_info").appendTo("#DivFiltros > #Filtro4_wrapper");        

        /*EVENTO PARA OCULTAR LAS FILAS QUE TENGAN UN PROMEDIO DE 0 EN LA TABLA*/
    $("#test5").on( 'change', function() {
            if( $(this).is(':checked') )
            {
                $( ".ocultar" ).removeClass( "mostrar" ).addClass( "nomostrar" );
                $('#bandera').val('1');
            }
            else {$( ".ocultar" ).removeClass( "nomostrar" ).addClass( "mostrar" );
            $('#bandera').val('0');
        }
    });
    $( "#tbArticulos_length select " ).change(function() {        
          if($("#test5").is(':checked'))
           {$( ".ocultar" ).removeClass( "mostrar" ).addClass( "nomostrar" );}
       else {$( ".ocultar" ).removeClass( "nomostrar" ).addClass( "mostrar" );}
   });

    $( "#tbArticulos_filter input[type=search]").keydown(function() {//alert("ekisde");
            if( $("#test5").is(':checked') )
               {$( ".ocultar" ).removeClass( "mostrar" ).addClass( "nomostrar" );}
           else {$( ".ocultar" ).removeClass( "nomostrar" ).addClass( "mostrar" );}
       });

    $( "#TblFiltros select").change(function() {
            //alert("ekisde");
            if( $("#test5").is(':checked') )
               {$( ".ocultar" ).removeClass( "mostrar" ).addClass( "nomostrar" );}
           else {$( ".ocultar" ).removeClass( "nomostrar" ).addClass( "mostrar" );}
       });

    $('#tbArticulos_wrapper').on('click', '.paginate_button', function () {
        if( $("#test5").is(':checked') )
           {$( ".ocultar" ).removeClass( "mostrar" ).addClass( "nomostrar" );}
       else {$( ".ocultar" ).removeClass( "nomostrar" ).addClass( "mostrar" );}
    }); 
});

function ignorar()
{
    if($("#test5").is(':checked')) {
       $.fn.dataTable.ext.search.push(
        function( settings, searchData, index, rowData, counter ) {
            var min = 0.00;
                                    var valor = parseFloat( searchData[6]); // using the data from the 4th column                              
                                    if (( isNaN( min )) || ( valor != min))                                       
                                    {
                                        return true;
                                    }
                                    return false;
                                }
                                );  
   }
   else {
    $.fn.dataTable.ext.search.push(
        function( settings, searchData, index, rowData, counter ) {
            var min = 0.00;
                                var valor = parseFloat( searchData[6]); // using the data from the 4th column                            
                                return true;                                
                            }
                            );
    }        
}



/*$('input[type="text"]').dblclick(function(){
    $( "#" + $(this).attr("id") ).addClass( "ClssEdited" );
    $( "#Div" + $(this).attr("id")).show("slow");
    Cnt = $(this).val();
    UndEmpaque = $("#"+"FE-"+$(this).attr("id").substring(6, 15).trim()).text();                
    CntUnd = (number_format(Cnt,2).replace(",",'')) * (number_format(UndEmpaque,2).replace(",",''));        
    $("#"+$(this).attr("id")).val(number_format(CntUnd,2));
});*/

function mostrarALVARO() {
    
    if (bandera2==0) {
    $("#mostrarAlvaro").show();
    bandera2=1
    }else{$("#mostrarAlvaro").hide();bandera2=0;}
}
function mensaje(mensaje,clase) {
    var $toastContent = $('<span class="center">'+mensaje+'</span>');
        if (clase == 'error'){
            return Materialize.toast($toastContent, 3500,'rounded error');
        }
        return  Materialize.toast($toastContent, 3500,'rounded');    
}
function MUP(key, per,FE,CONTRATO){
    $('#MyBar').show("slow");


    var Row0 = $("#Row-0-"+key).val();
    var Row1 = $("#Row-1-"+key).val();
    var Row2 = $("#Row-2-"+key).val();
    var Row3 = $("#Row-3-"+key).val();
    var Row4 = $("#Row-4-"+key).val();

    Row0 = Row0.replace(",",'');
    Row1 = Row1.replace(",",'');
    if (Row4 != undefined) {
        Row4 = Row4.replace(",",'');    
    }
    

    /*if (($("#Row-0-"+key).hasClass("ClssEdited")) || ($("#Row-1-"+key).hasClass("ClssEdited")) ) {
        if(($("#Row-0-"+key).hasClass("ClssEdited"))){
            console.log("0")
            $( "#Row-0-"+key ).removeClass( "ClssEdited" );
            $( "#DivRow-0-" + key).hide("slow");
            Row0 = parseFloat(Row0) / parseFloat(FE);
        }
        if(($("#Row-1-"+key).hasClass("ClssEdited"))){
            Row1 = parseFloat(Row1) / parseFloat(FE);
        }
    } else {
        Row0 = parseFloat(Row0) / parseFloat(FE);
        Row1 = parseFloat(Row1) / parseFloat(FE);
    }       

    $("#Row-0-"+key).val(number_format(Row0,2));
    $("#Row-1-"+key).val(number_format(Row1,2));*/
        /*Row2 = Row2.replace(",",'');
        Row3 = Row3.replace(",",'');*/
        
        if (per == 1){
            condicion = "UpdateRow/"+key+"/"+per+"/"+Row0+"/"+Row1+"/"+Row2+"/"+Row3;
        }else{
            condicion = "UpdateRow/"+key+"/"+per+"/"+Row0+"/"+Row1+"/0/0/"+Row4;
        }                 
        
        $.ajax({
            url: condicion,
            type: "get",
            async:true,
            success: function(json){
                if (json==1) {
                    mensaje("ACTUALIZADO CORRECTAMENTE","");
                }else{mensaje("ERROR AL ACTUALIZAR","error");}
                $('#MyBar').hide("slow");                
                //$(location).attr('href',"Articulos");
            }
        });
    };
    