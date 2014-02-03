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

namespace Vernum;

use Vernum\Exception\EmptyCollection;

/**
 * Collection
 *
 * @package Vernum
 * @author  Thomas Schramm <schramm42@me.com>
 */
class Collection
{

    /**
     * @var array
     */
    private $versions = array();

    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * @param Version $version
     *
     * @return Collection
     */
    public function addVersion(Version $version)
    {
        $this->versions[] = $version;

        return $this;
    }

    /**
     * @throws Exception\EmptyCollection
     * @return Version
     */
    public function getFirst()
    {
        if (count($this->versions) < 1) {
            throw new EmptyCollection();
        }

        return reset($this->versions);
    }

    /**
     * @return array
     */
    public function getVersions()
    {
        return $this->versions;
    }

    /**
     * @param array $versions
     *
     * @return Collection
     */
    public function setVersions(array $versions)
    {
        $this->versions = $versions;

        return $this;
    }

    /**
     * @return Collection
     */
    public function orderAscending()
    {
        usort(
            $this->versions,
            function (Version $a, Version $b) {
                if ($a->isEqualTo($b)) {
                    return 0;
                }

                return ($a->isGreaterThan($b)) ? 1 : -1;
            }
        );

        return $this;
    }

    /**
     * @return Collection
     */
    public function orderDescending()
    {
        usort(
            $this->versions,
            function (Version $a, Version $b) {
                if ($a->isEqualTo($b)) {
                    return 0;
                }

                return ($a->isGreaterThan($b)) ? -1 : 1;
            }
        );

        return $this;
    }
}
