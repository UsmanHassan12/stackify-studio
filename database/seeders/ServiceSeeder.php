<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        // Truncate to ensure old labels are cleanly replaced with the new taxonomy
        Service::truncate();

        $rows = [
            [
                'title' => 'AI Agents & Chatbots',
                'icon_class' => 'fa fa-microchip',
                'summary' => 'Autonomous LLM-powered support, sales, and internal-ops agents engineered directly into your product.',
                'body' => '<p>We design and engineer production-grade AI agents that understand context, call internal APIs, execute multi-step workflows, and resolve customer and operational queries 24/7 with zero hallucination risk.</p><h3>What this includes</h3><ul><li>Autonomous agent architecture and conversational flow design</li><li>Integration into existing databases, CRMs, ERPs, and ticketing systems</li><li>Optimal model selection (OpenAI GPT-4o, Anthropic Claude 3.5, Gemini 1.5 Pro, Llama 3)</li><li>Production eval pipelines, guardrails, and deterministic fallbacks</li><li>Deployment, observability, and continuous latency/cost monitoring</li></ul>',
                'link_url' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'LLM Integration & RAG',
                'icon_class' => 'fa fa-database',
                'summary' => 'Embedding AI into existing client systems and data with private vector search, document Q&A, and copilots.',
                'body' => '<p>Connect cutting-edge Large Language Models securely to your proprietary enterprise data. We build Retrieval-Augmented Generation (RAG) pipelines that turn static document archives, knowledge bases, and customer histories into instant, actionable answers.</p><h3>What this includes</h3><ul><li>Private RAG architecture with vector database indexing (Pinecone, pgvector, Qdrant)</li><li>Multi-format document ingestion, chunking, and semantic embedding strategies</li><li>Role-based access control and strict data residency compliance</li><li>Smart prompt caching to reduce token latency and API overhead by up to 70%</li><li>Internal copilots and contextual query interfaces for executive and ops teams</li></ul>',
                'link_url' => null,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'AI-Native Web Platforms',
                'icon_class' => 'fa fa-code',
                'summary' => 'High-performance, scalable web platforms architected from the ground up to support AI capabilities and fast data streams.',
                'body' => '<p>We design and build production-grade web applications—from customer portals to complex SaaS dashboards—using modern frameworks and clean architecture with native AI readiness so your team can ship features safely for years.</p><h3>What you get</h3><ul><li>Responsive, accessible front ends with streaming token rendering</li><li>Secure APIs, WebSockets, and tokenized authentication</li><li>Performance tuning, observability hooks, and sub-100ms response times</li><li>Clean documentation and handover your engineers will thank you for</li></ul>',
                'link_url' => null,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Custom AI Software & Automation',
                'icon_class' => 'fa fa-cogs',
                'summary' => 'Bespoke engineering and intelligent automation pipelines that eliminate manual bottlenecks and modernize legacy workflows.',
                'body' => '<p>When off-the-shelf software stops fitting how your business operates, we build custom systems tailored precisely to your processes—incorporating intelligent document extraction, automated data routing, and role-based approvals.</p><h3>Typical engagements</h3><ul><li>Workflow automation and intelligent administrative portals</li><li>Replacing manual data processing and spreadsheets with reliable AI pipelines</li><li>Bi-directional integrations with CRMs, ERPs, and financial ledgers</li></ul>',
                'link_url' => null,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'AI-Powered UX & Personalization',
                'icon_class' => 'fa fa-paint-brush',
                'summary' => 'Dynamic interfaces crafted with conversational UX, adaptive user journeys, and micro-interactions.',
                'body' => '<p>AI-first products need intuitive interaction patterns that build trust and transparency. We deliver research-backed conversational UX, high-fidelity UI kits, and adaptive layouts that personalize content in real time based on user intent.</p><h3>Deliverables</h3><ul><li>Conversational UX flows, chat states, and fallback wireframes</li><li>Design systems, component kits, and accessible design tokens</li><li>Heuristic evaluations and usability benchmarking for AI interfaces</li></ul>',
                'link_url' => null,
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'AI-Ready Website Modernization',
                'icon_class' => 'fa fa-rocket',
                'summary' => 'Transform outdated websites into lightning-fast, AI-integrated digital experiences with modern SEO and semantic architecture.',
                'body' => '<p>Legacy sites often hurt conversion and search visibility. We modernize design, content architecture, and the underlying stack while embedding smart search and structured metadata so AI answer engines (Perplexity, ChatGPT, Gemini) can index your offering seamlessly.</p><h3>Outcome</h3><ul><li>Sub-second load times and perfect Core Web Vitals</li><li>Integrated AI search and instant question-answering for visitors</li><li>A maintainable, future-proof codebase preserving all existing SEO equity</li></ul>',
                'link_url' => null,
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'E-Commerce Setups',
                'icon_class' => 'fa fa-shopping-cart',
                'summary' => 'High-converting online storefronts equipped with secure payments, inventory sync, and AI-powered product search.',
                'body' => '<p>We launch storefronts focused on conversion, trust, and operational clarity: catalog structure, checkout flows, taxes and shipping rules, and connections to the tools you already use for fulfillment—including AI-powered product search, semantic filtering, and predictive inventory recommendations.</p><h3>Highlights</h3><ul><li>AI-powered semantic search and personalized product discovery</li><li>PCI-conscious payment flows and fast one-click checkout</li><li>Real-time inventory synchronization with legacy ERPs</li></ul>',
                'link_url' => null,
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'AI SEO & GEO',
                'icon_class' => 'fa fa-search',
                'summary' => 'Generative Engine Optimization and advanced semantic SEO to dominate Google search and AI answer engines like ChatGPT and Perplexity.',
                'body' => '<p>Modern search is no longer just keywords and backlinks—it is entity recognition, semantic authority, and citation by Large Language Models. We engineer complete AI SEO and Generative Engine Optimization (GEO) strategies that position your brand as the canonical authority in your niche.</p><h3>Core Focus Areas</h3><ul><li><strong>Entity-Based Semantic Architecture:</strong> Structuring content clusters so AI search engines and Google Knowledge Graph recognize your topical mastery.</li><li><strong>Generative Engine Optimization (GEO):</strong> Optimizing brand visibility and source citations across Perplexity, ChatGPT Search, Gemini, and Claude.</li><li><strong>Technical & Speed Optimization:</strong> Schema markup, sub-second TTFB, and spotless Core Web Vitals for maximum crawl efficiency.</li><li><strong>High-Authority Digital PR & Citations:</strong> Earning authoritative backlinks and mentions that train both search algorithms and LLM training sets.</li></ul>',
                'link_url' => null,
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Hosting & Infrastructure',
                'icon_class' => 'fa fa-server',
                'summary' => 'Cloud infrastructure deployments optimized for speed, data sovereignty, GPU acceleration, and 99.9% uptime.',
                'body' => '<p>We help you operate hosting that fits your scale and compliance requirements: CI/CD automation, automated backups, SSL certificates, vector database clustering, and specialized GPU hosting with inference caching so your AI features stay lightning fast.</p><h3>Areas we cover</h3><ul><li>Cloud & VPS setup (AWS, GCP, DigitalOcean) with automated scaling</li><li>Vector database hosting and inference latency optimization</li><li>Hardening, DDoS mitigation, and continuous patch cadence</li></ul>',
                'link_url' => null,
                'sort_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($rows as $row) {
            Service::create($row);
        }
    }
}
