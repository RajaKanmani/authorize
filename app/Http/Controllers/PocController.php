<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poc;
use App\Partner;
use App\Customer;
use App\Comment;

class PocController extends Controller
{
     public function One_To_One(Request $request, $id)
     {
          //return  Poc::all();

          // One To One 

          // $poc = Poc::find($id)->customer->where('id',$id)->get();

          // has one

         // $hasOne = Poc::find($id)->hasOne();


          $poc = Poc::find($id)->customer_one()->get();
               
           return $poc;
     }
     public function belongsTo($id)
     {
       // $poc = Poc::find($id)->poc()->where('partner_name', 'suresh')->get();

      //  $poc = Poc::find($id)->poc;

      //  $t =$poc->with('Customer')->find($id);

       // dd(Poc::find($id)->poc);
      // $poc->pocs()->create(['partner_name'=>'RajaVk']);

       $poc = Poc::find($id)->pocs_through;

        return $poc;
     }

     public function store(Request $req)
     {
        // return $req->all();

        $poc = new Poc;
        $poc->fill($req->all());
        $poc->save();

        $poc->pocs()->create(['partner_name'=>$req->input('partner_account')]);

        return $poc;

     }

      public function show($id)
     {
        
          $poc = Poc::find($id);
     
          foreach ($poc->pocs as $pocvalue)
          {
             
               return $poc;

          }


     }
 

}
