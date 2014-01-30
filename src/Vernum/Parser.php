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
	 * @param $version
	 *
	 * @return array
	 */
	public static function parse($version)
	{
		return array(
			'major' => 0,
			'minor' => 0,
			'patch' => 0
		);
	}
}
