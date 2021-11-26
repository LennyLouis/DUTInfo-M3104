<?php

class Clazz {
    private $offset;
    private $longueurxy;
    private $div;
    private $angle;

    /**
     * @param $offset
     * @param $longueurxy
     * @param $div
     * @param $angle
     */
    public function __construct($offset, $longueurxy, $div, $angle)
    {
        $this->offset = $offset;
        $this->longueurxy = $longueurxy;
        $this->div = $div;
        $this->angle = $angle;
    }

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @return mixed
     */
    public function getLongueurxy()
    {
        return $this->longueurxy;
    }

    /**
     * @return mixed
     */
    public function getDiv()
    {
        return $this->div;
    }

    /**
     * @return mixed
     */
    public function getAngle()
    {
        return $this->angle;
    }


}