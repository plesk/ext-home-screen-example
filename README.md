# Custom Dashboard Extension Example

This README explains the customization options available when adding a custom block to the administrator's Home page. The block can be adjusted through various methods provided by the abstract `Block` class.

## Customization Options

### 1. Block ID `getId()`

Defines the unique identifier for the block.

**Example:**

```php
public function getId(): string {
    return 'example_block';
}
```

### 2. Block Title `getTitle()`

Defines the title of the block. By default, the block title is set to the extension title. This title will be displayed in the Home page customization (in Customize drawer).
Note that block title is always loaded synchronously and should be lightweight.

**Important:** The title is unescaped HTML, so ensure it is properly sanitized if needed.

**Example:**

```php
public function getTitle(): string {
    return "Custom Dashboard Block";
}
```
![img.png](images/img_4.png)

### 3. Block Content `getContent()`

Defines the content of the block. This is the primary content that will be displayed within the block on the Home page.

**Important:** The content is unescaped HTML, so ensure proper escaping and sanitization if dynamic data is used to prevent security issues.

**Example:**

```php
public function getContent(): string {
    return "<div>Custom dashboard block content example</div>";
}
```
![img_1.png](images/img_5.png)

### 4. Block Footer `getFooter()`

Defines the footer content for the block. By default, the footer is empty.

**Important:** Like the content, the footer is also unescaped HTML.

**Example:**

```php
public function getFooter(): string {
    return "<div class='footer-links'><a href='/docs'>Documentation</a> | <a href='/support'>Support</a></div>";
}
```
![img_2.png](images/img_6.png)

### 5. Block Column `getColumn()`

Defines the column in which the block will be placed on the dashboard. The block can be positioned in one of the following columns:

- **0**: First column
- **1**: Second column
- **2**: Third column (last column by default)

By default, the block will be placed in the last column (column `2`), 

**Example:**

```php
public function getColumn(): int {
    return 1;
}
```

### 6. Block Order `getOrder()`

Defines the order in which the block will appear within the column it is placed in. The blocks will be arranged in the order specified by their respective `getOrder()` values.

- **Default behavior**: The block will be placed last within its column.

You can customize the order by returning a specific integer value. Lower numbers represent earlier positions, and higher numbers represent later positions.

**Example:**

```php
public function getOrder(): int {
    return 1;
}
```

### 7. Asynchronous Loading `isAsyncLoaded()`

Defines whether the content of the block should be loaded asynchronously. Asynchronous loading helps improve page load times by allowing the block content to be fetched in the background while the rest of the page is rendered.

- **Synchronous Blocks**  
  Content for synchronous blocks is loaded during page preload (before rendering).
    - This approach should be used for blocks that are guaranteed to load very quickly.
    - It avoids unnecessary blinking caused by switching from a skeleton to the block's content.


- **Asynchronous Blocks**  
  Content for asynchronous blocks is loaded after the page has been rendered.
    - This method does not block page rendering.
    - While the content is being loaded, a skeleton is displayed as a placeholder.
    - **Note:** If the content loads very quickly, the transition from the skeleton to the block's content may cause unnecessary blinking. In such cases, a synchronous block may be preferable.


- **Default behavior**: The block content is loaded asynchronously (true by default).

**Example:**

```php
public function isAsyncLoaded(): bool {
    return false;
}
```

### 8. Skeleton Size `getSkeletonSize()`

Defines the size of the skeleton (content placeholder) to be shown while the block’s content is being loaded. This option is only applicable when the block is set to load asynchronously.

- **Default behavior**: A skeleton size of 2 is used as the placeholder.

**Example:**

```php
public function getSkeletonSize(): int {
    return 10;
}
```
![img_3.png](images/img_7.png)

### 9. Block Enabled `isEnabled()`

Defines whether the block is enabled by default when the page is loaded. By default, the block is enabled (`true`).
Disabled blocks will not appear on the dashboard until enabled.

- **Default behavior**: The block is enabled by default.

**Example:**

```php
public function isEnabled(): bool {
    return false;
}
```
![img.png](images/img.png)

### 10. Block Section `getSection()`

Defines the section the block belongs to, which determines where it will appear when customizing the Home page (in Customize drawer).

- **Default value**: `SECTION_PLESK`

The section defines the logical grouping of blocks on the Home page, and you can place the block in one of the following sections:

- `SECTION_PLESK` – Default section for blocks.
- `SECTION_SERVER` – For server-related blocks.
- `SECTION_SECURITY` – For security-related blocks.

**Example:**

```php
public function getSection(): string {
    return self::SECTION_SERVER;
}
```
![img_4.png](images/img_8.png)

### 11. Block Section Order `getSectionOrder()`

Defines the order of the block within its section when customizing the Home page (in Customize drawer). The order determines where the block will appear relative to other blocks in the same section.

- **Default value**: Last block in the section

This option allows you to control the sequence in which blocks appear within their respective section. Blocks with a lower order value will appear before those with a higher value.

**Example:**

```php
public function getSectionOrder(): int {
    return 1;
}
```

### 12. Block Name `getName()`

Defines the name of the block to be displayed when customizing the Home page (in Customize drawer). 

- **Default value**: Extension title

**Example:**

```php
public function getName(): string {
    return 'Custom Dashboard Block'; 
}
```
![img_1.png](images/img_3.png)

### 13. Block Icon `getIcon()`

Specifies the icon to be displayed alongside the block name when customizing the Home page.

**Example:**

```php
public function getIcon(): string {
    return 'mail';
}
```
![img.png](images/img_2.png)

### Declaring Multiple Dashboard Blocks

Extensions can expose multiple custom blocks that are declared via the `Plesk\SDK\Hook\Home` hook.

```php
namespace Plesk\SDK\Hook;

/**
 * Hook for embedding custom blocks into the Home page in SPV.
 *
 * @since 18.0.60
 */
use Plesk\SDK\Hook\Home;
use PleskExt\Example;

return new class () extends Home {
    /**
     * Retrieve blocks for the Home page in SPV.
     *
     * @return Home\Block[]
     */
    public function getBlocks(): array
    {
        return [
            new Example\HomeSyncBlock(),
            new Example\HomeAsyncBlock(),
        ];
    }
};
```