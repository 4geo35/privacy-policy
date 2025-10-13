<?php

return [
    "useBreadcrumbs" => true,
    "privacyPageTitle" => "Политика в отношении обработки персональных данных",

    "company" => env("POLICY_COMPANY","«ГИС»"),
    "address" => env("POLICY_ADDRESS","г.Вологда"),
    "email" => env("POLICY_EMAIL","dev@gis4biz.ru"),
    "params" => env("POLICY_PARAMS","ИНН ОГРН"),
    "data" => env("POLICY_DATA",""), // Строка разделенная " ; "

    "privacyMarkdownUrl" => "https://raw.githubusercontent.com/4geo35/policy-text/refs/heads/master/policy.md",

    "customPageWebController" => null,
    "customPageDataActionsManage" => null,
];
