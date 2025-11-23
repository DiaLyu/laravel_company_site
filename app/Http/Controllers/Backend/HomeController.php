<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Clarifi;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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

    public function GetClarifies(){
        $clarifies = Clarifi::find(1);
        return view('admin.backend.clarifies.get_clarifies', compact('clarifies'));
    }
    // End Method

    public function UpdateClarifies(Request $request){

        $clirifi_id = $request->id;
        $clirifi = Clarifi::find($clirifi_id);

        if($request->file('image')){
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 618)->save(public_path('upload/clarifies/'.$name_gen));

            $save_url = 'upload/clarifies/' . $name_gen;

            if(file_exists(public_path($clirifi->image))){
                @unlink(public_path($clirifi->image));
            }

            Clarifi::find($clirifi_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Clarify Updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            Clarifi::find($clirifi_id)->update([
                'title' => $request->title,
                'description' => $request->description
            ]);

            $notification = array(
                'message' => 'Clarify Updated without image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
    // EndMethod

    public function EditClarify(Request $request, $id){

        $clarifi = Clarifi::findOrFail($id);

        if($request->has('title')){
            $clarifi->title = $request->title;
        }
        if($request->has('description')){
            $clarifi->description = $request->description;
        }

        $clarifi->save();
        return response()->json([
            'success' => true 
        ]);

    }
    // EndMethod
}
