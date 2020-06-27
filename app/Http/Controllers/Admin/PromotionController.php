<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionStore;
use App\Http\Requests\UpdatePromotion;
use App\Promotion;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PromotionController extends Controller
{
    protected $promotionCount = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $promotions = Promotion::SearchByName($request->searchName)->SearchByCategory($request->searchCategory)->SearchByStatus($request->searchStatus)->get();
        $promotions_vendor = Promotion::SearchByName($request->searchName)->SearchByCategory($request->searchCategory)->SearchByStatus($request->searchStatus)->where('vendor_id', Auth::user()->id)->get();
        $data = [
            'promotions' =>  $promotions,
            'promotions_vendor' => $promotions_vendor,
            'categories' => Category::all(),
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
    public function update(UpdatePromotion $request, $id)
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

    public function count(Request $request){
        $promotions = Promotion::SearchByName($request->searchName)->SearchByCategory($request->searchCategory)->SearchByStatus($request->searchStatus)->get();
        $promotions_vendor = Promotion::SearchByName($request->searchName)->SearchByCategory($request->searchCategory)->SearchByStatus($request->searchStatus)->where('vendor_id', Auth::user()->id)->get();
        $promotions = Promotion::all()->toArray();
        $this->promotionCount = [];
        foreach ($promotions as $key => $value) {
            $promotionId = $value['id'];
            $c = DB::table('promotion_user')->where('promotion_id', $promotionId)->count();
//            print_r($c);
//            $this->promotionCount = [
//                'id' => $promotionId,
//                'count' => $c,
//            ];
            $this->promotionCount['id'] = $promotionId;
            $this->promotionCount['count'] = $c;
        }
        print_r($this->promotionCount);
        die;
//        $user = Promotion::findOrFail(1);
//        $countPromotions = $user->customers;
//        dd($countPromotions);
        $data = [
            'promotions' =>  $promotions,
            'promotions_vendor' => $promotions_vendor,
            'categories' => Category::all(),
        ];
        return view('admin.report.report', $data);
    }
}
