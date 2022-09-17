<?php

namespace App\Observers;

use App\Models\ModelA;

class ModelAObserver
{
    public function created(ModelA $modelA)
    {
        $modelA->modelB()->create([
            'star_count' => $modelA->user_star 
        ])->save();
    }
}
