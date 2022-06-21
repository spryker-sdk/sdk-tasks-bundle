<?php

namespace SprykerSdk\SdkTasksBundle\Tasks\Commands;

use SprykerSdk\SdkContracts\Entity\CommandInterface;
use SprykerSdk\SdkContracts\Entity\ContextInterface;
use SprykerSdk\SdkContracts\Entity\ConverterInterface;
use SprykerSdk\SdkContracts\Entity\ErrorCommandInterface;

class CloneSuiteNonsplitRepositoryCommand implements CommandInterface, ErrorCommandInterface
{
    /**
     * @return string
     */
    public function getCommand(): string
    {
        return 'git clone git@github.com:spryker/suite-nonsplit.git --single-branch ./';
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return 'You do not have access to repository, contact to `spryker-sdk` organization administrator.';
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'local_cli';
    }

    /**
     * @return bool
     */
    public function hasStopOnError(): bool
    {
        return true;
    }

    /**
     * @return array<string>
     */
    public function getTags(): array
    {
        return [];
    }

    /**
     * @return \SprykerSdk\SdkContracts\Entity\ConverterInterface|null
     */
    public function getViolationConverter(): ?ConverterInterface
    {
        return null;
    }

    /**
     * @return string
     */
    public function getStage(): string
    {
        return ContextInterface::DEFAULT_STAGE;
    }
}
