<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class VkApiService

{
    private static float $versionApi = 5.199;
    private static array $headers = [
        'Authorization' => 'Bearer 18fca5c118fca5c118fca5c1c71bd60ef3118fc18fca5c17f47bd991c6f99281921e80c',
        'Accept' => 'application/json',
        'Content-Type' => 'multipart/form-data',
    ];
    public static function wallGet(int $owner_id, int $count)
    {
        $method = 'method/wall.get';
        $params = http_build_query([
            'owner_id' => -abs($owner_id),
            'v' => self::$versionApi,
            'count' => $count,
            'filter' => 'owner',
        ]);

        $response = Http::withHeaders(self::$headers)
            ->get("https://api.vk.com/{$method}?{$params}");

        return $response->json(['response', 'items', 0, 'text']);
    }
}
