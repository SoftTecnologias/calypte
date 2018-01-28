$(function () {
    $.ajax({
        url : '/getUsers',
        type : 'GET',
        success : function(json) {
            if(json.code == 200){
                datos = json.msg;
            }
        },
        error : function(xhr, status) {

        },
        complete : function(xhr, status) {
            console.log('Petición realizada');
        }
    });
    $.validator.addMethod('selected', function (value, element, param) {
        // param = size (in bytes)
        // element = element to validate (<input>)
        // value = value of the element (file name)
        return (value == '00') ? false : true;
    }, $.validator.format("Debe seleccionar un elemento"));
    $.validator.addMethod('userunico', function (value, element, param) {
       respuesta = true;
        datos.forEach(function (item) {
            if(String(item['USUARIO'].toLowerCase()) == String(value.toLowerCase())){
                respuesta = false;
            }
        });
        console.log(respuesta);
        return respuesta;
    }, $.validator.format("El nombre de usario ya existe"));
    $.validator.addMethod('mailunico', function (value, element, param) {
        respuesta = true;
        datos.forEach(function (item) {
            if(String(item['EMAIL'].toLowerCase()) == String(value.toLowerCase())){
                respuesta = false;
            }
        });
        console.log(respuesta);
        return respuesta;
    }, $.validator.format("El correo ya existe"));
    $('#registerForm').validate({
        rules:{
            name:'required',
            ape_pat:'required',
            ape_mat:'required',
            estado: 'selected',
            municipio: 'selected',
            colonia: 'selected',
            calle: {
                required:true,
                minlength:3
            },
            numero: 'required',
            cp:{
                required:true,
                minlength:5,
                maxlength:5
            },
            mail:{
                email:true,
                required:true,
                mailunico:true
            },
            telcel:'required',
            fecha:{
                required:true
            },
            user:{
                required:true,
                minlength:5,
                userunico:true
            },
            pass:{
                required:true,
                minlength:6
            },
            cpass:{
                required:true,
                equalTo:'#pass'
            }

        },
        messages:{
            name:'El nombre es requerido',
            ape_pat:'El apellido paterno es requerido',
            ape_mat:'El apellido materno es requerido',
            calle: {
                required:'La calle es requerida',
                minlength:'Este campo debe contener por lo menos 3 numeros'
            },
            numero: 'El numero es requerido',
            cp:{
                required:'El codigo postal es requerido',
                minlength:'El codigo postal debe contener 5 digitos',
                maxlength:'El codigo postal debe contener 5 digitos'
            },
            mail:{
                email:'Este campo debe de ser un E-mail',
                required:'El E-mail es requerido'
            },
            telcel:'El telefono es Requerido',
            fecha:{
                required:'Se requiere la fecha de nacimiento'
            },
            user:{
                required:'Se requiere un nombre de usuario',
                minlength:'Debe contener por lo menos 5 caracteres',
                userunico:'El nombre de usuario ya existe'
            },
            pass:{
                required:'Se requiere contraseña',
                minlength:'Debe contener por lo menos 6 digitos'
            },
            cpass:{
                required:'El campo de es requerido',
                equalTo:'Las contraseñas no coinciden'
            }
        },
        submitHandler: function () {
            data = new FormData(document.getElementById("registerForm"));
            $.ajax({
                url:"/user/new",
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function (json) {
                if (json.code == 200) {
                    swal("Realizado", json.msg, json.detail).done(function () {
                        location.replace(document.location.protocol + '//' + document.location.host+'/');
                    });
                } else {
                    swal("error", json.msg, json.detail);
                }
            }).fail(function (json) {
                swal("error", "Nombre de usuario o e", "error");
            });
            return false;
        }
    });
});
var app = new Vue({
    el: '#app',
    data: {
        message: '',
    },
    created:function(){
        $.ajax({
            url : '/getEstados',
            type : 'GET',
            success : function(json) {
                if(json.code == 200){
                    datos = json.msg;
                    datos.forEach(function (item) {
                        $('#estado').append('<option value="'+item['id']+'">'+item['DESC']+'</option>');
                    });
                }
            },
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },
            complete : function(xhr, status) {
                console.log('Petición realizada');
            }
        });

    },
    methods: {
        ciudades:function () {
            id = $('#estado option:selected').val();
            $.ajax({
                url : '/getCiudades/'+id,
                type : 'GET',
                success : function(json) {
                    if(json.code == 200){
                        data = json.msg;
                        $('#municipio option').remove();
                        $('#municipio').append('<option value="00">Seleccione el Municipio</option>');
                        data.forEach(function (item) {
                            $('#municipio').append('<option value="'+item['id']+'">'+item['DESC']+'</option>');
                        });
                    }
                },
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
                complete : function(xhr, status) {
                    console.log('Petición realizada');
                }
            });
        },
        localidades:function () {
            id = $('#municipio option:selected').val();
            $.ajax({
                url : '/getLocalidades/'+id,
                type : 'GET',
                success : function(json) {
                    if(json.code == 200){
                        data = json.msg;
                        $('#colonia option').remove();
                        $('#colonia').append('<option value="00">Seleccione la Colonia</option>');
                        data.forEach(function (item) {
                            $('#colonia').append('<option value="'+item['id']+'">'+item['DESC']+'</option>');
                        });
                    }
                },
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
                complete : function(xhr, status) {
                    console.log('Petición realizada');
                }
            });
        },
        addUser:function () {
            $("#registerForm").submit();
        }
    }
});