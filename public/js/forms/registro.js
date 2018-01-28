var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!!',
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
        login: function () {
            data = new FormData(document.getElementById("loginForm"));
            $.ajax({
                url: document.location.protocol + '//' + document.location.host+"/doLogin",
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function (json) {
                if(json.code == 200){
                    swal("success", 'Sesion iniciada', json.detail);
                    location.reload(true);
                }else{
                    swal("error", json.msg , json.detail);
                }
            }).fail(function (json) {
                swal("error", json.msg, "error");
            });
        },
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
            }).fail(function () {
                swal("error", "Tuvimos un problema de conexion", "error");
            });
        },
    }
});