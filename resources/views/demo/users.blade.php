@extends('layouts.app')

@section('title', 'Blade Demo – Users')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 mb-0">Users</h1>

        <x-button href="{{ route('demo.dashboard') }}" variant="secondary">
            ← Back to dashboard
        </x-button>
    </div>

    <x-card title="Users table" footer="Rendered with partials + components">
        <x-table :headers="['#', 'Name', 'Email', 'Role']">
            @foreach($users as $user)
                @include('demo.partials.user-row', [
                    'user'  => $user,
                    'index' => $loop->iteration,
                ])
            @endforeach
        </x-table>
    </x-card>

    <!-- User details modal -->
    <x-modal id="userDetailsModal" title="User details">
        <div id="user-details-loading" class="text-center py-3" style="display:none;">
            Loading...
        </div>

        <div id="user-details-content" style="display:none;">
            <p><strong>Name:</strong> <span id="ud-name"></span></p>
            <p><strong>Email:</strong> <span id="ud-email"></span></p>
            <p><strong>Admin:</strong> <span id="ud-admin"></span></p>
            <p><strong>Bio:</strong></p>
            <p id="ud-bio"></p>
        </div>
    </x-modal>
@endsection

@push('scripts')
    <script>
        /**
         * UserDetails modal controller
         * Clean, modular and Angular-friendly structure.
         */
        const UserDetails = {

            modalSelector: '#userDetailsModal',

            init() {
                this.modal = $(this.modalSelector);
                this.loading = $('#user-details-loading');
                this.content = $('#user-details-content');

                this.bindEvents();
            },

            bindEvents() {
                // Event delegation = one listener for the whole table
                $(document).on('click', '.user-row', (event) => {
                    const userId = $(event.currentTarget).data('user-id');
                    this.open(userId);
                });
            },

            open(userId) {
                this.showLoading();
                this.modal.modal('show');

                this.fetchUser(userId)
                    .then(user => this.populate(user))
                    .catch(() => this.showError());
            },

            fetchUser(id) {
                return fetch(`/demo/users/${id}`)
                    .then(response => {
                        if (!response.ok) throw new Error('User fetch failed');
                        return response.json();
                    });
            },

            populate(user) {
                $('#ud-name').text(user.name);
                $('#ud-email').text(user.email);
                $('#ud-admin').text(user.is_admin ? 'Yes' : 'No');
                $('#ud-bio').text(user.bio);

                this.showContent();
            },

            showLoading() {
                this.loading.show();
                this.content.hide();
                this.loading.text('Loading...');
            },

            showContent() {
                this.loading.hide();
                this.content.show();
            },

            showError() {
                this.loading.text('Failed to load user details.');
                this.content.hide();
            }
        };

        document.addEventListener('DOMContentLoaded', () => UserDetails.init());
    </script>
@endpush
