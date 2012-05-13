<?php
namespace SebastianBergmann\PSON\Tests
{
    class SerializerTest extends \PHPUnit_Framework_TestCase
    {
        public function testObjectCanBeSerialized()
        {
            $this->assertEquals(
              '{
    "class": "SebastianBergmann\\\\PSON\\\\Tests\\\\Foo",
    "attributes": {
        "bar": "bar"
    }
}',
              json_encode(new Foo('bar'), JSON_PRETTY_PRINT)
            );
        }
    }
}
