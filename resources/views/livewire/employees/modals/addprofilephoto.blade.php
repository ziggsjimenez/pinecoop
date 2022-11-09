<x-jet-dialog-modal wire:model="showAddProfilePhotoModal">
    <x-slot name="title">
        Profile Photo - {{ $selectedemployee->fullname2() }}
    </x-slot>

    <x-slot name="content">
    
        
            <div class="w-1/3 mx-3 mb-2">

                <div>
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1" for="photo">
                    Profile Photo: 
                    </label>
                    <input wire:model="photo" class="appearance-none bg-gray-100 text-gray-700 border text-sm  @error('photo') border-red-500  @enderror rounded py-2 px-4 mb-1 leading-tight focus:outline-none focus:bg-white" type="file" accept="image/*">

                    @if ($photo)
                    Photo Preview:
                    <img src="{{ $photo->temporaryUrl() }}" width="100px">
                    @endif
        
                   
                </div>
        
        
            </div>

     
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showAddProfilePhotoModal')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="storeProfilePhoto({{ $employee_id }})" wire:loading.attr="disabled">
            Submit
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>