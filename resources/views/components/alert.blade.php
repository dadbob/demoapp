{{--
    This is a reusable <x-alert> component.

    Usage examples:
    <x-alert type="success">User created!</x-alert>
    <x-alert type="danger" class="mt-3">Something went wrong</x-alert>

    PROPS:
    - $type: passed in from the component usage, e.g. <x-alert type="success">
      If not provided, it defaults to 'info'.
--}}
@props(['type' => 'info'])

@php
    /**
     * $classes
     * -------
     * Local PHP array that maps the $type prop
     * to the corresponding Bootstrap alert CSS class.
     *
     * KEY   => VALUE
     * 'success' => 'alert-success'
     * 'danger'  => 'alert-danger'
     * 'warning' => 'alert-warning'
     * 'info'    => 'alert-info'
     *
     * WHERE IT COMES FROM:
     * - This array is defined right here in the component.
     * - It is not passed in from outside; it’s an internal lookup table.
     */
    $classes = [
        'success' => 'alert-success',
        'danger'  => 'alert-danger',
        'warning' => 'alert-warning',
        'info'    => 'alert-info',
    ];
@endphp

{{--
    $attributes
    -----------
    - Special Blade variable automatically available inside components.
    - It contains all extra HTML attributes passed to the component usage:
        <x-alert type="success" class="mt-3" id="save-alert">
    - In this example:
        $attributes = ['class' => 'mt-3', 'id' => 'save-alert', ...]
    - We use merge() to merge our default "alert ..." class
      with any classes passed by the caller.

    $slot
    -----
    - Special Blade variable that contains the inner content between
      the component tags:
        <x-alert>THIS IS THE SLOT</x-alert>
      => $slot = "THIS IS THE SLOT"
--}}
<div {{ $attributes->merge(['class' => 'alert '.($classes[$type] ?? 'alert-info')]) }}>
    {{--
        We output the slot contents here, i.e. the message body
        provided by whoever uses the component.
    --}}
    {{ $slot }}
</div>
