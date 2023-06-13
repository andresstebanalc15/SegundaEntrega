var tableProveedor;
var divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function(){

    tableProveedor = $('#tableProveedor').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Proveedores/getProveedor",
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
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
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
            var ajaxUrl = base_url+'/Proveedores/setProveedor'; 
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
        let ajaxUrl = base_url+'/Proveedores/getSelectTiposolicitante';
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
        if(tipo == 2){
            document.querySelector('#txtRazon').removeAttribute("type", "hidden");
        }else{
            document.querySelector('#txtRazon').setAttribute("type", "hidden");
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