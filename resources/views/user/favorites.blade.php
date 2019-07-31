@extends('adminlte::page')

@section('title', 'Meus Favoritos - NewsHub')

@section('content_header')
    <h1>Favoritos</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                    @if ($favorites->count() > 0)
                    @foreach ($favorites as $fav)
                        <tr>
                            <td style="width: 20%" align="center">
                                <img src={{$fav->url_image}} width="200" >
                            </td>
                            <td style="width: 80%" align="center">
                                <a href={{$fav->url}} target="_blank">
                                    <h3> {{$fav->title}} </h3>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                        Você não tem nenhum favorito :(
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
