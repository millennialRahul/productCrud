<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = request()->trash ? Product::onlyTrashed()->orderBy('created_at', 'desc')->get() :
        Product::orderBy('created_at', 'desc')->get();
        
        return DataTables::of($products)
            ->editColumn('date', function ($product) {
                return Carbon::parse($product->created_at)->format('d/m/Y');
            })
            ->addColumn('name', function ($product) {
                return $product->name;
            })
            // ->addColumn('email', function ($supplier) {
            //     return optional($supplier->user)->email;
            // })
            ->addColumn('price', function ($product) {
                return $product->price;
            })
            // added by rahul
            ->addColumn('quantity', function ($product) {
                return $product->quantity;
            })
            ->addColumn('category', function ($product) {
                return $product->category;
            })
            ->addColumn('action', function ($product) {
                return !request()->trash ? '<a href="' . route('admin.product.edit', $product->id) .  '" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon 
                            m-btn--icon-only m-btn--pill"  title="Edit Page" 
                            data-id="' . $product->id . '">
                            <i class="la la-edit"></i>
                            </a>
                            <a href="javascript:;" class="m-portlet__nav-link btn m-btn m-btn--hover-brand
                            m-btn--icon m-btn--icon-only m-btn--pill delete-btn" title="Delete"
                            data-id="' . $product->id . '">
                            <i class="la la-trash"></i>
                            </a>' :
                            '<a href="javascript:;" class="m-portlet__nav-link btn m-btn m-btn--hover-brand
                            m-btn--icon m-btn--icon-only m-btn--pill restore-btn" title="Restore"
                            data-id="' . $product->id . '">
                            <i class="la la-reply"></i>
                            </a>
                            <a href="javascript:;" class="m-portlet__nav-link btn m-btn m-btn--hover-brand
                            m-btn--icon m-btn--icon-only m-btn--pill destroy-btn" title="Delete"
                            data-id="' . $product->id . '">
                            <i class="la la-trash"></i>
                            </a>';
            })
            ->rawColumns(['contact','action'])
            ->make('true');
    }

    public function dashboard()
    {
       return view('dashboard.admin.index');
    }

    public function products()
    {
       return view('dashboard.admin.product.index');
    }
  
    public function create()
    {
        return view('dashboard.admin.product.add');
    }
    public function save()
    {
         $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'category' => 'required',
        ]);
        if($validator->fails()){
            $errs = $this->getErrorKeys($validator->errors()->toArray());
            $message = count($validator->errors()->toArray()) > 1 ? "The ".$errs." fields are required!" : "The ".$errs." field is required!";
            return response([
                'status' => false,
                'message' => $message
            ]);
        }

        try {
            if(request()->image){
                $imageName = time().'.'.request()->image->extension();  
                request()->image->move(public_path('images'), $imageName);
                request()->image = 'images/'.$imageName;
            }
            Product::create(request()->except(['_token']));
            return response([
                'status' => true,
                'message' => "Product Added!"
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
    public function edit(Product $product)
    {
        return view('dashboard.admin.product.edit',compact('product'));
    }
    public function update(Product $product)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'category' => 'required',
        ]);
        if($validator->fails()){
            $errs = $this->getErrorKeys($validator->errors()->toArray());
            $message = count($validator->errors()->toArray()) > 1 ? "The ".$errs." fields are required!" : "The ".$errs." field is required!";
            return response([
                'status' => false,
                'message' => $message
            ]);
        }
        try {
            $product->update(request()->except(['_token']));
            return response([
                'status' => true,
                'message' => "Product Updated!"
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function delete()
    {
        try {
            Product::withTrashed()->where('id', request()->id)->delete();
            return response([
                'status' => true,
                'message' => "Product Trashed!"
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
    public function restore()
    {
        try {
            Product::withTrashed()->where('id', request()->id)->restore();
            return response([
                'status' => true,
                'message' => "Product Restored!"
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
    public function destroy()
    {
        try {
            Product::withTrashed()->where('id', request()->id)->forceDelete();
            return response([
                'status' => true,
                'message' => "Product Deleted!"
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }

    }

    function getErrorKeys($array) {
        if (!is_array($array)) {
            return ""; // Return an empty string for non-array inputs
        }
    
        return implode(', ', array_keys($array));
    }

}
