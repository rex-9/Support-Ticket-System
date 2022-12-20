<div class="flex flex-wrap justify-start my-4">
    @foreach ($tickets as $ticket)
        <div class="w-auto p-6 m-4 bg-green-200 rounded-lg shadow-lg">
            <p class="text-sm">Subject</p>
            <p class="text-lg">{{ $ticket->subject }}</p>
            <p class="mt-2 text-sm">Message</p>
            <p class="text-lg">{{ $ticket->message }}</p>
            <p class="mt-2 text-sm">Department</p>
            @switch($ticket->department)
                @case('admin')
                    <p class="text-lg">General</p>
                @break

                @case('dev')
                    <p class="text-lg">Software</p>
                @break

                @case('sale')
                    <p class="text-lg">Sales</p>
                @break

                @default
            @endswitch
            <p class="mt-2 text-sm">Status</p>
            <p class="mb-4 text-lg">{{ $ticket->solved ? 'Solved' : 'Pending' }}</p>
            @if (Auth::user()->role == 'dev' && $ticket->department == 'dev')
                <div class="flex justify-center w-full">
                    @if ($ticket->solved == false)
                        <button class="px-4 py-2 bg-yellow-500 rounded-lg" wire:click.prevent="solve({{ $ticket->id }})">Solve</button>
                    @else
                        <button class="px-4 py-2 bg-green-500 rounded-lg">Solved</button>
                    @endif
                </div>
            @elseif (Auth::user()->role == 'sale' && $ticket->department == 'sale')
            <div class="flex justify-center w-full">
                @if ($ticket->solved == false)
                    <button class="px-4 py-2 bg-yellow-500 rounded-lg" wire:click.prevent="solve({{ $ticket->id }})">Solve</button>
                @else
                    <button class="px-4 py-2 bg-green-500 rounded-lg">Solved</button>
                @endif
            </div>
            @elseif (Auth::user()->role == 'admin' && $ticket->department == 'admin')
            <div class="flex justify-center w-full">
                @if ($ticket->solved == false)
                    <button class="px-4 py-2 bg-yellow-500 rounded-lg" wire:click.prevent="solve({{ $ticket->id }})">Solve</button>
                @else
                    <button class="px-4 py-2 bg-green-500 rounded-lg">Solved</button>
                @endif
            </div>
            @endif
        </div>
    @endforeach
</div>
