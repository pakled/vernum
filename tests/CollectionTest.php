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

use PHPUnit_Framework_TestCase;
use Vernum\Collection;
use Vernum\Version;

/**
 * CollectionTest
 *
 * @author Thomas Schramm <schramm42@me.com>
 */
class CollectionTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \Vernum\Exception\EmptyCollection
     */
    public function testGetFirstException()
    {
        $collection = new Collection();
        $collection->getFirst();
    }

    /**
     *
     */
    public function testOrderAscending()
    {
        $collection   = new Collection();
        $firstVersion = $collection
            ->addVersion(new Version(1, 2, 2))
            ->addVersion(new Version(0, 1, 3))
            ->addVersion(new Version(3, 2, 0))
            ->addVersion(new Version(0, 1, 4))
            ->addVersion(new Version(0, 0, 10))
            ->addVersion(new Version(0, 5, 10))
            ->addVersion(new Version(0, 1, 10))
            ->addVersion(new Version(1, 2, 2))
            ->orderAscending()
            ->getFirst();
        $this->assertEquals("0.0.10", $firstVersion->dump());

        $versions = $collection->getVersions();
        $this->assertEquals("0.1.3", $versions[1]->dump());
        $this->assertEquals("0.1.4", $versions[2]->dump());
        $this->assertEquals("0.1.10", $versions[3]->dump());
        $this->assertEquals("0.5.10", $versions[4]->dump());
        $this->assertEquals("1.2.2", $versions[5]->dump());
        $this->assertEquals("1.2.2", $versions[6]->dump());
        $this->assertEquals("3.2.0", $versions[7]->dump());
    }

    /**
     *
     */
    public function testOrderDescending()
    {
        $collection   = new Collection();
        $firstVersion = $collection
            ->setVersions(
                array(
                    new Version(1, 2, 2),
                    new Version(0, 1, 3),
                    new Version(3, 22, 1),
                    new Version(3, 2, 0),
                    new Version(2, 5, 10),
                    new Version(3, 2, 0)
                )
            )
            ->orderDescending()
            ->getFirst();
        $this->assertEquals("3.22.1", $firstVersion->dump());

        $versions = $collection->getVersions();
        $this->assertEquals("3.2.0", $versions[1]->dump());
        $this->assertEquals("3.2.0", $versions[2]->dump());
        $this->assertEquals("2.5.10", $versions[3]->dump());
        $this->assertEquals("1.2.2", $versions[4]->dump());
        $this->assertEquals("0.1.3", $versions[5]->dump());
    }
}
