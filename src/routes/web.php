<?php

use Illuminate\Support\Facades\Route;
use GIS\PrivacyPolicy\Http\Controllers\Web\PageController;

Route::middleware(["web"])
    ->as("web.")
    ->group(function () {
        $controller = config("privacy-policy.customPageWebController") ?? PageController::class;
        Route::get("/privacy-policy", [$controller, "privacy"])->name("privacy-policy");
        Route::get("/user-agreement", [$controller, "agreement"])->name("user-agreement");
    });
