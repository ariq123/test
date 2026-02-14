<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client; 
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class MovieController extends Controller
{
    public function index(Request $request)
{
    $client = new \GuzzleHttp\Client();
    $search = $request->input('search');
    
    if (empty($search)) {
        $popularFranchises = [
            'Avengers', 'Batman', 'Star Wars', 'Harry Potter', 
            'Spider-Man', 'Matrix', 'Jurassic', 'X-Men', 
            'Transformers', 'Fast and Furious', 'Lord of the Rings',
            'Mission Impossible', 'Pirates of the Caribbean'
        ];
        $randomKey = array_rand($popularFranchises);
        $search = $popularFranchises[$randomKey];
    }

    $page = $request->input('page', 1);
    $toastMessage = null; 

    try {
        $response = $client->get('https://www.omdbapi.com/', [
            'query' => [
                'apikey' => env('OMDB_KEY'),
                's' => $search,
                'page' => $page
            ],
            'http_errors' => false
        ]);
        
        $body = json_decode($response->getBody());
        
        if (isset($body->Response) && $body->Response === "False") {
            $movies = (object)['Search' => []];
            
            if ($request->filled('search') && !$request->ajax()) {
                $toastMessage = sprintf('%s %s', $request->input('search'),__('app.search'));
            }
            
        } else {
            $movies = $body;
        }

    } catch (\Exception $e) {
        $movies = (object)['Search' => []];
        $toastMessage = "Terjadi masalah saat mengambil data dari server.";
    }
    
    // Return untuk Infinite Scroll (AJAX)
    if ($request->ajax()) {
        return view('movies.partials.movie_list', compact('movies'))->render();
    }
    
    // Return view utama. Jika ada pesan error, sisipkan menggunakan ->with()
    if ($toastMessage) {
        return view('movies.index', compact('movies', 'search'))->with('warningToast', $toastMessage);
    }

    return view('movies.index', compact('movies', 'search'));
}

    public function show($id)
    {
        $client = new Client();
        $response = $client->get("http://www.omdbapi.com/", [
            'query' => [
                'apikey' => env('OMDB_KEY'),
                'i' => $id,
                'plot' => 'full'
            ]
        ]);

        $movie = json_decode($response->getBody());

        return view('movies.detail', compact('movie'));
    }

    public function changeLanguage($lang)
    {
        if (in_array($lang, ['en', 'id'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        return redirect()->back();
    }
}


