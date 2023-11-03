<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\PurchaseOrder;
use Illuminate\Http\Request;

/**
 * Class PurchaseOrderController
 * @package App\Http\Controllers
 */
class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchaseOrders = PurchaseOrder::paginate();

        return view('purchase-order.index', compact('purchaseOrders'))
            ->with('i', (request()->input('page', 1) - 1) * $purchaseOrders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purchaseOrder = new PurchaseOrder();
        return view('purchase-order.create', compact('purchaseOrder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PurchaseOrder::$rules);

        $purchaseOrder = PurchaseOrder::create($request->all());

        return redirect()->route('purchase-orders.index')
            ->with('success', 'PurchaseOrder created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);

        return view('purchase-order.show', compact('purchaseOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);

        return view('purchase-order.edit', compact('purchaseOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\admin\PurchaseOrder $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        request()->validate(PurchaseOrder::$rules);

        $purchaseOrder->update($request->all());

        return redirect()->route('purchase-orders.index')
            ->with('success', 'PurchaseOrder updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $purchaseOrder = PurchaseOrder::find($id)->delete();

        return redirect()->route('purchase-orders.index')
            ->with('success', 'PurchaseOrder deleted successfully');
    }
}
