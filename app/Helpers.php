<?php
function lang($text, $parameters = [])
{
    return str_replace('phphub.', '', trans('phphub.'.$text, $parameters));
}

function get_user_static_domain()
{
    return config('app.url_static') ?: config('app.url');
}