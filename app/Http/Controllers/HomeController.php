<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Http\Requests\SearchRequest;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public static function search(SearchRequest $request)
    {
        $request_url = "https://newsapi.org/v2/everything?pageSize=30&language=pt&";
        $request_url .= "q=" . $request->keyword . "&";

        if ($request->has('date_start')) {
            $request_url .= "from=" . $request->date_start . "&";
        }
        if ($request->has('date_end')) {
            $request_url .= "to=" . $request->date_end . "&";
        }

        try {
            $response = (new Client())->get($request_url . "ApiKey=305b29bdbd95457db87f67ad2c9d1c3d");
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Algo deu errado! Verifique se o intervalo de tempo não é muito grande.');
        }

        $body = json_decode($response->getBody(), true);
        if ($body['totalResults'] == 0) {
            return redirect()->route('home')->with('info', 'Nenhum resultado encontrado.');
        }

        $news = $body['articles'];

        return view('home', compact('news'));
    }
}
