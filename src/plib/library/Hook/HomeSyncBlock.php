<?php
// Copyright 1999-2025. WebPros International GmbH. All rights reserved.

namespace PleskExt\Example\Hook;

use Plesk\SDK\Hook\Home\Block;

class HomeSyncBlock extends Block
{
    /**
     * Define block unique ID
     *
     * Classname by default.
     *
     * @return string
     */
    public function getId(): string
    {
        return 'sync-block';
    }

    /**
     * Define size of the skeleton (content placeholder) to be shown while content is loaded
     *
     * Applied only to asynchronously loaded blocks.
     * 2 by default.
     *
     * @return int
     */
    public function getSkeletonSize(): int
    {
        return 10;
    }

    /**
     * Define block content
     *
     * Attention: unescaped HTML. Extension description by default.
     *
     * @return string
     */
    public function getContent(): string
    {
        return "<div>Current time: <mark style='background-color: green; color: yellow; padding: 5px;'>" . date('H:i:s') . "</mark></div>";
    }

    /**
     * Define column the block should be placed to
     *
     * Possible values: 0, 1, 2. Last column by default.
     *
     * @return int
     */
    public function getColumn(): int
    {
        return 0;
    }

    /**
     * Define order within the column the block should be placed to
     *
     * Last block in column by default.
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 0;
    }

    /**
     * Define section the block belongs to
     *
     * To be shown when customizing Home page.
     * SECTION_PLESK by default.
     *
     * @return string
     */
    public function getSection(): string
    {
        return static::SECTION_SERVER;
    }

    /**
     * Define block icon
     *
     * To be shown when customizing Home page.
     *
     * @return string
     */
    public function getIcon(): string
    {
        return 'backup2';
    }

    /**
     * Define block footer
     *
     * Attention: unescaped HTML. Empty by default.
     *
     * @return string
     */
    public function getFooter(): string
    {
        return 'Footer example';
    }

    /**
     * Define if the block content should be loaded asynchronously
     *
     * True by default.
     *
     * @return bool
     */
    public function isAsyncLoaded(): bool
    {
        return false;
    }

    /**
     * Define block title
     *
     * Attention: unescaped HTML. Extension title by default.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return '<mark style="padding: 5px;">Sync block example</mark>';
    }

    /**
     * Define block name
     *
     * To be shown when customizing Home page.
     * Extension title by default.
     *
     * @return string
     */
    public function getName(): string
    {
        return 'Sync block';
    }
}
