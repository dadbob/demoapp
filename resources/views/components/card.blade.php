{{--
    <x-card> component

    PURPOSE:
    --------
    A reusable Bootstrap-style card component with:
      - required title
      - optional footer
      - a body that renders whatever content is passed inside the component

    EXAMPLES:
    ---------
        <x-card title="Users">
            Card body content goes here.
        </x-card>

        <x-card title="Statistics" footer="Updated 5 minutes ago">
            Stats inside the slot...
        </x-card>

    PROPS:
    ------
    - $title  (required)  : string shown in the card header.
    - $footer (optional)  : shown only if provided, otherwise omitted.

    NOTE:
    -----
    You declare them here with @props() so Blade knows what variables
    this component expects and what their default values are.
--}}
@props(['title', 'footer' => null])

{{--
    $attributes
    -----------
    - Special Blade variable automatically injected.
    - Includes ALL extra HTML attributes passed when using the component.

    Example:
        <x-card title="Hello" class="mt-4" id="main-card">

    Then:
        $attributes = [
            "class" => "mt-4",
            "id"    => "main-card"
        ]

    merge(['class' => 'card shadow-sm mb-3'])
    ----------------------------------------
    - Ensures this element always has Bootstrap card styling.
    - Merges user-provided classes (e.g., "mt-4") with our defaults.
    - Output becomes:
        class="card shadow-sm mb-3 mt-4"

    This wrapper <div> becomes the root of the card component.
--}}
<div {{ $attributes->merge(['class' => 'card shadow-sm mb-3']) }}>

    {{-- Card Header --}}
    <div class="card-header font-weight-bold">
        {{-- $title comes from the component props --}}
        {{ $title }}
    </div>

    {{-- Card Body --}}
    <div class="card-body">
        {{--
            $slot contains the inner content passed by the parent view.
            Example:
                <x-card title="Example">
                    THIS IS THE SLOT
                </x-card>
        --}}
        {{ $slot }}
    </div>

    {{--
        Optional footer section.
        Shown only if $footer is not null.
        This allows a card to have:
        - no footer (default)
        - a string footer: <x-card footer="Updated at 12:00">
    --}}
    @if($footer)
        <div class="card-footer text-muted">
            {{ $footer }}
        </div>
    @endif
</div>
