<?php

    namespace App\Http\Controllers;
    use App\Contracts\CurServiceInterface;
    use App\Models\Category;
    use App\Models\Product;
    use App\Repositories\ProductRepository;
    use App\Services\AnotherCurService;
    use App\Services\CurrencyService;
    use Illuminate\Http\Request;

    class CatalogController  extends Controller
    {
        public function __construct()
        {
           // $this->service = $service;

        }

        public function catalog(Request $request){
//            $this->service->getRate();
//            $this->service->hello();
//            $this->service->hello2222();
            $catalogProducts = Product::where('active', 1)
                ->latest()
                ->limit(12)
                ->with('category')
                ->get();

           $categories = Category::withCount('products')->get();
           return view('catalog.store',
               compact('catalogProducts', 'categories')
           );
        }

        public function product(Request $request, $category_id, $product_id){
            $product = Product::where('active', 1)
                ->where('category_id', $category_id)
                ->where('id', $product_id)
                ->firstOrFail();
            return view('catalog.product', ['product' => $product]);
        }



    }