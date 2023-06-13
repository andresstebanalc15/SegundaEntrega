document.write(`<script src="${base_url}/Assets/js/plugins/JsBarcode.all.min.js"></script>`);
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
            "url": " "+base_url+"/Tarifa/getTarifas",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"anio"},
            {"data":"mes"},
            {"data":"descarga"},
            {"data":"status"},
            {"data":"options"}
        ],
        "columnDefs": [
                        { 'className': "textcenter", "targets": [ 3 ] },
                        { 'className': "textcenter", "targets": [ 4 ] }
                      ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary",
                "exportOptions":{
                    "columns": [0,1,2,3,4]
                }

            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success",
                 "exportOptions":{
                    "columns": [0,1,2,3,4]
                }
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger", "exportOptions":{
                    "columns": [0,1,2,3,4]
                }
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info",
                 "exportOptions":{
                    "columns": [0,1,2,3,4]
                }
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

    if(document.querySelector('#formTarifas')){
        let = formTarifas = document.querySelector("#formTarifas");
        formTarifas.onsubmit = function(e){
            e.preventDefault();
            let txtAnio = document.querySelector('#txtAnio').value;
            let txtMes = document.querySelector('#txtMes').value;
            let uploadDoc = document.querySelector("#txtfileg").value;
            let fileDoc = document.querySelector("#txtfileg").files;
            let nav = window.URL || window.webkitURL;
            if(uploadDoc != '')
            {
                let type = fileDoc[0].type;
                let name = fileDoc[0].name;
                if(type != 'image/jpeg' && type != 'application/zip' && type != 'application/rar' && type != 'image/jpg' && type != 'image/png'  && type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' && type != 'application/pdf' && type != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' && type != 'application/vnd.ms-excel'){
                    swal("Archivo no valido", objData.msg , "error");
                    uploadDoc.value = "";
                    return false;
                }
                if(txtAnio == '' || txtMes == '')
                {
                    swal("Atención", "Todos los campos son obligatorios." , "error");
                    return false;
                }
            }
           
            divLoading.style.diplay = "flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ?
                            new XMLHttpRequest() : 
                            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Tarifa/setTarifa';
            let formData = new FormData(formTarifas);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        $('#modalFormTarifas').modal("hide");
                        formTarifas.reset();
                        swal("", objData.msg ,"success");       
                        tableTarifas.api().ajax.reload();
                    }else{
                        swal("Error", objData.msg ,"error");
                    }
                }  
                divLoading.style.display = "none";
                return false;

            }
        }
    }
    
}, false);

tinymce.init({
    selector: '#txtComentario',
    width: "100%",
    height: 200,    
    statubar: true,
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
});


function fntEditInfo(idtarifa){
    //rowTable = element.parentNode.parentNode.parentNode;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Tarifa/geTarifa/'+idtarifa; 
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                let objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    let htmlImage = "";
                    let objSolicitud = objData.data;

                    document.getElementById("formTarifas").reset();
                    document.querySelector('#txtAnio').value = objSolicitud.anio;
                    document.querySelector('#txtMes').value = objSolicitud.mes;
                    document.querySelector('#txtComentario').value = objSolicitud.descripcion
                    tinymce.activeEditor.setContent(objData.data.descripcion);;
                    document.querySelector('#idTarifa').value = objSolicitud.id;
                    document.querySelector('#archivo_ac').innerHTML = objSolicitud.archivo;
                    $('#modalFormTarifas').modal('show');

                }else{
                    swal("Error", objData.msg , "error");
                }
            }     
       }
}

function fntDelInfo(idtarifa){
    swal({
        title: "Eliminar Tarifa",
        text: "¿Realmente quiere eliminar al tarifa?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Tarifa/delTarifas';
            let strData = "idtarifa="+idtarifa;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableTarifas.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}

function openModal()
{
    rowTable = "";
    document.querySelector('#idTarifa').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Tarifa";
    document.querySelector("#formTarifas").reset();
    $('#modalFormTarifas').modal('show');
}