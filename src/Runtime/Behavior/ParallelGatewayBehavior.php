<?php

/*
 * This file is part of KoolKode BPMN.
 *
 * (c) Martin Schröder <m.schroeder2007@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace KoolKode\BPMN\Runtime\Behavior;

use KoolKode\BPMN\Engine\BasicAttributesTrait;
use KoolKode\BPMN\History\Event\ActivityCompletedEvent;
use KoolKode\BPMN\History\Event\ActivityStartedEvent;
use KoolKode\Process\Execution;
use KoolKode\Process\Behavior\SyncBehavior;

/**
 * Provides join and fork behavior within BPMN processes.
 * 
 * @author Martin Schröder
 */
class ParallelGatewayBehavior extends SyncBehavior
{
    use BasicAttributesTrait;

    /**
     * {@inheritdoc}
     */
    public function execute(Execution $execution): void
    {
        $engine = $execution->getEngine();
        $id = $execution->getNode()->getId();
        
        $name = $this->getStringValue($this->name, $execution->getExpressionContext()) ?? '';
        
        $engine->notify(new ActivityStartedEvent($id, $name, $execution, $engine));
        
        parent::execute($execution);
        
        $engine->notify(new ActivityCompletedEvent($id, $execution, $engine));
    }
}
