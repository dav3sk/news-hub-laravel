<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => 'required|string'
            ])
            ->add('password', 'password', [
                'label' => 'Senha',
                'rules' => 'string|min:8'
            ])
            ->add('email', 'email', [
                'label' => 'E-mail',
                'rules' => 'required|string'
            ])
            ->add('submit', 'submit', [
                'label' => 'Salvar'
            ]);
    }
}
