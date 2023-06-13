let tableIdentificacion;

var divLoading = document.querySelector("#divLoading");

$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});

window.addEventListener('load', function(){

	tableIdentificacion = $('#tableIdentificacion').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Hojas/getIdentificaciones",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"tipo_pqr"},
            {"data":"nombres"},
            {"data":"fecha"},
            {"data":"canalingreso"},
            {"data":"descarga"},
            {"data":"status"},
            {"data":"nomresponsable"},
            {"data":"options"}
        ],
        "columnDefs": [
                        { 'className': "textcenter", "targets": [ 7] },
                        { 'className': "textcenter", "targets": [ 8 ] }
                      ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary",
                "exportOptions":{
                    "columns": [0,1,2,3,4,5,6,7,8]
                }

            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success",
                 "exportOptions":{
                    "columns": [0,1,2,3,4,5,6,7,8]
                }
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger", "exportOptions":{
                    "columns": [0,1,2,3,4,5,6,7,8]
                }
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info",
                 "exportOptions":{
                    "columns": [0,1,2,3,4,5,6,7,8]
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
            let listTipoid = document.querySelector('#listTipoid').value;
            let txtIdentificacion = document.querySelector('#txtIdentificacion').value;
            let listSolicitanteid = document.querySelector('#listSolicitanteid').value;
            let txtNombrea = document.querySelector('#txtNombrea').value;
            let txtApellidoa = document.querySelector('#txtApellidoa').value;
            let listPaisId = document.querySelector('#listPaisId').value;
            let listDepartamentoid = document.querySelector('#listDepartamentoid').value;
            let listMunicipioid = document.querySelector('#listMunicipioid').value;
            let listCorregimientoid = document.querySelector('#listCorregimientoid').value;
            let txtFecha = document.querySelector('#txtFecha').value;
            let txtFijo = document.querySelector('#txtFijo').value;

            if(listTipoid == '' || txtIdentificacion == '' || listSolicitanteid == '' || txtNombrea == '' || txtApellidoa == '' || txtFecha == '' || txtApellidoa == '' || listPaisId == '' || listDepartamentoid == '' || listMunicipioid == '' || listCorregimientoid == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            divLoading.style.diplay = "flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ?
                            new XMLHttpRequest() : 
                            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Hojas/setIdentificacion';
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
                        tableIdentificacion.api().ajax.reload();
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
            let emaila = document.querySelector('#emaila').value;
            let txtComentarioa = document.querySelector('#txtComentarioa').value;
            if(idpqrsdA == '' || emaila == '' || txtComentarioa == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            divLoading.style.diplay = "flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ?
                            new XMLHttpRequest() : 
                            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Hojas/setRadicado';
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
                        tableIdentificacion.api().ajax.reload();
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
            let emailf = document.querySelector('#emailf').value;
            let txtComentariof = document.querySelector('#txtComentariof').value;
            if(idpqrsdf == '' || emailf == '' || txtComentariof == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            divLoading.style.diplay = "flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ?
                            new XMLHttpRequest() : 
                            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Hojas/setFinalizado';
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
                        tableIdentificacion.api().ajax.reload();
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
            let txtComentario = document.querySelector('#txtComentario').value;
            let listResponsable = document.querySelector('#listResponsable').value;
            let emailarea = document.querySelector('#emailarea').value;
            if(idpqrsdR == '' || txtComentario == '' || listResponsable == '' || emailarea == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
            divLoading.style.diplay = "flex";
            tinyMCE.triggerSave();
            let request = (window.XMLHttpRequest) ?
                            new XMLHttpRequest() : 
                            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Hojas/setResponsable';
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
                        tableIdentificacion.api().ajax.reload();
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
        fntTipodocumento();
}, false);



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
    let ajaxUrl = base_url+'/Hojas/getIdentificacion/'+idpqr; 
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
    let ajaxUrl = base_url+'/Hojas/getIdentificacion/'+idpqr; 
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
                document.querySelector('#emaila').value = objAnonimo.email;

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
    let ajaxUrl = base_url+'/Hojas/getIdentificacion/'+idpqr; 
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
                document.querySelector('#emailf').value = objAnonimo.email;

                $('#modalFinalizarIdentificacion').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }     
   }
}

function fntEditarPqr(idpqr){
    document.querySelector('#titleModal').innerHTML ="Actualizar";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    
    var idpqr =idpqr;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Hojas/getIdentificacion/'+idpqr;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {


                        document.querySelector("#listTipoid").value = objData.data.tipo_doc;
                        $('#listTipoid').selectpicker('render');

                        document.querySelector("#idIdentificacion").value = objData.data.id;
                        document.querySelector("#txtIdentificacion").value = objData.data.numero;
                        document.querySelector("#archivo_ac").value = objData.data.archivo;
                        document.querySelector("#txtDireccion").value = objData.data.direccion;
                        document.querySelector("#txtNombrea").value = objData.data.nombrea;
                        document.querySelector("#txtNombreb").value = objData.data.nombreb;
                        document.querySelector("#txtApellidoa").value = objData.data.apellidoa;
                        document.querySelector("#txtApellidob").value = objData.data.apellidob;

                        document.querySelector("#listPaisId").value = objData.data.pais;

                        document.querySelector("#listSolicitanteid").value = objData.data.solicitante;
                        $('#listSolicitanteid').selectpicker('render');

                        document.querySelector('#listDepartamentoid').value = objData.data.dep;

                        document.querySelector('#listMunicipioid').value = objData.data.mun;

                        document.querySelector("#listCorregimientoid").value = objData.data.corr;

                        document.querySelector("#txtFecha").value = objData.data.fecha;
                        document.querySelector("#txtFijo").value = objData.data.fijo;
                        document.querySelector("#txtTelefono").value = objData.data.movil;
                        document.querySelector("#txtemail").value = objData.data.email;
            }
        }
        $('#modalFormIdentificacion').modal('show');
    }
}

function fntTipoSolicitud(){
    if(document.querySelector('#listTipoSolicitudid'))
    {
        let ajaxUrl = base_url+'/Hojas/getSelectTipoSolicitud';
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
        let ajaxUrl = base_url+'/Hojas/getSelectCanal';
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
        let ajaxUrl = base_url+'/Hojas/getSelectMedio';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listMedioid').innerHTML = request.responseText;
                $('#listMedioid').selectpicker('render');          
                  
            }     
        }
    }
}

function fntTipodocumento(){
    if(document.querySelector("#listTipoid")){
        let ajaxUrl = base_url+'/Hojas/getSelectTipodocumento';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listTipoid').innerHTML = request.responseText;
                $('#listTipoid').selectpicker('render');
                fntTipoSolicitante();            
            }     
        }
    }
}

function fntTipoSolicitante(){
    if(document.querySelector("#listSolicitanteid")){
        let ajaxUrl = base_url+'/Hojas/getSelectTiposolicitante';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listSolicitanteid').innerHTML = request.responseText;
                $('#listSolicitanteid').selectpicker('render');

                fntPais(); 
            }     
        }
    }
}

function fntArea(){
    if(document.querySelector('#listAreaId'))
    {
        let ajaxUrl = base_url+'/Hojas/getSelectArea';
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
        let ajaxUrl = base_url+'/Hojas/getSelectArea';
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

function fntPais(){
    if(document.querySelector("#listPaisId")){
        let ajaxUrl = base_url+'/Hojas/getSelectPais';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listPaisId').innerHTML = request.responseText;
                fntDepartamento();
            }     
        }
    }
}

function fntDepartamento(){
    if(document.querySelector("#listDepartamentoid")){
        let ajaxUrl = base_url+'/Hojas/getSelectDepartamento';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listDepartamentoid').innerHTML = request.responseText;
                fntMunicipios();
            }     
        }
    }
}

function fntMunicipios(){

	if(document.querySelector("#listMunicipioid")){
    	departamento = document.querySelector('#listDepartamentoid').value;
        let ajaxUrl = base_url+'/Hojas/getSelectMunicipio/'+departamento;
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listMunicipioid').innerHTML = request.responseText;

                municipio = document.querySelector('#listMunicipioid').value;
                if(municipio == 1)
                {
                	fntCorregimiento();
                	document.querySelector('#corregimiento').classList.remove("notblock");
                }
                         
            }     
        }
    }
}

function fntCorregimiento(){

	if(document.querySelector("#listMunicipioid").value == 1){
    	if(document.querySelector("#listCorregimientoid")){
    	municipio = document.querySelector('#listMunicipioid').value;
        let ajaxUrl = base_url+'/Hojas/getSelectCorregimiento';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listCorregimientoid').innerHTML = request.responseText;
                         
            }     
        }
    }	
    }else{
    	document.querySelector('#listCorregimientoid').innerHTML = '<option value="18">Otro</option>';
    }
}

function fntAprobarHoja(id){
    swal({
        title: "Aprobar Hoja de Vida",
        text: "¿Realmente quiere aprobar la Hoja de Vida?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, aprobar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Hojas/AprobarHoja';
            let strData = "id="+id;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Aprobar!", objData.msg , "success");
                        tableIdentificacion.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });
}

function fntRechazarHoja(id){
    swal({
        title: "Rechazar Hoja de Vida",
        text: "¿Realmente quiere Rechazar la Hoja de Vida?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, Rechazar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Hojas/RechazarHoja';
            let strData = "id="+id;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Rechazar!", objData.msg , "success");
                        tableIdentificacion.api().ajax.reload();
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
    document.querySelector('#idIdentificacion').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva PQRSD";
    document.querySelector("#formIdentificacion").reset();
    $('#modalFormIdentificacion').modal('show');
}