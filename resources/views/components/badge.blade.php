{{--
    <x-badge> component

    PURPOSE:
    --------
    Renders a small Bootstrap badge with configurable color/type.

    EXAMPLES:
    ---------
        <x-badge>User</x-badge>
        <x-badge type="danger">Admin</x-badge>
        <x-badge type="success" class="ml-2">Active</x-badge>

    PROPS:
    ------
    - $type : the Bootstrap badge style (primary, secondary, danger, etc.)
              Default: 'secondary'
--}}
@props(['type' => 'secondary'])

{{--
    $attributes
    -----------
    - Special Blade variable available in all components.
    - Contains all extra HTML attributes passed when using the component:
        <x-badge type="danger" class="ml-2" id="role-badge">Admin</x-badge>
      Here:
        $attributes = ['class' => 'ml-2', 'id' => 'role-badge']
    - merge(['class' => 'badge badge-'.$type]) does:
        - sets default classes: "badge badge-secondary" (or danger/success/etc.)
        - merges user-provided classes (e.g. "ml-2") onto them.

    $type
    -----
    - Comes from @props(['type' => 'secondary']).
    - Set by the parent when calling the component:
        <x-badge type="danger">...</x-badge>
      If omitted:
        <x-badge>...</x-badge> -> $type = 'secondary'

    $slot
    -----
    - Contains the inner content between <x-badge> and </x-badge>, e.g.
        <x-badge>Admin</x-badge>
      => $slot = "Admin"
--}}
<span {{ $attributes->merge(['class' => 'badge badge-'.$type]) }}>
    {{ $slot }}
</span>
