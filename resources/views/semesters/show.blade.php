<x-layout>
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
