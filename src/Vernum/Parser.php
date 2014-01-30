<?php

namespace Vernum;

/**
 * Parser
 *
 * @author Thomas Schramm <schramm42@me.com>
 */
class Parser
{

	/**
	 * @todo special exception
	 *
	 * @param string $version
	 *
	 * @throws \RuntimeException
	 * @return array
	 */
	public static function parse($version)
	{

		$result = preg_match(
			"/^([0-9]+).([0-9]+).([0-9]+)/i",
			$version,
			$matches
		);

		if (!$result) {
			throw new \RuntimeException('Invalid version number');
		}

		return array(
			'major' => (int)$matches[1],
			'minor' => (int)$matches[2],
			'patch' => (int)$matches[3]
		);
	}
}
