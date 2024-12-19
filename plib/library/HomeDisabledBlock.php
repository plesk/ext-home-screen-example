<?php
// Copyright 1999-2024. WebPros International GmbH. All rights reserved.

namespace PleskExt\Example;

use Plesk\SDK\Hook\Home\Block;

class HomeDisabledBlock extends Block
{
    public function getId(): string
    {
        return 'disabled-block';
    }

    public function isEnabled(): bool
    {
        return false;
    }

    public function getContent(): string
    {
        return "<div>Disabled by default block content example</div>";
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

    public function isAsyncLoaded(): bool
    {
        return false;
    }

    public function getTitle(): string
    {
        return '<mark style="padding: 5px;">Disabled block example</mark>';
    }

    public function getName(): string
    {
        return 'Disabled block';
    }
}
