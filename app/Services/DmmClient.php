<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DmmClient
{
    public function __construct(
        private readonly ?string $apiId,
        private readonly ?string $affiliateId,
    ) {
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function fetchItems(int $offset = 1, int $hits = 100, string $floor = 'bl'): array
    {
        if (! $this->apiId || ! $this->affiliateId) {
            return [];
        }

        $response = Http::timeout(20)->get('https://api.dmm.com/affiliate/v3/ItemList', [
            'api_id' => $this->apiId,
            'affiliate_id' => $this->affiliateId,
            'site' => 'FANZA',
            'service' => 'ebook',
            'floor' => $floor,
            'hits' => $hits,
            'offset' => $offset,
            'sort' => 'review',
            'output' => 'json',
        ]);

        if (! $response->ok()) {
            return [];
        }

        return $response->json('result.items') ?? [];
    }
}
