document.write(`<script src="${base_url}/Assets/js/plugins/JsBarcode.all.min.js"></script>`);
let tableAnonimo;

var divLoading = document.querySelector("#divLoading");

$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});

window.addEventListener('load', function(){

	tableAnonimo = $('#tableAnonimo').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Anonimo/getAnonimos",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"tipo_pqr"},
            {"data":"nomarea"},
            {"data":"medio"},
            {"data":"fecha"},
            {"data":"fecha_finc"},
            {"data":"canalingreso"},
            {"data":"ven"},
            {"data":"status"},
            {"data":"nomresponsable"},
            {"data":"options"}
        ],
        "columnDefs": [
                        { 'className': "textcenter", "targets": [ 9] },
                        { 'className': "textcenter", "targets": [ 10 ] }
                      ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary",
                "exportOptions":{
                    "columns": [0,1,2,3,4,5,6,7,8,9,10]
                }

            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Exportar a Excel",
                "className": "btn btn-success",
                 "exportOptions":{
                    "columns": [0,1,2,3,4,5,6,7,8,9,10]
                }
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Exportar a PDF",
                "className": "btn btn-danger", "exportOptions":{
                    "columns": [0,1,2,3,4,5,6,7,8,9,10]
                }
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Exportar a CSV",
                "className": "btn btn-info",
                 "exportOptions":{
                    "columns": [0,1,2,3,4,5,6,7,8,9,10]
                }
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

	if(document.querySelector('#formIdentificacion')){
        let = formIdentificacion = document.querySelector("#formIdentificacion");
        formIdentificacion.onsubmit = function(e){
            e.preventDefault();
            let listTipoSolicitudid = document.querySelector('#listTipoSolicitudid').value;
            let listCanalId = document.querySelector('#listCanalId').value;
            let listMedioid = document.querySelector('#listMedioid').value;
            let txtCodigo = document.querySelector('#txtCodigo').value;
            let txtFecha = document.querySelector('#txtFecha').value;
            let listAreaId = document.querySelector('#listAreaId').value;

            if(listTipoSolicitudid == '' || listCanalId == '' || listMedioid == '' || txtFecha == '' || listAreaId == '' || txtCodigo == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            if(txtCodigo.length < 3){
                swal("Atención", "El código debe ser mayor que 3 dígitos." , "error");
                return false;   
            }
            divLoading.style.diplay = "flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ?
                            new XMLHttpRequest() : 
                            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Anonimo/setAnonimo';
            let formData = new FormData(formIdentificacion);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        $('#modalFormIdentificacion').modal("hide");
                        formIdentificacion.reset();
                        swal("", objData.msg ,"success");       
                        tableAnonimo.api().ajax.reload();
                    }else{
                        swal("Error", objData.msg ,"error");
                    }
                }  
                divLoading.style.display = "none";
                return false;

            }
        }
    }

    if(document.querySelector('#formAprobarPqrsd')){
        let = formAprobarPqrsd = document.querySelector("#formAprobarPqrsd");
        formAprobarPqrsd.onsubmit = function(e){
            e.preventDefault();
            let idpqrsdA = document.querySelector('#idpqrsdA').value;
            if(idpqrsdA == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            divLoading.style.diplay = "flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ?
                            new XMLHttpRequest() : 
                            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Anonimo/setRadicado';
            let formData = new FormData(formAprobarPqrsd);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        $('#modalAprobarIdentificacion').modal("hide");
                        formAprobarPqrsd.reset();
                        swal("", objData.msg ,"success");
                        tableAnonimo.api().ajax.reload();
                    }else{
                        swal("Error", objData.msg ,"error");
                    }
                }  
                divLoading.style.display = "none";
                return false;

            }
        }
    }

    if(document.querySelector('#formFinalizarPqrsd')){
        let = formFinalizarPqrsd = document.querySelector("#formFinalizarPqrsd");
        formFinalizarPqrsd.onsubmit = function(e){
            e.preventDefault();
            let idpqrsdf = document.querySelector('#idpqrsdf').value;
            if(idpqrsdf == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            divLoading.style.diplay = "flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ?
                            new XMLHttpRequest() : 
                            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Anonimo/setFinalizado';
            let formData = new FormData(formFinalizarPqrsd);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        $('#modalFinalizarIdentificacion').modal("hide");
                        formFinalizarPqrsd.reset();
                        swal("", objData.msg ,"success");
                        tableAnonimo.api().ajax.reload();
                    }else{
                        swal("Error", objData.msg ,"error");
                    }
                }  
                divLoading.style.display = "none";
                return false;

            }
        }
    }

    if(document.querySelector('#formAsignarPqrsd')){
        let = formAsignarPqrsd = document.querySelector("#formAsignarPqrsd");
        formAsignarPqrsd.onsubmit = function(e){
            e.preventDefault();
            let idpqrsdR = document.querySelector('#idpqrsdR').value;
            let listResponsable = document.querySelector('#listResponsable').value;
            if(idpqrsdR == '' || listResponsable == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            divLoading.style.diplay = "flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ?
                            new XMLHttpRequest() : 
                            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Anonimo/setResponsable';
            let formData = new FormData(formAsignarPqrsd);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200)
                {
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        $('#modalEditIdentificacion').modal("hide");
                        formAsignarPqrsd.reset();
                        swal("", objData.msg ,"success");
                        tableAnonimo.api().ajax.reload();
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
        fntTipoSolicitud();
        fntResponsable();
}, false);

if(document.querySelector("#txtCodigo")){
    let inputCodigo = document.querySelector("#txtCodigo");
    inputCodigo.onkeyup = function(){
        if(inputCodigo.value.length >= 3){
            document.querySelector('#divBarCode').classList.remove("notblock");
            fntBarcode();
        }else{
            document.querySelector('#divBarCode').classList.add("notblock");
        }
    };
}

tinymce.init({
    selector: '#txtDescripcion',
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

function fntAsignarPqr(idpqr){

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


    //rowTable = element.parentNode.parentNode.parentNode;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Anonimo/getAnonimo/'+idpqr; 
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
                    let objAnonimo = objData.data;
                    document.querySelector('#celRadicador').innerHTML = objAnonimo.id;
                    document.querySelector('#idpqrsdR').value = objAnonimo.id;
                    document.querySelector('#celStatusr').innerHTML = objAnonimo.status;
                    document.querySelector('#celFechar').innerHTML = objAnonimo.fecha;
                    document.querySelector('#listResponsable').value = objAnonimo.area;
                    document.querySelector('#emailarea').value = objAnonimo.emailarea;
                    document.querySelector('#nomarea').value = objAnonimo.nomarea;
                    $('#listResponsable').selectpicker('render');

                    $('#modalEditIdentificacion').modal('show');
                }else{
                    swal("Error", objData.msg , "error");
                }
            }     
       }
}

function fntAprobarPqr(idpqr){

    tinymce.init({
	    selector: '#txtComentarioa',
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

    //rowTable = element.parentNode.parentNode.parentNode;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Anonimo/getAnonimo/'+idpqr; 
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
                let objAnonimo = objData.data;
                document.querySelector('#celRadicadora').innerHTML = objAnonimo.id;
                document.querySelector('#idpqrsdA').value = objAnonimo.id;
                document.querySelector('#celStatusra').innerHTML = objAnonimo.status;
                document.querySelector('#celFechara').innerHTML = objAnonimo.fecha;

                $('#modalAprobarIdentificacion').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }     
   }
}

function fntFinalizarPqr(idpqr){

    tinymce.init({
    selector: '#txtComentariof',
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

    //rowTable = element.parentNode.parentNode.parentNode;
    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Anonimo/getAnonimo/'+idpqr; 
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
                let objAnonimo = objData.data;
                document.querySelector('#celRadicadorf').innerHTML = objAnonimo.id;
                document.querySelector('#idpqrsdf').value = objAnonimo.id;
                document.querySelector('#celStatusrf').innerHTML = objAnonimo.status;
                document.querySelector('#celFecharf').innerHTML = objAnonimo.fecha;

                $('#modalFinalizarIdentificacion').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }     
   }
}

function fntEditarPqr(idpqr){
    document.querySelector('#titleModal').innerHTML ="Actualizar PQRSD";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    
    var idpqr =idpqr;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Anonimo/getAnonimo/'+idpqr;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {

                        document.querySelector("#txtDescripcion").value = objData.data.descripcion;
                        tinymce.activeEditor.setContent(objData.data.descripcion);

                        document.querySelector("#idIdentificacion").value = objData.data.id;
                        document.querySelector("#archivo_ac").value = objData.data.archivo;
                        
                        document.querySelector("#listCanalId").value = objData.data.canal;
                        $('#listCanalId').selectpicker('render');

                         document.querySelector('#listMedioid').value = objData.data.respuesta;
                        $('#listMedioid').selectpicker('render');

                        document.querySelector("#listTipoSolicitudid").value = objData.data.solicitud;
                        $('#listTipoSolicitudid').selectpicker('render');

                        document.querySelector("#listAreaId").value = objData.data.area;
                        $('#listAreaId').selectpicker('render');

                        document.querySelector("#txtFecha").value = objData.data.fecha;

                        document.querySelector("#txtCodigo").value = objData.data.codigo;
            }
        }
        $('#modalFormIdentificacion').modal('show');
    }
}

function fntTipoSolicitud(){
    if(document.querySelector('#listTipoSolicitudid'))
    {
        let ajaxUrl = base_url+'/Identificacion/getSelectTipoSolicitud';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listTipoSolicitudid').innerHTML = request.responseText;
                $('#listTipoSolicitudid').selectpicker('render');
                fntCanal();          
            }     
        }
    }
}

function fntCanal(){
    if(document.querySelector('#listCanalId'))
    {
        let ajaxUrl = base_url+'/Identificacion/getSelectCanal';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listCanalId').innerHTML = request.responseText;
                $('#listCanalId').selectpicker('render');
                fntMedioRespuesta();  
            }     
        }
    }
}

function fntMedioRespuesta(){
    if(document.querySelector('#listMedioid'))
    {
        let ajaxUrl = base_url+'/Identificacion/getSelectMedio';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listMedioid').innerHTML = request.responseText;
                $('#listMedioid').selectpicker('render');          
                fntArea();  
            }     
        }
    }
}

function fntArea(){
    if(document.querySelector('#listAreaId'))
    {
        let ajaxUrl = base_url+'/Identificacion/getSelectArea';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listAreaId').innerHTML = request.responseText;
                $('#listAreaId').selectpicker('render');
                          
            }     
        }
    }
}

function fntResponsable(){
    if(document.querySelector('#listResponsable'))
    {
        let ajaxUrl = base_url+'/Identificacion/getSelectArea';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listResponsable').innerHTML = request.responseText;
                $('#listResponsable').selectpicker('render');        
            }     
        }
    }
}

function fntBarcode(){
    let codigo = document.querySelector("#txtCodigo").value;
    JsBarcode("#barcode", codigo);
}

function fntPrintBarcode(area){
    let elemntArea = document.querySelector(area);
    let vprint = window.open(' ', 'popimpr', 'height=400,width600');
    vprint.document.write(elemntArea.innerHTML );
    vprint.document.close();
    vprint.print();
    vprint.close();
}

function openModal()
{
    rowTable = "";
    document.querySelector('#idIdentificacion').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva PQRSD";
    document.querySelector("#formIdentificacion").reset();
    $('#modalFormIdentificacion').modal('show');
}