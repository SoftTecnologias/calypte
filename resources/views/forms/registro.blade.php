@extends('layouts.general')

@section('styles')
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">-->
@endsection

@section("content")
    <div class="card" style="background: #bda1f1; margin-top: 50px; color: darkviolet">
        <div class="card-header" style="background: #e493fA;" align="center">
            <h1>Registro @{{ message }}</h1>
        </div>
        <div class="card-block">
            <form id="registerForm">
                <div class="row">
                    {{csrf_field()}}
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="name">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col-md-4">
                                <label for="ape_pat">Apellido Paterno</label>
                                <input type="text" id="ape_pat" name="ape_pat" class="form-control" placeholder="Apellido Paterno">
                            </div>
                            <div class="col-md-4">
                                <label for="ape_mat">Apellido Materno</label>
                                <input type="text" id="ape_mat" name="ape_mat" class="form-control" placeholder="Apellido Materno">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="selectpicker form-control" v-on:change="ciudades">
                                    <option value="00">Seleciona el Estado</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="municipio">Municipio</label>
                                <select name="municipio" id="municipio" class="selectpicker form-control" v-on:change="localidades">
                                    <option value="00">Seleccione el Municipio</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="colonia">Colonia</label>
                                <select name="colonia" id="colonia" class="selectpicker form-control">
                                    <option value="00">Seleccione la Colonia</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="calle">Calle</label>
                                <input type="text" class="form-control" name="calle" id="calle" placeholder="Calle">
                            </div>
                            <div class="col-md-2">
                                <label for="numero">Numero</label>
                                <input type="number" class="form-control" name="numero" id="numero" placeholder="Numero">
                            </div>
                            <div class="col-md-3">
                                <label for="cp">C.P.</label>
                                <input type="number" class="form-control" name="cp" id="cp" placeholder="Codigo Postal">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="mail">Correo</label>
                                <input type="email" class="form-control" name="mail" id="mail" placeholder="ejemplo@mail.com">
                            </div>
                            <div class="col-md-4">
                                <label for="telcel">Telefono Celular</label>
                                <input type="tel" class="form-control" name="telcel" id="telcel" placeholder="111-111-1111">
                            </div>
                            <div class="col-md-4">
                                <label for="telfij">Telefono Fijo</label>
                                <input type="tel" class="form-control" name="telfij" id="telfij" placeholder="111-1111">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="fecha">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="fecha" id="fecha" >
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="user">Usuario</label>
                                <input type="email" class="form-control" name="user" id="user" placeholder="ejemplo@mail.com">
                            </div>
                            <div class="col-md-4">
                                <label for="pass">Contraseña</label>
                                <input type="password" class="form-control" name="pass" id="pass" placeholder="********">
                            </div>
                            <div class="col-md-4">
                                <label for="cpass">Confirmar Contraseña</label>
                                <input type="password" class="form-control" name="cpass" id="cpass" placeholder="********">
                            </div>
                        </div>
                        <br>
                        <div align="right">
                            <a href="#" class="btn btn-primary" v-on:click="addUser">Registrar</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div align="center">
                            <img src="{{asset('/img/app/icon.png')}}" alt="" style="width: 150px;">
                        </div>
                        <hr>
                        <div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci at dignissimos dolore, ea earum eius ex fugiat ipsam iste itaque magnam necessitatibus pariatur quod, rem repellat similique sit tempore!
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>-->
    <script src="{{asset('/js/forms/registro.js')}}"></script>
@endsection