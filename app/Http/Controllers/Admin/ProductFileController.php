<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductFile as Obj;
use Auth,Helper,Image;
class ProductFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $files = Obj::where('product_id',$request->product_id)->get();
        if($files->count() < 1) return 'No file found';
        return view('admin.product.file-list',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = \Validator::make($request->all(), [
            'type'  => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        
        $obj = Obj::create($request->all());

        if ($request->hasFile('file')) {
            $temp_name  = $request->file('file')->store('images','public');
            $file = str_replace('images/', '', $temp_name);
            Image::make(public_path('storage/images/'.$file))->resize(150, null, function ($constraint) {
               $constraint->aspectRatio();
           })->save(config('constants.store_thumb_path').$file);
       }
        $obj->file = $file;
        $obj->save();
        return response()->json(['success'=>'Record is successfully added','id'=>$obj->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $data = Obj::findOrFail($request->id);
        return view('admin.product.edit-file',compact('data'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = Obj::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'type'  => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

        ]);

        $record->update($request->all());
        
        if ($validator->fails()) return response()->json(['errors'=>$validator->errors()->all()]);

        if ($request->hasFile('file')) {
            $temp_name  = $request->file('file')->store('images','public');
            $file = str_replace('images/', '', $temp_name);
            Image::make(public_path('storage/images/'.$file))->resize(150, null, function ($constraint) {
               $constraint->aspectRatio();
           })->save(config('constants.store_thumb_path').$file);
            if(!is_null($record->file)){
                Storage::disk('public')->delete('images/'.$record->file);
                Storage::disk('public')->delete('thumb/'.$record->file);
           }
            $record->file = $file;
            $record->save();
        }


        return response()->json(['success'=>'Record is successfully added','id'=>$record->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
