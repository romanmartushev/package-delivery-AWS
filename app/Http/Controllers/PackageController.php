<?php

namespace App\Http\Controllers;

use App\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function create(Request $request){
        $package = new Package($request->all());
        $package->time_order_placed = Carbon::now();
        $package->time_delivered = Carbon::now()->addDays(rand(0,14));
        $package->save();
        if(Package::where('id', $package->id)->first()){
            return ['success' => 'The package was created.'];
        }
        return ['error' => 'There was an issue creating the package.'];
    }

    /**
     * @return array
     */
    public function receive(){
        return ['packages' => Package::all()];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function update(Request $request){
        $package = Package::where('id', $request['package']['id'])->first();
        $package->source_address = $request['package']['source_address'];
        $package->destination_address = $request['package']['destination_address'];
        $package->save();
        return ['success' => 'The package was updated.'];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function delete(Request $request){
        Package::where('id', $request['package']['id'])->delete();
        if(!Package::where('id', $request['package']['id'])->first()){
            return ['success' => 'The package was removed.'];
        }
        return ['error' => 'There was an issue removing the package.'];
    }
}
