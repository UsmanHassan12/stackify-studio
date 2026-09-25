{{-- TinyMCE 6 (GPL) — pass $editors e.g. [['id' => 'post_content_editor', 'height' => 420]] --}}
@php
    $editors = $editors ?? [];
@endphp
@if(! empty($editors))
@push('admin_scripts')
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.4/tinymce.min.js"></script>
<script>
(function () {
    var editors = @json($editors);
    function config(cfg) {
        return {
            selector: '#' + cfg.id,
            height: cfg.height || 380,
            menubar: false,
            branding: false,
            promotion: false,
            base_url: 'https://cdn.jsdelivr.net/npm/tinymce@6.8.4',
            suffix: '.min',
            plugins: 'lists link autoresize code',
            toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist | link unlink | removeformat | code',
            block_formats: 'Paragraph=p; Heading 3=h3; Heading 4=h4',
            content_style: 'body { font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif; font-size: 14px; line-height: 1.65; }',
            resize: true,
            browser_spellcheck: true,
            convert_urls: false,
            setup: function (editor) {
                editor.on('change input undo redo', function () {
                    editor.save();
                });
            }
        };
    }
    function boot() {
        if (typeof tinymce === 'undefined') {
            return;
        }
        editors.forEach(function (cfg) {
            if (!cfg.id || !document.getElementById(cfg.id)) {
                return;
            }
            tinymce.init(config(cfg));
        });
        var first = editors[0];
        if (!first || !first.id) {
            return;
        }
        var el = document.getElementById(first.id);
        var form = el ? el.closest('form') : null;
        if (form) {
            form.addEventListener('submit', function () {
                tinymce.triggerSave();
            });
        }
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }
})();
</script>
@endpush
@endif
