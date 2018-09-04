<?php

namespace Esmi;
//require __DIR__ . '/vendor/autoload.php';

use Knp\Menu\MenuFactory;
use Knp\Menu\Loader\NodeLoader;
use Knp\Menu\Loader\ArrayLoader;
use Knp\Menu\Renderer\ListRenderer;
use Knp\Menu\Matcher\Matcher as Matcher;
use Knp\Menu\Iterator\RecursiveItemIterator;

use Esmi\MenuInterface;

//use BlueM\Tree;

class Menu implements MenuInterface {
	
	protected $tree;
	protected $nodes; // tree's nodes
	
	protected $menu;
	
	protected $factory;
	protected $loader;
	protected $renderer;
	
	function __construct(array $r) {
		
        // lableFormattor() for $r
		$this->tree = new \BlueM\Tree($r);
		$this->nodes = $this->treeRoots($this->tree->getRootNodes());
		
		$this->factory = new MenuFactory();
		//$this->menu = $this->factory->createItem('root');
		$this->loader = new ArrayLoader($this->factory);
		$this->renderer = new ListRenderer(new \Knp\Menu\Matcher\Matcher());

	}
    public function createMenu($name, array $options = array()){ 
        
		$this->menu = $this->factory->createItem($name, $options);

		foreach ( $this->nodes as $node) {
			$it = $this->loader->load($node);
			$this->menu->addChild($it);
		}
	}
	
	function getMenu() {
		return $this->menu;
	}
    
	function treeRoots( $nodes) {
		$o = [];
		foreach( $nodes as $node) {
			$array = json_decode(json_encode($node), true);
			if ( $node->hasChildren()) {
				$array['children'] = $this->treeRoots($node->getChildren());
			}
			array_push($o, $array);
		}
		return $o;
	}
	
	function getChild($name) {
		
		$itemIterator = new \Knp\Menu\Iterator\RecursiveItemIterator($this->menu);
		// iterate recursively on the iterator
		$iterator = new \RecursiveIteratorIterator($itemIterator, \RecursiveIteratorIterator::SELF_FIRST);

		foreach ($iterator as $item) {
			if ($item->getName()  == $name )
				return $item;
		}
		return null;
	}
	function displayChild(array $children) {
		foreach ($children as $name) {
			$c = $this->getChild($name);
			if ($c) $c->setDisplay(true);		
		}
	}
	function undisplayChild(array $children) {
		foreach ($children as $name) {
			$c = $this->getChild($name);
			if ($c) $c->setDisplay(false);		
		}
	}
	
	function render(array $option) {
		return $this->renderer->render($this->menu, $option);
	}
}

