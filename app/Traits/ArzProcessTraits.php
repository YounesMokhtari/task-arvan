<?php


namespace App\Traits;

use App\Jobs\ArzProcessJob;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

trait ArzProcessTraits
{

    public $oneDay = 60 * 60 * 24;
    public function processArz()
    {
        $users = Cache::remember('users', $this->oneDay, function () {
            return User::all();
        });
        $sendString = $this->getArz();
        foreach ($users as $item => $user)
            ArzProcessJob::dispatch($user, $sendString);
    }
    public function getArz()
    {
        //get token https://www.navasan.tech/api
        $token = "freeVJNJH8f3mXkbxq6uqtFba9yb6WUD";
        $url = "http://api.navasan.tech/latest/?api_key=$token";
        $twoHours = 60 * 60 * 2;
        $arz = Cache::remember('arz', $twoHours, function () use ($url) {
            return Http::get($url)->object();
        });

        $str = '';
        foreach ($arz as $key => $value) {
            $str .= "<ol>$key<ul>";
            foreach ($value as $k => $val)
                $str .= "<li> $k : $val </li>";
            $str .= "</ul></ol>";
        }
        return $str;
    }
}
