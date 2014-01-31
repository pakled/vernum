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
     * @throws InvalidVersionNumberException
     * @return array
     */
    public static function parse($version)
    {

        $result = preg_match(
            "/^(?P<major>[0-9]+).(?P<minor>[0-9]+).(?P<patch>[0-9]+)(?P<labels>-(alpha|dev))?/i",
            $version,
            $matches
        );

        if (!$result) {
            throw new InvalidVersionNumberException('Invalid version number');
        }

        $result = array(
            'major' => (int)$matches['major'],
            'minor' => (int)$matches['minor'],
            'patch' => (int)$matches['patch']
        );

        if (isset($matches['labels'])) {
            $result['labels'] = array($matches[5]);
        }

        return $result;
    }
}
