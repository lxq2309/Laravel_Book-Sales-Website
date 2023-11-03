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

        return view('coupon.index', compact('coupons'))
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
        return view('coupon.create', compact('coupon'));
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

        return redirect()->route('coupons.index')
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

        return view('coupon.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);

        return view('coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        request()->validate(Coupon::$rules);

        $coupon->update($request->all());

        return redirect()->route('coupons.index')
            ->with('success', 'Coupon updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $coupon = Coupon::find($id)->delete();

        return redirect()->route('coupons.index')
            ->with('success', 'Coupon deleted successfully');
    }
}
