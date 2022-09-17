<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ImageResize;
use App\Traits\ArzProcessTraits;

class ImageResizeController extends Controller
{
    use ImageResize;
    use ArzProcessTraits;
    //
}
