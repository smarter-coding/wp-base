<?php

require_once __DIR__ . '/vendor/autoload.php';

use SmarterCoding\WpBase\Providers\ThemeServiceProvider;
use SmarterCoding\WpPlus\Helpers\Router;
use SmarterCoding\WpPlus\Structs\Request;
use SmarterCoding\WpBase\Requests\TestRequest;

$themeServiceProvider = new ThemeServiceProvider();
$themeServiceProvider->boot();

Router::middleware('auth', function() {

    Router::get('/foo', function(Request $request) {
        echo session()->get('message');

        return response()
            ->html("
                <form method='post'>
                    <div>
                        <input type='text' name='foo' />
                        {$request->errors()->first('foo')}
                    </div>
                    <div>
                        <input type='text' name='bar' />
                        {$request->errors()->first('bar')}
                    </div>
                    <button type='submit'>Submit</button>
                </form>
            ");
    }, 'foo.show');

    Router::post('/foo', function(TestRequest $request) {
        session()->flash('message', 'Post request sent successfully.');
        redirect()->route('foo.show');
    }, 'foo.handle');

});
