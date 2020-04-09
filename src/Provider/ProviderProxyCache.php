<?php

namespace SubstitutionPlugin\Provider;

final class ProviderProxyCache implements ProviderInterface
{
    /** @var ProviderInterface */
    private $provider;

    /** @var string|null */
    private $value;

    /** @var bool */
    private $hasValue = false;

    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        if (!$this->hasValue) {
            $this->value = $this->provider->getValue();
            $this->hasValue = true;
        }

        return $this->value;
    }
}
