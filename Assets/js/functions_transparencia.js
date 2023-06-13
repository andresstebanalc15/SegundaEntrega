let tableArchivos;
let idpagina = document.querySelector('#idpag').value;

$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});

var divLoading = document.querySelector("#divLoading");
window.addEventListener('load', function(){


    tableArchivos = $('#tableArchivos').dataTable( {
                    "aProcessing":true,
                    "aServerSide":true,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    },
                    "ajax":{
                        "url": " "+base_url+"/Transparencia/getArchivos/"+idpagina,
                        "dataSrc":""
                    },
                    "columns":[
                        {"data":"doc"},
                        {"data":"descripcion"},
                        {"data":"fecha"},
                        {"data":"descarga"}
                    ],
                    "columnDefs": [
                                    { 'className': "textcenter", "targets": [ 2 ] },
                                    { 'className': "textcenter", "targets": [ 3 ] }
                                  ],
                    'dom': 'lBfrtip',
                    'buttons': [
                        {
                            "extend": "copyHtml5",
                            "text": "<i class='far fa-copy'></i> Copiar",
                            "titleAttr":"Copiar",
                            "className": "btn btn-secondary",
                            "exportOptions":{
                                "columns": [0,1,2,3]
                            }

                        },{
                            "extend": "excelHtml5",
                            "text": "<i class='fas fa-file-excel'></i> Excel",
                            "titleAttr":"Esportar a Excel",
                            "className": "btn btn-success",
                             "exportOptions":{
                                "columns": [0,1,2,3]
                            }
                        },{
                            "extend": "pdfHtml5",
                            "text": "<i class='fas fa-file-pdf'></i> PDF",
                            "titleAttr":"Esportar a PDF",
                            "className": "btn btn-danger", "exportOptions":{
                                "columns": [0,1,2,3]
                            }
                        },{
                            "extend": "csvHtml5",
                            "text": "<i class='fas fa-file-csv'></i> CSV",
                            "titleAttr":"Esportar a CSV",
                            "className": "btn btn-info",
                             "exportOptions":{
                                "columns": [0,1,2,3]
                            }
                        }
                    ],
                    "resonsieve":"true",
                    "bDestroy": true,
                    "iDisplayLength": 25,
                    "order":[[2,"desc"]]  
                });
    
}, false);