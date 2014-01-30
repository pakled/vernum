# INCOMPLETE

# Vernum

Library that helps creating, editing, sorting and comparing semantic version numbers

## Installation

1. Download the [`composer.phar`](https://getcomposer.org/composer.phar) executable or use the installer.

    ``` sh
    $ curl -s https://getcomposer.org/installer | php
    ```

2. Create a composer.json defining your dependencies.

    ``` json
    {
        "require": {
            "pakled/vernum": "dev-master"
        }
    }
    ```

3. Run Composer: `php composer.phar install`

## Usage

```php
use Vernum\Parser;
```
