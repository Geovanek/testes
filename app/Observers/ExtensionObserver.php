<?php

namespace App\Observers;

use App\Models\Extension;
use Illuminate\Support\Str; 

class ExtensionObserver
{
    /**
     * Handle the extension "creating" event.
     *
     * @param  \App\Models\Extension  $extension
     * @return void
     */
    public function creating(Extension $extension)
    {
        $extension->active = false;
    }

    /**
     * Handle the extension "updating" event.
     *
     * @param  \App\Models\Extension  $extension
     * @return void
     */
    public function updating(Extension $extension)
    {
        //
    }
}
