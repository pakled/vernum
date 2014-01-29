<?php
/**
 * Created by PhpStorm.
 * User: thomasschramm
 * Date: 29.01.14
 * Time: 20:58
 */

namespace Pakled;

require_once __DIR__ . "/../vendor/autoload.php";


class VersionTest extends \PHPUnit_Framework_TestCase {

    public function testParse ()
    {
        $version = new Version();
    }
}