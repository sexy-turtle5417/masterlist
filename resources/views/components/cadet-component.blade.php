<div class="w-full  shadow p-3 bg-base-100">
    <div class="flex gap-2">
        <div>
            <x-avatar placeholder="{{ $cadet->student->last_name[0] }}"></x-avatar>
        </div>

        <div class="flex-1 text-sm">
            <div class="font-bold">
                <a href="" class="link link-info">
                    CDT {{ $cadet->student->first_name }}
                    @if ($cadet->student->middle_name)
                        {{ $cadet->student->middle_name[0] }}
                    @endif
                    {{ $cadet->student->last_name }}
                </a>

            </div>
            <div class="font-bold opacity-45">
                {{ $cadet->courseSemester->course->title }}
            </div>
            <div class="opacity-45">{{ $cadet->student->gender }}</div>
        </div>

        <div class="grid place-items-center">
            <div class="text">
                <div class="font-extrabold text-center text-lg">
                    @if ($cadet->total_hours_attended < $minimum_attendance)
                        <div class="text-error">
                            {{ $cadet->total_hours_attended }}
                        </div>
                    @elseif($cadet->total_hours_attended == $minimum_attendance)
                        <div class="text-warning">
                            {{ $cadet->total_hours_attended }}
                        </div>
                    @else
                        <div class="text-success">
                            {{ $cadet->total_hours_attended }}
                        </div>
                    @endif

                </div>
                <div class="opacity-45 text-xs">Hours Attended</div>
            </div>

        </div>
    </div>

</div>
