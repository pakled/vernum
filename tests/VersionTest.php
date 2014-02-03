<?php
/**
 * Vernum
 *
 * @author    Thomas Schramm <schramm42@me.com>
 * @copyright 2014 Thomas Schramm
 * @link      https://github.com/pakled
 * @version   0.1.0
 * @package   Vernum
 *
 * MIT LICENSE
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace Vernum\Tests;

use Vernum\Version;

/**
 * Class VersionTest
 */
class VersionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Version
     */
    private $version;

    /**
     *
     */
    public function testConstructor()
    {
        $version = new Version(2, 10, 213);

        $this->assertEquals(2, $version->getMajor());
        $this->assertEquals(10, $version->getMinor());
        $this->assertEquals(213, $version->getPatch());

        $version = new Version(null, 2, null);

        $this->assertEquals(0, $version->getMajor());
        $this->assertEquals(2, $version->getMinor());
        $this->assertEquals(0, $version->getPatch());
    }

    /**
     *
     */
    public function testDump()
    {
        $version = new Version(5, 0, 1, array('dev'));
        $this->assertEquals("5.0.1-dev", $version->dump());

        $version = new Version();
        $this->assertEquals("0.0.0", $version->dump());
    }

    /**
     *
     */
    public function testIsGreaterThan()
    {
        $version1 = new Version(3, 2, 0);
        $version2 = new Version(1, 1, 1);
        $version3 = new Version(1, 4, 1);
        $version4 = new Version(1, 4, 10);
        $version5 = new Version(1, 4, 10);

        $this->assertTrue($version1->isGreaterThan($version2));
        $this->assertTrue($version3->isGreaterThan($version2));
        $this->assertTrue($version4->isGreaterThan($version3));
        $this->assertFalse($version4->isGreaterThan($version5));
        $this->assertFalse($version2->isGreaterThan($version5));
        $this->assertFalse($version2->isGreaterThan($version1));
        $this->assertFalse($version3->isGreaterThan($version4));
    }

    public function testIsEqual()
    {
        $version1 = new Version(3, 2, 0, array('dev'));
        $version2 = new Version(1, 1, 1);
        $version3 = new Version(3, 2, 0);
        $version4 = new Version(3, 2, 0, array('dev'));

        $this->assertFalse($version1->isEqual($version2));
        $this->assertTrue($version1->isEqual($version3));
        $this->assertTrue($version1->isEqual($version4));
    }

    /**
     *
     */
    public function testSetMajor()
    {
        $this->version->setMajor("23");
        $this->assertEquals(23, $this->version->getMajor());
    }

    /**
     *
     */
    public function testSetMinor()
    {
        $this->version->setMinor("42");
        $this->assertEquals(42, $this->version->getMinor());
    }

    /**
     *
     */
    public function testSetPatch()
    {
        $this->version->setPatch("108");
        $this->assertEquals(108, $this->version->getPatch());
    }

    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();

        $this->version = new Version();
    }
}
