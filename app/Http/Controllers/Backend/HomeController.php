<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;

class HomeController extends Controller
{
    public function AllFeatures() {
        $features = Feature::latest()->get();
        return view('admin.backend.features.all_features', compact('features'));
    }  
    // EndMethod

    public function AddFeatures(){
        return view('admin.backend.features.add_features');
    }
    // EndMethod

    public function StoreFeatures(Request $request){

        Feature::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon
        ]);

        $notification = array(
            'message' => 'Features Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.features')->with($notification);
    }
    // EndMethod

    public function EditFeatures($id){
        $features = Feature::find($id);
        return view('admin.backend.features.edit_features', compact('features'));
    }
    // EndMethod

     public function UpdateFeatures(Request $request){

        $feature_id = $request->id;

        Feature::find($feature_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon
        ]);

        $notification = array(
            'message' => 'Features Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.features')->with($notification);
    }
    // EndMethod

    public function DeleteFeatures($id) {
        Feature::find($id)->delete();
        
        $notification = array(
            'message' => 'Feature Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // EndMethod
}
