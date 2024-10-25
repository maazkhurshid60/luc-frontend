<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Faq as Obj;
use Auth,Helper,Image;
class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'menu'  => 'faq',
            'settings'  => DB::table('settings')->first(),
        ];
        return view('admin.faq.index',$data);
    }
    public function datatable(Request $request)
    {
        $items = Obj::select('*');
        
        return datatables($items)
        ->addColumn('action',function($item){
          
            $action = '<a href="javascript:updateRecord('.$item->id.')"  class="btn btn-xs btn-primary" >Edit</a> ';
            $action .= '<a href="javascript:delete_record('.$item->id.')"  class="btn btn-xs btn-danger" >Delete</a> ';
            return $action;
        })
        ->editColumn('category_id',function($item){
            return $item->category->title;
        })
    
        ->rawColumns(['action'])
        ->toJson();
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
            'question' => 'required',
            'answer' => 'required',
            'category_id'   => 'required'
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $obj = Obj::create($request->all());
        return response()->json(['success'=>'Record is successfully added','id'=>$obj->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Obj::findOrFail($id);
        return view('admin.faq.edit',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
            'question' => 'required',
            'answer' => 'required',
            'category_id'   => 'required'

        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
       
        $record->update($request->all());
        return response()->json(['success'=>'Record is successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $record = Obj::findOrFail($request->input('id'));
        $record->delete();
        return back()->with('success','Record Deleted successfully');
    }
}

