<?php

namespace GIS\PrivacyPolicy\Facades;

use GIS\PrivacyPolicy\Helpers\PageDataActionsManager;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string getPrivacyData()
 *
 * @see PageDataActionsManager
 */
class PageDataActions extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return "privacy-page-data-actions";
    }
}
