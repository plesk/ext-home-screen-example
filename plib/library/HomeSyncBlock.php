<?php
// Copyright 1999-2024. WebPros International GmbH. All rights reserved.

namespace PleskExt\Example;

use Plesk\SDK\Hook\Home\Block;

class HomeSyncBlock extends Block
{
    public function getId(): string
    {
        return 'sync-block';
    }

    public function getSkeletonSize(): int
    {
        return 10;
    }

    public function getContent(): string
    {
        return "<div>Current time: <mark style='background-color: green; color: yellow; padding: 5px;'>" . date('H:i:s') . "</mark></div>";
    }

    public function getColumn(): int
    {
        return 0;
    }

    public function getOrder(): int
    {
        return 0;
    }

    public function getSection(): string
    {
        return static::SECTION_SERVER;
    }

    public function getIcon(): string
    {
        return 'backup2';
    }

    public function getFooter(): string
    {
        return 'Footer example';
    }

    public function isAsyncLoaded(): bool
    {
        return false;
    }

    public function getTitle(): string
    {
        return '<mark style="padding: 5px;">Sync block example</mark>';
    }

    public function getName(): string
    {
        return 'Sync block';
    }
}
