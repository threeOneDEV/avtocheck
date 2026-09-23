<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MaxNotificationService
{
    protected string $apiUrl = 'https://platform-api2.max.ru/messages';
    protected string $token;
    protected array $userIds;

    public function __construct()
    {
        $this->token = config('services.max.token');
        $this->userIds = config('services.max.user_ids');
    }

    public function sendInspectionNotification(array $data): void
    {
        foreach ($this->userIds as $userId) {
            $this->sendMessage($data, $userId);
        }
    }

    private function sendMessage($data, $userId)
    {
        try {
            $response = Http::withOptions([
                'query' => ['user_id' => $userId],
            ])
            ->withHeaders([
                'Authorization' => $this->token,
                'Content-Type' => 'application/json',
            ])
            ->post($this->apiUrl, [
                'text' => $this->buildMessage($data),
                'format' => 'html',
            ]);

            if ($response->successful()) {
                Log::info('Уведомление MAX отправлено успешно', ['user_id' => $userId]);
            }

            Log::error('Ошибка отправки уведомления MAX', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
        } catch (\Exception $e) {
            Log::error('Исключение при отправке уведомления MAX', [
                'message' => $e->getMessage(),
            ]);
        }
    }

    protected function buildMessage(array $data): string
    {
        return sprintf(
            "🔧 <b>Новая запись на техосмотр</b>\n\n" .
            "👤 <b>Клиент:</b> %s\n" .
            "🚗 <b>Автомобиль:</b> %s\n" .
            "📅 <b>Дата и время:</b> %s\n" .
            "📞 <b>Телефон:</b> %s\n",
            $data['name'] ?? 'Не указано',
            $data['car'] ?? 'Не указано',
            Carbon::parse($data['datetime'])->format('d/m/Y H:i') ?? 'Не указано',
            $data['phone'] ?? 'Не указано'
        );
    }
}