<?php

namespace Esmi;

/**
 * Interface implemented by the factory to create items
 */
interface MenuInterface
{
    public function createMenu($name, array $options = array());
}
