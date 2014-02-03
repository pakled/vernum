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
 * Version implementation
 *
 * @author Thomas Schramm <schramm42@me.com>
 *
 */
class Version implements VersionInterface
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
     * Constructs the Version object with given major, minor, patch
     * and additional labels
     *
     * @param string|int $major
     * @param string|int $minor
     * @param string|int $patch
     * @param array      $labels
     */
    public function __construct(
        $major = 0,
        $minor = 0,
        $patch = 0,
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
     * {@inheritdoc}
     */
    public function addLabel($label)
    {
        $this->labels[] = (string)$label;

        return $this;
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * {@inheritdoc}
     */
    public function setLabels(array $labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function increaseMajor()
    {
        $this->major++;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function increaseMinor()
    {
        $this->minor++;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function increasePatch()
    {
        $this->patch++;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function isEqualTo(VersionInterface $version)
    {
        return $this->getMajor() === $version->getMajor()
        && $this->getMinor() === $version->getMinor()
        && $this->getPatch() === $version->getPatch();
    }

    /**
     * {@inheritdoc}
     */
    public function getMajor()
    {
        return $this->major;
    }

    /**
     * {@inheritdoc}
     */
    public function setMajor($major)
    {
        $this->major = (int)$major;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMinor()
    {
        return $this->minor;
    }

    /**
     * {@inheritdoc}
     */
    public function setMinor($minor)
    {
        $this->minor = (int)$minor;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPatch()
    {
        return $this->patch;
    }

    /**
     * {@inheritdoc}
     */
    public function setPatch($patch)
    {
        $this->patch = (int)$patch;

        return $this;
    }

    /**
     *
     * {@inheritdoc}
     */
    public function isGreaterThan(VersionInterface $version)
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
     *
     * {@inheritdoc}
     */
    public function isLessThan(VersionInterface $version)
    {
        if ($this->getMajor() < $version->getMajor()) {
            return true;
        }
        if ($this->getMajor() > $version->getMajor()) {
            return false;
        }
        if ($this->getMinor() < $version->getMinor()) {
            return true;
        }
        if ($this->getMinor() > $version->getMinor()) {
            return false;
        }
        if ($this->getPatch() < $version->getPatch()) {
            return true;
        }
        if ($this->getPatch() > $version->getPatch()) {
            return false;
        }

        return false;
    }
}
