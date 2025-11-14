{{--
    <x-avatar> component

    PURPOSE:
    --------
    Renders a small circular "avatar" with the user's initials.
    Example:
        <x-avatar name="Alice Johnson" />

    PROPS:
    ------
    - $name : The full name string passed from the parent view or component.
              e.g. "Alice Johnson", "Bruno Miguel Silva", etc.
--}}
@props(['name'])

@php
    /**
     * $initials
     * ---------
     * GOAL:
     *  - Convert a full name into initials like "AJ" or "BMS".
     *
     * STEPS:
     * 1) explode(' ', $name)
     *    - Splits the name string into an array by spaces.
     *      "Alice Johnson" => ['Alice', 'Johnson']
     *
     * 2) collect(...)
     *    - Wraps the array in a Laravel Collection to use helper methods like
     *      filter(), map(), join(), etc.
     *
     * 3) ->filter()
     *    - Removes any empty values (in case there are multiple spaces).
     *
     * 4) ->map(fn($part) => mb_strtoupper(mb_substr($part, 0, 1)))
     *    - For each part of the name (e.g. "Alice", "Johnson"):
     *        mb_substr($part, 0, 1)   -> gets the first character (multibyte safe)
     *        mb_strtoupper(...)       -> makes it uppercase
     *      So:
     *        "Alice"   -> "A"
     *        "Johnson" -> "J"
     *
     * 5) ->join('')
     *    - Joins all initials together into a single string:
     *        ['A', 'J'] => "AJ"
     *
     * WHERE IT COMES FROM:
     * - $name comes from the Blade prop: @props(['name'])
     * - $initials is computed locally here in the component.
     */
    $initials = collect(explode(' ', $name))
        ->filter()
        ->map(fn($part) => mb_strtoupper(mb_substr($part, 0, 1)))
        ->join('');
@endphp

{{--
    $attributes
    -----------
    - Special Blade variable available in all components.
    - Contains all extra HTML attributes passed by the caller.
      Example:
        <x-avatar name="Alice Johnson" class="ml-3" />
      -> $attributes = ['class' => 'ml-3']
    - merge([...]) combines our default classes with any classes provided by the parent.
      If both define "class", they get merged into one string.
--}}
<span
    {{ $attributes->merge([
        'class' => 'rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mr-2'
    ]) }}
    style="width:32px;height:32px;font-size:0.8rem;"
>
    {{--
        We render the computed initials inside the span,
        e.g. "AJ" for "Alice Johnson".
    --}}
    {{ $initials }}
</span>
