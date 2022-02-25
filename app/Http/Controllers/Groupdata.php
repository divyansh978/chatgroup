<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chatgroup;
use App\Models\Chat;

class Groupdata extends Controller
{
    //
    function Checkgroup(Request $req, $groupname){

        if(isset($req->name)){
            session(['name' => htmlspecialchars($req->name)]);
        }
        
        $groupname = htmlspecialchars($groupname);
        $data = Chatgroup::find($groupname);

        if($data != null){

            if(session()->has('name')){

                $chats = Chat::where("gname",$groupname)->orderby('created_at')->get();
                return view('group',['chats' => $chats,'group' => $groupname]);
            }else{
                return view('group');
            }
        }else{
            return redirect('/');
        }
    }

    function Getchats(Request $req){

        $req->validate([
            'group' => 'required',
            'offset' => 'required',
        ]);

        $datanotfound = ['response' => 0];

        if(session()->has('name')){

            $data = Chat::where('gname',$req->group)->limit(100)->offset(htmlspecialchars($req->offset))->orderBy('created_at')->get(['uname','message','userip']);

            if($data != null){
                if($data->count() > 0){
                    return json_encode($data->toarray()); die;
                }
            }
        }
        
        return json_encode($datanotfound);
        
    }

    function checkname(Request $request){
        
        $request->validate([
            'name' => 'required'
        ]);

        $data = Chatgroup::find(htmlspecialchars($request->name,ENT_QUOTES));

        if($data != null){
            $result = ["response" => 0];
            return json_encode($result);
        }else{
            $obj = new Chatgroup();
            $obj->name = htmlspecialchars($request->name,ENT_QUOTES);
            $obj->save();

            $result = ["response" => 1];
            return json_encode($result);
        }
    }

    public function sendmessage(Request $request){

        $request->validate([
            'group' => 'required',
            'message' => 'required|min:1'
        ]);

        $response = ['response' => 0];

        if(session()->has('name')){

            $data = new Chat();
            $data->gname = htmlspecialchars($request->group);
            $data->message = htmlspecialchars($request->message);
            $data->uname = htmlspecialchars(session('name'));
            $data->userip = htmlspecialchars($_SERVER['REMOTE_ADDR']);
            
            if($data->save()){
                $response['response'] = 1;
                return json_encode($response);
            }
        }

        return json_encode($response);
    }
}
