<?php

require_once __DIR__ . '/vendor/autoload.php';

use SmarterCoding\WpBase\Providers\ThemeServiceProvider;
use SmarterCoding\WpPlus\Helpers\Router;
use SmarterCoding\WpPlus\Structs\Request;
use SmarterCoding\WpBase\Requests\TestRequest;

$themeServiceProvider = new ThemeServiceProvider();
$themeServiceProvider->boot();

Router::middleware('web', function() {

    Router::get('/foo', function(Request $request) {
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
        session()->flash('foo', 'bar');
        redirect()->to('/foo');
    }, 'foo.handle');

});

// todo: extend altorouter, possibly just copy to new repo if it's easier
// include modified $meta feature (much better than adding any other feature as it can be used for literally anything without further modification)
