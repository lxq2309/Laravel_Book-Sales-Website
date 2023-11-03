<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\SalesOrder;
use Illuminate\Http\Request;

/**
 * Class SalesOrderController
 * @package App\Http\Controllers
 */
class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesOrders = SalesOrder::paginate();

        return view('sales-order.index', compact('salesOrders'))
            ->with('i', (request()->input('page', 1) - 1) * $salesOrders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salesOrder = new SalesOrder();
        return view('sales-order.create', compact('salesOrder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SalesOrder::$rules);

        $salesOrder = SalesOrder::create($request->all());

        return redirect()->route('sales-orders.index')
            ->with('success', 'SalesOrder created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salesOrder = SalesOrder::find($id);

        return view('sales-order.show', compact('salesOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salesOrder = SalesOrder::find($id);

        return view('sales-order.edit', compact('salesOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SalesOrder $salesOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesOrder $salesOrder)
    {
        request()->validate(SalesOrder::$rules);

        $salesOrder->update($request->all());

        return redirect()->route('sales-orders.index')
            ->with('success', 'SalesOrder updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $salesOrder = SalesOrder::find($id)->delete();

        return redirect()->route('sales-orders.index')
            ->with('success', 'SalesOrder deleted successfully');
    }
}
