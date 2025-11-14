{{--
    user-row.blade.php

    PURPOSE:
    --------
    A single table row (<tr>) used inside the <x-table> to display user data.

    This file is included by:
        @include('demo.partials.user-row', [...])

    VARIABLES RECEIVED FROM PARENT VIEW:
    ------------------------------------
    - $user  : an associative array with user properties
               Example:
               [
                   'id'       => 1,
                   'name'     => 'Alice Johnson',
                   'email'    => 'alice@example.com',
                   'is_admin' => true
               ]

    - $index : the row number, passed manually from the parent:
               @foreach(...) @include('...user-row', ['index' => $loop->iteration])

    OTHER BEHAVIOR:
    ---------------
    - The <tr> is clickable (via JavaScript).
    - JS listens on the CSS class "user-row".
    - The attribute data-user-id="{{ $user['id'] }}" is used by JS to fetch
      the correct user info via AJAX.
--}}
<tr class="user-row"
    data-user-id="{{ $user['id'] }}"
    style="cursor:pointer;"
>

    {{-- FIRST COLUMN: index number --}}
    {{-- $index comes from the parent view, not from this partial --}}
    <td>{{ $index }}</td>

    {{-- SECOND COLUMN: Avatar + Name --}}
    <td>
        {{--
            <x-avatar> receives the name and generates initials.
            Example: "Alice Johnson" => "AJ"
        --}}
        <x-avatar :name="$user['name']" />

        {{--
            The user-name-link is styled (underline, hover),
            and JS can use this to show hover cues.
        --}}
        <span class="user-name-link">{{ $user['name'] }}</span>
    </td>

    {{-- THIRD COLUMN: Email --}}
    <td>{{ $user['email'] }}</td>

    {{-- FOURTH COLUMN: Role Badge --}}
    <td>
        {{-- Conditionally render an "Admin" or "User" badge using <x-badge> --}}
        @if($user['is_admin'])
            <x-badge type="danger">Admin</x-badge>
        @else
            <x-badge type="secondary">User</x-badge>
        @endif
    </td>

</tr>
