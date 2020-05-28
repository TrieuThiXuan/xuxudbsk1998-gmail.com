<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\ActiveUserMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categories' => Category::all()
        ];
        return view('web.home.home', $data);
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
        //
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
    public function edit($id)
    {
        //
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
        //
    }

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

    public function optionRegister()
    {
        return view('web.home.option_register');
    }

    public function registerPortal(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => User::NORMAL,
            'name' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => User::IN_ACTIVE,
        ]);
        Mail::to($request->email)->send(new ActiveUserMail($user));
        return response()->json([
            'status' => true,
            'message' => trans('message.user_register.success'),
        ]);
    }

    function loginPortal(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt(
            ['email' => $credentials['email'],
                'password' => $credentials['password'],
                ]
        )) {
            return response()->json([
                'status' => true,
                'message' => trans('message.login.success'),
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => trans('message.login.error_password'),
            'error_status' => false,
        ]);
    }
}
