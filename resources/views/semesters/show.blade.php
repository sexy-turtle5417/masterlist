<x-layout>
    <ul>
        @foreach ($cadets as $cadet)
            <li>
                <div>{{ $cadet->student->student_number }}</div>
                <div>CDT
                    {{ $cadet->student->first_name }}
                    @if ($cadet->student->middle_name != null)
                        {{ $cadet->student->middle_name[0] }}
                    @endif

                    {{ $cadet->student->last_name }}
                </div>
                <div>
                    {{ $cadet->student->gender }}
                </div>
                <div>
                    {{ $cadet->courseSemester->course->title }}
                </div>
                <div>
                    {{ $cadet->total_hours_attended }} Hours
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
