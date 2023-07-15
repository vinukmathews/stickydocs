<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permalink;
use App\Models\Question;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;
use App\Models\Answer;
use Illuminate\Support\Facades\Response;
class UploadController extends Controller
{
    public function getUpload(){
        return view('welcome');
    }

    public function getUploadDocument($client_hash){
        $permalink = Permalink::where(['permalink'=>trim($client_hash)])->first();
        $client = $permalink->client;
        if($client){
            $questions = Question::where(['user_id'=>$client->id,'status'=>0])->get();
            $answers  = Answer::where(['user_id'=>$client->id])->orderBy('id','desc')->get();

            return view('client.pages.upload_docs')->with(['questions'=>$questions,'client'=>$client,'answers'=>$answers]);
        }else{
            return view('client.pages.upload_docs')->with('custom_error','Invalid clients details supplied');
        }
        
    }

    public function postUpload(Request $request){
        $request->validate([
            'self_employment_start' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
        
        $user = new User;
        $user->name = $request->input('name');
        $user->email = trim($request->input('email'));
        $user->password = bcrypt($request->input('password'));
        $user->image = $fileName;
        $user->save();

        return redirect()->route('user.index')->with([
            'message' => 'User added successfully!', 
            'status' => 'success'
        ]);
    }


    public function postUploadDocument(Request $request,$client_hash){

        // dd($request->all());


        $permalink = Permalink::where(['permalink'=>trim($client_hash)])->first();
        $client = $permalink->client;
        if($client){
            $questions = Question::where(['user_id'=>$client->id,'status'=>0])->get();

            if($questions)
            {
                

                foreach($questions as $question){
                    $question_id = $question->id;
                    $question_name = "question_".$question_id;

                    $answer = $request->$question_name;
                    if($answer){
                        if($question->question_type == "file"){

                            $file = $request->file($question_name);
                            $fileNameWithExt = $file->getClientOriginalName();
                            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                            $extention = $request->file($question_name)->getClientOriginalExtension();
                            $fileNameToStore = $filename . '_' . time() . '.' . $extention;
                            $file->move('public/assets/uploads/',$fileNameToStore); 
                            $ans = new Answer;
                            $ans->user_id     = $client->id;
                            $ans->question_id = $question->id;
                            $ans->answer      = $fileNameToStore;
                            $ans->save();



                            

                        }else{
                            $ans = new Answer;
                            $ans->user_id     = $client->id;
                            $ans->question_id = $question->id;
                            $ans->answer      = $request->$question_name;
                            $ans->save();
                        }

                        

                        $question->status = 1;
                        $question->save();
                    }
                    else{
                        return redirect()->back()->with('custom_error',"All question are mandatory");
                    }


                    
                }
                return redirect()->back()->with('success',"Answer saved and sent to admin");
                
            }
            return redirect()->back()->with('custom_error',"You don't have any new questions from the admin");

            
        }else{
            return redirect()->back()->with('custom_error','Invalid clients details supplied');
        }
        
    }


    public function getDownload($answer_id)
        {
            $answer = Answer::find($answer_id);
            if($answer){
                    $file= public_path(). "/assets/uploads/".$answer->answer;

                    // $headers = array(
                    //         'Content-Type: application/pdf',
                    //         );

                    return Response::download($file, 'download.pdf');
            }
            
        }
}
