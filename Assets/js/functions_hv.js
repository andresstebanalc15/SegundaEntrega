var divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    //Registro de Solicitud
    if(document.querySelector("#formIdentificacion")){
        var formIdentificacion = document.querySelector("#formIdentificacion");
        formIdentificacion.onsubmit = function(e) {
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
            
            if(listTipoid == '' || txtIdentificacion == '' || listSolicitanteid == '' || txtNombrea == '' || txtApellidoa == '' || listPaisId == '' || listDepartamentoid == '' || listMunicipioid == '' || listCorregimientoid == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }

            divLoading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Hv/setIdentificacion'; 
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

    //Buscar Paciente
    if(document.querySelector("#dateNacimiento")){
         $('#txtDocumento').keyup(function(e){
            e.preventDefault();
            var tipoidentificacion = document.querySelector('#listTipoid').value;
            var identificacion = document.querySelector('#txtDocumento').value;
            var nacimiento = document.querySelector('#dateNacimiento').value;

            let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Cita/getIngresoId/'+identificacion;
            request.open("GET",ajaxUrl,true);
            request.send();
            request.onreadystatechange = function()
            {
                if(request.readyState == 4 && request.status == 200)
                {
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(nacimiento == objData.data.nacimiento && tipoidentificacion == objData.data.tipo){

                            $(".con").attr("onmousedown", "return false;");
                            $(".con").attr("readonly","readonly");

                            document.querySelector("#idPaciente").value = objData.data.id;
                            document.querySelector("#dateNacimiento").value = objData.data.nacimiento;
                            document.querySelector("#txtNombrea").value = objData.data.nombrea;
                            document.querySelector("#txtNombreb").value = objData.data.nombreb;
                            document.querySelector("#txtApellidoa").value = objData.data.apellidoa;
                            document.querySelector("#txtApellidob").value = objData.data.apellidob;
                            document.querySelector("#listSexoid").value = objData.data.sexo;
                            $('#listSexoid').selectpicker('render');

                            document.querySelector('#listDepartamentoid').value = objData.data.departamento;
                            $('#listDepartamentoid').selectpicker('render');

                            document.querySelector('#listMunicipioid').value = objData.data.municipio;
                            $('#listMunicipioid').selectpicker('render');
                            
                            document.querySelector("#listCorregimientoid").value = objData.data.corregimiento;
                            $('#listCorregimientoid').selectpicker('render');

                            document.querySelector("#listEtnicoid").value = objData.data.etnico;
                            $('#listEtnicoid').selectpicker('render');

                            document.querySelector("#listGrupoid").value = objData.data.grupo;
                            $('#listGrupoid').selectpicker('render');

                            document.querySelector("#txtDireccion").value = objData.data.direccion;
                            document.querySelector("#txtTelefono").value = objData.data.telefono;
                            document.querySelector("#txtemail").value = objData.data.email;
                            document.querySelector("#txtBarrio").value = objData.data.barrio;
                            document.querySelector("#txtCon1").value = objData.data.telefono2;

                            //$(".esconder").attr("onmousedown", "return false;");
                            //$(".esconder").attr("readonly","readonly");
                            //$(".esconderselect").attr("disabled", "disabled");
                            //$(".btn-primary").removeClass('notBlock');
                            //$(".esconder").addClass('notBlock');
                            $(".esconder").removeClass('notBlock');
                        }
                    }else
                    {

                        document.querySelector("#txtNombrea").value = '';
                        document.querySelector("#txtNombreb").value = '';
                        document.querySelector("#txtApellidoa").value = '';
                        document.querySelector("#txtApellidob").value = '';
                        document.querySelector("#listSexoid").value = 1;
                        $('#listSexoid').selectpicker('render');

                        document.querySelector('#listDepartamentoid').value = 1;
                        $('#listDepartamentoid').selectpicker('render');

                        document.querySelector('#listMunicipioid').value = 1;
                        $('#listMunicipioid').selectpicker('render');
                        
                        document.querySelector("#listCorregimientoid").value = 1;
                        $('#listCorregimientoid').selectpicker('render');

                        document.querySelector("#listEtnicoid").value = 1;
                        $('#listEtnicoid').selectpicker('render');

                        document.querySelector("#listGrupoid").value = 1;
                        $('#listGrupoid').selectpicker('render');

                        document.querySelector("#txtDireccion").value = '';
                        document.querySelector("#txtTelefono").value = '';
                        document.querySelector("#txtemail").value = '';
                        document.querySelector("#txtBarrio").value = '';
                        document.querySelector("#txtCon1").value = '';

                        $(".esconder").removeClass('notBlock');
                        
                        //$(".esconder").addClass('notBlock');
                        //$(".esconder").removeClass('notBlock');
                    }
                }
                return false;
            }
            
        });
    }
    fntCorregimiento();
}, false);

window.addEventListener('load', function() {
         fntTipodocumento();
}, false);

function fntTipodocumento(){
    if(document.querySelector("#listTipoid")){
        let ajaxUrl = base_url+'/Hv/getSelectTipodocumento';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listTipoid').innerHTML = request.responseText;
                $('#listTipoid').selectpicker('render');
                 
            }     
        }
    }
    fntTipoSolicitante();
}

function fntTipoSolicitante(){
    if(document.querySelector("#listSolicitanteid")){
        let ajaxUrl = base_url+'/Hv/getSelectTiposolicitante';
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
        let ajaxUrl = base_url+'/Hv/getSelectArea';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listAreaId').innerHTML = request.responseText;
                $('#listAreaId').selectpicker('render');
                fntTipoSolicitud();          
            }     
        }
    }
}

function fntTipoSolicitud(){
    if(document.querySelector('#listTipoSolicitudid'))
    {
        let ajaxUrl = base_url+'/Hv/getSelectTipoSolicitud';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listTipoSolicitudid').innerHTML = request.responseText;
                $('#listTipoSolicitudid').selectpicker('render');
                fntMedioRespuesta();          
            }     
        }
    }
}

function fntMedioRespuesta(){
    if(document.querySelector('#listMedioid'))
    {
        let ajaxUrl = base_url+'/Hv/getSelectMedio';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listMedioid').innerHTML = request.responseText;
                $('#listMedioid').selectpicker('render');          
                fntPais();  
            }     
        }
    }
}

function fntPais(){
    if(document.querySelector("#listPaisId")){
        let ajaxUrl = base_url+'/Hv/getSelectPais';
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
        let ajaxUrl = base_url+'/Hv/getSelectDepartamento';
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
        let ajaxUrl = base_url+'/Hv/getSelectMunicipio/'+departamento;
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
        let ajaxUrl = base_url+'/Hv/getSelectCorregimiento';
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