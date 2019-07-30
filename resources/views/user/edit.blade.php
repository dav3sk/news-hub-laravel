@extends('adminlte::page')

@section('title', 'Editar Cadastro - NewsHub')

@section('content')
    {!! form_start($form) !!}
        <div class="register-box">
            <div class="register-logo">
              <h3>Editar Informações de Cadastro</h3>
            </div>
            <div class="register-box-body">
                <div class="form-group">
                    {!! form_label($form->name) !!}
                    {!! form_widget($form->name) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->email) !!}
                    {!! form_widget($form->email) !!}
                </div>

                <div class="form-group">
                    {!! form_label($form->password) !!}
                    {!! form_widget($form->password) !!}
                </div>
            </div>

            <div class="box-footer">
                <div class="form-group">
                    {!! form_widget($form->submit) !!}
                </div>
            </div>
        </div>
    {!! form_end($form) !!}
@endsection
