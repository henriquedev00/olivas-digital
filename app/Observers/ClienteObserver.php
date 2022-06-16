<?php

namespace App\Observers;

use App\Jobs\SendWelcomeEmail;
use App\Models\Cliente;

class ClienteObserver
{
    /**
     * Handle the Cliente "created" event.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return void
     */
    public function created(Cliente $cliente)
    {
        SendWelcomeEmail::dispatch($cliente);
    }

    /**
     * Handle the Cliente "updated" event.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return void
     */
    public function updated(Cliente $cliente)
    {
        //
    }

    /**
     * Handle the Cliente "deleted" event.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return void
     */
    public function deleted(Cliente $cliente)
    {
        //
    }

    /**
     * Handle the Cliente "restored" event.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return void
     */
    public function restored(Cliente $cliente)
    {
        //
    }

    /**
     * Handle the Cliente "force deleted" event.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return void
     */
    public function forceDeleted(Cliente $cliente)
    {
        //
    }
}
