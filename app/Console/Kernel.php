<?php

namespace App\Console;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //run php artisan schedule:work
        $schedule->call(function () {

            $posts = Post::where("status", "pending")->get();
            foreach ($posts as $post) {
                $collection = Http::withHeaders([
                    "Content-Type: text/plain",
                    "apiKey" => env("BAD_WORDS_API")
                ])->post('https://api.apilayer.com/bad_words', [
                    $post->content
                ])->collect();
                if ($collection["bad_words_total"] > 0) {
                    $post->status = "rejected";
                    echo "rejected";
                    $post->save();
                    Notification::create([
                        "user_id" => $post->user_id,
                        "type" => "post_status",
                        "message" => "Your Post his been rejected due to community guide lines",
                        "url" => "#",
                    ]);
                } else {
                    $post->status = "published";
                    echo "published";
                    $post->save();
                    Notification::create([
                        "user_id" => $post->user_id,
                        "type" => "post_status",
                        "message" => "Your Post his been published",
                        "url" => route("single-post", ["useruuid" => $post->user->uuid, "postuuid" => $post->uuid]),
                    ]);
                }
            }
            // $comments = Comment::where("status", "pending")->get();
            // foreach ($comments as $comment) {
            //     $collection = Http::withHeaders([
            //         "content-type" => "text/plain",
            //         "apiKey" => env("BAD_WORDS_API")
            //     ])->post('https://api.apilayer.com/bad_words', [
            //         $comment->content
            //     ])->collect();

            //     if ($collection["bad_words_total"] > 0) {
            //         $comment->status = "rejected";
            //         $comment->save();
            //         Notification::create([
            //             "user_id" => $comment->user_id,
            //             "type" => "post_status",
            //             "message" => "Your Comment his been rejected due to community guide lines",
            //             "url" => "#",
            //         ]);
            //     } else {
            //         $comment->status = "published";
            //         $comment->save();
            //         Notification::create([
            //             "user_id" => $comment->user_id,
            //             "type" => "post_status",
            //             "message" => "Your Comment his been published",
            //             "url" => route("single-post", ["useruuid" => $comment->user->uuid, "postuuid" => $comment->post->uuid]),
            //         ]);
            //     }
            // }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
