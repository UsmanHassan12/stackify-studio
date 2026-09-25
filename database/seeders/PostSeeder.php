<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'RAG vs. Fine-Tuning: What Actually Makes Sense for a Small Business AI Tool',
                'category' => 'AI Architecture',
                'summary' => 'Understand when your business needs Retrieval-Augmented Generation (RAG) vs. custom model fine-tuning—and why 90% of use cases only require RAG.',
                'content' => "Every founder looking to implement AI in 2025 faces the same initial architectural fork in the road: *Do we fine-tune an open-source model like Llama 3 on our data, or do we implement Retrieval-Augmented Generation (RAG)?*\n\nFor 90% of businesses and commercial applications, **RAG is the superior, more cost-effective, and dramatically safer choice**.\n\n### Why Fine-Tuning is Often the Wrong First Step\nFine-tuning modifies the internal weights of a model. It teaches a model *how to speak* or format its answers, but it is a terrible mechanism for storing factual knowledge:\n- **Catastrophic Forgetting**: Updating weights can degrade general reasoning performance.\n- **Knowledge Staleness**: When your pricing, inventory, or documentation updates, you must retrain the entire model.\n- **Hallucinations**: A fine-tuned model cannot reliably cite source documents with page numbers and paragraph hashes.\n\n### The Superpower of RAG\nRetrieval-Augmented Generation decouples your private company data from the model's reasoning engine:\n1. **Vector Embedding**: Your PDFs, database records, and Notion docs are indexed into a vector database (e.g. Pinecone or pgvector).\n2. **Semantic Search**: When a user asks a question, the system retrieves only the relevant paragraphs.\n3. **Grounded Generation**: The LLM reads only the retrieved paragraphs to construct its answer, guaranteeing 100% source attribution.\n\n> \"RAG gives your AI a strict open-book exam, ensuring zero hallucinated answers and instantaneous knowledge updates.\"\n\n### Next Steps for Your Team\nWondering if your data is structured properly for vector embeddings? [Book a Free 48-Hour AI Architecture Audit](/ai-audit) with our engineering leads to receive a complete feasibility blueprint.",
                'image_path' => 'img/bg-img/20.jpg',
                'author' => 'AI Engineering Team',
                'read_time' => '5 min read',
                'published_at' => now()->subHours(6),
            ],
            [
                'title' => 'What a Free AI Readiness Audit Actually Uncovers',
                'category' => 'Applied AI Strategy',
                'summary' => 'A transparent breakdown of how our senior engineering team audits data readiness, token unit economics, and AI workflow feasibility in 48 hours.',
                'content' => "Most companies want to leverage AI but get stuck at the scoping stage. Is a custom agent feasible? Will token API costs eat our margins? How do we prevent leaks of sensitive client data?\n\nHere is a transparent look behind the curtain at what our engineering team evaluates during a **48-Hour AI Architecture Audit**.\n\n### 1. Data Structure & Vector Readiness\nWe examine whether your company knowledge exists in clean markdown, structured JSON, or unstructured PDFs. We assess chunking strategies and check if semantic search will retrieve high-precision context without noise.\n\n### 2. Token Unit Economics & Prompt Caching\nUnoptimized prompts can lead to shocking monthly OpenAI or Anthropic bills. We calculate expected input/output token volume and design prompt-caching strategies that cut inference overhead by up to 75%.\n\n### 3. Guardrails & Compliance Isolation\nFor Healthcare and FinTech clients, we map zero-retention data policies, SOC2 compliance, and deterministic rule engines that intercept risky user queries before they ever reach an LLM.\n\n### Ready to Audit Your Product?\nSkip months of guesswork. [Request your Free AI Readiness Audit](/ai-audit) and receive an actionable architecture memo in 48 hours.",
                'image_path' => 'img/bg-img/22.jpg',
                'author' => 'AI Engineering Team',
                'read_time' => '4 min read',
                'published_at' => now()->subDay(),
            ],
            [
                'title' => '5 Strategies for Faster Page Loads',
                'category' => 'Web Performance',
                'summary' => 'Discover the top optimization techniques our engineers use to score 100 on Lighthouse.',
                'content' => "In an era where attention spans are plummeting and mobile devices dominate, having a fast website is no longer a luxury—it is a critical business asset. Here are five strategies our engineers recommend for perfect Lighthouse scores.\n\n### 1. Optimise and Compress Images\nImages often make up the bulk of a web page's weight. By serving images in next-gen formats like WebP or AVIF, and ensuring they are properly sized for the user's viewport, you can massively drop your initial load time.\n\n### 2. Leverage a Content Delivery Network (CDN)\nIf your server is in New York, a user in Tokyo will inherently experience latency. A CDN distributes your static assets (CSS, JS, images) across hundreds of servers globally, so users download them from the node closest to them.\n\n> \"Performance is unequivocally tied to business revenue. A one-second delay in page load time can yield a 7% reduction in conversions.\"\n\n### 3. Minify CSS, JavaScript, and HTML\nMinification removes unnecessary spaces, line breaks, and comments from your code during the build step. Although it seems minor, shaving off kilobytes across multiple files makes parsing significantly faster for the browser.\n\n### 4. Implement Lazy Loading\nDon't force the browser to render images or videos that are far below the fold. Lazy loading ensures that heavy assets are only fetched from the network when the user actually scrolls down to them.\n\n### 5. Upgrade Your Caching Strategy\nAggressive caching policies guarantee that returning visitors don't have to re-download unchanged static assets. Pairing a robust server-level cache (like Redis) with aggressive browser caching headers leads to instantaneous repeat views.",
                'image_path' => 'img/bg-img/10.jpg',
                'author' => 'Engineering Team',
                'read_time' => '6 min read',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Understanding Micro-interactions',
                'category' => 'UI/UX',
                'summary' => 'Learn how subtle animations can radically improve your app\'s user experience.',
                'content' => "Micro-interactions are the small, functional animations that occur when a user interacts with a UI element. From the gentle bounce of a notification bell to the smooth transition of a toggle switch, these details make a product feel alive and responsive.\n\n### Why they matter\n1. **Feedback**: They tell the user what happened.\n2. **Direct Manipulation**: They make the interface feel more physical.\n3. **Delight**: They add a layer of polish that users love.",
                'image_path' => 'img/bg-img/11.jpg',
                'author' => 'Engineering Team',
                'read_time' => '4 min read',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Monolith vs Microservices in 2025',
                'category' => 'Architecture',
                'summary' => 'A pragmatic guide to choosing the right backend infrastructure for your startup.',
                'content' => "The debate between monolithic and microservices architectures continues to evolve. In 2025, the trend is moving towards 'Modular Monoliths' as a middle ground.\n\n### When to stick with a Monolith\n- Small team (less than 10 developers)\n- Rapid prototyping\n- Low complexity\n\n### When to move to Microservices\n- Large team scaling independently\n- High availability requirements\n- Diverse tech stack requirements",
                'image_path' => 'img/bg-img/12.jpg',
                'author' => 'Engineering Team',
                'read_time' => '8 min read',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'React vs Vue: Which should you pick?',
                'category' => 'Frontend',
                'summary' => 'An unbiased performance and developer-experience breakdown between the two giants.',
                'content' => "Choosing a frontend framework is one of the most critical decisions for a project. React offers a massive ecosystem and flexibility, while Vue provides a more cohesive, batteries-included experience.\n\n### React Pros\n- Largest community and job market\n- Highly flexible with hooks\n- Robust ecosystem (Next.js, Remix)\n\n### Vue Pros\n- Easier learning curve\n- Better documentation\n- First-class supporting libraries (Vuex/Pinia, Vue Router)",
                'image_path' => 'img/bg-img/23.jpg',
                'author' => 'Engineering Team',
                'read_time' => '10 min read',
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Securing Your Node.js API',
                'category' => 'Security',
                'summary' => 'Essential steps to prevent injection attacks and secure your user data.',
                'content' => "Security should never be an afterthought. For Node.js APIs, the OWASP Top 10 provides a great starting point for hardening your application.\n\n### Checklist\n- Use Helmet.js for secure headers\n- Implement Rate Limiting\n- Sanitize all inputs to prevent NoSQL injection\n- Use JSON Web Tokens (JWT) correctly",
                'image_path' => 'img/bg-img/25.jpg',
                'author' => 'Engineering Team',
                'read_time' => '7 min read',
                'published_at' => now()->subWeeks(3),
            ],
            [
                'title' => 'Setting up CI/CD with GitHub Actions',
                'category' => 'DevOps',
                'summary' => 'Automate your deployments and run testing pipelines flawlessly on every commit.',
                'content' => "Automation is the key to reliable software delivery. GitHub Actions has democratized CI/CD by making it easy to define workflows directly in your repository.\n\n### Example Workflow\n1. Run Linting\n2. Execute Unit Tests\n3. Build Docker Image\n4. Deploy to Staging",
                'image_path' => 'img/bg-img/26.jpg',
                'author' => 'Engineering Team',
                'read_time' => '5 min read',
                'published_at' => now()->subMonth(),
            ],
        ];

        foreach ($posts as $post) {
            $post['slug'] = Str::slug($post['title']);
            Post::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
