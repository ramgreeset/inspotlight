<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class VkApiService
{
    private static string $token;
    private static string $versionApi;
    private static array $headers = [
        'Authorization' => '',
        'Accept' => 'application/json',
        'Content-Type' => 'multipart/form-data',
    ];

    public static function groupGet( int $user_id){
        self::$token = config('services.vk.token');
        self::$headers['Authorization'] = self::$token;
        self::$versionApi = config('services.vk.version');

        $method = 'method/groups.get';
        $params = http_build_query([
            'user_id' => abs($user_id),
            'v' => self::$versionApi,
            'extended' => 1,
        ]);

        $response = Http::withHeaders(self::$headers)
            ->get("https://api.vk.com/{$method}?{$params}");

        return $response->json(['response', 'items']);

    }

    public static function wallGet(int $owner_id, int $count)
    {
        self::$token = config('services.vk.token');
        self::$headers['Authorization'] = self::$token;
        self::$versionApi = config('services.vk.version');

        $method = 'method/wall.get';
        $params = http_build_query([
            'owner_id' => -abs($owner_id),
            'v' => self::$versionApi,
            'count' => $count,
            'filter' => 'owner',
        ]);

        $response = Http::withHeaders(self::$headers)
            ->get("https://api.vk.com/{$method}?{$params}");

        return $response->json(['response', 'items',]);
    }
}
