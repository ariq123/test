<?php

namespace App\Http\Controllers;

use App\Models\Favorite; // Pastikan tetap pakai \Models\
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        Favorite::firstOrCreate([
            'imdb_id' => $request->imdb_id
        ], [
            'title' => $request->title,
            'poster' => $request->poster
        ]);

        return redirect('favorites')->with('success', __('app.added_favorite'));
    }

    public function index()
    {
        $favorites = Favorite::all();
        return view('favorites.index', compact('favorites'));
    }

    public function destroy($id)
    {
        $fav = Favorite::find($id);
        if($fav) {
            $fav->delete();
            return back()->with('success', __('app.deleted_favorite'));
        }
        
        return back()->with('error', 'Data tidak ditemukan');
    }
}