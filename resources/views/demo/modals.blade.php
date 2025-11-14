@extends('layouts.app')

@section('title', 'Blade Demo – Modals')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Modals & stacks (@@push / @@stack)</h1>

        <x-button href="{{ route('demo.dashboard') }}" variant="secondary">
            ← Back to dashboard
        </x-button>
    </div>

    <x-card title="Modal demo" footer="JS is injected via @push('scripts') in the component">

        <p>Click the button to open a Bootstrap modal built entirely as a Blade component:</p>

        <x-button variant="danger" data-toggle="modal" data-target="#demoDeleteModal">
            Open Delete Modal
        </x-button>

        <x-modal id="demoDeleteModal" title="Delete item?">
            <p>Are you sure you want to delete this item? This action cannot be undone.</p>

            <x-slot name="footer">
                <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger">Yes, delete</button>
            </x-slot>
        </x-modal>

    </x-card>

    <x-card title="Per-page script stacking">
        @verbatim
            <p class="mb-0">
                This page can add its own scripts without touching the layout, using
                <code>@push('scripts')</code> and <code>@stack('scripts')</code>.
            </p>
        @endverbatim
    </x-card>

@endsection
