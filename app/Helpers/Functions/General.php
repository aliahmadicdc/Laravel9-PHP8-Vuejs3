<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Jorenvh\Share\Share;

function getHeaderLanguages(): array
{
    $languages = languages;
    unset($languages[App::currentLocale()]);

    return $languages;
}

function getCurrentUrl(): string
{
    return Request::fullUrl();
}

function socialShare($social, $url, $title): string
{
    return match ($social) {
        shareFacebook => (new Share())->page($url, $title)->facebook(),
        shareTelegram => (new Share())->page($url, $title)->telegram(),
        shareTwitter => (new Share())->page($url, $title)->twitter(),
        shareWhatsapp => (new Share())->page($url, $title)->whatsapp(),
        shareLinkedin => (new Share())->page($url, $title)->linkedin(),
        sharePinterest => (new Share())->page($url, $title)->pinterest(),
        shareReddit => (new Share())->page($url, $title)->reddit(),
        default => '',
    };
}
