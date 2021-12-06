<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Requests\Admin\CategoryRequest;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.categories.index');
    }

    public function data()
    {
        $categories = ProductCategory::select(['id','name','created_at','updated_at']);

        return DataTables::of($categories->get())
        ->addColumn('actions',function($category) {
            $actions = '<a href='. route('categories.show', $category->id) .' title="view category"><i data-feather="eye"></i></a>
                        <a href='. route('categories.edit', $category->id) .' title="update category"><i data-feather="edit"></i></a>
                        <a href="javascript:;" class="delete link-danger" data-id="'.$category->id.'" title="delete category"><i data-feather="trash-2"></i></a>';
            return $actions;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $name = $request->input('name');

        ProductCategory::create(['name' => $name]);

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return __FUNCTION__;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ProductCategory::find($id);
        if ($category)
        {
            return view('backend.categories.edit', compact('category'));
        }

        return redirect(route('categories.index'))
        ->with('msg', 'Cannot find the category');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = ProductCategory::find($id);
        if ($category)
        {
            $category->name = $request->input('name');
            $category->save();
        }

        return redirect(route('categories.index'))
        ->with('msg', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCategory::destroy($id);

        return redirect(route('categories.index'))
        ->with('msg', 'Delete successful!');
    }
}