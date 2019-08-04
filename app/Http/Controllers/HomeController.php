<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Http\Requests\SearchRequest;

class HomeController extends Controller
{
    private $api_url = "https://newsapi.org/v2/everything?pageSize=30&language=pt&";
    private $api_key = "ApiKey=305b29bdbd95457db87f67ad2c9d1c3d";

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

    /**
     * Returns home view with news fetched from News API
     *
     * @param SearchRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function search(SearchRequest $request)
    {
        $request_url = $this->build_request($request);

        try {
            $response = (new Client())->get($request_url);
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Algo deu errado! Verifique se o intervalo de tempo não é muito grande.');
        }

        $body = json_decode($response->getBody(), true);

        if ($body['totalResults'] == 0) {
            return redirect()->route('home')->with('info', 'Nenhum resultado encontrado.');
        }

        $news = collect($body['articles']);

        return view('home', compact('news'));
    }

    /**
     * Builds request string to send to News API
     *
     * @param SearchRequest $request
     * @return string
     */
    private function build_request(SearchRequest $request)
    {
        $url = $this->api_url;
        $url .= "q=" . $request->keyword . "&";

        if ($request->has('date_start')) {
            $url .= "from=" . $request->date_start . "&";
        }
        if ($request->has('date_end')) {
            $url .= "to=" . $request->date_end . "&";
        }

        return $url . $this->api_key;
    }
}
