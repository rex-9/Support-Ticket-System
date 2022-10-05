<div>
    Users Dashboard

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form class="mt-8">

        <div>
            <x-jet-label for="subject" value="{{ __('Subject') }}" />
            <x-jet-input wire:model="subject" id="subject" class="block w-full mt-1" type="text" name="subject" required />
        </div>
        @error('subject') <span class="text-sm text-red-600">{{ $message }}</span>@enderror

        <div class="mt-4">
            <x-jet-label for="message" value="{{ __('Message') }}" />
            <textarea wire:model="message" class="w-full border-gray-300 rounded-lg" style="height:150px;" id="message" class="block w-full mt-1" type="text" name="message" required ></textarea>
        </div>
        @error('message') <span class="text-sm text-red-600">{{ $message }}</span>@enderror

        <div class="mt-4">
            <x-jet-label for="department" value="{{ __('Choose Department') }}" />
            <select wire:model="department" name="department" id="department" class="w-full mt-1 border-gray-300 rounded-lg">
                <option value="admin" selected>General Department</option>
                <option value="dev">Software Development Department</option>
                <option value="sale">Sales Department</option>
            </select>
        </div>

        <div class="flex items-center justify-end mt-4" wire:click="store()">
            <x-jet-button class="ml-4">
                {{ __('Submit') }}
            </x-jet-button>
        </div>

    </form>
</div>
