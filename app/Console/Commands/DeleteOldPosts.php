<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class DeleteOldPosts extends Command {
    protected $signature = 'posts:delete-old';
    protected $description = 'Force delete posts older than 30 days';

    public function handle() {
        $deletedPosts = Post::onlyTrashed()->where('deleted_at', '<=', now()->subDays(30))->forceDelete();
        $this->info("Deleted $deletedPosts posts older than 30 days.");
    }
}