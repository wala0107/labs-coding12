@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
<div class="container wow fadeInUp mt-5">
    <div class="text-center mb-5 mx-5 px-5">

        <h1 class="text-dark  p-3 mt-3 ">About</h1>
        <hr class="bg-dark">
    </div>
</div>
@stop
@section('content')

<div class="mb-5 container">

    <table class="table table-hover table-light">
        <thead class="bg-dark ">
            <tr>
                <th scope="col" class="text-center px-5 mx-5">Nom element about</th>
                <th scope="col" class="text-center ">Contenu element about</th>


            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="col" class="text-center border border-dark">Image video</th>
                <td class="text-center border border-dark"><img class="w-25"
                        src="{{asset("storage/".$about->videoImg)}}" alt=""></td>
            </tr>
            <tr>
                <th scope="col" class="text-center border border-dark">Url video</th>
                <td class="text-center border border-dark">{{$about->videoUrl}}</td>
            </tr>
            <tr>
                <th scope="col" class="text-center border border-dark">Description1</th>
                <td class="text-center border border-dark">{{$about->description1}}</td>
            </tr>
            <tr>
                <th scope="col" class="text-center border border-dark">Description2</th>
                <td class="text-center border border-dark">{{$about->description2}}</td>
            </tr>
            <tr>
                <th scope="col" class="text-center border border-dark">Bouton</th>
                <td class="text-center border border-dark">@if ($about->btnAbout)
                    Bouton affiché
                    @else
                    Bouton désactivé
                    @endif</td>

            </tr>
            <tr>
                <td colspan="5" class="text-center border border-dark bg-dark">
                    <a class="btn btn-outline-warning " href="{{route('about.edit',$about)}}">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@stop
@section('css')
<link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
@endsection
