<?php
namespace SebastianBergmann\PSON\Tests
{
    class Foo implements \JSONSerializable
    {
        use \SebastianBergmann\PSON\Serializer;

        private $bar;

        public function __construct($bar)
        {
            $this->bar = $bar;
        }
    }
}
