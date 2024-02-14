<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityHistory;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Auth;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.manager.categoryProduct.index', [
            'title' => 'Category Product',
            'categoryProducts' => CategoryProduct::paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.manager.categoryProduct.create', [
            'title' => 'Create Category Product',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_product_name' => 'required',
            'description' => 'required',
        ]);

        CategoryProduct::create($data);
        $user = Auth::user();
        $activity = [
            'fullname' => $user->fullname,
            'position' => optional($user->position)->position_name,
            'action' => 'Buat Kategori Produk',
            'description' => 'membuat kategori produk telah Berhasil',
        ];

        ActivityHistory::create($activity);

        return redirect('dashboard/manager/categoryProduct')->with('Success, membuat kategori produk telah Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProduct $categoryProduct)
    {
        return view('dashboard.manager.categoryProduct.edit', [
            'title' => 'Edit Kategori Produk',
            'categoryProduct' => $categoryProduct,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryProduct $categoryProduct)
    {
        $rules = $request->validate([
            'category_product_name' => 'required',
            'description' => 'required',
        ]);

        $categoryProduct->update($rules);

        $user = Auth::user();

        $activity = [
            'fullname' => $user->fullname,
            'position' => optional($user->position)->position_name,
            'action' => 'Update Data Kategori Produk',
            'description' => 'Update Kategori Produk telah Berhasil',
        ];

        ActivityHistory::create($activity);

        return redirect('/dashboard/manager/categoryProduct')->with('success', 'Update Kategori Produk telah Berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryProduct $categoryProduct)
    {
        CategoryProduct::destroy($categoryProduct->id);

        $user = Auth::user();

        $activity = [
            'fullname' => $user->fullname,
            'position' => optional($user->position)->position_name,
            'action' => 'Delete Data Category Product',
            'description' => 'Kategori Produk telah berhasil dihapus',
        ];

        ActivityHistory::create($activity);

        return redirect('/dashboard/manager/categoryProduct')->with('success', 'Kategori Produk telah berhasil dihapus.');
    }
}
