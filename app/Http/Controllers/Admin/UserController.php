<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'users' => User::all()
        ];
        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $data = $request->all();
        $birthday = Carbon::parse($data['birthday']);
        $data['password'] = Hash::make($data['password']);
        $data['birthday'] = $birthday->format('Y-m-d');
        User::Create($data);
        return redirect()->route('users.index')->with('success', __('message.create.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'user' => User::findOrFail($id),
        ];
        return view('admin.users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'user' => User::findOrFail($id)
        ];
        return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
      $data = $request->all();
      if(isset($data['password'])) {
          $data['password'] = Hash::make($data['password']);
      } else {
          unset($data['password']);
      }
        if(isset($data['birthday'])) {
            $birthday = Carbon::parse($data['birthday']);
            $data['birthday'] = $birthday->format('Y-m-d');
        } else {
            unset($data['birthday']);
        }
      User::findOrFail($id)->update($data);
      return redirect()->route('users.index')->with('success', __('message.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('users.index')->with('success', __('message.destroy.success'));
    }
}
