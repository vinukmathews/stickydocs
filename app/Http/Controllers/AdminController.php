<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permalink;
use App\Models\User;
use App\Models\Question;

use Str;

class AdminController extends Controller
{
    public function getAdminDashboard(){
        $title = "Dashboard";
        $clients = User::where(['user_type'=>2])->orderBy('id','DESC')->get();

        return view('admin.pages.dashboard')->with(['title'=>$title,'clients'=>$clients]);
    }

    public function getNewLink(){
        $title = "Add New Link";
        $code = $this->generateCode();
        return view('admin.pages.create_new_link')->with(['code'=>$code,'title'=>$title]);
    }

    public function postNewLink(Request $request){
        request()->validate([
            "client_name"   => "required",
            "client_email"   => "required",
            "client_link" => "required",
        ]);

        $check_email = User::where(['email'=>trim($request->client_email)])->first();
        if($check_email){
            return redirect()->back()->with('custom_error','Email already registered for another client');
        }

        $user = new User;
        $user->name = trim($request->client_name);
        $user->email = trim($request->client_email);
        $user->password = '';
        $user->user_type = 2;
        $user->save();

        $link = new Permalink;
        $link->user_id = $user->id;
        $link->permalink = trim($request->client_link);
        $link->save();


        return redirect('/admin/admin-dashboard')->with('success','New client link added');

   }

    public function getDocumentRequest($id){
        
        $client = User::find($id);
        if($client){
            $title = "Document Request For - ".$client->name;
            $questions = $client->clientQuestions;
            return view('admin.pages.document_request')->with(['client'=>$client,'title'=>$title,'questions'=>$questions]);
        }
        return redirect()->back()->with('custom_error','Invalid client details supplied');
        
    }

    

    public function generateCode()
    {
        $random = Str::random(25);
        return $this->checkPermalink($random);
    }


    public function checkPermalink($code){
        $check = Permalink::checkPermaLink($code);
        if($check)
        {
            $this->getNewLink();
        }
        else{
            return $code;
        }
    }


    public function postSaveDocumentRequest(Request $request){
          $client = User::find($request->client_id);
          if($client){
            $question = new Question;
            $question->user_id = $client->id;
            $question->question = trim($request->question);
            $question->question_type = trim($request->question_type);
            $question->save();
            return 1;

          }
          return 0;
    }


}
