<?php
/**
 * @author Pavel K p.kolomeitsev@gmail.com
 *
 * This is workaround class to fix deleted flag conflicts with deleted column in a table
 */

namespace AppBundle\Propel\Generator\Builder\Om;


class PropelModel
{
    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }
}