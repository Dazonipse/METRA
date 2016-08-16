
/**
 * Created by marangelo on 30/01/2016.
 */
 //INICIALIZARDORES
 $( document ).ready(function(){
// $('#modalABC').openModal();

} );


function modalABC(id)
 {
$('#modalABC').openModal();
Objtable = $('#tableabc').DataTable();
            Objtable.destroy();
            Objtable.clear();
            Objtable.draw();
            $('#tableabc').DataTable({                
                "searching":false,                
                ajax: "ajax_abc/"+ id,
               "ordering": false,
                "info": false,
                "bLengthChange": false,
                "pagingType": "full_numbers",
                "lengthMenu": [[10, -1], [10, "Todo"]],
                "language": {
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "lengthMenu": '_MENU_ ',
                    "emptyTable": "NO SE ENCONTRO VENTAS DE ESTE ARTICULO",
                    "search": '<i class=" material-icons">search</i>',
                    "loadingRecords": "CARGANDO...",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última ",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                },
              columns: [                    
                    { "data": "ARTICULO" },
                    { "data": "DESCRIPCION" },
                    /*{ "data": "PRESENTACION" },
                    { "data": "LABORATORIO" },*/
                    { "data": "1" },
                    { "data": "2" },
                    { "data": "3" },
                    { "data": "4" },
                    { "data": "5" },
                    { "data": "6" },
                    { "data": "7" },
                    { "data": "8" },
                    { "data": "9" },
                    { "data": "10" },
                    { "data": "11" },
                    { "data": "12" },
                    { "data": "13" },
                    { "data": "14" },
                    { "data": "15" },
                    { "data": "16" },
                    { "data": "17" },
                    { "data": "18" },
                    { "data": "19" },
                    { "data": "20" },
                    { "data": "21" },
                    { "data": "22" },
                    { "data": "23" },
                    { "data": "24" },
                    { "data": "25" },
                    { "data": "26" },
                    { "data": "27" },
                    { "data": "28" },
                    { "data": "29" },
                    { "data": "30" },
                    { "data": "31" },
                    { "data": "32" },
                    { "data": "33" },
                    { "data": "34" },
                    { "data": "35" },
                    { "data": "36" },
                    { "data": "37" },
                    { "data": "38" },
                    { "data": "39" },
                    { "data": "40" },
                    { "data": "41" },
                    { "data": "42" },
                    { "data": "43" },
                    { "data": "44" },
                    { "data": "45" },
                    { "data": "46" },
                    { "data": "47" },
                    { "data": "48" },
                    { "data": "49" },
                    { "data": "50" },
                    { "data": "51" },
                    { "data": "52" },
                    { "data": "TOTALGENERAL" }/*,
                    { "data": "EXISTENCIA" },
                    { "data": "PROMEDIO3MESES" },
                    { "data": "MESESEXISTENCIA" },
                    { "data": "PDA" },
                    { "data": "CTBP" }*/  
              ]
            });
 }
 $(document).ready(function() {
    $('#tableabc').DataTable();
} );
 function SaveComentario(){
        var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}

        ARTICULO = $("#IdArtiComent").text();
        IDC = $("#IdRowComent").text();
        COMENT = $("#textarea1").val();
        
        condicion = "SaveComentario/"+ARTICULO+"/"+Base64.encode(COMENT)+"/"+IDC;        
        $.ajax({
            url: condicion,
            type: "post",
            async:true,
            success: function(){                
                $('#modal1').closeModal();
                $(location).attr('href',"Articulos");

            }
        });
    }
    function ModalComentarios(ID,RowC){        
        $("#textarea1").empty();;
        $("#IdArtiComent").html(ID);
        $("#IdRowComent").html(RowC);
          condicion = "RestoreComentario/"+ID+"/"+RowC;
          $.ajax({
              url: condicion,
              type: "post",
              async:true,
              success: function(data){                                                    
                  $("#textarea1").val(data);
                  $('#modal1').openModal();

              }
          });        
    }  

   
     $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
    });
function toTimestamp(strDate){
   var datum = Date.parse(strDate);
   return datum/1000;
}

/*************funcion para mostrar el contrato anual de un articulo a la vez, este se muestra en una tabla #tblcontrato que esta en un modal*/
 function generarReporte(id){
console.log(id);
$('#modal1').openModal();
Objtable = $('#tblcontrato').DataTable();
            Objtable.destroy();
            Objtable.clear();
            Objtable.draw();
            $('#tblcontrato').DataTable({                
                "searching":false,                
                ajax: "ajax_contrato/"+ id,
                "ordering": false,
                "info": false,
                "bLengthChange": false,
                "pagingType": "full_numbers",
                "lengthMenu": [[10, -1], [10, "Todo"]],
                "language": {
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "lengthMenu": '_MENU_ ',
                    "emptyTable": "NO SE ENCONTRO VENTAS DE ESTE ARTICULO",
                    "search": '<i class=" material-icons">search</i>',
                    "loadingRecords": "CARGANDO...",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última ",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                },
              columns: [                    
                    { "data": "Tipo" },
                    { "data": "ARTICULO" },
                    { "data": "Clasificacion5" },
                    { "data": "Clasificacion3" },
                    { "data": "DESCRIPCION" },
                    { "data": "1" },
                    { "data": "2" },
                    { "data": "3" },
                    { "data": "4" },
                    { "data": "5" },
                    { "data": "6" },
                    { "data": "7" },
                    { "data": "8" },
                    { "data": "9" },
                    { "data": "10" },
                    { "data": "11" },
                    { "data": "12" },
                    { "data": "EXISTENCIA" }
              ]
            });
          }

/***********************************************************/
function Deathalles(IdArticulo){  
  var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=1, resizable=no";  
  window.open("Detalles/"+IdArticulo,"",opciones); 
}
function number_format(number, decimals, dec_point, thousands_sep){
	 number = (number + '')
    .replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k)
        .toFixed(prec);
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
    .split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
      .join('0');
  }
  return s.join(dec);
}

function date(format, timestamp){
	var that = this;
  var jsdate, f;
  // Keep this here (works, but for code commented-out below for file size reasons)
  // var tal= [];
  var txt_words = [
    'Sun', 'Mon', 'Tues', 'Wednes', 'Thurs', 'Fri', 'Satur',
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
  ];
  // trailing backslash -> (dropped)
  // a backslash followed by any character (including backslash) -> the character
  // empty string -> empty string
  var formatChr = /\\?(.?)/gi;
  var formatChrCb = function(t, s) {
    return f[t] ? f[t]() : s;
  };
  var _pad = function(n, c) {
    n = String(n);
    while (n.length < c) {
      n = '0' + n;
    }
    return n;
  };
  f = {
    // Day
    d: function() { // Day of month w/leading 0; 01..31
      return _pad(f.j(), 2);
    },
    D: function() { // Shorthand day name; Mon...Sun
      return f.l()
        .slice(0, 3);
    },
    j: function() { // Day of month; 1..31
      return jsdate.getDate();
    },
    l: function() { // Full day name; Monday...Sunday
      return txt_words[f.w()] + 'day';
    },
    N: function() { // ISO-8601 day of week; 1[Mon]..7[Sun]
      return f.w() || 7;
    },
    S: function() { // Ordinal suffix for day of month; st, nd, rd, th
      var j = f.j();
      var i = j % 10;
      if (i <= 3 && parseInt((j % 100) / 10, 10) == 1) {
        i = 0;
      }
      return ['st', 'nd', 'rd'][i - 1] || 'th';
    },
    w: function() { // Day of week; 0[Sun]..6[Sat]
      return jsdate.getDay();
    },
    z: function() { // Day of year; 0..365
      var a = new Date(f.Y(), f.n() - 1, f.j());
      var b = new Date(f.Y(), 0, 1);
      return Math.round((a - b) / 864e5);
    },

    // Week
    W: function() { // ISO-8601 week number
      var a = new Date(f.Y(), f.n() - 1, f.j() - f.N() + 3);
      var b = new Date(a.getFullYear(), 0, 4);
      return _pad(1 + Math.round((a - b) / 864e5 / 7), 2);
    },

    // Month
    F: function() { // Full month name; January...December
      return txt_words[6 + f.n()];
    },
    m: function() { // Month w/leading 0; 01...12
      return _pad(f.n(), 2);
    },
    M: function() { // Shorthand month name; Jan...Dec
      return f.F()
        .slice(0, 3);
    },
    n: function() { // Month; 1...12
      return jsdate.getMonth() + 1;
    },
    t: function() { // Days in month; 28...31
      return (new Date(f.Y(), f.n(), 0))
        .getDate();
    },

    // Year
    L: function() { // Is leap year?; 0 or 1
      var j = f.Y();
      return j % 4 === 0 & j % 100 !== 0 | j % 400 === 0;
    },
    o: function() { // ISO-8601 year
      var n = f.n();
      var W = f.W();
      var Y = f.Y();
      return Y + (n === 12 && W < 9 ? 1 : n === 1 && W > 9 ? -1 : 0);
    },
    Y: function() { // Full year; e.g. 1980...2010
      return jsdate.getFullYear();
    },
    y: function() { // Last two digits of year; 00...99
      return f.Y()
        .toString()
        .slice(-2);
    },

    // Time
    a: function() { // am or pm
      return jsdate.getHours() > 11 ? 'pm' : 'am';
    },
    A: function() { // AM or PM
      return f.a()
        .toUpperCase();
    },
    B: function() { // Swatch Internet time; 000..999
      var H = jsdate.getUTCHours() * 36e2;
      // Hours
      var i = jsdate.getUTCMinutes() * 60;
      // Minutes
      var s = jsdate.getUTCSeconds(); // Seconds
      return _pad(Math.floor((H + i + s + 36e2) / 86.4) % 1e3, 3);
    },
    g: function() { // 12-Hours; 1..12
      return f.G() % 12 || 12;
    },
    G: function() { // 24-Hours; 0..23
      return jsdate.getHours();
    },
    h: function() { // 12-Hours w/leading 0; 01..12
      return _pad(f.g(), 2);
    },
    H: function() { // 24-Hours w/leading 0; 00..23
      return _pad(f.G(), 2);
    },
    i: function() { // Minutes w/leading 0; 00..59
      return _pad(jsdate.getMinutes(), 2);
    },
    s: function() { // Seconds w/leading 0; 00..59
      return _pad(jsdate.getSeconds(), 2);
    },
    u: function() { // Microseconds; 000000-999000
      return _pad(jsdate.getMilliseconds() * 1000, 6);
    },

    // Timezone
    e: function() { // Timezone identifier; e.g. Atlantic/Azores, ...
      // The following works, but requires inclusion of the very large
      // timezone_abbreviations_list() function.
      /*              return that.date_default_timezone_get();
       */
      throw 'Not supported (see source code of date() for timezone on how to add support)';
    },
    I: function() { // DST observed?; 0 or 1
      // Compares Jan 1 minus Jan 1 UTC to Jul 1 minus Jul 1 UTC.
      // If they are not equal, then DST is observed.
      var a = new Date(f.Y(), 0);
      // Jan 1
      var c = Date.UTC(f.Y(), 0);
      // Jan 1 UTC
      var b = new Date(f.Y(), 6);
      // Jul 1
      var d = Date.UTC(f.Y(), 6); // Jul 1 UTC
      return ((a - c) !== (b - d)) ? 1 : 0;
    },
    O: function() { // Difference to GMT in hour format; e.g. +0200
      var tzo = jsdate.getTimezoneOffset();
      var a = Math.abs(tzo);
      return (tzo > 0 ? '-' : '+') + _pad(Math.floor(a / 60) * 100 + a % 60, 4);
    },
    P: function() { // Difference to GMT w/colon; e.g. +02:00
      var O = f.O();
      return (O.substr(0, 3) + ':' + O.substr(3, 2));
    },
    T: function() { // Timezone abbreviation; e.g. EST, MDT, ...
      // The following works, but requires inclusion of the very
      // large timezone_abbreviations_list() function.
      /*              var abbr, i, os, _default;
      if (!tal.length) {
        tal = that.timezone_abbreviations_list();
      }
      if (that.php_js && that.php_js.default_timezone) {
        _default = that.php_js.default_timezone;
        for (abbr in tal) {
          for (i = 0; i < tal[abbr].length; i++) {
            if (tal[abbr][i].timezone_id === _default) {
              return abbr.toUpperCase();
            }
          }
        }
      }
      for (abbr in tal) {
        for (i = 0; i < tal[abbr].length; i++) {
          os = -jsdate.getTimezoneOffset() * 60;
          if (tal[abbr][i].offset === os) {
            return abbr.toUpperCase();
          }
        }
      }
      */
      return 'UTC';
    },
    Z: function() { // Timezone offset in seconds (-43200...50400)
      return -jsdate.getTimezoneOffset() * 60;
    },

    // Full Date/Time
    c: function() { // ISO-8601 date.
      return 'Y-m-d\\TH:i:sP'.replace(formatChr, formatChrCb);
    },
    r: function() { // RFC 2822
      return 'D, d M Y H:i:s O'.replace(formatChr, formatChrCb);
    },
    U: function() { // Seconds since UNIX epoch
      return jsdate / 1000 | 0;
    }
  };
  this.date = function(format, timestamp) {
    that = this;
    jsdate = (timestamp === undefined ? new Date() : // Not provided
      (timestamp instanceof Date) ? new Date(timestamp) : // JS Date()
      new Date(timestamp * 1000) // UNIX timestamp (auto-convert to int)
    );
    return format.replace(formatChr, formatChrCb);
  };
  return this.date(format, timestamp);

}