let tableTarifas;

var divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

	tableTarifas = $('#tableTarifas').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Archivo/getArchivos",
            "dataSrc":""
        },
        "columns":[
            {"data":"id_archivo"},
            {"data":"titulo"},
            {"data":"doc"},
            {"data":"fecha"},
            {"data":"descarga"},
            {"data":"status"},
            {"data":"options"}
        ],
        "columnDefs": [
                        { 'className': "textcenter", "targets": [ 4 ] },
                        { 'className': "textcenter", "targets": [ 5 ] }
                      ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary",

            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Exportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Exportar a PDF",
                "className": "btn btn-danger", "exportOptions":{
                    "columns": [0,1,2,3,4,5]
                }
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Exportar a CSV",
                "className": "btn btn-info",
                 "exportOptions":{
                    "columns": [0,1,2,3,4,5]
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
            let txtNombre = document.querySelector('#txtNombre').value;
            let txtComentario = document.querySelector('#txtComentario').value;
            let txtDate = document.querySelector("#txtDate").value;
            
            if(txtNombre == '' || txtComentario == '' || txtDate == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
           
            divLoading.style.diplay = "flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ?
                            new XMLHttpRequest() : 
                            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Archivo/setArchivo';
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

window.addEventListener('load', function() {
        /*fntViewUsuario();
        fntEditUsuario();
        fntDelUsuario();*/
        fntPaginas();

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

function fntPaginas(){
    if(document.querySelector("#listPagina")){
        let ajaxUrl = base_url+'/Archivo/getSelectPaginas';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listPagina').innerHTML = request.responseText;
                $('#listPagina').selectpicker('render');
            }    
        }
    }
}


function fntEditInfo(idtarifa){
    //rowTable = element.parentNode.parentNode.parentNode;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Archivo/geTarifa/'+idtarifa; 
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
                    document.querySelector('#txtDate').value = objSolicitud.fecha;
                    document.querySelector('#listPagina').value = objSolicitud.idpost;
                    $('#listPagina').selectpicker('render');

                    document.querySelector('#txtNombre').value = objSolicitud.doc;
                    document.querySelector('#txtComentario').value = objSolicitud.descripcion;
                    tinymce.activeEditor.setContent(objData.data.descripcion);
                    document.querySelector('#idTarifa').value = objSolicitud.id_archivo;
                    document.querySelector('#archivo_ac').value = objSolicitud.archivo;
                    $('#modalFormTarifas').modal('show');

                }else{
                    swal("Error", objData.msg , "error");
                }
            }     
       }
}

function fntDelInfo(idtarifa){
    swal({
        title: "Eliminar Archivo",
        text: "¿Realmente quiere eliminar al Archivo?",
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
            let ajaxUrl = base_url+'/Archivo/delTarifas';
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
    document.querySelector('#idTarifa').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Archivo";
    document.querySelector("#formTarifas").reset();
    $('#modalFormTarifas').modal('show');
}