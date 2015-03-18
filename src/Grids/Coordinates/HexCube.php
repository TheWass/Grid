<?php
/**
 * @file HexCube.php
 * @author The Wass
 * @brief This file defines a coordinate system which creates a hex grid
 *
 * @version 1.0 - 2015-03-18
 * * Initial version
 */
namespace Wasser\GameFramework\Grids\Coordinates;
/**
 * @class HexCube
 * @author The Wass
 * @brief Class which tessellates into a hex grid.
 * @description description
 */
class HexCube extends Coordinate
{
    protected $x;
    protected $y;
    protected $z;

    public function calculateNeighbors()
    {
        return array(
            new HexCube($this->x + 1, $this->y - 1, $this->z),
            new HexCube($this->x - 1, $this->y + 1, $this->z),
            new HexCube($this->x, $this->y + 1, $this->z - 1),
            new HexCube($this->x, $this->y - 1, $this->z + 1),
            new HexCube($this->x - 1, $this->y, $this->z + 1),
            new HexCube($this->x + 1, $this->y, $this->z - 1)
        );
    }

    public function toAxial()
    {
        if ($this->x + $this->y + $this->z == 0) {
            return new Axial($this->x, $this->y);
        } else {
            return false;
        }
    }
}