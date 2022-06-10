<?php

/**
 * Copyright © 2019-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerSdk\SdkTasksBundle\Domain\Entity\Lifecycle;

use SprykerSdk\SdkContracts\Entity\Lifecycle\TaskLifecycleInterface;

class Lifecycle implements TaskLifecycleInterface
{
    protected InitializedEventData $initializedEventData;

    protected UpdatedEventData $updatedEventData;

    protected RemovedEventData $removedEventData;

    /**
     * @param \SprykerSdk\SdkTasksBundle\Domain\Entity\Lifecycle\InitializedEventData $initializedEventData
     * @param \SprykerSdk\SdkTasksBundle\Domain\Entity\Lifecycle\UpdatedEventData $updatedEventData
     * @param \SprykerSdk\SdkTasksBundle\Domain\Entity\Lifecycle\RemovedEventData $removedEventData
     */
    public function __construct(InitializedEventData $initializedEventData, UpdatedEventData $updatedEventData, RemovedEventData $removedEventData)
    {
        $this->initializedEventData = $initializedEventData;
        $this->updatedEventData = $updatedEventData;
        $this->removedEventData = $removedEventData;
    }

    /**
     * @return \SprykerSdk\SdkTasksBundle\Domain\Entity\Lifecycle\RemovedEventData
     */
    public function getRemovedEventData(): RemovedEventData
    {
        return $this->removedEventData;
    }

    /**
     * @return \SprykerSdk\SdkTasksBundle\Domain\Entity\Lifecycle\InitializedEventData
     */
    public function getInitializedEventData(): InitializedEventData
    {
        return $this->initializedEventData;
    }

    /**
     * @return \SprykerSdk\SdkTasksBundle\Domain\Entity\Lifecycle\UpdatedEventData
     */
    public function getUpdatedEventData(): UpdatedEventData
    {
        return $this->updatedEventData;
    }
}
