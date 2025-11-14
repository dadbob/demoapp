@extends('layouts.app')

@section('title', 'Blade Demo Dashboard')

@section('content')
    <div class="mb-4">
        <h1 class="h3">Blade Demo</h1>
        <p class="text-muted">Showing off Blade components, slots, directives, stacks & more.</p>
    </div>

    <div class="row">

        <div class="col-md-4">
            <x-card title="Reusable Blade components" footer="All of these live in resources/views/components.">
                <ul class="mb-0">
                    <li class="mb-1">
                        <strong>&lt;x-button&gt;</strong> – shared button styling for links and form actions.
                    </li>
                    <li class="mb-1">
                        <strong>&lt;x-card&gt;</strong> – standard card layout for panels and widgets.
                    </li>
                    <li class="mb-1">
                        <strong>&lt;x-avatar&gt;</strong> – renders user initials in a circular avatar.
                    </li>
                    <li class="mb-1">
                        <strong>&lt;x-badge&gt;</strong> – status / role labels (e.g. Admin vs User).
                    </li>
                    <li class="mb-1">
                        <strong>&lt;x-table&gt;</strong> – table shell with configurable headers.
                    </li>
                    <li class="mb-1">
                        <strong>&lt;x-modal&gt;</strong> – Bootstrap modal wrapper with slots and stacked scripts.
                    </li>
                </ul>
            </x-card>
        </div>

        <div class="col-md-4">
            <x-card title="Where to see each Blade feature" footer="Use these pages during the demo.">
                <ul class="mb-0">
                    <li class="mb-1">
                        <strong>Dashboard</strong> – Shows layout inheritance, cards, buttons,
                        alerts and the overall structure.
                    </li>
                    <li class="mb-1">
                        <strong>Users page</strong> – Demonstrates table component, row partials,
                        avatar &amp; badge components, and AJAX-loaded modal details.
                    </li>
                    <li class="mb-1">
                        <strong>Modals page</strong> – Shows the reusable modal component and
                        how scripts are injected via Blade stacks.
                    </li>
                    <li class="mb-1">
                        <strong>Navbar</strong> – Uses auth directives to show login/register vs.
                        authenticated user dropdown.
                    </li>
                </ul>
            </x-card>
        </div>

        <div class="col-md-4">
            <x-card title="Quick Actions" footer="Blade components + slots">
                <x-button href="{{ route('demo.users') }}">View Users</x-button>
                <x-button variant="secondary" href="{{ route('demo.modals') }}" class="ml-2">
                    Modals Demo
                </x-button>
            </x-card>
        </div>

    </div>

    {{-- BLADE FEATURES OVERVIEW SECTION --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header font-weight-bold">
            Blade Features Overview
        </div>

        <div class="card-body">
            <p class="text-muted">
                This dashboard demonstrates the most important and modern Blade features used in professional Laravel applications.
            </p>

            <ul class="list-group list-group-flush">

                {{-- 1. Layouts & Sections --}}
                <li class="list-group-item">
                    <strong>Blade Layouts & Sections</strong>
                    <p class="mb-1 text-muted">
                        Views extend a base layout using
                        <code>@@extends('layouts.app')</code>, define content with
                        <code>@@section('content')</code>, and render it with
                        <code>@@yield('content')</code>.
                    </p>
                </li>

                {{-- 2. Components with Props & Slots --}}
                <li class="list-group-item">
                    <strong>Components (Props & Slots)</strong>
                    <p class="mb-1 text-muted">
                        Reusable UI elements such as <code>&lt;x-card&gt;</code>,
                        <code>&lt;x-button&gt;</code>, and <code>&lt;x-modal&gt;</code>
                        receive data via props and render inner content via
                        the <code>$slot</code> variable.
                    </p>
                </li>

                {{-- 3. Attribute Bags --}}
                <li class="list-group-item">
                    <strong>Attribute Bags &amp; Merging</strong>
                    <p class="mb-1 text-muted">
                        Components merge HTML attributes using
                        <code>$attributes-&gt;merge([...])</code>, allowing parent
                        views to add classes, IDs, and data-attributes cleanly.
                    </p>
                </li>

                {{-- 4. Custom Blade Directives --}}
                <li class="list-group-item">
                    <strong>Custom Directives (<code>@@admin</code>)</strong>
                    <p class="mb-1 text-muted">
                        Custom logic is added to Blade via
                        <code>Blade::if('admin', ...)</code>, enabling expressive
                        syntax such as <code>@@admin ... @@endadmin</code> for
                        role-based sections.
                    </p>
                </li>

                {{-- 5. Loop Metadata --}}
                <li class="list-group-item">
                    <strong>Loop Metadata (<code>$loop-&gt;first</code> / <code>$loop-&gt;last</code>)</strong>
                    <p class="mb-1 text-muted">
                        Inside <code>@@foreach</code> loops, Blade exposes the
                        <code>$loop</code> variable (e.g. <code>$loop-&gt;first</code>,
                        <code>$loop-&gt;last</code>, <code>$loop-&gt;iteration</code>)
                        to simplify list rendering.
                    </p>
                </li>

                {{-- 6. Stacks --}}
                <li class="list-group-item">
                    <strong>Blade Stacks (<code>@@push</code> / <code>@@stack</code>)</strong>
                    <p class="mb-1 text-muted">
                        Child views and components can inject page-specific scripts or
                        styles using <code>@@push('scripts')</code> and render them
                        in the layout with <code>@@stack('scripts')</code>, keeping
                        frontend code modular.
                    </p>
                </li>

            </ul>
        </div>
    </div>



    @admin
        <x-alert type="danger" class="mt-3">
            You are seeing this because you are <strong>admin</strong> (custom @@admin directive defined in AppServiceProvider).
        </x-alert>
    @endadmin

@endsection
