<?php

namespace GIS\PrivacyPolicy\Facades;

use GIS\PrivacyPolicy\Helpers\PageDataActionsManager;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string getPrivacyData()
 * @method static string getAgreementData
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
