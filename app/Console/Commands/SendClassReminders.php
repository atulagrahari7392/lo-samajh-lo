<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LiveClass;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClassReminderMail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SendClassReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lsl:send-class-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends email reminders to students for upcoming live classes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Sending class reminders...');
        
        // Find classes starting in the next 1 hour that haven't had reminders sent
        // Placeholder query, assumes models and relations exist
        // $upcomingClasses = LiveClass::where('start_time', '>=', Carbon::now())
        //     ->where('start_time', '<=', Carbon::now()->addHour())
        //     ->where('reminder_sent', false)
        //     ->with('course.students')
        //     ->get();
            
        $count = 0;
            
        /*
        foreach ($upcomingClasses as $liveClass) {
            foreach ($liveClass->course->students as $student) {
                try {
                    Mail::to($student->email)->send(new ClassReminderMail($liveClass, $student));
                    Log::info("Sent reminder for class {$liveClass->title} to {$student->email}");
                } catch (\Exception $e) {
                    Log::error("Failed to send reminder to {$student->email}: " . $e->getMessage());
                }
            }
            
            $liveClass->update(['reminder_sent' => true]);
            $count++;
        }
        */
        
        $this->info("Processed reminders for {$count} classes.");
        return Command::SUCCESS;
    }
}
