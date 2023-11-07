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

        return view('admin.sales-order.index', compact('salesOrders'))
            ->with('i', (request()->input('page', 1) - 1) * $salesOrders->perPage());
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
        $salesOrderDetails = $salesOrder->salesorderdetail;

        return view('admin.sales-order.show', compact('salesOrder', 'salesOrderDetails'));
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
