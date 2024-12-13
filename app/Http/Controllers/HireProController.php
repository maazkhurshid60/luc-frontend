<?php

namespace App\Http\Controllers;

use DB;
use App\Mail\Hiring;
use App\Models\Menu;
use App\Models\Team;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\HiringApplication;
use Illuminate\Support\Facades\Mail;

class HireProController extends Controller
{
    public function index()
    {
        $data = [
            'projects' => Project::where('status', 'active')->latest()->take(9)->get(),
            'settings' => DB::table('settings')->find(1),
            'teams' => Team::where('status', 'active')->orderBy('display_order')->with('files', function ($query) {
                $query->orderBy('display_order');
            })->get(),
            'page' => Menu::where('slug', 'hirepro')->first(),
        ];
        return view('hire_a_pro', compact('data'));
    }

    public function submit_application(Request $request)
    {
        if (is_null($request->input('g-recaptcha-response'))) {
            return response()->json(['errors' => ['Captcha Verification Failed! Please Complete Captcha to Continue.']], 422);
        }
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'contact_no' => 'required',
            'service' => 'required',
            'technology' => 'required',
            'team_id' => 'required',
            'contact_no' => ['required', 'string', 'min:11', 'regex:/^\+?[0-9]+$/'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
        $request['service'] = json_encode($request['service']);
        $request['technology'] = json_encode($request['technology']);

        $data = HiringApplication::create($request->all());

        $mail_data['member'] = $data->team->name;
        $mail_data['lead'] = $data->name;
        $mail_data['email'] = $data->email;
        $mail_data['number'] = $data->contact_no;
        $mail_data['subject'] = $data->subject;
        $mail_data['services'] = json_decode($data['service']);
        $mail_data['technologies'] = json_decode($data['technology']);
        $mail_data['message'] = $data->message;

        Mail::to($data->team->mail, $data->team->name)->send(new Hiring($mail_data));

        return response()->json(['success' => 'Your application has been successfully submitted. Will get in touch with you after reviewing.']);
    }
}
