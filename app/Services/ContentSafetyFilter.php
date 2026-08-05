<?php

namespace App\Services;

class ContentSafetyFilter
{
    /**
     * Keywords that code for underage/childlike framing. Any item whose title
     * or genre matches one of these is excluded outright, regardless of the
     * performer's actual (legally verified adult) age — this is about how the
     * content is marketed/described, not a judgment about the platform.
     */
    private const BLOCKED_KEYWORDS = [
        'ロリ', 'ロ●ータ', 'ロリータ', '少女', '幼女', '幼い', '子供', '子ども',
        'JS', 'JC', 'JK', '女子小学生', '女子中学生', '初潮', 'いたいけ',
        'あどけない', '子役', 'キッズ',
    ];

    public static function isSafe(string ...$fields): bool
    {
        $haystack = implode(' ', $fields);

        foreach (self::BLOCKED_KEYWORDS as $keyword) {
            if (mb_stripos($haystack, $keyword) !== false) {
                return false;
            }
        }

        return true;
    }
}
