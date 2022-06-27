<?php

namespace App\Http\Controllers\Person;



use App\Http\Controllers\Controller;
use App\Http\Requests\Person\StoreRequest;
use App\Models\Person;
use Carbon\Carbon;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
       $data = $request->validated();
       $name = md5(Carbon::now() . '_' . $data['image']->getClientOriginalName()) . '.' . $data['image']->getClientOriginalExtension()  .'.jpg';
       $image = $data['image'];
       Person::create([
           'name' => $data['name'],
           'job' =>$data['job'],
           'age' =>$data['age'],
           'image' => url('/storage/' . $name),
       ]);

       \Intervention\Image\Facades\Image::make($image)->crop(70, 70)->encode('jpg', 90)->save(storage_path('app/public/' . $name ));
   }
}
