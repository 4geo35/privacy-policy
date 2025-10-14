<?php

namespace GIS\PrivacyPolicy\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class PageDataActionsManager
{
    public function getPrivacyData(): string
    {
        $markdown = $this->getDataFromUrl(config("privacy-policy.privacyMarkdownUrl"), "privacy-markdown-data");
        if (!$markdown) { return ""; }

        $markdown = str_replace("{org}", config("privacy-policy.company"), $markdown);

        $markdown = str_replace("{params}", config("privacy-policy.params"), $markdown);

        $homeUrl = Route::has("web.home") ? route("web.home") : "/";
        $markdown = str_replace("{home}", $homeUrl, $markdown);

        $markdown = str_replace("{policy}", route("web.privacy-policy"), $markdown);

        $markdown = str_replace("{email}", config("privacy-policy.email"), $markdown);

        $markdown = $this->replaceData($markdown);

        return Str::markdown($markdown);
    }

    public function getAgreementData(): string
    {
        $markdown = $this->getDataFromUrl(config("privacy-policy.agreementMarkdownUrl"), "agreement-markdown-data");
        if (!$markdown) { return ""; }

        $markdown = str_replace("{org}", config("privacy-policy.company"), $markdown);

        $params = config("privacy-policy.params");
        $replace = ! empty($params) ? ", $params" : "";
        $markdown = str_replace("{params}", $replace, $markdown);

        $markdown = str_replace("{address}", config("privacy-policy.address"), $markdown);

        $markdown = str_replace("{email}", config("privacy-policy.email"), $markdown);

        $markdown = $this->replaceData($markdown);

        return Str::markdown($markdown);
    }

    public function getCookiesData(): string
    {
        $markdown = $this->getDataFromUrl(config("privacy-policy.cookiesMarkdownUrl"), "cookies-markdown-data");
        if (!$markdown) { return ""; }

        $markdown = str_replace("{org}", config("privacy-policy.company"), $markdown);

        $markdown = str_replace("{policy}", route("web.privacy-policy"), $markdown);

        $markdown = str_replace("{app}", config("app.name"), $markdown);

        return Str::markdown($markdown);
    }

    protected function getDataFromUrl(string $url, string $key): ?string
    {
        return Cache::remember($key, 60*60*24, function () use ($url) {
            try {
                $client = new Client();
                $response = $client->request("GET", $url);
                if ($response->getStatusCode() == 200) {
                    return $response->getBody()->getContents();
                } else {
                    return null;
                }
            } catch (GuzzleException|ClientException $e) {
                return null;
            }
        });
    }

    protected function replaceData($markdown): string
    {
        $dataStr = config("privacy-policy.data");
        $dataArray = explode(" ; ", $dataStr);
        $replaceString = "";
        foreach ($dataArray as $item) {
            if (empty($item)) { continue; }
            $replaceString .= "\n- $item";
        }
        return str_replace("{data}", $replaceString, $markdown);
    }
}
