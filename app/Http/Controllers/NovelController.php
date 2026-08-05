<?php

namespace App\Http\Controllers;

use App\Models\NovelItem;

class NovelController extends Controller
{
    public function index()
    {
        $items = NovelItem::orderByDesc('review_average')
            ->orderByDesc('review_count')
            ->limit(60)
            ->get();

        $lastUpdated = NovelItem::max('updated_at');
        $categoryCounts = NovelItem::selectRaw('category, count(*) as c')->groupBy('category')->pluck('c', 'category');

        return view('welcome', compact('items', 'lastUpdated', 'categoryCounts'));
    }
}
