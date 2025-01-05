<?php

namespace App\Helpers;

class ButtonCVA extends CVA
{
    public static function config()
    {
        return [
            'base' => "inline-flex items-center justify-center gap-1 rounded-md text-sm  transition-colors duration-150 active:brightness-95",
            'variants' => [
                'intents' => [
                    'primary' => "bg-primary text-primary-text hover:bg-primary/90",
                    'success' => "bg-success"
                ],
                'sizes' => [
                    'sm' => 'px-2 py-1',
                    'md' => 'px-4 py-2'
                ]
            ],
            'default' => [
                'intent' => 'primary',
                'size' => 'sm'
            ]
        ];
    }
}
