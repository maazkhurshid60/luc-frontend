<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth,Helper;
use App\Models\Address;

class AddressController extends Controller
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
            'menu'  => 'address',
            'settings'  => \DB::table('settings')->first(),
        ];
        return view('admin.address.index',$data);
    }
    public function datatable(Request $request)
    {
        $items = Address::select('*');
        
        return datatables($items)
        ->addColumn('action',function($item){
          
            $action = '<a href="javascript:updateRecord('.$item->id.')"  class="btn btn-xs btn-primary" >Edit</a> ';
            $action .= '<a href="javascript:delete_record('.$item->id.')"  class="btn btn-xs btn-danger" >Delete</a> ';
            return $action;
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
            'city' => 'required',

        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $Address = Address::create($request->all());
        return response()->json(['success'=>'Record is successfully added','id'=>$Address->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Address::findOrFail($id);
        return view('admin.address.edit',$data);
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
        $record = Address::find($request->input('id'));
        $validator = \Validator::make($request->all(), [
            'city' => 'required',
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
        $record = Address::findOrFail($request->input('id'));
        $record->delete();
        return back()->with('success','Record Deleted successfully');
    }
}
