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
 * Parser
 *
 * @author Thomas Schramm <schramm42@me.com>
 *
 * @todo   implement isGreaterThanEquals
 * @todo   implement isLowerThanEquals
 */
class Version
{

    /**
     * @var array
     */
    private $labels = array();

    /**
     * @var int
     */
    private $major = 0;

    /**
     * @var int
     */
    private $minor = 0;

    /**
     * @var int
     */
    private $patch = 0;

    /**
     * @param string|int $major
     * @param string|int $minor
     * @param string|int $patch
     * @param array      $labels
     */
    public function __construct(
        $major = null,
        $minor = null,
        $patch = null,
        $labels = array()
    ) {
        if ($major != null) {
            $this->setMajor($major);
        }

        if ($minor != null) {
            $this->setMinor($minor);
        }

        if ($patch != null) {
            $this->setPatch($patch);
        }

        if (!empty($labels)) {
            $this->setLabels($labels);
        }
    }

    /**
     * @param string $label
     *
     * @return Version
     */
    public function addLabel($label)
    {
        $this->labels[] = (string)$label;

        return $this;
    }

    /**
     * @return array
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     *
     * @return Version
     */
    public function setLabels(array $labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     *
     */
    public function increaseMajor()
    {
        $this->major++;
    }

    /**
     *
     */
    public function increaseMinor()
    {
        $this->minor++;
    }

    /**
     *
     */
    public function increasePatch()
    {
        $this->patch++;
    }

    /**
     * @param Version $version
     *
     * @return bool
     */
    public function isEqual(Version $version)
    {
        return $this->getMajor() === $version->getMajor()
            && $this->getMinor() === $version->getMinor()
            && $this->getPatch() === $version->getPatch();
    }

    /**
     * @return string
     */
    public function dump()
    {
        $number = sprintf(
            "%s.%s.%s",
            $this->major,
            $this->minor,
            $this->patch
        );

        if (!empty($this->labels)) {
            $number .= "-" . join(".", $this->labels);
        }

        return $number;
    }

    /**
     *
     * @param Version $version
     *
     * @return bool
     */
    public function isGreaterThan(Version $version)
    {
        if ($this->getMajor() > $version->getMajor()) {
            return true;
        }

        if ($this->getMajor() < $version->getMajor()) {
            return false;
        }

        if ($this->getMinor() > $version->getMinor()) {
            return true;
        }

        if ($this->getMinor() < $version->getMinor()) {
            return false;
        }

        if ($this->getPatch() > $version->getPatch()) {
            return true;
        }

        if ($this->getPatch() < $version->getPatch()) {
            return false;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getMajor()
    {
        return $this->major;
    }

    /**
     * @param mixed $major
     *
     * @return Version
     */
    public function setMajor($major)
    {
        $this->major = (int)$major;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMinor()
    {
        return $this->minor;
    }

    /**
     * @param mixed $minor
     *
     * @return Version
     */
    public function setMinor($minor)
    {
        $this->minor = (int)$minor;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPatch()
    {
        return $this->patch;
    }

    /**
     * @param mixed $patch
     *
     * @return Version
     */
    public function setPatch($patch)
    {
        $this->patch = (int)$patch;

        return $this;
    }

    /**
     * @todo implement
     *
     * @param Version $version
     *
     * @return bool
     */
    public function isLowerThan(Version $version)
    {
        return false;
    }
}
