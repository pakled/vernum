<?php

namespace Vernum\Tests;

use PHPUnit_Framework_TestCase;
use Vernum\Parser;

/**
 * ParserTest
 *
 * @author Thomas Schramm <schramm42@me.com>
 */
class ParserTest extends PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \Vernum\InvalidVersionNumberException
     */
    public function testInvalidVersionNumberException()
    {
        Parser::parse("0.-dev");
    }

    /**
     * Test the parse method
     */
    public function testParse()
    {
        $this->assertEquals(
            array(
                "major" => 1,
                "minor" => 0,
                "patch" => 0
            ),
            Parser::parse("1.0.0")
        );

        $this->assertEquals(
            array(
                "major"  => 0,
                "minor"  => 22,
                "patch"  => 9876,
                "labels" => array("dev")
            ),
            Parser::parse("0.022.9876-dev")
        );


    }
}
