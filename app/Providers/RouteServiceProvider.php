<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * O namespace usado por todas as rotas do controlador.
     *
     * @var string
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Defina o caminho base para as rotas de sua aplicação.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes(); // Carrega as rotas de api.php
        $this->mapWebRoutes(); // Carrega as rotas de web.php
    }

    /**
     * Defina as rotas para a API.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api') // Prefixo de todas as rotas da API
             ->middleware('api') // Middleware para autenticação e configuração da API
             ->namespace($this->namespace) // Usando o namespace configurado (App\Http\Controllers)
             ->group(base_path('routes/api.php')); // Carrega o arquivo routes/api.php
    }

    /**
     * Defina as rotas para a área da Web.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web') // Middleware para rotas da web
             ->namespace($this->namespace) // Usando o mesmo namespace de controllers
             ->group(base_path('routes/web.php')); // Carrega o arquivo routes/web.php
    }
}
