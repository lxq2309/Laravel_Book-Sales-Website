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
    public function index(Request $request)
    {
        $salesOrders = SalesOrder::query();
        if ($request->has('search'))
        {
            $searchText = $request->input('search');
            $salesOrders->where('OrderID', '=', $searchText);
        }
        $orderBy = ($request->has('order') && $request->input('order') == 'asc') ? 'desc' : 'asc';
        if (empty($request->input('order')))
        {
            $orderBy = 'desc';
        }
        if ($request->has('status')) {
            $status = $request->input('status');
            $orderStatus = "";
            switch ($status){
                case 2:
                    $orderStatus = "COMPLETED";
                    break;
                case 3:
                    $orderStatus = "SHIPPING";
                    break;
                case 4:
                    $orderStatus = "PENDING";
                    break;
                default:
                    break;
            }
            if (!empty($orderStatus))
            {
                $salesOrders->where('OrderStatus', $orderStatus);
            }
        }
        else {
            $status = 1;
        }
        $salesOrders->orderBy('OrderID', $orderBy);
        $orderBy = ($request->has('order') && $request->input('order') == 'asc') ? 'desc' : 'asc';
        $salesOrders = $salesOrders->paginate()->appends(['order' => $orderBy, 'status' => $status]);
        return view('admin.sales-order.index', compact('salesOrders'))
            ->with('i', ($salesOrders->currentPage() - 1) * $salesOrders->perPage());
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

        return redirect()->route('sales-order.index')
            ->with('success', 'SalesOrder deleted successfully');
    }

    function getAll(){
        return response()->json(SalesOrder::all());
    }

    function shipping($id, $page = 1)
    {
        $salesOrder = SalesOrder::find($id);
        $salesOrder->OrderStatus = 'SHIPPING';
        $salesOrder->save();
        return redirect()->route('sales-order.index', ['status' => 4, 'page' => $page])
            ->with('success', "Đơn hàng số $id đã được duyệt thành công và đang trong quá trình vận chuyển!");
    }
    function completed($id, $page = 1)
    {
        $salesOrder = SalesOrder::find($id);
        $salesOrder->OrderStatus = 'COMPLETED';
        $salesOrder->save();
        return redirect()->route('sales-order.index', ['status' => 3, 'page' => $page])
            ->with('success', "Đơn hàng số $id đã hoàn thành!");
    }
}
