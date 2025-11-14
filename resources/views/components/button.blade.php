{{--
    <x-button> component

    PURPOSE:
    --------
    Renders either:
      - a <button> element, OR
      - an <a> element styled as a button
    depending on whether an "href" attribute is present.

    EXAMPLES:
    ---------
        <!-- Renders a <button> (no href) -->
        <x-button type="submit">Save</x-button>

        <!-- Renders an <a> (has href) -->
        <x-button href="{{ route('demo.users') }}">View Users</x-button>

        <!-- Custom variant and additional classes -->
        <x-button variant="secondary" class="ml-2">Cancel</x-button>

    PROPS:
    ------
    - $variant : maps directly into Bootstrap's "btn-{variant}" classes.
                 Default: 'primary'
                 e.g. 'primary', 'secondary', 'danger', etc.
--}}
@props(['variant' => 'primary'])

@php
    /**
     * $tag
     * ----
     * Decides which HTML tag to render ("a" or "button").
     *
     * $attributes
     * -----------
     * - Special Blade variable available in all components.
     * - It contains all attributes passed by the parent:
     *       <x-button href="/demo/users" class="btn-lg">Text</x-button>
     *   Here:
     *       $attributes->has('href') === true
     *
     * LOGIC:
     * ------
     * - If the attributes include an 'href', we render <a>:
     *       $tag = 'a';
     * - Otherwise, we render <button>:
     *       $tag = 'button';
     *
     * This makes the component flexible:
     * - use it for real form submits
     * - or as a link styled like a button
     */
    $tag = $attributes->has('href') ? 'a' : 'button';
@endphp

{{--
    Element rendering:
    ------------------
    <{{ $tag }} ...> => becomes either <a ...> or <button ...>

    $attributes->merge(['class' => 'btn btn-'.$variant])
    -----------------------------------------------
    - Adds default Bootstrap button classes:
        "btn btn-primary"  (if $variant = 'primary')
        "btn btn-secondary" (if $variant = 'secondary'), etc.
    - Merges any classes given by the parent:
        <x-button class="btn-lg">
      => final class: "btn btn-primary btn-lg"

    $slot
    -----
    - Contains the inner content passed to the component:
        <x-button>Click me</x-button>
      => $slot = "Click me"
--}}
<{{ $tag }} {{ $attributes->merge(['class' => 'btn btn-'.$variant]) }}>
{{ $slot }}
</{{ $tag }}>
