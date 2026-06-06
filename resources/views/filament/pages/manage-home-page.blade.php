<x-filament-panels::page>

    <div class="mb-4 p-4 bg-blue-50 border border-blue-200 rounded-xl text-sm text-blue-700">
        <strong>How to use:</strong> Click any section below to expand it and edit its content. When done, click <strong>Save All Changes</strong> at the bottom. All sections save together in one click.
    </div>

    <form wire:submit="save">

        {{ $this->form }}

        <div class="mt-6 flex justify-end">
            <x-filament::button
                type="submit"
                size="lg"
                icon="heroicon-o-check"
                color="primary"
            >
                Save All Changes
            </x-filament::button>
        </div>

    </form>

    <x-filament-actions::modals />

</x-filament-panels::page>
