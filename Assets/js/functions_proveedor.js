var tableProveedor;
var tableNote;
var divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    tableProveedor = $('#tableProveedor').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Proveedor/getProveedor",
            "dataSrc":""
        },
        "columns":[
            {"data":"identificacion"},
            {"data":"nit"},
            {"data":"razon"},
            {"data":"nombres"},
            {"data":"telefono"},
            {"data":"email"},
            {"data":"status"},
            {"data":"critico"},
            {"data":"options"}
        ],
         "columnDefs": [
                        { 'className': "textright", "targets": [ 1 ] },
                        { 'className': "textleft", "targets": [ 4 ] },
                        { 'className': "textcenter", "targets": [ 6 ] }
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

    if(document.querySelector("#formProveedor")){
        var formProveedor = document.querySelector("#formProveedor");
        formProveedor.onsubmit = function(e) {
            e.preventDefault();
            var txtNit = document.querySelector('#txtNit').value;
            var txtNombrea = document.querySelector('#txtNombrea').value;
            var txtNombreb = document.querySelector('#txtNombreb').value;
            var txtApellidoa = document.querySelector('#txtApellidoa').value;
            var txtApellidob = document.querySelector('#txtApellidob').value;
            var listDepartamentoid = document.querySelector('#listDepartamentoid').value;
            var listMunicipioid = document.querySelector('#listMunicipioid').value;
            var listCorregimientoid = document.querySelector('#listCorregimientoid').value;
            var txtDireccion = document.querySelector('#txtDireccion').value;
            var txtBarrio = document.querySelector('#txtBarrio').value;
            var txtTelefono = document.querySelector('#txtTelefono').value;
            var txtemail = document.querySelector('#txtemail').value;
            
            
            if(txtNit == '' || txtNombrea == '' || txtApellidoa == '' || listDepartamentoid == '' || listMunicipioid == '' || listCorregimientoid == '' || txtDireccion == '' || txtTelefono == '' || txtemail == '' || txtBarrio == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }

            divLoading.style.display = "flex";
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Proveedor/setProveedor'; 
            var formData = new FormData(formProveedor);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        $('#modalFormProveedor').modal("hide");
                        formProveedor.reset();
                        swal("Proveedor", objData.msg ,"success");
                        tableProveedor.api().ajax.reload();
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

}, false);


window.addEventListener('load', function() {
        fntTipoSolicitante();
        fntRemoveRazon();
        /*fntViewUsuario();
        fntEditUsuario();
        fntDelUsuario();*/
}, false);


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
                fntTipodocumento(); 
            }     
        }
    }
}

function fntRemoveRazon(){
    if(document.querySelector("#listSolicitanteid")){
        var tipo = document.querySelector('#listSolicitanteid').value;
        if(tipo == 1){
            document.querySelector('#txtRazon').setAttribute("type", "hidden");
        }else{
            document.querySelector('#txtRazon').removeAttribute("type", "hidden");
        }
    }
}

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
                fntDepartamento();            
            }     
        }
    }
}

function fntDepartamento(){
    if(document.querySelector("#listDepartamentoid")){
        let ajaxUrl = base_url+'/Proveedores/getSelectDepartamento';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listDepartamentoid').innerHTML = request.responseText;
                $('listDepartamentoid').selectpicker('render');
                fntMunicipios();
            }     
        }
    }
}

function fntMunicipios(){

    if(document.querySelector("#listMunicipioid")){
        departamento = document.querySelector('#listDepartamentoid').value;
        let ajaxUrl = base_url+'/Proveedores/getSelectMunicipio/'+departamento;
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listMunicipioid').innerHTML = request.responseText;
                $('listMunicipioid').selectpicker('render');

                municipio = document.querySelector('#listMunicipioid').value;
                if(municipio == 1)
                {
                    fntCorregimiento();              
                }
                         
            }     
        }
    }
}

function fntCorregimiento(){

    if(document.querySelector("#listMunicipioid").value == 1){
        if(document.querySelector("#listCorregimientoid")){
        municipio = document.querySelector('#listMunicipioid').value;
        let ajaxUrl = base_url+'/Proveedores/getSelectCorregimiento';
        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function()
        {
            if(request.readyState == 4 && request.status == 200)
            {
                document.querySelector('#listCorregimientoid').innerHTML = request.responseText;
                $('listCorregimientoid').selectpicker('render');
                         
            }     
        }
    }   
    }else{
        document.querySelector('#listCorregimientoid').innerHTML = '<option value="18">Otro</option>';
    }
}


function fntViewProveedor(idproveedor){
    var idpersona = idpersona;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Proveedor/getProveedores/'+idproveedor;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {
               let htmlhv = "";
               let htmlce = "";
               let htmlcedula = "";
               let htmlrut = "";
               let htmlantecedentes = "";

               var estadoProveedor = objData.data.status == 1 ? 
                '<span class="badge badge-success">Activo</span>' : 
                '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celTPersona").innerHTML = objData.data.solicitante;
                document.querySelector("#celTDocumento").innerHTML = objData.data.identificacion;
                document.querySelector("#celNit").innerHTML = objData.data.nit;
                document.querySelector("#celRazon").innerHTML = objData.data.razon;

                htmlhv +=`<p style"font-size: 20pt;"><a href="${objData.data.hvs}"><i class="far fa-file-archive"></i></a></p>`;
                document.querySelector("#celhv").innerHTML = htmlhv;

                htmlce +=`<p style"font-size: 20pt;"><a href="${objData.data.ces}"><i class="far fa-file-archive"></i></a></p>`;
                document.querySelector("#celce").innerHTML = htmlce;

                htmlcedula +=`<p style"font-size: 20pt;"><a href="${objData.data.cedulas}"><i class="far fa-file-archive"></i></a></p>`;
                document.querySelector("#celcedula").innerHTML = htmlcedula;

                htmlrut +=`<p style"font-size: 20pt;"><a href="${objData.data.ruts}"><i class="far fa-file-archive"></i></a></p>`;
                document.querySelector("#celrut").innerHTML = htmlrut;

                htmlantecedentes +=`<p style"font-size: 20pt;"><a href="${objData.data.antecedentess}"><i class="far fa-file-archive"></i></a></p>`;
                document.querySelector("#celantecedentes").innerHTML = htmlantecedentes;

                document.querySelector("#celNombrea").innerHTML = objData.data.primer;
                document.querySelector("#celNombreb").innerHTML = objData.data.segundo;
                document.querySelector("#celApellidoa").innerHTML = objData.data.apellidoa;
                document.querySelector("#celApellidob").innerHTML = objData.data.apellidob;
                document.querySelector("#celDepartamento").innerHTML = objData.data.nomdep;
                document.querySelector("#celMunicipio").innerHTML = objData.data.municipio;
                document.querySelector("#celCorregimiento").innerHTML = objData.data.corregimiento;
                document.querySelector("#celDireccion").innerHTML = objData.data.direccion;
                document.querySelector("#celBarrio").innerHTML = objData.data.barrio;
                document.querySelector("#celCritico").innerHTML = objData.data.critico;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefono;
                document.querySelector("#celemail").innerHTML = objData.data.email;
                document.querySelector("#celUsuario").innerHTML = objData.data.nombres;
                document.querySelector("#celDate").innerHTML = objData.data.dateadd;

                if(objData.data.critico == 1){
                     document.querySelector("#celCritico").innerHTML = "General";
                }else if(objData.data.critico == 3){
                    document.querySelector("#celCritico").innerHTML = "Ambiental";
                }else{
                    document.querySelector("#celCritico").innerHTML = "Ninguno";
                }

                
                $('#modalViewProveedor').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntEditProveedor(idproveedor){
   
    document.querySelector('#titleModal').innerHTML ="Actualizar Proveedor";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var idproveedor =idproveedor;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'/Proveedor/getProveedores/'+idproveedor;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            var objData = JSON.parse(request.responseText);

            if(objData.status)
            {
                document.querySelector("#idProveedor").value = objData.data.id;
                document.querySelector("#hvac").value = objData.data.hv;
                document.querySelector("#ceac").value = objData.data.ce;
                document.querySelector("#cedulaac").value = objData.data.cedula;
                document.querySelector("#rutac").value = objData.data.rut;
                document.querySelector("#antecedentesac").value = objData.data.antecedentes;
                document.querySelector("#idProveedor").value = objData.data.id;
                document.querySelector('#txtNit').value = objData.data.nit;
                document.querySelector('#txtRazon').value = objData.data.razon;
                document.querySelector("#txtNombrea").value = objData.data.primer;
                document.querySelector('#txtNombreb').value = objData.data.segundo;
                document.querySelector('#txtApellidoa').value = objData.data.apellidoa;
                document.querySelector('#txtApellidob').value = objData.data.apellidob;
                document.querySelector('#listDepartamentoid').value = objData.data.departamento;
                document.querySelector('#listMunicipioid').value = objData.data.idmunicipio;
                document.querySelector("#listCorregimientoid").value = objData.data.idcorregimiento;
                document.querySelector("#txtDireccion").value = objData.data.direccion;
                document.querySelector("#txtBarrio").value = objData.data.barrio;
                document.querySelector("#txtTelefono").value = objData.data.telefono;
                document.querySelector("#txtemail").value = objData.data.email;
                document.querySelector("#listSolicitanteid").value = objData.data.tipo;
                $('#listSolicitanteid').selectpicker('render');
                fntRemoveRazon();

                document.querySelector("#listTipoid").value = objData.data.tipodoc;
                $('#listTipoid').selectpicker('render');
                
                if(objData.data.status == 1){
                    document.querySelector("#listStatus").value = 1;
                }else{
                    document.querySelector("#listStatus").value = 2;
                }
                $('#listStatus').selectpicker('render');

                 if(objData.data.critico == 1){
                    document.querySelector("#listCritico").value = 1;
                }else{
                    document.querySelector("#listCritico").value = 2;
                }
                $('#listCritico').selectpicker('render');
            }
        }
    
        $('#modalFormProveedor').modal('show');
    }
}

function fntDelProveedor(idproveedor){

    var idProveedor = idproveedor;
    swal({
        title: "Eliminar Proveedor",
        text: "¿Realmente quiere eliminar proveedor?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, Eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'/Proveedor/delProveedor';
            var strData = "idProveedor="+idProveedor;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Enviar!", objData.msg , "success");
                        tableProveedor.api().ajax.reload();
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
    document.querySelector('#idProveedor').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Proveedor";
    document.querySelector("#formProveedor").reset();
    $('#modalFormProveedor').modal('show');
}

function openModalPerfil(){
    $('#modalFormPerfil').modal('show');
}