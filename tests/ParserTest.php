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
     * @expectedException \Vernum\Exception\InvalidVersionNumber
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
