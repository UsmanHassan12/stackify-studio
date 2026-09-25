// Stackify Studio Custom JS

// Sticky navbar on scroll
window.addEventListener('scroll', function() {
    var header = document.getElementById('ve-sticky');
    if (header) {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
});

// Mobile menu toggle
var toggler = document.getElementById('ve-toggle');
var mobileMenu = document.getElementById('ve-mobile-menu');
if (toggler && mobileMenu) {
    toggler.addEventListener('click', function() {
        mobileMenu.classList.toggle('open');
    });
}

// Counter animation
function animateCounters() {
    var counters = document.querySelectorAll('.counter');
    counters.forEach(function(counter) {
        var target = parseInt(counter.getAttribute('data-count'), 10);
        if (isNaN(target)) return;
        if (target === 0) {
            counter.textContent = "0";
            return;
        }
        var count = 0;
        var duration = 1600;
        var step = target / (duration / 16);
        var timer = setInterval(function() {
            count += step;
            if (count >= target) {
                counter.textContent = target.toLocaleString();
                clearInterval(timer);
            } else {
                counter.textContent = Math.floor(count).toLocaleString();
            }
        }, 16);
    });
}

// Trigger counters when in view
var counterSections = document.querySelectorAll('.ve-counter-section');
if (counterSections.length > 0) {
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.disconnect();
                }
            });
        }, { threshold: 0.2 });
        counterSections.forEach(function(section) {
            observer.observe(section);
        });
    } else {
        animateCounters();
    }
}

// FAQ accordion toggle
document.querySelectorAll('.ve-faq-q').forEach(function(q) {
    q.addEventListener('click', function() {
        var item = this.closest('.ve-faq-item');
        var wasOpen = item.classList.contains('open');
        document.querySelectorAll('.ve-faq-item').forEach(function(i) { i.classList.remove('open'); });
        if (!wasOpen) item.classList.add('open');
    });
});

// AI Assistant Demo Widget Interactivity
(function() {
    var chatBody = document.getElementById('ve-demo-chat-body');
    var chatInput = document.getElementById('ve-demo-input');
    var sendBtn = document.getElementById('ve-demo-send');
    if (!chatBody || !chatInput || !sendBtn) return;

    var knowledgeBase = {
        "integrate": "Our AI agents connect through REST/GraphQL APIs, Webhooks, or direct database adapters (PostgreSQL, MySQL, Redis, MongoDB). We wrap them in strict schemas with deterministic fallbacks to guarantee 0% data corruption.",
        "audit": "The Free AI Audit delivers a comprehensive 48-hour architecture assessment covering model feasibility, token cost modeling, vector database sizing, and private data isolation strategies.",
        "seo": "Our SEO & GEO consultation delivers a complete 5-pillar audit covering on-page structure, high-trust backlink strategy, technical Core Web Vitals, local search, and Generative Engine Optimization (GEO) for ChatGPT & Perplexity citations. You can book your consultation at /seo-consultation!",
        "hallucination": "We mitigate hallucinations through 3 layers: (1) Deterministic similarity-threshold filtering in Pinecone/pgvector, (2) Grounded system prompts with strict negative constraints, and (3) Automated evaluation test suites before deployment.",
        "timeline": "Production AI agents and RAG integrations typically ship within 2 to 4 weeks. Full custom software platforms take 4 to 8 weeks depending on scope.",
        "default": "Great question! We engineer custom AI agents, RAG search pipelines, and modern web platforms. You can book a free 48-hour architecture audit to get a customized blueprint from our engineers!"
    };

    function appendMessage(text, isUser) {
        var msgDiv = document.createElement('div');
        msgDiv.className = 've-chat-msg ' + (isUser ? 'user' : 'bot');
        var iconHtml = isUser ? '<i class="fa fa-user"></i>' : '<i class="fa fa-microchip"></i>';
        msgDiv.innerHTML = '<div class="ve-chat-avatar">' + iconHtml + '</div><div class="ve-chat-bubble">' + text + '</div>';
        chatBody.appendChild(msgDiv);
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    function processQuery(query) {
        if (!query.trim()) return;
        appendMessage(query, true);
        chatInput.value = '';

        var qLower = query.toLowerCase();
        var reply = knowledgeBase["default"];
        if (qLower.includes("integrate") || qLower.includes("existing") || qLower.includes("api")) {
            reply = knowledgeBase["integrate"];
        } else if (qLower.includes("seo") || qLower.includes("geo") || qLower.includes("perplexity") || qLower.includes("google") || qLower.includes("consultation")) {
            reply = knowledgeBase["seo"];
        } else if (qLower.includes("audit") || qLower.includes("free") || qLower.includes("cost")) {
            reply = knowledgeBase["audit"];
        } else if (qLower.includes("hallucination") || qLower.includes("rag") || qLower.includes("accurate")) {
            reply = knowledgeBase["hallucination"];
        } else if (qLower.includes("timeline") || qLower.includes("long") || qLower.includes("weeks") || qLower.includes("time")) {
            reply = knowledgeBase["timeline"];
        }

        setTimeout(function() {
            appendMessage(reply, false);
        }, 350);
    }

    sendBtn.addEventListener('click', function() {
        processQuery(chatInput.value);
    });

    chatInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            processQuery(chatInput.value);
        }
    });

    chatBody.addEventListener('click', function(e) {
        var chip = e.target.closest('.ve-chip-btn');
        if (chip) {
            var q = chip.getAttribute('data-query') || chip.textContent;
            processQuery(q);
        }
    });
})();
