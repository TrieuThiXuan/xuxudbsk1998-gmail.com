<?php

namespace App\Http\Controllers;

use App\Category;
use App\Promotion;
use App\StatusPromotion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
            'promotions' => Promotion::where('status', Promotion::PUBLISH)->get(),
            'categories' => Category::all(),
            'statusPromotions' => StatusPromotion::all(),
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
            'promotion' => Promotion::findOrFail($id),
            'categories' => Category::all(),
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
            'promotions' => Promotion::where('status', Promotion::PUBLISH)->where('category_id', $id)
                ->get(),
            'categories' => Category::all(),
            'statusPromotions' => StatusPromotion::all(),
        ];
        return view('web.home.category', $data);
    }

    public function search(Request $request)
    {
        $began_at = Carbon::parse($request->time_began)->format('Y-m-d');
        $finished_at = Carbon::parse($request->time_finished)->format('Y-m-d');
        $promotions =  Promotion::where('status', Promotion::PUBLISH)->searchByKeyWord($request->search)->searchByCategory($request->category)
            ->searchByTime($request)
            ->searchByAddress($request->address)->get();
//        $time_began = Promotion::whereDate('began_at', '>=',  $began_at)
//            ->WhereDate('finished_at', '<=',  $finished_at)->get();
//        dd($promotions);
        $data =
        [
            'promotions' => $promotions,
            'categories' => Category::all(),
        ];
        if (count($data['promotions']) == 0) {
            $message = trans('message.search_empty');
            $data =[
                'message' => $message,
                'categories' => Category::all(),
            ];
            return view('web.home.search', $data);
        }
        return view('web.home.search', $data);
    }

    public function listPriorityArticle()
    {
        $promotionPriority = Promotion::where('priority', Promotion::AC_PRIORITY)->get();
//        dd($promotionPriority);
        $data =
            [
                'promotions' => $promotionPriority,
                'categories' => Category::all(),
                'statusPromotions' => StatusPromotion::all(),
            ];
        if (count($data['promotions']) == 0) {
            $message = trans('message.search_empty');
            $data =[
                'message' => $message,
                'categories' => Category::all(),
            ];
            return view('web.home.search', $data);
        }
        return view('web.home.category', $data);
    }

    public function listNewestPromotion()
    {
        $newestPromotion = Promotion::where('status', Promotion::PUBLISH)->orderBy('updated_at', 'desc')->get();
//        dd($newestPromotion);
        $data =
            [
                'promotions' => $newestPromotion,
                'categories' => Category::all(),
                'statusPromotions' => StatusPromotion::all(),
            ];
        if (count($data['promotions']) == 0) {
            $message = trans('message.search_empty');
            $data =[
                'message' => $message,
                'categories' => Category::all(),
            ];
            return view('web.home.search', $data);
        }
        return view('web.home.category', $data);
    }

    public function listDiscountPromotion()
    {
        $discountPromotion = Promotion::where(function ($query){
            $query->where('category_promotion_id', 1)->where('discount', '<>', null)->orderBy('discount', 'desc')
                ->orderby('finished_at', 'asc')->limit(5);
        })->orWhere(function ($query){
            $query->where('category_promotion_id', 2)->where('discount', '<>', null)->orderBy('discount', 'desc')
                ->orderby('finished_at', 'asc')->limit(5);
        })->orWhere(function ($query){
                $query->where('category_promotion_id', 3)->where('discount', '<>', null)->orderBy('discount', 'desc')
                    ->orderby('finished_at', 'asc')->limit(5);
        })->get();
//        dd($discountPromotion);
        $data =
            [
                'promotions' => $discountPromotion,
                'categories' => Category::all(),
                'statusPromotions' => StatusPromotion::all(),
            ];
        if (count($data['promotions']) == 0) {
            $message = trans('message.search_empty');
            $data =[
                'message' => $message,
                'categories' => Category::all(),
            ];
            return view('web.home.search', $data);
        }
        return view('web.home.category', $data);
    }

    public function listAllPromotion()
    {
        $data =
            [
                'promotions' => Promotion::all(),
                'categories' => Category::all(),
                'statusPromotions' => StatusPromotion::all(),
            ];
        if (count($data['promotions']) == 0) {
            $message = trans('message.search_empty');
            $data =[
                'message' => $message,
                'categories' => Category::all(),
            ];
            return view('web.home.search', $data);
        }
        return view('web.home.category', $data);
    }
}
