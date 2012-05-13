<?php
namespace SebastianBergmann\PSON
{
    trait Serializer
    {
        public function jsonSerialize()
        {
            return array(
              'class'      => get_class($this),
              'attributes' => $this->readAttributes($this)
            );
        }

        protected function readAttributes($object)
        {
            $reflector = new \ReflectionObject($object);
            $result    = array();

            foreach ($reflector->getProperties() as $attribute) {
                $attribute->setAccessible(TRUE);
                $result[$attribute->getName()] = $attribute->getValue($object);
            }

            return $result;
        }
    }
}
