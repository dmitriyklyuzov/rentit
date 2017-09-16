<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bootText', 'parts.form.text', ['label', 'name', 'value' => null, 'attributes' => []]);
        Form::component('bootTextArea', 'parts.form.textarea', ['label','name', 'value' => null, 'attributes' => []]);
        Form::component('bootDrop', 'parts.form.dropdown', ['label', 'name']);
        Form::component('bootSubmit', 'parts.form.submit', ['value' => 'Submit', 'attributes' => []]);
        Form::component('hidden', 'parts.form.hidden', ['name', 'value' => null, 'attributes' => []]);
        // Form::
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
