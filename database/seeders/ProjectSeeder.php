<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Nexus Headless Store',
                'category' => 'E-Commerce Platform',
                'short_description' => 'A high-performance Vue & Laravel backend powering a B2B electronics retailer.',
                'full_description' => "Nexus Electronics needed a modern, scalable storefront that could handle thousands of SKUs and a complex B2B pricing matrix. We architected a fully decoupled headless commerce solution using Vue.js on the frontend communicating with a robust Laravel API backend.\n\nKey highlights of the project:\n- Custom B2B pricing engine with role-based tier discounts\n- Real-time inventory sync with a legacy ERP via REST adapters\n- Elasticsearch-powered product search delivering results under 80ms\n- Progressive Web App (PWA) delivery for mobile-first buyers\n- Deployed on AWS with auto-scaling EC2 clusters and CloudFront CDN\n\nThe result was a 3x improvement in page load speed and a 40% increase in conversion rate within the first 90 days of launch.",
                'image_path' => 'img/bg-img/1.jpg',
                'client_name' => 'Nexus Electronics',
                'live_url' => 'https://example.com'
            ],
            [
                'title' => 'Vault Analytics Dashboard',
                'category' => 'FinTech SaaS',
                'short_description' => 'Real-time financial data visualization platform built with React and Node.js.',
                'full_description' => "Vault Finance required a high-fidelity analytics platform capable of ingesting millions of financial transactions per day and presenting them as clean, interactive dashboards for portfolio managers.\n\nKey highlights of the project:\n- Event-driven Node.js microservices consuming live market data feeds\n- React + D3.js frontend rendering complex candlestick, heatmap, and trend charts\n- WebSocket architecture for real-time portfolio value updates\n- Role-based access control (RBAC) for analyst, manager, and executive views\n- GDPR-compliant data handling with encrypted PostgreSQL storage\n\nThe platform now processes over 4 million data points daily and serves 200+ institutional users across 12 countries.\n\n### The AI Opportunity (Proposed Extension)\nWhile Vault processes millions of historical and live transaction records, adding an autonomous LLM anomaly-detection and natural-language query agent empowers portfolio managers to ask conversational questions (e.g. 'Which tech assets experienced atypical correlation changes during yesterday\\'s opening volatility?') and receive instant, source-attributed causal analyses with automated risk alerts.",
                'image_path' => 'img/bg-img/2.jpg',
                'client_name' => 'Vault Finance',
                'live_url' => 'https://example.com'
            ],
            [
                'title' => 'MedSync Patient App',
                'category' => 'Healthcare Portal',
                'short_description' => 'HIPAA-compliant patient management system featuring secure telemedicine routing.',
                'full_description' => "MedSync Health needed a unified patient management portal that could integrate multiple clinic systems, streamline appointment booking, and securely facilitate telemedicine video calls.\n\nKey highlights of the project:\n- Full HIPAA compliance with end-to-end encryption for all patient data\n- Integration with existing HL7 FHIR hospital record systems\n- WebRTC-powered telemedicine video consultations with session recording\n- Intelligent appointment scheduling engine with conflict detection\n- Prescription management module with pharmacist e-sign workflow\n\nMedSync reduced no-show appointments by 35% and reduced administrative overhead by over 60 hours per clinic per month.\n\n### The AI Opportunity (Proposed Extension)\nIntegrating an autonomous conversational AI triage copilot on top of MedSync\\'s FHIR architecture allows automated preliminary symptom logging and intelligent appointment routing prior to telemedicine calls, saving clinicians an estimated 8 minutes per consultation while adhering strictly to zero-retention HIPAA de-identification standards.",
                'image_path' => 'img/bg-img/3.jpg',
                'client_name' => 'MedSync Health',
                'live_url' => 'https://example.com'
            ],
            [
                'title' => 'FreightOps Tracker',
                'category' => 'Logistics Engine',
                'short_description' => 'A global shipping tracker mapping complex supply chains using interactive WebGL maps.',
                'full_description' => "FreightOps Global coordinates thousands of international cargo shipments daily across air, sea, and land routes. Their legacy tracking system was brittle and couldn't visualize multi-modal routes. We replaced it entirely.\n\nKey highlights of the project:\n- Interactive 3D globe built with WebGL (Three.js + Mapbox GL) showing live shipment paths\n- Integration with 14 third-party carrier APIs (DHL, FedEx, Maersk, etc.) via a unified adapter layer\n- Predictive ETA engine using historical delay data and weather APIs\n- Automated exception alerting via SMS, email, and Slack webhooks\n- Full audit trail and customs documentation generation\n\nFreight visibility for their operations team improved from 60% to 97%, dramatically reducing customer escalations.",
                'image_path' => 'img/bg-img/4.jpg',
                'client_name' => 'FreightOps Global',
                'live_url' => 'https://example.com'
            ],
            [
                'title' => 'SkillBridge LMS',
                'category' => 'EdTech Learning System',
                'short_description' => 'A highly scalable video learning platform delivering content to 50k+ daily active users.',
                'full_description' => "SkillBridge Academy was experiencing severe performance bottlenecks on their existing Moodle-based LMS. With over 50,000 daily active learners and a library of 2,000+ video courses, they needed a ground-up rebuild.\n\nKey highlights of the project:\n- Custom-built LMS on a Laravel microservices architecture\n- AWS S3 + CloudFront for adaptive bitrate video streaming (HLS)\n- Gamification engine with learner points, badges, and global leaderboards\n- AI-powered course recommendation system using collaborative filtering\n- Offline mode with IndexedDB caching for mobile learners in low-bandwidth areas\n- Multi-tenant white-labeling for enterprise HR departments\n\nAfter launch, course completion rates increased by 55% and server infrastructure costs dropped by 40% due to efficient caching strategies.",
                'image_path' => 'img/bg-img/5.jpg',
                'client_name' => 'SkillBridge Academy',
                'live_url' => 'https://example.com'
            ],
            [
                'title' => 'PropertyConnect Marketplace',
                'category' => 'Real Estate Platform',
                'short_description' => 'An interactive marketplace connecting buyers with agents featuring deep ML search filtering.',
                'full_description' => "PropertyConnect had a vision: build the most intelligent property search experience in their market. Standard filter systems weren't enough — they wanted ML-driven recommendations that understood buyer intent.\n\nKey highlights of the project:\n- Natural language property search powered by OpenAI embeddings\n- Interactive map search with polygon drawing tool built on Mapbox\n- ML recommendation engine that learns from user browsing and shortlist behavior\n- Automated property valuation estimates using comparable sales data\n- Agent matching algorithm pairing buyers with the highest-rated specialist in their target area\n- Integrated mortgage calculator and affordability tool\n\nWithin 6 months of launch, PropertyConnect became the #2 ranked property platform in their region by organic search traffic, with a 70% improvement in lead-to-viewing conversion.",
                'image_path' => 'img/bg-img/6.jpg',
                'client_name' => 'PropertyConnect',
                'live_url' => 'https://example.com'
            ]
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                $project
            );
        }
    }
}
