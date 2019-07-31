<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function show () {
        $favorites = Favorite::where('user_id', Auth::user()->id)->get();

        return view('user\favorites', compact('favorites'));
    }

    public function delete (Favorite $favorite) {
        $favorite->delete();
    }
}
