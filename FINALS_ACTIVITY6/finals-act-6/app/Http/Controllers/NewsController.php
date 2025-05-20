<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function showNews()
    {
        $apiKey = env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines', [
            'country' => 'us',
            'apiKey' => $apiKey,
            'pageSize' => 3
        ]);

        if ($response->successful()) {
            $articles = $response['articles'];
            return view('news', ['articles' => $articles]);
        } else {
            return view('news', ['articles' => []]);
        }
    }
}
