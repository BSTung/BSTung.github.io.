<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Order;
use App\Mail\TransactionSuccess;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ShoppingCartController extends Controller
{
	public function index(){
		$shopping = \Cart::content();
        $viewData = [
            'title_page'  => 'Danh sách giỏ hàng',
            'shopping'    => $shopping
        ];
		return view('frontend.pages.shopping.index', $viewData);
	}

	//them gio hang
    public function add($id){
    	$product = Product::find($id);

        //1.kiểm tra tồn tại giỏ hàng
 		if (!$product) return redirect()->to('/');

        //2.kiểm tra số lượng sản phẩm
        if ($product->pro_number < 1) {
            //4.thông báo
            \Session::flash('toastr', [
                'type'  => 'error',
                'message'   => 'Số lượng sản phẩm không đủ'
                ]);

        return redirect()->back();
    
        }

        //3.Thêm sản phẩm vào giỏ hàng
    	\Cart::add([
    		'id'	 => $product->id,
    		'name'	 => $product->pro_name,
    		'qty'	 => 1,
    		'price'	 => number_price($product->pro_price, $product->pro_sale),
    		'weight' => '1',
    		'options'	=> [
    			'sale'	=> $product->pro_sale,
    			'price_old' => $product->pro_price,
    			'image'	=> $product->pro_avatar

    		]
    	]);
        //4.thông báo
            \Session::flash('toastr', [
                'type'  => 'success',
                'message'   => 'Thêm giỏ hàng thành công'
                ]);

    	return redirect()->back();
    }

    public function postPay(Request $request)
    {
        $data = $request->except("_token");
        if (isset(\Auth::user()->id)) {
            $data['tst_user_id'] = \Auth::user()->id;
        }
        $data['tst_total_money'] = str_replace(',','', \Cart::subtotal(0));
        $data['created_at'] = Carbon::now();
        $transactionID = Transaction::insertGetId($data);
        if ($transactionID) {

            $shopping = \Cart::content();
            Mail::to($request->tst_email)->send(new TransactionSuccess($shopping));
            foreach ($shopping as $key => $item) {

                // lưu chi tiết đơn hàng
                Order::insert([
                    'od_transaction_id' => $transactionID,
                    'od_product_id'     => $item->id,
                    'od_sale'           => $item->options->sale,
                    'od_qty'            => $item->qty,
                    'od_price'          => $item->price
                ]);

                // tăng PAY (số lượt mua của sản phẩm đó)
                \DB::table('products')
                    ->where('id', $item->id)
                    ->increment("pro_pay");
            }
        }

        \Session::flash('toastr', [
            'type'  => 'success',
            'message'   => 'Đơn hàng của bạn đã được lưu'
            ]);

        \Cart::destroy();
        return redirect()->to('/');
    }

    public function update(Request $request, $id) {
        if ($request->ajax()) {
            
            //1.lấy tham số
            $qty = $request->qty ?? 1;
            $idProduct = $request->idProduct;
            $product = Product::find($idProduct);

            //2.kiểm tra tồn tại sản phẩm
            if (!$product) return response(['messages' => 'Không tồn tại sản phẩm cần update']);

            //3.kiểm tra số lượng sản phẩm có còn hay không
            if ($product->pro_number < $qty) {
                return response([
                    'messages' => 'Số lượng cập nhật không đủ',
                    'error'    => true
                ]);
            }

            //4.Update
            \Cart::update($id, $qty);
            return response([
                'messages' => 'Cập nhật thành công',
                'totalMoney'    => \Cart::subtotal(0),
                'totalItem'  => number_format(number_price($product->pro_price, $product->pro_sale) * $qty, 0, ',', '.')
            ]);
        }
    }


    // xóa sản phẩm đơn hàng
    public function delete(Request $request, $rowId)
    {
        if ($request->ajax())
        {
            \Cart::remove($rowId);
            return response([
                'totalMoney' => \Cart::subtotal(0),
                'type'       => 'success',
                'message'    => 'Xoá sản phẩm khỏi đơn hàng thành công'
            ]);
        }
    }
}
