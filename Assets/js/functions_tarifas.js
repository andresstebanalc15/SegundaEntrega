let tableTarifas;

$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});

var divLoading = document.querySelector("#divLoading");
window.addEventListener('load', function(){

	tableTarifas = $('#tableTarifas').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Tarifas/getTarifas",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"anio"},
            {"data":"mes"},
            {"data":"descarga"}
        ],
        "columnDefs": [
                        { 'className': "textcenter", "targets": [ 0 ] },
                        { 'className': "textcenter", "targets": [ 3 ] }
                      ],
        'dom': 'lBfrtip',
        'buttons': [
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });
    
}, false);