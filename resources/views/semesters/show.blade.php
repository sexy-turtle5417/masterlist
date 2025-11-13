<x-layout>

    <div class="m-2 w-96">
        <x-stat-component title="Total Strength"
            description="{{ $male_cadet_count }} male and {{ $female_cadet_count }} female">
            {{ $total_strength }}
        </x-stat-component>
    </div>


    <div class="w-2/3">
        <ul>
            <div class="flex flex-col gap-2">
                @foreach ($cadets as $cadet)
                    <li>
                        <x-cadet-component :cadet="$cadet"></x-cadet-component>
                    </li>
                @endforeach
            </div>
        </ul>
    </div>

</x-layout>
