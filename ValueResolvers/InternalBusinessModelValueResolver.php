<?php

/**
 * Copyright © 2019-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerSdk\SdkTasksBundle\ValueResolvers;

use SprykerSdk\Sdk\Extension\ValueResolvers\BusinessModelValueResolver;

class InternalBusinessModelValueResolver extends BusinessModelValueResolver
{
    /**
     * @var string
     */
    public const ID = 'INTERNAL_B2BC_TYPE';

    /**
     * @var string
     */
    public const ALIAS = 'internal_business_model_url';

    /**
     * @var array
     */
    protected const REPOSITORIES = [
        'b2b' => 'git@github.com:spryker/b2b-demo-shop-internal.git',
        'b2c' => 'git@github.com:spryker/b2c-demo-shop-internal.git',
    ];
}
