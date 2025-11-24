<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Jobs\ImportProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Process;

class ProductController extends Controller
{

    public function import(Request $req)
    {
        if($req->isMethod('post'))
        {
            $validated = $req->validate([
                'file' => 'required|mimes:csv'
            ]);
            $file = $req->file('file');
            $path =  'uploads/'.Auth::id()."/csv/".$file->getClientOriginalName();
            Storage::disk('local')->put($path, file_get_contents($file));
            $fx = Storage::disk('local')->get($path);
            $abs_path = str_replace("\\","/",storage_path()."/app/private/".$path);
            ImportProduct::dispatch($abs_path);
            return response()->json("file uploaded",200);
        }
        return view('product.import');
    }
    public function view(Request $req)
    {
        if($req->isMethod('post'))
        {
        }
        return view('product.view');
    }
    public function product(Request $req, int $id)
    {
        if($req->isMethod('post'))
        {}
        $product = Product::where('id',$id)->first();
        return view('product.product')->with("data",$product);
    }
    public function product_list(Request $req)
    {
        if($req->isMethod('post'))
        {}
        $product = Product::paginate(30);
        return response()->json($product);
    }
}
