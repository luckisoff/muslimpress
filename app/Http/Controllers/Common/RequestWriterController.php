<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Frontend\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\WriterRequest;

class RequestWriterController extends MainController
{
    function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        try {

            if(isWritter()) throw new \Exception( __('You are already a writer'));
    

            if(admin()->writerRequest) throw new \Exception('Your statas is '. admin()->writerRequest->status);
    
            return view('frontend.writer.index');
            
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function store(Request $reqest){
        try {
            $validator = Validator::make($reqest->all(), [
                'article' => 'required',
                'terms' => 'required'
            ]);

            if(isWritter()) throw new \Exception(__('You are already a writer'));

            
            if(admin()->writerRequest) throw new \Exception('Your statas is '. admin()->writerRequest->status);

            
            if($validator->fails()) throw new \Exception($validator->errors()->first());
            
            if(!admin()->writerRequest()->create($reqest->all())) throw new \Exception(__('Something went wrong.'));
            
            return redirect(app()->getLocale())->with('success', __('Successfully applied'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
