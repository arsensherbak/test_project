<?php

namespace App\Http\Controllers\Person;



use App\Http\Controllers\Controller;
use App\Http\Requests\Person\StoreRequest;
use App\Http\Resources\Person\IndexResource;
use App\Models\Person;
use Carbon\Carbon;

class IndexController extends Controller
{
   public function __invoke()
   {
      $people = Person::orderBy('id', 'desc')->paginate(3);
      return IndexResource::collection($people);
   }
}
