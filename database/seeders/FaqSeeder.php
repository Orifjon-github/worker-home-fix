<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => 'What’s included in a Honey Homes membership?',
            'answer' => 'What’s included in a Honey Homes membership?'
        ]);
        Faq::create([
            'question' => 'What services can a Honey Homes\' handyperson complete?',
            'answer' => 'What services can a Honey Homes\' handyperson complete?'
        ]);
        Faq::create([
            'question' => 'How often will I see my handyperson and for how long?',
            'answer' => 'Members can book their handyman up to two times in their membership month. Visits are 1 hour and 45 minutes long, with the last 10-15 minutes of time devoted to clean up and task documentation in the app. You can combine your two visits into a longer 3.5 hour visit pending availability. You’ll also have your handyperson and our team available on the app for questions of any kind, anytime. If you need 2 handypeople to attend a visit or an additional visit beyond your 3.5 hours of service, you can now choose to do so for an extra fee to cover labor costs.'
        ]);
        Faq::create([
            'question' => 'How do you vet your handypeople?',
            'answer' => 'How do you vet your handypeople?'
        ]);
    }
}
