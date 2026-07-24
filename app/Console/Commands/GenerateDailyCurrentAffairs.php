<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\CurrentAffair;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class GenerateDailyCurrentAffairs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lsl:generate-current-affairs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drafts daily current affairs using external APIs or internal systems for review';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting daily current affairs generation...');
        Log::info('Daily current affairs generation started.');
        
        try {
            // Placeholder logic: This would typically fetch from a news API or internal RSS
            // For now, we will create a placeholder draft entry for admins to edit.
            
            $date = Carbon::now()->format('Y-m-d');
            
            CurrentAffair::create([
                'title' => "Daily Current Affairs Digest - {$date}",
                'content' => "This is a draft for today's current affairs. Please update with relevant news, PIB updates, and editorials.",
                'date' => Carbon::now(),
                'status' => 'draft',
                'category' => 'daily_digest',
            ]);
            
            $this->info('Successfully drafted current affairs for ' . $date);
            Log::info('Successfully drafted current affairs for ' . $date);
            
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Failed to generate current affairs: ' . $e->getMessage());
            Log::error('Failed to generate current affairs: ' . $e->getMessage());
            
            return Command::FAILURE;
        }
    }
}
