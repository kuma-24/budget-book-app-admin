<?php

namespace App\Trait;

trait SecurityTrait
{
    public function getImportmap($deviceType, $templateName)
    {
        $baseImport = "{$deviceType}-base";

        $importmap = [
            'mobile-security-signin' => [
                'mobile-security-signin',
                'mobile-security-signup'
            ],
            'desktop-security-signin' => [
                'desktop-security-signin',
                'desktop-security-signup'
            ],
        ];

        $result = $importmap[$templateName];
        array_unshift($result, $baseImport);

        return $result;
    }
}