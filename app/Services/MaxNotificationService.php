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
            $this->sendNotifyMessage($data, $userId);
        }
    }

    public function sendStartMessage(int $userId): void
    {
        $this->sendPayload($userId, [
            'text'   => "🔧 <b>Добро пожаловать!</b>\n\n"
                . "Нажмите на кнопку <b>«Открыть»</b>, чтобы записаться на техосмотр.",
            'format' => 'html',
        ]);
    }

    private function sendNotifyMessage(array $data, int $userId): void
    {
        $this->sendPayload($userId, [
            'text'   => $this->buildMessage($data),
            'format' => 'html',
        ]);
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

    private function sendPayload(string $userId, array $payload): void
    {
        try {
            $response = Http::withOptions(['query' => ['user_id' => $userId]])
                ->withHeaders([
                    'Authorization' => $this->token,
                    'Content-Type'  => 'application/json',
                ])
                ->post($this->apiUrl, $payload);

            if ($response->successful()) {
                Log::info('Уведомление MAX отправлено успешно', ['user_id' => $userId]);
                return;
            }

            Log::error('Ошибка отправки уведомления MAX', [
                'user_id' => $userId,
                'status'  => $response->status(),
                'body'    => $response->body(),
            ]);
        } catch (\Exception $e) {
            Log::error('Исключение при отправке уведомления MAX', [
                'user_id' => $userId,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
