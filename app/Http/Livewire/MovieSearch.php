<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MovieSearch extends Component
{
    public $search = '';
    public $searchMovie = [];
    public const sixtyDay = 60 * 60 * 24*60;

    public function movieSearch()
    {

        $this->searchMovie = Cache::remember(
            $this->search,
            self::sixtyDay,
            function () {
                return Http::get(
                    "https://moviesapi.ir/api/v1/movies?q=$this->search"
                )->object()->data;
            }
        );
    }
     public function clear()
    {
        $this->search = '';
        $this->searchMovie = [];
    }
    public function render()
    {
        return view('livewire.movie-search');
    }
}
