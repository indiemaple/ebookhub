<?php namespace Ebookhub\Markdown;

use Illuminate\Support\ServiceProvider;
use Event;
use App;

class MarkdownServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('Eboohub\Markdown\Markdown', function ($app) {
            return new \Ebookhub\Markdown\Markdown;
        });
    }

    public function provides()
    {
        return ['Ebookhub\Markdown\Markdown'];
    }
}
