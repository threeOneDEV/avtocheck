<?php

namespace App\Http\Controllers;

use App\Services\MaxNotificationService;
use Illuminate\Http\Request;

class MaxController extends Controller
{
    public function handle(Request $request, MaxNotificationService $service)
    {
        $update = $request->all();

        if (($update['update_type'] ?? null) === 'bot_started') {
            $userId = $update['user_id'] ?? $update['user']['user_id'] ?? null;

            if ($userId) {
                $service->sendStartMessage((int) $userId);
            }
        }

        return response()->json(['ok' => true]); // Webhook ждёт HTTP 200
    }
}
