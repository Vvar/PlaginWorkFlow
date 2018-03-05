<?php

namespace ETS\FZ223\WorkFlow\Procedure\Factory;

use ETS\Classifier\Entity\Status\ProcedureStatus;
use ETS\Common\Procedure\State\StateInterface;

/**
 * Class Draft
 * @package ETS\FZ223\WorkFlow\Procedure
 */
class DraftFactory implements StateInterface
{
    const CLASS_NAME = 'ETS\FZ223\WorkFlow\Procedure\Draft';

    /**
     * @return void
     */
    public function transition()
    {
        // статус уже имеется
        // todo массив статусов с которых разрешен переход на черновик
        if ($this->procedure->getStatus()
            && $this->procedure->getStatus() === ProcedureStatus::STATUS_DRAFT
        ) {
            return;
        }

        $this->procedure->setStatus(ProcedureStatus::STATUS_DRAFT);
    }
}
