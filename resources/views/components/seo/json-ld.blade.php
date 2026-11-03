@props([
    'data' => null,
])

@if(!empty($data))
<script type="application/ld+json">
{!! \App\Support\SeoHelper::toJsonLd($data) !!}
</script>
@endif
