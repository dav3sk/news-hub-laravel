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
     */
    public function edit () {
        $user = Auth::user();
        $user->password = "";

        $form = $this->formBuilder->create(UserForm::class, [
            'url' => route('user.update', $user),
            'method' => 'PUT',
            'model' => $user
        ]);

        return view('user.edit', compact('form'));
    }

    public function update (Request $request, User $user) {
        if ($request->password) {
            $request['password'] = Hash::make($request->password);

            $user->update($request->all());
        }

        $user->save();

        return redirect()->route('home');
    }
}