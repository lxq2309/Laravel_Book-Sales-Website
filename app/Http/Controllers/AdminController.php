<?php

namespace App\Http\Controllers;

use App\Models\admin\Admin;
use App\Models\admin\Book;
use App\Models\admin\Coupon;
use App\Models\admin\Publisher;
use App\Models\admin\PurchaseOrder;
use App\Models\admin\SalesOrder;
use App\Models\admin\Supplier;
use App\Models\admin\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $usersCount = User::all()->count();
        $booksCount = Book::all()->count();
        $suppliersCount = Supplier::all()->count();
        $publishersCount = Publisher::all()->count();
        $adminsCount = Admin::all()->count();
        $purchaseOrdersCount = PurchaseOrder::all()->count();
        $salesOrdersCount = SalesOrder::all()->where('OrderStatus','=','Đã hoàn thành')->count();
        $couponsCount = Coupon::all()->where('IsUsed', '=', false)->where('ExpiryDate', '<', now())->count();
        return view('admin.index', compact('usersCount', 'booksCount', 'suppliersCount', 'publishersCount', 'adminsCount', 'purchaseOrdersCount', 'salesOrdersCount', 'couponsCount'));
    }
}
