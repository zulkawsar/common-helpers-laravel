<?php

namespace Polygontech\CommonHelpers\Mobile;

class BDMobile
{
    private readonly string $mobileNumber;

    /**
     * @throws InvalidBDMobile
     */
    public function __construct(string $mobileNumber)
    {
        $this->mobileNumber = (new BDMobileValidator)->getValidated($mobileNumber);
    }

    /**
     * @return string
     */
    public function getWithCountryCode(): string
    {
        return $this->mobileNumber;
    }

    /**
     * @return string
     */
    public function getWithoutCountryCode(): string
    {
        return str_replace("+88", "", $this->mobileNumber);
    }

    public function isSame(BDMobile $mobile): bool
    {
        return $this->getWithCountryCode() === $mobile->getWithCountryCode();
    }
}
