<?php

namespace App\Console\Commands;

use App\Mail\UpdateProfileImage;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendProfileImageUploadReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:send-profile-image-upload-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $usersWithoutProfileImage = User::whereNull('profile_image')->get();
        $this->info('Sending profile picture upload reminder to ' . count($usersWithoutProfileImage) . ' users.');
        foreach ($usersWithoutProfileImage as $userWithoutProfileImage) {
            // send email notification to users that dosen't have profile image
            Mail::to($userWithoutProfileImage?->email)->send(new UpdateProfileImage($userWithoutProfileImage));
        }

    }
}
