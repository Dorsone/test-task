<?php

namespace App\Console\Commands;

use App\Services\ParserService;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class ParserRunCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that run parser';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        try {
            (new ParserService())->parse();
            $this->info('Parsing finished successfully!');
            return CommandAlias::SUCCESS;
        } catch (\Exception $exception) {
            $this->alert($exception->getMessage());
            return CommandAlias::FAILURE;
        }
    }
}
