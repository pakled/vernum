<?php
use Vernum\Parser;

class ParserTest extends PHPUnit_Framework_TestCase {
	public function testParse ()
	{
		$parser = new Parser();

		$this->assertInstanceOf('Vernum\Parser', $parser);
	}
}
