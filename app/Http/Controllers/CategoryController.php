<?php

namespace App\Http\Controllers;

use App\Category;
use App\Promotion;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'promotions' => Promotion::all(),
            'categories' => Category::all(),

        ];
        return view('web.home.category', $data);
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
        $data = [
            'promotion' => Promotion::findOrFail($id)
        ];
        return view('web.home.show', $data);
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

    public function showCategory($id)
    {
        $data = [
            'promotions' => Promotion::where('category_id', $id)->get(),
            'categories' => Category::all()
        ];
        return view('web.home.category', $data);
    }

    public function search(Request $request)
    {
        $data =
        [
            'promotions' =>  Promotion::where('name', 'like', '%' . $request->search . '%')
                ->orWhere('summary', 'like', '%' . $request->search . '%')->get(),
        ];
        if (count($data['promotions']) == 0) {
            $message = trans('message.search_empty');
            $data =[
                'message' => $message
            ];
            return view('web.home.search', $data);
        }
        return view('web.home.search', $data);
    }
}
