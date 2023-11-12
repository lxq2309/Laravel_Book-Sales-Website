<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Admin;
use App\Models\admin\Bookset;
use Illuminate\Http\Request;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins = Admin::query();
        if ($request->has('search'))
        {
            $searchText = $request->input('search');
            $admins->where('Email', 'LIKE', "%$searchText%");
        }
        $orderBy = ($request->has('order') && $request->input('order') == 'asc') ? 'desc' : 'asc';
        if (empty($request->input('order')))
        {
            $orderBy = 'desc';
        }
        $admins->orderBy('AdminID', $orderBy);
        $orderBy = ($request->has('order') && $request->input('order') == 'asc') ? 'desc' : 'asc';
        $admins = $admins->paginate()->appends(['order' => $orderBy]);
        return view('admin.admin.index', compact('admins'))
            ->with('i', ($admins->currentPage() - 1) * $admins->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = new Admin();
        return view('admin.admin.create', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Admin::$rules);

        $admin = Admin::create($request->all());

        return redirect()->route('admin.index')
            ->with('success', 'Tạo tài khoản mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);

        return view('admin.admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);

        return view('admin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\admin\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        request()->validate(Admin::$rules);

        $admin->update($request->all());

        return redirect()->route('admin.index')
            ->with('success', 'Cập nhật thông tin tài khoản thành công!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $admin = Admin::find($id)->delete();

        return redirect()->route('admin.index')
            ->with('success', 'Xoá tài khoản thành công!');
    }

    function getAll(){
        return response()->json(Admin::all());
    }
}
