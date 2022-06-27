<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use App\Http\Requests\Person\StoreRequest;
use App\Models\Person;
use Carbon\Carbon;

class IndexController extends Controller
{
   public function __invoke()
   {
     return view('index');
   }
}
