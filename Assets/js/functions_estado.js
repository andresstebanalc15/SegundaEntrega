let tableCitas;

let rowTable = "";

$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});

var divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    //Buscar Paciente
    if(document.querySelector("#txtticket")){
         $('#txtticket').keyup(function(e){
            e.preventDefault();
            var ticket = document.querySelector('#txtticket').value;

            let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Estado/getPQRSD/'+ticket;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function()
            {
                if(request.readyState == 4 && request.status == 200)
                {
                    var objData = JSON.parse(request.responseText);
                    if(objData.id)
                    {       
                            tableCitas = $('#tableCitas').dataTable( {
                                    "aProcessing":true,
                                    "aServerSide":true,
                                    "language": {
                                        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                                    },
                                    "ajax":{
                                        "url": " "+base_url+"/Estado/getPQRSDI/"+ticket,
                                        "dataSrc":""
                                    },
                                    "columns":[
                                        {"data":"codigo"},
                                        {"data":"tipo_pqr"},
                                        {"data":"fecha"},
                                        {"data":"status"}
                                    ],
                                    'dom': 'lBfrtip',
                                    'buttons': [
                                        {
                                            "extend": "copyHtml5",
                                            "text": "<i class='far fa-copy'></i> Copiar",
                                            "titleAttr":"Copiar",
                                            "className": "btn btn-secondary"
                                        },{
                                            "extend": "excelHtml5",
                                            "text": "<i class='fas fa-file-excel'></i> Excel",
                                            "titleAttr":"Exportar a Excel",
                                            "className": "btn btn-success"
                                        },{
                                            "extend": "pdfHtml5",
                                            "text": "<i class='fas fa-file-pdf'></i> PDF",
                                            "titleAttr":"Exportar a PDF",
                                            "className": "btn btn-danger"
                                        },{
                                            "extend": "csvHtml5",
                                            "text": "<i class='fas fa-file-csv'></i> CSV",
                                            "titleAttr":"Exportar a CSV",
                                            "className": "btn btn-info"
                                        }
                                    ],
                                    "resonsieve":"true",
                                    "bDestroy": true,
                                    "iDisplayLength": 10,
                                    "order":[[0,"desc"]]  
                            });
                    }
                }
            }
        });
    }
}, false);