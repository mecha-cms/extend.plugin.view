<?php

function fn_view_set($path = "") {
    global $site;
    $s = rtrim(PAGE . DS . To::path($path === "" ? $site->path : $path), DS);
    if (File::exist([
        $s . '.page',
        $s . '.archive'
    ])) {
        $path = $s . DS . 'view.data';
        if (!file_exists($path)) {
            File::write('0')->saveTo($path);
        }
        if (($i = file_get_contents($path)) !== false) {
            $i = (int) $i;
            File::write($i + 1)->saveTo($path);
        }
    }
}

function fn_view_get($view) {
    global $language;
    if ($view !== null) {
        $i = (int) $view;
        return $view . ' ' . $language->page_view[$i === 1 ? 0 : 1];
    }
    return '0 ' . $language->page_view[1];
}

Hook::set('page.view', 'fn_view_get');

// is online…
if (strpos(X . '127.0.0.1' . X . '::1' . X, X . $_SERVER['REMOTE_ADDR'] . X) === false) {
    Route::lot(['%*%', ""], 'fn_view_set');
}