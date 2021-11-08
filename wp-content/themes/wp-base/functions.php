<?php

require_once __DIR__ . '/vendor/autoload.php';

use SmarterCoding\WpBase\Providers\ThemeServiceProvider;
use SmarterCoding\WpPlus\Helpers\Router;
use SmarterCoding\WpPlus\Structs\Request;
use SmarterCoding\WpBase\Requests\TestRequest;

$themeServiceProvider = new ThemeServiceProvider();
$themeServiceProvider->boot();

Router::get('/foo', function(Request $request) {
    $foo = session()->get('foo');

    return response()
        ->html("
            <p>{$foo}</p>
            <form method='post'>
                <input type='hidden' name='foo' value='bar' />
                <button type='submit'>Submit</button>
            </form>
        ");
});

Router::post('/foo', function(TestRequest $request) {
    session()->flash('foo', 'bar');
    redirect()->to('/foo');
});
