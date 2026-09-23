<?php

namespace App\Http\Controllers;

use App\Jobs\SendInspectionNotification;
use App\Models\Order;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        return view('order.create');
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'phone'    => ['required', 'string', 'max:30'],
            'car'      => ['required', 'string', 'max:255'],
            'datetime' => ['required', 'date'],
        ]);

        try{
            Order::create($data);

            SendInspectionNotification::dispatch($data);
        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()]);
        }

        return response()->json(['message' => 'Заявка отправлена']);
    }
}
