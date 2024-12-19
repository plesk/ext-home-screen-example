<?php
// Copyright 1999-2024. WebPros International GmbH. All rights reserved.

require __DIR__ . '/../vendor/autoload.php';

use Plesk\SDK\Hook\Home;
use PleskExt\Example;

return new class () extends Home {
    public function getBlocks(): array
    {
        return [
            new Example\HomeSyncBlock(),
            new Example\HomeAsyncBlock(),
            new Example\HomeStaticContentBlock(),
            new Example\HomeDisabledBlock(),
        ];
    }
};

