<?php
// Copyright 1999-2024. WebPros International GmbH. All rights reserved.

namespace PleskExt\Example;

use Plesk\SDK\Hook\Home\Block;

class HomeStaticContentBlock extends Block
{
    public function getId(): string
    {
        return 'static-content-block';
    }

    public function getSkeletonSize(): int
    {
        return 10;
    }

    public function getContent(): string
    {
        $filePath = __DIR__ . '/../assets/log.txt';

        if (file_exists($filePath)) {
            $fileContent = file_get_contents($filePath);

            return "<div>File Content:<pre>" . htmlspecialchars($fileContent) . "</pre></div>";
        } else {
            return "<div>File not found.</div>";
        }
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
        return 'database';
    }

    public function isAsyncLoaded(): bool
    {
        return true;
    }

    public function getTitle(): string
    {
        return '<mark style="background-color: green; color: white; padding: 5px;">Static content block example</mark>';
    }

    public function getName(): string
    {
        return 'Static content block';
    }
}
