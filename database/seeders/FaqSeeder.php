<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'question' => 'How can I enter the competition?',
            'answer' => 'Pick up an entry forms from participating schools or enter online. 
                        Alternatively submit by email to info@bmywa.com or request a copy 
                        of the entry form'
        ]);

        Faq::create([
            'question' => 'How do I know if I won?',
            'answer' => 'Winners will be notified by phone, email and text with details provided on the entry form'
        ]);
       
        Faq::create([
            'question' => 'Should my essay be typed or handwritten?',
            'answer' => 'Preferably typed essays, however hand written essays MUST be readable to increase your chance to win.'
        ]);
        
        Faq::create([
            'question' => 'How are the essays judged?',
            'answer' => 'We have 3 judges who are indigenous writers with expertise to review each essays. Essays are 
                            marked based on character, plot, originality, grammar, setting.'
        ]);
    }
}
