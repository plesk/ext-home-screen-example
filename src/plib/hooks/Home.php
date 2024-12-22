<?php
// Copyright 1999-2024. WebPros International GmbH. All rights reserved.

use Plesk\SDK\Hook\Home;
use PleskExt\Example;

return new class () extends Home {
    public function getBlocks(): array
    {
        return [
            new Example\Hook\HomeSyncBlock(),
            new Example\Hook\HomeAsyncBlock(),
            new Example\Hook\HomeStaticContentBlock(),
            new Example\Hook\HomeDisabledBlock(),
        ];
    }
};

