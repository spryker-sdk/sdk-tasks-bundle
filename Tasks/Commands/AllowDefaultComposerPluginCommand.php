<?php

/**
 * Copyright © 2019-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerSdk\SdkTasksBundle\Tasks\Commands;

use SprykerSdk\Sdk\Core\Domain\Entity\Message;
use SprykerSdk\SdkContracts\Entity\ContextInterface;
use SprykerSdk\SdkContracts\Entity\ConverterInterface;
use SprykerSdk\SdkContracts\Entity\ExecutableCommandInterface;
use SprykerSdk\SdkContracts\Entity\MessageInterface;
use SprykerSdk\SdkTasksBundle\Exception\FileNotFoundException;
use SprykerSdk\SdkTasksBundle\Service\PbcFileModifierInterface;

class AllowDefaultComposerPluginCommand implements ExecutableCommandInterface
{
    /**
     * @var \SprykerSdk\SdkTasksBundle\Service\PbcFileModifierInterface
     */
    private PbcFileModifierInterface $composerFileModifier;

    /**
     * @param \SprykerSdk\SdkTasksBundle\Service\PbcFileModifierInterface $composerFileModifier
     */
    public function __construct(PbcFileModifierInterface $composerFileModifier)
    {
        $this->composerFileModifier = $composerFileModifier;
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'php';
    }

    /**
     * @return array<string>
     */
    public function getTags(): array
    {
        return [];
    }

    /**
     * @return bool
     */
    public function hasStopOnError(): bool
    {
        return false;
    }

    /**
     * @return \SprykerSdk\SdkContracts\Entity\ConverterInterface|null
     */
    public function getViolationConverter(): ?ConverterInterface
    {
        return null;
    }

    /**
     * @param \SprykerSdk\SdkContracts\Entity\ContextInterface $context
     *
     * @return \SprykerSdk\SdkContracts\Entity\ContextInterface
     */
    public function execute(ContextInterface $context): ContextInterface
    {
        try {
            $composerContent = $this->composerFileModifier->read($context, 'Could not enable default composer plugins');
            $composerContent['config']['allow-plugins']['dealerdirect/phpcodesniffer-composer-installer'] = true;
            $composerContent['config']['allow-plugins']['sllh/composer-versions-check'] = true;
            $this->composerFileModifier->write($composerContent, $context);
        } catch (FileNotFoundException $exception) {
            $context->addMessage(static::class, new Message($exception->getMessage(), MessageInterface::DEBUG));
        }

        return $context;
    }

    /**
     * @return string
     */
    public function getStage(): string
    {
        return ContextInterface::DEFAULT_STAGE;
    }
}
