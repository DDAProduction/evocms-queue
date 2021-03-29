<?php


namespace EvolutionCMS\EvocmsQueue;


use Symfony\Component\Console\Application as ConsoleApplication;
use Throwable;

class ExceptionHandler implements \Illuminate\Contracts\Debug\ExceptionHandler
{
    /**
     * The registered exception mappings.
     *
     * @var array
     */
    protected $exceptionMap = [];

    public function report(Throwable $e)
    {
        if(!$this->shouldReport($e)){
            return;
        }
        throw new \Exception('Not implement');
    }

    public function shouldReport(Throwable $e)
    {
        return !empty(evo()->getLoginUserID('mgr'));
    }

    public function render($request, Throwable $e)
    {
        if(!$this->shouldReport($e)){
            return;
        }
        throw new \Exception('Not implement');
    }

    public function renderForConsole($output, Throwable $e)
    {
        (new ConsoleApplication)->renderThrowable($e, $output);
    }



}