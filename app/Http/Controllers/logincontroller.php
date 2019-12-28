<?php

namespace App\Http\Controllers;

use App\Register_user;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
class logincontroller extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request,[
                'phone'=>'required|numeric|regex:/(01)[0-9]{9}/',
                'password'=>'required|min:6'
            ]);
            $enterphone = $request->get('phone');
            $Rpss = $request->get('password');
            $ndata = user::where('phone', $enterphone)->first();

            if (($ndata)&&(Hash::check( $Rpss , $ndata->password ))) {
                $id = $ndata->id;
                $name = $ndata->name;
                $email = $ndata->email;
                $request->session()->put('email',$email);
                $request->session()->put('id',$id);
                $request->session()->put('name',$name);
                return redirect('/home');
            }else{
                $errors = new MessageBag();
                $errors->add('message', 'Error In Your Phone Or Password Not Correct');
                return view('welcome')->withErrors($errors);

            }

        }
        $errors = new MessageBag();
        $errors->add('message', 'Error In Method');
        return view('welcome')->withErrors($errors);
    }

    protected function register(Request $request){

        if($request->isMethod('post')) {

            $this->validate($request,[
                'name'=>'required|min:3|max:25',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6',
            ]);
            $name = $request->get('name');
            $email = $request->get('email');
            $phone = $request->session()->get('phone');
            $pass = Hash::make($request->get('password'));
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->phone = $phone;
            $user->password = $pass;

           if($user->save()){
               $request->session()->put('email',$email);
               $request->session()->put('name',$name);
               $request->session()->put('id',$user->id);
               return redirect('/home');
           }

        }

        $errors = new MessageBag();
        $errors->add('message', 'Error In Method');
        return view('registerform')->withErrors($errors);
    }
    protected function chickphone(Request $request){

        if($request->isMethod('post')) {

            $this->validate($request,[
                'phone'=>'required|numeric|regex:/(01)[0-9]{9}/|unique:users'
            ]);

            $phone = $request->get('phone');
            $request->session()->put('phone',$phone);
            return redirect('entercode');
        }
        $errors = new MessageBag();
        $errors->add('message', 'Error In Method');
        return view('register')->withErrors($errors);

    }
    protected function chickcode(Request $request){

        if($request->isMethod('post')) {

            $this->validate($request,[
                'code'=>'required|numeric|min:4'
            ]);

            $code = $request->get('code');
           if($code == '2019'){
               return redirect('registerform');
           }else{

               $errors = new MessageBag();
               $errors->add('message', 'Your Code Not Correct');
               return view('entercode')->withErrors($errors);

           }

        }
        $errors = new MessageBag();
        $errors->add('message', 'Error In Method');
        return view('entercode')->withErrors($errors);
    }
}
