<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\PurchaseOrder;
use App\Models\admin\PurchaseOrderDetail;
use App\Models\admin\Supplier;
use App\Models\Book;
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

        return view('admin.purchase-order.index', compact('purchaseOrders'))
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
        $suppliers = Supplier::all();
        return view('admin.purchase-order.create', compact('purchaseOrder', 'suppliers'));
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

        // Tạo hoá đơn nhập
        $purchaseOrder = new PurchaseOrder();
        $purchaseOrder->OrderDate = $request->input('OrderDate');
        $purchaseOrder->SupplierID = $request->input('SupplierID');
        $purchaseOrder->save();
        $totalPrice = 0;

        // Lấy dữ liệu chi tiết sách từ form
        $bookIDs = $request->input('BookID');
        $quantities = $request->input('QuantityReceived');
        $prices = $request->input('Price');

        // Lưu chi tiết hoá đơn nhập
        foreach ($bookIDs as $key => $bookID) {
            $purchaseOrderDetail = new PurchaseOrderDetail();
            $purchaseOrderDetail->OrderID = $purchaseOrder->OrderID;
            $purchaseOrderDetail->BookID = $bookID;
            $purchaseOrderDetail->QuantityReceived = $quantities[$key];
            $purchaseOrderDetail->Price = $prices[$key];
            $subTotal = $quantities[$key] * $prices[$key];
            $purchaseOrderDetail->SubTotal = $subTotal;
            $purchaseOrderDetail->save();

            $totalPrice += $subTotal;
        }

        $purchaseOrder->TotalPrice = $totalPrice;
        $purchaseOrder->save();

        return redirect()->route('purchase-order.index')
            ->with('success', 'Tạo hoá đơn nhập thành công!');
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
        $purchaseOrderDetails = $purchaseOrder->purchaseorderdetail;

        return view('admin.purchase-order.show', compact('purchaseOrder', 'purchaseOrderDetails'));
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

        return view('admin.purchase-order.edit', compact('purchaseOrder'));
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

        return redirect()->route('purchase-order.index')
            ->with('success', 'PurchaseOrder deleted successfully');
    }
}
