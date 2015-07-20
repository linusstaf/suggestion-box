<?php

function app_path($path = null) {
    return  realpath(__DIR__ . '') . $path;
}

function resource_path($path = null) {
    return  realpath(__DIR__ . '/../resources') . $path;
}

function public_path($path = null) {
    return  realpath(__DIR__ . '/../public') . $path;
}