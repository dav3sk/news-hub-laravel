@extends('adminlte::page')

@section('title', 'Meus Favoritos - NewsHub')

@section('content_header')
    <h1>Notícias Favoritas</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="image">
                            Imagem
                        </td>
                        <th class="title">
                            Título
                        </th>
                        <th class="date">
                            Data
                        </th>
                    </tr>
                    @if ($favorites->count() > 0)
                    @foreach ($favorites as $fav)
                        <tr>
                            <td class="image">
                                <img src={{$fav->url_image}} width="150">
                            </td>
                            <td class="title">
                                <a href={{$fav->url}} target="_blank">
                                    <h3> {{$fav->title}} </h3>
                                </a>
                            </td>
                            <td class="date">
                                {{date('d/m/Y', strtotime($fav->date))}}
                            </td>
                        </tr>
                    @endforeach
                    @else
                        Você não tem favoritos :(
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .image {
            width: 20%;
        }
        .title {
            width: 70%;
        }
        .date {
            width: 10%;
        }
        th, td {
            text-align: center;
        }
        td {
            vertical-align: middle !important;
        }
    </style>
@endsection
