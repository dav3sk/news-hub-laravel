<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Forms\UserForm;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show form to edit current user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit ()
    {
        $user = Auth::user();
        $user->password = "";

        $form = $this->formBuilder->create(UserForm::class, [
            'url' => route('user.update', $user),
            'method' => 'PUT',
            'model' => $user
        ]);

        return view('user.edit', compact('form'));
    }

    /**
     * Updates a user's information
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update (Request $request, User $user)
    {
        if ($request->password) {
            $request['password'] = Hash::make($request->password);

            $user->update($request->all());
        }
        else {
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);
        }

        try {
            $user->save();

            return redirect()->route('home')->with('success','Dados atualizados com sucesso!');
        }
        catch (\Exception $e) {
            return redirect()->route('home')->with('error','Falha ao atualizadar dados!');
        }
    }
}
