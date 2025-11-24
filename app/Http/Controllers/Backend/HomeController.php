<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Clarifi;
use App\Models\Usability;
use App\Models\Connect;
use App\Models\Faq;
use App\Models\App;
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

    public function GetUsability(){
        $usability = Usability::find(1);
        return view('admin.backend.usability.get_usability', compact('usability'));
    }
    // End Method

    public function UpdateUsabilty(Request $request){

        $usability_id = $request->id;
        $usability = Usability::find($usability_id);

        if($request->file('image')){
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(560, 400)->save(public_path('upload/usability/'.$name_gen));

            $save_url = 'upload/usability/' . $name_gen;

            if(file_exists(public_path($usability->image))){
                @unlink(public_path($usability->image));
            }

            Usability::find($usability_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
                'youtube' => $request->youtube,
                'link' => $request->link
            ]);

            $notification = array(
                'message' => 'Usability Updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            Usability::find($usability_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'youtube' => $request->youtube,
                'link' => $request->link
            ]);

            $notification = array(
                'message' => 'Usabilty Updated without image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
    // EndMethod

    public function AllConnect(){
        $connect = Connect::latest()->get();
        return view('admin.backend.connect.all_connect', compact('connect'));
    }
    // End Method

    public function AddConnect(){
        return view('admin.backend.connect.add_connect');
    }
    // EndMethod

    public function StoreConnect(Request $request){

        Connect::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        $notification = array(
            'message' => 'Connect Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.connect')->with($notification);
    }
    // EndMethod

    public function EditConnect($id){
        $connect = Connect::find($id);
        return view('admin.backend.connect.edit_connect', compact('connect'));
    }
    // EndMethod

    public function UpdateConnect(Request $request){

        $connect_id = $request->id;

        Connect::find($connect_id)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        $notification = array(
            'message' => 'Connect Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.connect')->with($notification);
    }
    // EndMethod

    public function DeleteConnect($id) {
        Connect::find($id)->delete();
        
        $notification = array(
            'message' => 'Connect Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // EndMethod

    public function EditConnectLayout(Request $request, $id){

        $connect = Connect::findOrFail($id);

        if($request->has('title')){
            $connect->title = $request->title;
        }
        if($request->has('description')){
            $connect->description = $request->description;
        }

        $connect->save();
        return response()->json([
            'success' => true 
        ]);

    }
    // EndMethod

    public function AllFAQ(){
        $faq = Faq::latest()->get();
        return view('admin.backend.faq.all_faq', compact('faq'));
    }
    // End Method

    public function AddFAQ(){
        return view('admin.backend.faq.add_faq');
    }
    // End Method

     public function StoreFAQ(Request $request){

        Faq::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        $notification = array(
            'message' => 'Faq Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.faq')->with($notification);
    }
    // EndMethod

    public function EditFAQ($id){
        $faq = Faq::find($id);
        return view('admin.backend.faq.edit_faq', compact('faq'));
    }
    // EndMethod

    public function UpdateFAQ(Request $request){

        $faq_id = $request->id;

        Faq::find($faq_id)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        $notification = array(
            'message' => 'Faq Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.faq')->with($notification);
    }
    // EndMethod

    public function DeleteFAQ($id) {
        Faq::find($id)->delete();
        
        $notification = array(
            'message' => 'Faq Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // EndMethod

    public function EditFAQLayout(Request $request, $id){

        $faq = Faq::findOrFail($id);

        if($request->has('title')){
            $faq->title = $request->title;
        }
        if($request->has('description')){
            $faq->description = $request->description;
        }

        $faq->save();
        return response()->json([
            'success' => true 
        ]);

    }
    // EndMethod

    public function EditApp(Request $request, $id){

        $app = App::findOrFail($id);

        if($request->has('title')){
            $app->title = $request->title;
        }
        if($request->has('description')){
            $app->description = $request->description;
        }

        $app->save();
        return response()->json([
            'success' => true 
        ]);

    }
    // EndMethod

    public function UpdateAppsImage(Request $request, $id){
        $apps = App::findOrFail($id);

        if($request->file('image')){
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(306, 481)->save(public_path('upload/apps/'.$name_gen));

            $save_url = 'upload/apps/' . $name_gen;

            if(file_exists(public_path($apps->image))){
                @unlink(public_path($apps->image));
            }

            $apps->update([
                'image' => $save_url
            ]);

            return response()->json([
                'success' => true,
                'image_url' => asset($save_url),
                'message' => 'Image Updated Successfully'
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Image Upload Failed', 400]);
    }
}
