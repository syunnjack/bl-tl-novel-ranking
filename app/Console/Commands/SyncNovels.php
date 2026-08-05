<?php

namespace App\Console\Commands;

use App\Models\NovelItem;
use App\Services\ContentSafetyFilter;
use App\Services\DmmClient;
use Illuminate\Console\Command;

class SyncNovels extends Command
{
    protected $signature = 'novels:sync {--pages=2}';

    protected $description = 'Fetch BL and TL novels ranked by review score/count from FANZA and store them';

    private const FLOORS = [
        'bl' => 'BL',
        'tl' => 'TL',
    ];

    public function handle(DmmClient $client): int
    {
        $pages = (int) $this->option('pages');
        $seen = [];

        foreach (self::FLOORS as $floor => $category) {
            for ($page = 0; $page < $pages; $page++) {
                $offset = $page * 100 + 1;
                $items = $client->fetchItems(offset: $offset, hits: 100, floor: $floor);

                if (empty($items)) {
                    break;
                }

                foreach ($items as $item) {
                    $contentId = $item['content_id'] ?? $item['product_id'] ?? null;
                    $reviewCount = (int) ($item['review']['count'] ?? 0);

                    if (! $contentId || $reviewCount < 3) {
                        continue;
                    }

                    $title = $item['title'] ?? '';
                    $genre = $item['iteminfo']['genre'][0]['name'] ?? '';

                    if (! ContentSafetyFilter::isSafe($title, $genre)) {
                        continue;
                    }

                    $key = $floor . ':' . $contentId;
                    $seen[] = $key;

                    NovelItem::updateOrCreate(
                        ['content_id' => $key],
                        [
                            'category' => $category,
                            'title' => $title,
                            'author' => $item['iteminfo']['author'][0]['name'] ?? null,
                            'image_url' => $item['imageURL']['large'] ?? ($item['imageURL']['small'] ?? null),
                            'url' => $item['URL'] ?? ($item['affiliateURL'] ?? ''),
                            'affiliate_url' => $item['affiliateURL'] ?? ($item['URL'] ?? ''),
                            'price' => isset($item['prices']['price']) ? (int) preg_replace('/[^0-9]/', '', (string) $item['prices']['price']) : null,
                            'review_average' => $item['review']['average'] ?? null,
                            'review_count' => $reviewCount,
                        ]
                    );
                }
            }
        }

        if (! empty($seen)) {
            NovelItem::whereNotIn('content_id', $seen)->delete();
        }

        $this->info('Synced ' . count($seen) . ' BL/TL novel items.');

        return self::SUCCESS;
    }
}
