<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Http\Requests\FavoriteStoreRequest;

class FavoritesController extends Controller
{
    /**
     * Number of items per page
     *
     * @var int
     */
    private $items_per_page = 5;

    /**
     * Returns favorites view with all the user favorites
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        $favorites = (Favorite::where('user_id', Auth::user()->id))->paginate($this->items_per_page);

        return view('user\favorites', compact('favorites'));
    }

    /**
     * Creates and stores a new user favorite
     *
     * @param FavoriteStoreRequest $request
     * @throws \Throwable
     */
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

    /**
     * Deletes a user favorite
     *
     * @param Favorite $favorite
     * @throws \Exception
     */
    public function delete (Favorite $favorite)
    {
        $favorite->delete();
    }
}
