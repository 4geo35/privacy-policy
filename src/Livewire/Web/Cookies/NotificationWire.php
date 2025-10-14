<?php

namespace GIS\PrivacyPolicy\Livewire\Web\Cookies;

use GIS\PrivacyPolicy\Facades\PageDataActions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;
use Livewire\Component;

class NotificationWire extends Component
{
    public string $text;
    public bool $displayText = true;

    public function mount(): void
    {
        $this->text = PageDataActions::getCookiesData();
        if ($this->checkCookie() || Auth::check()) {
            $this->displayText = false;
        }
    }

    public function render(): View
    {
        return view("pp::livewire.web.cookies.notification-wire");
    }

    public function close(): void
    {
        $this->displayText = false;
        $this->setCookie();
    }

    protected function setCookie(): void
    {
        $cookie = Cookie::make("cookiesNotification", "OK", 60*24);
        Cookie::queue($cookie);
    }

    protected function checkCookie(): bool
    {
        $cookie = Cookie::get("cookiesNotification", false);
        return (bool)$cookie;
    }
}
