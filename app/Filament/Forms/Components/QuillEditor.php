<?php

namespace App\Filament\Forms\Components;

use Closure;
use Filament\Forms\Components\Concerns\CanBeReadOnly;
use Filament\Forms\Components\Concerns\HasPlaceholder;
use Filament\Forms\Components\Field;

class QuillEditor extends Field
{
    use CanBeReadOnly;
    use HasPlaceholder;

    protected string $view = 'filament.forms.components.quill-editor';

    protected int | Closure $minHeight = 220;

    protected array | Closure | null $toolbar = null;

    /**
     * Default comprehensive toolbar configuration supporting headers, formatting,
     * colors, lists, alignments, blockquotes, and most importantly: LINKS.
     */
    public function getDefaultToolbar(): array
    {
        return [
            [['header' => [1, 2, 3, 4, false]]],
            ['bold', 'italic', 'underline', 'strike'],
            [['color' => []], ['background' => []]],
            [['list' => 'ordered'], ['list' => 'bullet']],
            [['align' => []]],
            ['blockquote', 'code-block'],
            ['link', 'clean'],
        ];
    }

    public function minHeight(int | Closure $pixels): static
    {
        $this->minHeight = $pixels;

        return $this;
    }

    public function getMinHeight(): int
    {
        return (int) $this->evaluate($this->minHeight);
    }

    public function toolbar(array | Closure $toolbar): static
    {
        $this->toolbar = $toolbar;

        return $this;
    }

    public function getToolbar(): array
    {
        return $this->evaluate($this->toolbar) ?? $this->getDefaultToolbar();
    }
}
