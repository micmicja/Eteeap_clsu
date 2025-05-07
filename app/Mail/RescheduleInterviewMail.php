<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\ApplicationForm;
use App\Models\InterviewSchedule;
use Illuminate\Queue\SerializesModels;

class RescheduleInterviewMail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicant;
    public $schedule;

    /**
     * Create a new message instance.
     *
     * @param  ApplicationForm  $applicant
     * @param  InterviewSchedule  $schedule
     * @return void
     */
    public function __construct(ApplicationForm $applicant, InterviewSchedule $schedule)
    {
        $this->applicant = $applicant;
        $this->schedule = $schedule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
{
    return $this->subject('Interview Rescheduled')
                ->view('emails.reschedule_interview')
                ->with([
                    'applicant' => $this->applicant,
                    'schedule' => $this->schedule,
                ])
                ->attach(public_path('images/cl.png'), [
                    'as' => 'logo.png',
                    'mime' => 'image/png',
                ]);
}

}
    