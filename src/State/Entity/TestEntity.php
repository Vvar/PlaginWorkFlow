<?php

namespace ETS\PluginWorkFlow\State\Entity;

use ETS\Classifier\Repository\Status\ProcedureStatusRepository;
use ETS\Common\Procedure\State\StateInterface;

/**
 * Class TestEntity
 * @package ETS\PluginWorkFlow\State\Entity
 */
class TestEntity
{
    protected $status;

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}