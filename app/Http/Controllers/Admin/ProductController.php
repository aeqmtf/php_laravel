<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ProductCategory;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Images;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.products.index');
    }

    public function data()
    {
        $products = Product::select(['id','name','price', 'stock', 'product_category_id', 'updated_at']);

        return DataTables::of($products->get())
        ->editColumn('product_category_id', function($product){
            $category = $product->category()->first();

            if ($category)
            {
                return $category->name;
            }
            return '';
        })
        ->addColumn('actions',function($product) {
            $actions = '<a href='. route('products.show', $product->id) .' title="view category"><i data-feather="eye"></i></a>
                        <a href='. route('products.edit', $product->id) .' title="update category"><i data-feather="edit"></i></a>
                        <a href="javascript:;" class="delete link-danger" data-id="'.$product->id.'" title="delete category"><i data-feather="trash-2"></i></a>';
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
        $categories = ProductCategory::select(['id', 'name'])->get();
        return view('backend/products/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->except(['_token']);

        $images = $this->_upload($request);
        $imgIds = [];
        if ($images)
        {
            foreach ($images as $image)
            {
                $i = Images::create($image);
                $imgIds[] = $i->id;
            }
        }

        $product = Product::create($data);
        if ($imgIds)
        {
            $product->images()->attach($imgIds);
        }

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function _upload(Request $request)
    {
        $data = [];
        if ($request->hasFile('image1'))
        {
            $path = $request->file('image1')->store('uploads');
            $data['image1']['name'] = '';
            $data['image1']['url'] = $path;
        }

        if ($request->hasFile('image2'))
        {
            $path = $request->file('image2')->store('uploads');
            $data['image2']['name'] = '';
            $data['image2']['url'] = $path;
        }

        if ($request->hasFile('image3'))
        {
            $path = $request->file('image3')->store('uploads');
            $data['image3']['name'] = '';
            $data['image3']['url'] = $path;
        }

        return $data;

    }
}