@extends('adminlte::page')

@section('title', 'NewsHub')

@section('content_header')
    @include('flash-message')

    <h1>
        @php
            $time = date('H', time());
            $user = Str::before(Auth::user()->name, ' ');
        @endphp

        @if( ($time >= 6) && ($time < 12) )
            Bom dia, {{ $user }}!
        @elseif( ($time >= 12) && ($time < 18) )
            Boa tarde, {{ $user }}!
        @else
            Boa noite, {{ $user }}!
        @endif
    </h1>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-body">
        <table class="table table-bordered">
            <tbody>
                @if (count($news) > 0)
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
                @foreach ($news as $new)
                <tr>
                    <td>
                        <img src={{$new['urlToImage']}} width="150">
                    </td>
                    <td>
                        <a href={{$new['url']}} target="_blank">
                            <h3> {{$new['title']}} </h3>
                        </a>
                    </td>
                    <td>
                        {{date('d/m/Y', strtotime($new['publishedAt']))}}
                    </td>
                    <td>
                    <a class="btn btn-xs add-favorite" data-new="{{json_encode($new)}}">
                            <i class="fa fa-plus" style="font-size: 60px;"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                    Nenhum artigo encontrado...
                @endif
            </tbody>
        </table>
    </div>
    <div class="box-footer" style="text-align:center">
        Powered by <a href="https://newsapi.org/">News API.</a>
    </div>
</div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        $('.add-favorite').on('click', function () {
            var article = $(this).data('new');

            $.ajax({
                url: '{{ route('favorite.create') }}',
                method: 'POST',
                data: {
                    'title': article.title,
                    'url': article.url,
                    'url_image': article.urlToImage,
                    'date': article.publishedAt,
                },

                success: function (xhr) {
                    Swal.fire({
                        title: 'Artigo adicionado aos favoritos!',
                        type: 'success',
                        customClass: 'swal-big-font',
                    })
                },
                error: function (xhr) {
                    console.log(xhr);
                    Swal.fire({
                        title: 'Algo deu errado!',
                        text: 'Não foi possível adicionar o artigo aos favoritos.',
                        type: 'error',
                        customClass: 'swal-big-font',
                    })
                }
            });
        })
    </script>
@endsection

@section('css')
    <style>
        .swal-big-font {
            font-size: 0.9em !important;
        }
        td {
            vertical-align: middle !important;
        }
        th, td {
            text-align: center !important;
        }
    </style>
@endsection
