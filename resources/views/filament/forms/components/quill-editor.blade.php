<x-filament-forms::field-wrapper :field="$field">
    @once
        @push('styles')
            <!-- Quill Snow Theme CSS -->
            <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
            <style>
                /* Filament Dark Mode & Custom Branding Adjustments for Quill */
                .fi-fo-quill-wrapper .ql-toolbar.ql-snow {
                    border: none;
                    border-bottom: 1px solid rgba(156, 163, 175, 0.2);
                    border-top-left-radius: 0.75rem;
                    border-top-right-radius: 0.75rem;
                    background-color: #f9fafb;
                    padding: 0.5rem 0.75rem;
                }
                .dark .fi-fo-quill-wrapper .ql-toolbar.ql-snow {
                    background-color: rgba(17, 24, 39, 0.7);
                    border-bottom-color: rgba(255, 255, 255, 0.1);
                }
                .dark .fi-fo-quill-wrapper .ql-stroke {
                    stroke: #cbd5e1 !important;
                }
                .dark .fi-fo-quill-wrapper .ql-fill {
                    fill: #cbd5e1 !important;
                }
                .dark .fi-fo-quill-wrapper .ql-picker {
                    color: #cbd5e1 !important;
                }
                .dark .fi-fo-quill-wrapper .ql-picker-options {
                    background-color: #1e293b !important;
                    border-color: rgba(255, 255, 255, 0.1) !important;
                    color: #f8fafc !important;
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
                }
                .dark .fi-fo-quill-wrapper .ql-picker-item:hover {
                    color: #FFA500 !important;
                }
                .fi-fo-quill-wrapper .ql-snow.ql-toolbar button:hover,
                .fi-fo-quill-wrapper .ql-snow.ql-toolbar button.ql-active {
                    color: #FFA500 !important;
                }
                .fi-fo-quill-wrapper .ql-snow.ql-toolbar button:hover .ql-stroke,
                .fi-fo-quill-wrapper .ql-snow.ql-toolbar button.ql-active .ql-stroke {
                    stroke: #FFA500 !important;
                }
                .fi-fo-quill-wrapper .ql-snow.ql-toolbar button:hover .ql-fill,
                .fi-fo-quill-wrapper .ql-snow.ql-toolbar button.ql-active .ql-fill {
                    fill: #FFA500 !important;
                }
                .fi-fo-quill-wrapper .ql-container.ql-snow {
                    border: none;
                    border-bottom-left-radius: 0.75rem;
                    border-bottom-right-radius: 0.75rem;
                    font-family: inherit;
                    font-size: 0.875rem;
                    line-height: 1.6;
                }
                .fi-fo-quill-wrapper .ql-editor {
                    padding: 0.875rem 1rem;
                    min-height: inherit;
                }
                .fi-fo-quill-wrapper .ql-editor a {
                    color: #FFA500 !important;
                    text-decoration: underline !important;
                    font-weight: 600;
                }
                .dark .fi-fo-quill-wrapper .ql-editor {
                    color: #f1f5f9;
                    background-color: #0b1120;
                }
                .fi-fo-quill-wrapper .ql-editor.ql-blank::before {
                    color: #94a3b8;
                    font-style: normal;
                }
                .dark .fi-fo-quill-wrapper .ql-editor.ql-blank::before {
                    color: #64748b;
                }
                /* Tooltip link input dialog styling in dark mode */
                .dark .ql-snow .ql-tooltip {
                    background-color: #1e293b !important;
                    border-color: rgba(255, 255, 255, 0.15) !important;
                    color: #f8fafc !important;
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.6);
                }
                .dark .ql-snow .ql-tooltip input[type="text"] {
                    background-color: #0f172a !important;
                    border-color: rgba(255, 255, 255, 0.2) !important;
                    color: #ffffff !important;
                }
                .dark .ql-snow .ql-tooltip a.ql-action::after {
                    border-right-color: #1e293b;
                }
            </style>
        @endpush

        @push('scripts')
            <!-- Quill Core JS -->
            <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        @endpush
    @endonce

    <div
        x-data="quillEditorField({
            state: $wire.$entangle('{{ $getStatePath() }}'),
            placeholder: @js($getPlaceholder() ?? 'Compose rich content, format text, and insert hyperlinks...'),
            minHeight: '{{ $getMinHeight() }}px',
            readOnly: @js($isReadOnly()),
            toolbar: @js($getToolbar())
        })"
        wire:ignore
        class="fi-fo-quill-wrapper rounded-xl border border-gray-300 dark:border-white/10 bg-white dark:bg-gray-900 overflow-hidden shadow-xs transition-colors focus-within:border-amber-400 focus-within:ring-1 focus-within:ring-amber-400"
    >
        <div x-ref="editor" :style="{ minHeight: minHeight }"></div>
    </div>
</x-filament-forms::field-wrapper>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('quillEditorField', ({ state, placeholder, minHeight, readOnly, toolbar }) => ({
        state: state,
        quill: null,
        isUpdatingFromState: false,

        init() {
            this.ensureQuillLoaded(() => {
                this.mountQuill();
            });
        },

        ensureQuillLoaded(callback) {
            if (typeof window.Quill !== 'undefined') {
                callback();
                return;
            }

            // Fallback dynamic script loader if push scripts didn't execute yet
            let checkQuill = setInterval(() => {
                if (typeof window.Quill !== 'undefined') {
                    clearInterval(checkQuill);
                    callback();
                }
            }, 50);

            // Timeout fallback after 3 seconds
            setTimeout(() => {
                if (typeof window.Quill === 'undefined') {
                    clearInterval(checkQuill);
                    const script = document.createElement('script');
                    script.src = 'https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js';
                    script.onload = () => callback();
                    document.head.appendChild(script);
                }
            }, 3000);
        },

        mountQuill() {
            if (!this.$refs.editor || this.quill) return;

            this.quill = new window.Quill(this.$refs.editor, {
                theme: 'snow',
                placeholder: placeholder,
                readOnly: readOnly,
                modules: {
                    toolbar: toolbar
                }
            });

            // Set initial content if present
            if (this.state) {
                this.isUpdatingFromState = true;
                this.quill.root.innerHTML = this.state;
                this.isUpdatingFromState = false;
            }

            // Listen to Quill changes and sync with Livewire state
            this.quill.on('text-change', (delta, oldDelta, source) => {
                if (this.isUpdatingFromState) return;

                const html = this.quill.root.innerHTML;
                const cleanHtml = (html === '<p><br></p>' || html === '<p></p>' || html.trim() === '') ? null : html;
                
                if (this.state !== cleanHtml) {
                    this.state = cleanHtml;
                }
            });

            // Watch external state updates (e.g., Livewire hydration, server-side changes)
            this.$watch('state', (value) => {
                if (!this.quill) return;

                const currentHtml = this.quill.root.innerHTML;
                const incomingHtml = value || '';

                if (currentHtml !== incomingHtml && !this.quill.hasFocus()) {
                    this.isUpdatingFromState = true;
                    this.quill.root.innerHTML = incomingHtml;
                    this.isUpdatingFromState = false;
                }
            });
        }
    }));
});
</script>
