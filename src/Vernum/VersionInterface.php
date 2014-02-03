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


/**
 * Interface for a version
 *
 * @author Thomas Schramm <schramm42@me.com>
 *
 */
interface VersionInterface
{

    /**
     * @param string $label
     *
     * @return VersionInterface
     */
    public function addLabel($label);

    /**
     * @return string
     */
    public function dump();

    /**
     * @return array
     */
    public function getLabels();

    /**
     * @return mixed
     */
    public function getMajor();

    /**
     * @return mixed
     */
    public function getMinor();

    /**
     * @return mixed
     */
    public function getPatch();

    /**
     * @return VersionInterface
     */
    public function increaseMajor();

    /**
     * @return VersionInterface
     */
    public function increaseMinor();

    /**
     * @return VersionInterface
     */
    public function increasePatch();

    /**
     * @param VersionInterface $version
     *
     * @return bool
     */
    public function isEqualTo(VersionInterface $version);

    /**
     *
     * @param VersionInterface $version
     *
     * @return bool
     */
    public function isGreaterThan(VersionInterface $version);

    /**
     *
     * @param VersionInterface $version
     *
     * @return bool
     */
    public function isLessThan(VersionInterface $version);

    /**
     * @param array $labels
     *
     * @return VersionInterface
     */
    public function setLabels(array $labels);

    /**
     * @param mixed $major
     *
     * @return VersionInterface
     */
    public function setMajor($major);

    /**
     * @param mixed $minor
     *
     * @return VersionInterface
     */
    public function setMinor($minor);

    /**
     * @param mixed $patch
     *
     * @return VersionInterface
     */
    public function setPatch($patch);
}
