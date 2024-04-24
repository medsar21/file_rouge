<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tag;

class DeleteEmptyTags extends Command
{
    protected $signature = 'tags:delete-empty';
    protected $description = 'Delete tags with no associated recipes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Find tags with a count of 0 and delete them
        Tag::has('recipes', '=', 0)->delete();

        $this->info('Empty tags deleted successfully.');
    }
}
