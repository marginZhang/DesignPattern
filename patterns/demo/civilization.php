<?php
class Sea {
    public $navigability = 0;
    function __construct($navigability)
    {
        $this->navigability = $navigability;
    }
}
class EarthSea extends Sea {}
class MarsSea extends Sea {}

class Plains {}
class EarthPlains extends Plains {}
class MarsPlains extends Plains {}

class Forest {}
class EarthForest extends Forest {}
class MarsForest extends Forest {}

class TerrainFactory {
    private $sea;
    private $forest;
    private $plains;

    function __construct(Sea $sea, Plains $plains, Forest $forest) {
        $this->sea = $sea;
        $this->plains = $plains;
        $this->forest = $forest;

    }

    function getSea() {
        return clone $this->sea;
    }

    function getPlains() {
        return clone $this->plains;
    }

    function getForest() {
        return clone $this->forest;
    }
}

$factory = new TerrainFactory(new EarthSea(-1), new MarsPlains(), new EarthForest());

print_r($factory->getSea()->navigability);
print_r($factory->getPlains());
print_r($factory->getForest());