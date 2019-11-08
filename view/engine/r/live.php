<?php namespace _\lot\x\view\live;

\Asset::set(__DIR__ . \DS . '..' . \DS . '..' . \DS . 'lot' . \DS . 'asset' . \DS . 'js' . \DS . 'view.min.js');

function route() {
    if ('XHR' !== $this->lot('X-Requested-With')) {
        \Guard::abort('Method not allowed.');
    }
    $this->type('text/plain');
    echo \content(\PAGE . \DS . $this[0] . \DS . 'view.data') ?? "";
    exit;
}

function set($i) {
    return '<output class="view" for="' . \Path::R(\Path::F((string) $this->path), \PAGE, '/') . '">' . $i . '</output>';
}

\Hook::set('page.view', __NAMESPACE__ . "\\set", 1);
\Route::set('.view/*', 200, __NAMESPACE__ . "\\route");

// `dechex(crc32('.\lot\x\view'))`
\setcookie('_b934eebc', \i('0 Views') . '|' . \i('1 View') . '|' . \i('%d Views'));