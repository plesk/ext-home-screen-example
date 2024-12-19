<?php
// Copyright 1999-2024. WebPros International GmbH. All rights reserved.

namespace PleskExt\Example;

use Plesk\SDK\Hook\Home\Block;

class HomeAsyncBlock extends Block
{
    public function getId(): string
    {
        return 'async-block';
    }

    public function getSkeletonSize(): int
    {
        return 10;
    }

    public function getContent(): string
    {
        return "
        <div>
            Current time:
            <mark id='time' style='background-color: green; color: yellow; padding: 5px;'></mark>
        </div>
        <script>
            function updateTime() {
                const timeElement = document.getElementById('time');
                const currentTime = new Date().toLocaleTimeString();
                timeElement.textContent = currentTime;
            }

	    updateTime();

            setInterval(updateTime, 1000);
        </script>
    ";
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
        return 'boost';
    }

    public function getFooter(): string
    {
        return 'Footer example';
    }

    public function isAsyncLoaded(): bool
    {
        return true;
    }

    public function getTitle(): string
    {
        return '<mark style="background-color: orange; padding: 5px; margin-bottom: 5px;">Async block example</mark>';
    }

    public function getName(): string
    {
        return 'Async block';
    }
}
