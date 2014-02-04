# Vernum

Master: [![Build Status](https://travis-ci.org/pakled/vernum.png?branch=master)](https://travis-ci.org/pakled/vernum)

Library that helps creating, editing, sorting and comparing semantic version numbers

## Getting Started

### System Requirements

You need **PHP >= 5.4.0**.

### Installation

You may install the Vernum Component with Composer (recommended) or manually.

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

$version = Parser::parse("1.0.2-dev");

echo $version->getMajor();
echo $version->getMinor();
echo $version->getPatch();
```

## License

Vernum is licensed under the MIT license.
