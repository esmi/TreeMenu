<?php
namespace Esmi\Menu;

use BlueM\Tree;
use Esmi\Menu\ItemNode as node;

use Knp\Menu\MenuFactory;
use Knp\Menu\Loader\NodeLoader;
use Esmi\Menu\MenuInterface;

use Knp\Menu\Renderer\ListRenderer;
use Knp\Menu\Matcher\Matcher as Matcher;

// BlueM\Tree no remove node function, so TreeMenu has no remove MenuItem function.

class TreeMenu extends Tree implements MenuInterface {

    protected $nodes;   // BlueM\Tree
    protected $menu;    // KNP\Menu
    protected $factory; // Knp\Menu\MenuFactory
    protected $loader;  // knp\Menu\Loader\NodeLoader

    public function __construct(array $data, array $options = array())
    {
        $this->factory = new MenuFactory();
        $this->loader = new NodeLoader($this->factory);

        parent::__construct( $data, $options);

		$this->nodes = $this->getRootNodes();  //blueM\tree
    }

    public function createMenu($name, array $options = array()) {

		$this->menu = $this->factory->createItem($name, $options);

        foreach ( $this->nodes as $node) {
			$item = $this->loader->load($node);
            //var_dump($item->getAttributes());
            //echo "-----\r\n";
			$child = $this->menu->addChild($item);
            $child->setAttributes($item->getAttributes());
		}
        return $this->menu;
    }

    public function render() {
        $renderer = new ListRenderer(new \Knp\Menu\Matcher\Matcher());
        echo $renderer->render($this->menu);

    }
    // overwrite BlueM\Tree's createNode().
    protected function createNode(array $properties)
    {
        return new Node($properties);
    }
}
