<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\PurchaseOrderDetail;
use Illuminate\Http\Request;

/**
 * Class PurchaseOrderDetailController
 * @package App\Http\Controllers
 */
class PurchaseOrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchaseOrderDetails = PurchaseOrderDetail::paginate();

        return view('purchase-order-detail.index', compact('purchaseOrderDetails'))
            ->with('i', (request()->input('page', 1) - 1) * $purchaseOrderDetails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purchaseOrderDetail = new PurchaseOrderDetail();
        return view('purchase-order-detail.create', compact('purchaseOrderDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PurchaseOrderDetail::$rules);

        $purchaseOrderDetail = PurchaseOrderDetail::create($request->all());

        return redirect()->route('purchase-order-details.index')
            ->with('success', 'PurchaseOrderDetail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchaseOrderDetail = PurchaseOrderDetail::find($id);

        return view('purchase-order-detail.show', compact('purchaseOrderDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchaseOrderDetail = PurchaseOrderDetail::find($id);

        return view('purchase-order-detail.edit', compact('purchaseOrderDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\admin\PurchaseOrderDetail $purchaseOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrderDetail $purchaseOrderDetail)
    {
        request()->validate(PurchaseOrderDetail::$rules);

        $purchaseOrderDetail->update($request->all());

        return redirect()->route('purchase-order-details.index')
            ->with('success', 'PurchaseOrderDetail updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $purchaseOrderDetail = PurchaseOrderDetail::find($id)->delete();

        return redirect()->route('purchase-order-details.index')
            ->with('success', 'PurchaseOrderDetail deleted successfully');
    }
}
