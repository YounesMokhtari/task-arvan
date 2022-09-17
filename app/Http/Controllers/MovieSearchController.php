<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieSearchController extends Controller
{
    public function __invoke()
    {
        // return Http::get('https://moviesapi.ir/api/v1/movies?page={1}');
        // return Http::get('https://moviesapi.ir/api/v1/movies?q={The Shawshank Redemption"}&page={1}');
        $data= Http::get('https://moviesapi.ir/api/v1/movies?q=The Godfather')->object();
        return ($data->data);
        return Http::get('https://moviesapi.ir/api/v1/movies?q=The Godfather');
    }
}
