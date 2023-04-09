<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index() {
        $user= new User();
        $data=$user->getlist();
        return view("User.list")->with('user',$data['data']);
    }

    public function create() {
        return view("User.create");
    }

    public function registerUser(Request $request) {
        try{
            $Users=new User();
            $insert=$Users->insert_records($request);
            if(isset($insert['error']) && $insert['status']==false)
                {
                    session()->flash('error','Something went wrong please try again!'); 
                    return redirect()->route('create');
                }
            if(isset($insert['success']) && $insert['status']==true)
            {
                session()->flash('success','Data inserted successfully');
                return redirect()->route('data-view'); 
            } 
        }catch (\Exception $e) {
            session()->flash('error','Something wrong please try again!'); 
            return redirect()->route('create');
        }
    }
    public function edit($id) {
        $user= new User();
        $data=$user->find_by_id($id);
        return view("User.edit")->with('user',$data['success']);
    }
    
    public function update(Request $request) {
        try{
            $user= new User();
            $data=$user->update_records($request);         
                if(isset($data['error']) && $data['status']==false)
                    {
                        session()->flash('error','something wrong please try again!'); 
                        return redirect()->Route('edit-user',['id'=>$request->id]);
                    }
                if(isset($data['success']) && $data['status']==true)
                {
                    session()->flash('success','Data Updated successfully');
                    return redirect()->route('data-view'); 
                } 
        }catch (\Exception $e) {
            session()->flash('error','something wrong please try again!'); 
            return redirect('data-view');
        }
    }
}
