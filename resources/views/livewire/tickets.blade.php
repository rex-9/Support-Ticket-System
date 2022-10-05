<div>
    Dashboard

    @include('livewire.display')

    <hr>

    @if (Auth::user()->role == 'user')
        <div class="mt-6">Create a Ticket</div>

        @include('livewire.form')

        @if (session()->has('message'))
            <div class="text-lg text-green-400">
                {{ session('message') }}
            </div>
        @endif
    @endif

</div>
