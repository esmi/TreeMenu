<?php
namespace Esmi;

use BlueM\Tree\Node as Node;
use Knp\Menu\NodeInterface as NodeInterface;

class ItemNode extends Node implements NodeInterface{

    public function getName() {
        return $this->get('name');
    }

    /**
     * Get the options for the factory to create the item for this node
     *
     * @return array
     */
    public function getOptions() {
        return $this->toArray();
    }

    /**
     * Get the child nodes implementing NodeInterface
     *
     * @return \Traversable
     */
	/*
    public function getChildren() {
        return $parent->getChildren();
    }
	*/
}