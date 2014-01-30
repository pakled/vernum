<?php


namespace Vernum;

/**
 * Parser
 *
 * @author Thomas Schramm <schramm42@me.com>
 *
 * @todo implement isGreaterThanEquals
 * @todo implement isLowerThanEquals
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
	public function __construct($major, $minor, $patch)
	{
		$this->major = $major;
		$this->minor = $minor;
		$this->patch = $patch;
	}

	/**
	 * @todo implement
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
		$this->major = $major;

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
		$this->minor = $minor;

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
		$this->patch = $patch;

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
	 * @param Version $version
	 *
	 * @return bool
	 */
	public function isLowerThan(Version $version)
	{
		return false;
	}
}
