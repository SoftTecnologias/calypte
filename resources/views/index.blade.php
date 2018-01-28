@extends('layouts.general')

@section('styles')

@endsection

@section('content')

        <div align="center">
            <img src="{{asset('/img/app/icon.png')}}" alt="" style="width: 250px;">
        </div>

        <div align="center">
            <h1 style="color: #8700da">AUTOPILOTO ENCENDIDO DE TU SEGURIDAD</h1>
            <h1 style="color: #8700da"><i class="fa fa-check-circle-o fa-5x" aria-hidden="true"></i></h1>
            <h4>Registrate en el siguiente <a href="{{route('registrar')}}">link</a></h4>
        </div>

@endsection

@section('scripts')

@endsection