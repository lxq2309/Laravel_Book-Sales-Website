<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\SalesOrderDetail;
use Illuminate\Http\Request;

/**
 * Class SalesOrderDetailController
 * @package App\Http\Controllers
 */
class SalesOrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesOrderDetails = SalesOrderDetail::paginate();

        return view('sales-order-detail.index', compact('salesOrderDetails'))
            ->with('i', (request()->input('page', 1) - 1) * $salesOrderDetails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salesOrderDetail = new SalesOrderDetail();
        return view('sales-order-detail.create', compact('salesOrderDetail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SalesOrderDetail::$rules);

        $salesOrderDetail = SalesOrderDetail::create($request->all());

        return redirect()->route('sales-order-details.index')
            ->with('success', 'SalesOrderDetail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salesOrderDetail = SalesOrderDetail::find($id);

        return view('sales-order-detail.show', compact('salesOrderDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salesOrderDetail = SalesOrderDetail::find($id);

        return view('sales-order-detail.edit', compact('salesOrderDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\admin\SalesOrderDetail $salesOrderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesOrderDetail $salesOrderDetail)
    {
        request()->validate(SalesOrderDetail::$rules);

        $salesOrderDetail->update($request->all());

        return redirect()->route('sales-order-details.index')
            ->with('success', 'SalesOrderDetail updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $salesOrderDetail = SalesOrderDetail::find($id)->delete();

        return redirect()->route('sales-order-details.index')
            ->with('success', 'SalesOrderDetail deleted successfully');
    }
}
