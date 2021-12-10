<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Stock;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', [
            'except' => ['delete_goods', 'delete_stock']
        ]);
    }

    public function create_goods(Request $request){
        $goods = [
                'name' => $request->input('name'),
                'type' => $request->input('type'),
                'storage' => $request->input('storage'),
                'price' => $request->input('price'),
                'remain' => $request->input('remain'),
        ];
        $goods_create = Goods::create($goods);
        return "success";
    }

    public function create_stock(Request $request){ 
        $stock = [
                'goods_id' => $request->input('goods_id'),
                'code' => $request->input('code'),
                'amount' => $request->input('amount'),
                'total_price' => $request->input('total_price'),
                'stock_type' => $request->input('stock_type'),
                'input' => $request->input('input'),
                'responsible' => $request->input('responsible'),
                'office' => $request->input('office'),
                'delivery_route' => $request->input('delivery_route'),
                'seller' => $request->input('seller'),
                'customer' => $request->input('customer'),
        ];
        $stock_create = Stock::create($stock);
        return "success";
    }

    public function update_remain_form_stock(Request $request, $id){
        $goods = Goods::findOrfail($id);
        $goods->remain = $request->input('remain');
        $goods->save();
    }

    public function all_goods(){
        $goods = DB::table('goods')
                ->get();
        return response()->json($goods);
    }

    public function all_stock_in(){
        $stocks = Stock::with('goods')
                ->where('stock_type', '!=', 'stock-out')
                ->get();
        return response()->json($stocks);
    }

    public function all_stock_out(){
        $stocks = Stock::with('goods')
                ->where('stock_type', '!=', 'stock-in')
                ->get();
        return response()->json($stocks);
    }

    public function update_name(Request $request, $id){
        $goods = Goods::findOrfail($id);
        $goods->name = $request->input('name');
        $goods->save();
    }

    public function update_type(Request $request, $id){
        $goods = Goods::findOrfail($id);
        $goods->type = $request->input('type');
        $goods->save();
    }

    public function update_storage(Request $request, $id){
        $goods = Goods::findOrFail($id);
        $goods->storage = $request->input('storage');
        $goods->save();
        
        return "update success";
    }

    public function update_price(Request $request, $id){
        $goods = Goods::findOrFail($id);
        $goods->price = $request->input('price');
        $goods->save();
        
        return "update success";
    }

    public function update_remain(Request $request, $id){
        $goods = Goods::findOrFail($id);
        $goods->remain = $request->input('remain');
        $goods->save();
        
        return "update success";
    }

    public function update_code(Request $request, $id){
        $stock = Stock::findOrFail($id);
        $stock->code = $request->input('code');
        $stock->save();
        
        return "update success";
    }

    public function update_amount(Request $request, $id){
        $stock = Stock::findOrFail($id);
        $stock->amount = $request->input('amount');
        $stock->save();
        
        return "update success";
    }

    public function update_total_price(Request $request, $id){
        $stock = Stock::findOrFail($id);
        $stock->total_price = $request->input('total_price');
        $stock->save();
        
        return "update success";
    }

    public function delete_goods($id){
        $goods = Goods::findOrFail($id);
        // $goods = Goods::where('id', $id)->firstorfail()->delete();
        // DB::delete('DELETE FROM goods WHERE id = ?', [$id]);
        $goods->delete();
        
        return "remove success";
    }
    public function delete_stock($id){
        $stock = Stock::findOrFail($id);
        $stock->delete();
        
        return "remove success";
    }
}
