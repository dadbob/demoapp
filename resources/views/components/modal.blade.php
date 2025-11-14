@props(['id', 'title'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog"
     aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            {{-- HEADER --}}
            <div class="modal-header">
                {{-- Modal title --}}
                <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>

                {{-- Bootstrap close button --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{-- BODY --}}
            <div class="modal-body">
                {{-- $slot contains whatever the parent view placed inside --}}
                {{ $slot }}
            </div>

            {{-- FOOTER (optional) --}}
            @isset($footer)
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endisset

        </div>
    </div>
</div>

@once
    @push('scripts')
        <script>
            /**
             * This is an example script loaded specifically for this modal instance.
             *
             * Where '$id' comes from:
             * - It comes from the modal props defined at the top: @@props(['id', 'title'])
            *
             * When Blade compiles the component, it injects the value passed in:
             *   &lt;x-modal id="deleteModal" title="Delete?">
             *
             * So here, "deleteModal" becomes available as {{ $id }}.
             */
            console.log("Modal component '{{ $id }}' scripts loaded");
        </script>
    @endpush
@endonce
