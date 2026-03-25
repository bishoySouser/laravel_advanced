<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateOrderInvoice;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // 1. كود إنشاء الطلب في قاعدة البيانات
        $order = Order::create($request->all());

        // 2. إرسال وظيفة توليد الفاتورة للطابور فوراً
        GenerateOrderInvoice::dispatch($order->id);

        // 3. الرد على المستخدم بسرعة دون انتظاره لتوليد الـ PDF
        return response()->json(['message' => 'Order created! Invoice is being generated.']);
    }
}
