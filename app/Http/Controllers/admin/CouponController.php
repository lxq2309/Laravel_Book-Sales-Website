<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Coupon;
use Illuminate\Http\Request;

/**
 * Class CouponController
 * @package App\Http\Controllers
 */
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::paginate();

        return view('admin.coupon.index', compact('coupons'))
            ->with('i', (request()->input('page', 1) - 1) * $coupons->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coupon = new Coupon();
        return view('admin.coupon.create', compact('coupon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Coupon::$rules);

        $coupon = Coupon::create($request->all());

        return redirect()->route('coupon.index')
            ->with('success', 'Coupon created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = Coupon::find($id);

        return view('admin.coupon.show', compact('coupon'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $coupon = Coupon::find($id)->delete();

        return redirect()->route('coupon.index')
            ->with('success', 'Coupon deleted successfully');
    }

    function getAll(){
        return response()->json(Coupon::all());
    }
}
