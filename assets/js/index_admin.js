/* Created by Marangelo on 30/01/2016.*/

  /************ TABLA MASTER DE USUARIOS*************/
  /*DICHA TABLA DA EL FORMATO A LAS TABLAS DE LA BANDEJAS DE USUARIO E FORMATOS INGRESADOS*/


  /*  $('#tblcontrato').DataTable( {
        /* "dom": 'T<"clear">lfrtip',

         "tableTools": {
         "sSwfPath": "http://localhost:8448/UMA/assets/data/swf/copy_csv_xls_pdf.swf"
         },*/
     /*   "ordering": false,
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
    });*/
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
    
    $(document).ready(function(){
        $.extend( $.fn.dataTable.defaults,{
            //"bFilter": false,
            //"bAutoWidth": false,
            //"bLengthChange": false
            //"bSort": false,
            "bAutoWidth": true
        });
            
     

        $('#tbArticulos').DataTable( {
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
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
     
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
     
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        } );
                
        //$("#tbArticulos_length").hide();
        $("#TblFiltros").appendTo("#DivFiltros > #Filtro1_wrapper");
        $("#tbArticulos_length").appendTo("#DivFiltros > #Filtro2_wrapper");
        $("#tbArticulos_filter").appendTo("#DivFiltros > #Filtro3_wrapper");
        $("#tbArticulos_info").appendTo("#DivFiltros > #Filtro4_wrapper");
        
    });
    
    $('input[type="text"]').dblclick(function(){
        $( "#" + $(this).attr("id") ).addClass( "ClssEdited" );
        $( "#Div" + $(this).attr("id")).show("slow");
        Cnt = $(this).val();
        UndEmpaque = $("#"+"FE-"+$(this).attr("id").substring(6, 15).trim()).text();                
        CntUnd = (number_format(Cnt,2).replace(",",'')) * (number_format(UndEmpaque,2).replace(",",''));        
        $("#"+$(this).attr("id")).val(number_format(CntUnd,2));
    });
    
    
    function MUP(key, per,FE){
        $('#MyBar').show("slow");
        
        
        var Row0 = $("#Row-0-"+key).val();
        var Row1 = $("#Row-1-"+key).val();
        var Row2 = $("#Row-2-"+key).val();
        var Row3 = $("#Row-3-"+key).val();

       

        Row0 = Row0.replace(",",'');
        Row1 = Row1.replace(",",'');
        
                
        if (($("#Row-0-"+key).hasClass("ClssEdited")) ||($("#Row-1-"+key).hasClass("ClssEdited")) ) {
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
        $("#Row-1-"+key).val(number_format(Row1,2));
        /*Row2 = Row2.replace(",",'');
        Row3 = Row3.replace(",",'');*/
               
        
        if (per == 1){
            condicion = "UpdateRow/"+key+"/"+per+"/"+Row0+"/"+Row1+"/"+Row2+"/"+Row3;
        }else{
            condicion = "UpdateRow/"+key+"/"+per+"/"+Row0+"/"+Row1+"/0/0";
        }                       
        
       $.ajax({
            url: condicion,
            type: "get",
            async:true,
            success: function(json){
                $('#MyBar').hide("slow");                
                $(location).attr('href',"Articulos");
            }
        });
    };
    