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
                    @if ($favorites->count() > 0)
                    <tr>
                        <th>
                            Imagem
                        </td>
                        <th>
                            Título
                        </th>
                        <th>
                            Data
                        </th>
                    </tr>
                    @foreach ($favorites as $fav)
                        <tr>
                            <td>
                                <img src={{$fav->url_image}} width="150">
                            </td>
                            <td>
                                <a href={{$fav->url}} target="_blank">
                                    <h3> {{$fav->title}} </h3>
                                </a>
                            </td>
                            <td>
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
        <div class="box-footer">
            {{ $favorites->links() }}
        </div>
    </div>
@endsection

@section('css')
    <style>
        th, td, .box-footer {
            text-align: center;
        }
        td {
            vertical-align: middle !important;
        }
    </style>
@endsection
