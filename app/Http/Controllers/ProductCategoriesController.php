<?php

namespace App\Http\Controllers;

use App\Product_Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Product_Categories::all();
        return view ('categories.categories',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ct = new Product_Categories;
        $ct->category_name = $request->category_name;
        $ct->save();
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product_Categories  $product_Categories
     * @return \Illuminate\Http\Response
     */
    public function show(Product_Categories $product_Categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product_Categories  $product_Categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataCategory = Product_Categories::find($id);
        return view('categories.editcategories',compact('dataCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product_Categories  $product_Categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => ['required', 'max:30']
        ]);
        $category = new Product_Categories();
        $category = Product_Categories::find($id);
        $category->category_name= $request->category_name;
        $category->save();
        return redirect('/categories');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product_Categories  $product_Categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Product_Categories::find($id);
        $product_cat_det = DB::table('product_category_details')->where('product_id','=',$cat->id)->get();
        if($product_cat_det->isEmpty()){
            DB::delete('delete from product_category_details where product_id = ?', [$cat->id]);
        }
        $cat->delete();

        return redirect('/categories');
    }
    public function trash()
{
    	// mengambil data yang sudah dihapus
    	$cat = Product_Categories::onlyTrashed()->get();
    	return view('categories_trash',compact('cat'));
        // dd($cat);
}

    public function restore($id)
{
    	$cat = Product_Categories::onlyTrashed()->where('id',$id);
    	$cat->restore();
    	return redirect('/categories/bin/trash');
}   
public function delete_permanen($id)
{
    	$cat = Product_Categories::onlyTrashed()->where('id',$id);
    	$cat->forceDelete();
 
    	return redirect('/categories/bin/trash');
}
}


