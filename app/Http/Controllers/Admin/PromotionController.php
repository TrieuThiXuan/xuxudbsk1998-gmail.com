<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionStore;
use App\Promotion;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();
        $promotions_vendor = Promotion::where('vendor_id', Auth::user()->id)->get();
//        dd($promotions_vendor);
        $data = [
            'promotions' =>  $promotions,
            'promotions_vendor' => $promotions_vendor,
        ];
       return view('admin.promotions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
            'users' => User::all()
        ];
       return view('admin.promotions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionStore $request)
    {
        $data = $request->all();
        $imageName = uniqid() . '.' . request()->image->getClientOriginalExtension();
        request()->image->storeAs('public/images', $imageName);
        $imageName = 'storage/images/' . $imageName;
        $began_at = Carbon::parse($data['began_at']);
        $finished_at = Carbon::parse($data['finished_at']);
        $data['image'] = $imageName;
        $data['began_at'] = $began_at->format('Y-m-d');
        $data['finished_at'] = $finished_at->format('Y-m-d');
        Promotion::Create($data);
        return redirect()->route('promotions.index')->with('success', __('message.create.success'));
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
        $data = [
            'promotion' => Promotion::findOrFail($id),
            'categories' => Category::all(),
            'users' => User::all(),
        ];
        return view('admin.promotions.edit', $data);
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
        $data = $request->all();
        if ($request->hasFile('image')) {
            $imageName = uniqid() . '.' . request()->image->getClientOriginalExtension();
            request()->image->storeAs('public/images', $imageName);
            $imageName = 'storage/images/' . $imageName;
            $data['image'] = $imageName;
        }
        if (isset($data['began_at'])) {
            $began_at = Carbon::parse($data['began_at']);
            $data['began_at'] = $began_at->format('Y-m-d');
        } else {
            unset($data['began_at']);
        }
        if (isset($data['finished_at'])) {
            $finished_at = Carbon::parse($data['finished_at']);
            $data['finished_at'] = $finished_at->format('Y-m-d');
        } else {
            unset($data['finished_at']);
        }
        Promotion::findOrFail($id)->update($data);
        return redirect()->route('promotions.index')->with('success', __('messages.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
        return redirect()->route('promotions.index')->with('success', __('messages.destroy'));
    }
}
