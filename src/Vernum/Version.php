<?php


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
     * @var
     */
    private $major;

    /**
     * @var
     */
    private $minor;

    /**
     * @var
     */
    private $patch;

    /**
     * @param $major
     * @param $minor
     * @param $patch
     */
    public function __construct($major = null, $minor = null, $patch = null)
    {
        if ($major) {
            $this->setMajor($major);
        }

        if ($minor) {
            $this->setMinor($minor);
        }

        if ($patch) {
            $this->setPatch($patch);
        }
    }

    /**
     * @todo implement
     *
     * @param Version $version
     *
     * @return bool
     */
    public function isGreaterThan(Version $version)
    {
        return false;
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
    public function getMajor()
    {
        return $this->major;
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
    public function getMinor()
    {
        return $this->minor;
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
     * @return mixed
     */
    public function getPatch()
    {
        return $this->patch;
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
