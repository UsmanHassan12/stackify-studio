<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'question' => 'Do you work with any specific tech stack?',
                'answer' => 'We are technology agnostic. We use the right tools for the job, including Laravel, React, Vue, Node.js, and more depending on your needs.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'How do you handle project pricing?',
                'answer' => 'We offer both fixed-price contracts for clearly defined scopes and agile hourly retainers for evolving enterprise projects. We aim for 100% transparency.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Do you provide ongoing support after launch?',
                'answer' => 'Absolutely. Most of our clients opt for a monthly retention plan where we handle hosting, security updates, and continued feature development.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'How long does it take to deploy a new website?',
                'answer' => 'A standard business landing page can be shipped in weeks, while complex custom software and e-commerce platforms generally take a few months.',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($rows as $row) {
            Faq::updateOrCreate(
                ['question' => $row['question']],
                $row
            );
        }
    }
}
