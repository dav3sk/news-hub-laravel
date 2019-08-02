<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Http\Requests\FavoriteStoreRequest;

class FavoritesController extends Controller
{

    private $items_per_page = 5;

    public function index ()
    {
        $favorites = (Favorite::where('user_id', Auth::user()->id))->paginate($this->items_per_page);

        return view('user\favorites', compact('favorites'));
    }

    public function create (FavoriteStoreRequest $request)
    {
        $article = new Favorite([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'url_image' => $request->input('url_image'),
            'url' => $request->input('url'),
            'date' => date('Y-m-d H:i:s', strtotime($request->input('date')))
        ]);

        $article->saveOrFail();
    }

    public function delete (Favorite $favorite)
    {
        $favorite->delete();
    }
}
