<x-filament-panels::page>
    <div class="mb-4 p-4 bg-amber-50 border border-amber-200 rounded-xl text-sm text-amber-800">
        <strong>Note:</strong> This page manages both Privacy Policy and Terms & Conditions. Only Super Admins can edit legal content. Click any section to expand it, then click <strong>Save All Changes</strong>.
    </div>
    <form wire:submit="save">
        {{ $this->form }}
        <div class="mt-6 flex justify-end">
            <x-filament::button type="submit" size="lg" icon="heroicon-o-check" color="primary">Save All Changes</x-filament::button>
        </div>
    </form>
    <x-filament-actions::modals />
</x-filament-panels::page>
