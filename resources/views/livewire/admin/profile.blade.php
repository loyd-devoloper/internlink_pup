<div class="bg-gray-100 min-h-[100svh] flex">
    {{-- aside --}}
  <x-asset.admin.header/>
    {{-- header --}}
    <div class="w-full">
        <x-asset.admin.topnav/>

        <form wire:submit="updateInfo" class="p-10">
            {{ $this->form }}
            <button class="px-5 py-2 bg-green-500 w-full text-white mt-5 rounded-md">Update</button>
        </form>
       </div>
       @livewire('database-notifications')
</div>
