var divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    //Registro de Solicitud
    if(document.querySelector("#formIdentificacion")){
        var formIdentificacion = document.querySelector("#formIdentificacion");
        formIdentificacion.onsubmit = function(e) {
            e.preventDefault();
            let listTipoSolicitudid = document.querySelector('#listTipoSolicitudid').value;
            let listTipoid = document.querySelector('#listTipoid').value;
            let txtIdentificacion = document.querySelector('#txtIdentificacion').value;
            let listSolicitanteid = document.querySelector('#listSolicitanteid').value;
            let txtNombrea = document.querySelector('#txtNombrea').value;
            let txtApellidoa = document.querySelector('#txtApellidoa').value;
            let listPaisId = document.querySelector('#listPaisId').value;
            let listDepartamentoid = document.querySelector('#listDepartamentoid').value;
            let listMunicipioid = document.querySelector('#listMunicipioid').value;
            let listCorregimientoid = document.querySelector('#listCorregimientoid').value;

            if(listTipoSolicitudid == '' || listTipoid == '' || txtIdentificacion == '' || listSolicitanteid == '' || txtNombrea == '' || txtApellidoa == '' || listPaisId == '' || listDepartamentoid == '' || listMunicipioid == '' || listCorregimientoid == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }

            divLoading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Tramites/setIdentificacion'; 
            var formData = new FormData(formIdentificacion);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        formIdentificacion.reset();
                        swal("", objData.msg ,"success");
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }
    fntCorregimiento();
}, false);

window.addEventListener('load', function() {
         fntTipodocumento();
}, false);

function fntTipodocumento(){
    if(document.querySelector("#listTipoid")){
        let ajaxUrl = base_url+'/Identificado/getSelectTipodocumento';
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
        let ajaxUrl = base_url+'/Identificado/getSelectTiposolicitante';
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

function fntPais(){
    if(document.querySelector("#listPaisId")){
        let ajaxUrl = base_url+'/Identificado/getSelectPais';
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
        let ajaxUrl = base_url+'/Identificado/getSelectDepartamento';
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
        let ajaxUrl = base_url+'/Identificado/getSelectMunicipio/'+departamento;
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
        let ajaxUrl = base_url+'/Identificado/getSelectCorregimiento';
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