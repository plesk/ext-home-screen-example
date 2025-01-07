<?php
// Copyright 1999-2025. WebPros International GmbH. All rights reserved.

namespace PleskExt\Example\Hook;

use Plesk\SDK\Hook\Home\Block;

class HomeStaticContentBlock extends Block
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
        return 'static-content-block';
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
        $log = <<<CONTENT
            [2024-12-15 10:00:01] INFO  Starting application...
            [2024-12-15 10:00:05] DEBUG Initializing components...
            [2024-12-15 10:00:10] INFO  User login attempt: username=admin
            [2024-12-15 10:00:12] ERROR Invalid password attempt for username=admin
            [2024-12-15 10:00:20] INFO  User login success: username=admin
            [2024-12-15 10:01:30] WARN  Slow response from database server
            [2024-12-15 10:01:40] INFO  Database query executed: SELECT * FROM users WHERE status='active'
            [2024-12-15 10:02:00] DEBUG Processing data from API response
            [2024-12-15 10:02:10] INFO  Data processing complete
            [2024-12-15 10:05:00] ERROR Unhandled exception: Database connection failed
            [2024-12-15 10:06:00] INFO  Reconnecting to database...
            [2024-12-15 10:06:15] INFO  Database connection established
            [2024-12-15 10:10:00] INFO  Application shutdown initiated
            [2024-12-15 10:10:05] INFO  Application shutdown complete
        CONTENT;

        $formattedContent = htmlspecialchars(nl2br($log));

        return "<div>Log:<br />{$formattedContent}</div>";
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
        return static::SECTION_PLESK;
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
        return 'database';
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
        return true;
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
        return '<mark style="background-color: green; color: white; padding: 5px;">Static content block example</mark>';
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
        return 'Static content block';
    }
}
