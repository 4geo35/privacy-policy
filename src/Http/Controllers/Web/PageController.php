<?php

namespace GIS\PrivacyPolicy\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use GIS\Metable\Facades\MetaActions;
use GIS\PrivacyPolicy\Facades\PageDataActions;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PageController extends Controller
{
    public function privacy(): View
    {
        $metas = MetaActions::renderByPage("privacy-policy");
        $text = PageDataActions::getPrivacyData();
        return view("pp::web.pages.privacy-policy", compact('metas', 'text'));
    }

    public function agreement(): View
    {
        $metas = MetaActions::renderByPage("user-agreement");
        $text = PageDataActions::getAgreementData();
        return view("pp::web.pages.user-agreement", compact('metas', 'text'));
    }
}
