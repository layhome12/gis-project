<?php
if (!function_exists('img_check')) {
    function img_check($str = '')
    {
        $img = $str == '' ? 'no-image.png' : $str;
        return $img;
    }
}
if (!function_exists('selected')) {
    function selected($word, $appeal)
    {
        $checked = $word == $appeal ? 'selected' : '';
        return $checked;
    }
}
if (!function_exists('nickname')) {
    function nickname($name)
    {
        $ex1 = explode(' ', $name)[0];
        $ex2 = isset(explode(' ', $name)[1]) ? substr(explode(' ', $name)[1], 0, 1) : '';
        $nickname = $ex1 . ' ' . $ex2;
        return $nickname;
    }
}
if (!function_exists('seo_url')) {
    function seo_url($text)
    {
        $seo = url_title(strtolower($text));
        return $seo;
    }
}
