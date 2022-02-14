<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHome()
    {
        return view('home');
    }

    public function showFounder()
    {
        return view('founder');
    }

    public function index()
    {
        //
    }

    public function showLogin()
    {
        return view('User.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember_me = $request->remember_me;

        $isValid = auth()->attempt(['email'=>$email, 'password'=>$password]);
        if($isValid){
            if($remember_me){
                Cookie::queue('email', $email, 60);
                Cookie::queue('password', $password, 60);
            }
            return redirect('/');
        }else{
            $request->session()->flash('error', 'Invalid E-mail / Password :<');
            return back();
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegister()
    {
        return view('User.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' =>  'required|unique:users|regex:/^[a-zA-Z\s]*$/',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|min:5|max:20',
            'gender'    =>  'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'User has been registered, please login :)');

        return redirect('/login');
    }

    public function showProfile()
    {
        return view('User.profile');
    }

    public function showPackage()
    {
        return view('User.package');
    }

    public function confirmbuy(Request $request)
    {
        
        $data=['id'=>$request->id];
        return view('User.confirm', $data);

       

    }

    public function buy(Request $request)
    {
        $user = User::all();
        foreach($user as $data) {
            if($data["id"] === auth()->id()){
                $user = $data;
            }
        }
        $user->package=$request->id;
        $user->save();
        return view('home');
    }

    public function removepackage(Request $request)
    {
        $user = User::all();
        foreach($user as $data) {
            if($data["id"] === auth()->id()){
                $user = $data;
            }
        }
        $user->package=Null;
        $user->save();
        return view('home');
    }


    public function edit($id)
    {
        $user = User::all();
        foreach($user as $data) {
            if($data["id"] === auth()->id()){
                $user = $data;
            }
        }
        return view('User.update', compact('user'));
    }

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'user_name' =>  'required|regex:/^[a-zA-Z\s]*$/',
            'email'     =>  'required|email',
            'password'  =>  'required|min:5|max:20'
        ]);

        DB::table('users')->where('id', auth()->id())->update([
            'user_name' => $validatedData['user_name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ]);

        $request->session()->flash('success', 'Profile has changed!');

        return redirect("/{auth}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
