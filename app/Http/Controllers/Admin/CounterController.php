<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Counter as Obj;
use Auth,Helper,Image;
class CounterController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'menu'  => 'counter',
            'settings'  => DB::table('settings')->first(),
        ];
        return view('admin.counter.index',$data);
    }
    public function datatable(Request $request)
    {
        $items = Obj::select('*');
        
        return datatables($items)
        ->addColumn('action',function($item){
          
            $action = '<a href="javascript:updateRecord('.$item->id.')"  class="btn btn-xs my-1 btn-primary" >Edit</a> ';
            $action .= '<a href="javascript:delete_record('.$item->id.')"  class="btn btn-xs my-1 btn-danger" >Delete</a> ';
            return $action;
        })
        ->editColumn('created_at', function ($item) {
            return \App\Helpers\Helper::setDate($item->created_at);
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
        $data = [
            'menu'  => 'counter',
            'settings'  => DB::table('settings')->first(),
        ];
        return view('admin.counter.create',$data);
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
            'title' => 'required',
            'count' => 'required|min:0',
        ]);
        if ($validator->fails())  return response()->json(['errors'=>$validator->errors()->all()]);
        
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
         $element = Obj::findOrFail($id);
        $data = [
            'menu'  => 'counter',
            'settings'  => DB::table('settings')->first(),
            'data'   => $element 
        ];
        return view('admin.counter.edit',$data);
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
            'title' => 'required',
            'count' => 'required|min:0'
        ]);
        
        if ($validator->fails()) return response()->json(['errors'=>$validator->errors()->all()]);
        
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