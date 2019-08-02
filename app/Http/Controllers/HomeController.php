<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class HomeController extends Controller
{
    private $client;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->client = new Client();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $request = $this->client->get("https://newsapi.org/v2/top-headlines?q=Apple&apiKey=305b29bdbd95457db87f67ad2c9d1c3d");
        // TODO: check if request is valid
        $response = json_decode($request->getBody(), true);

        $news = $response['articles'];

        return view('home', compact('news'));
    }
}
