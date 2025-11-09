<?php

namespace Database\Factories;

use App\Models\Enrollment;
use App\Models\TrainingSession;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $used = [];
        static $enrollmentIds;
        static $trainingSessionIds;

        if (!isset($enrollmentIds)) {
            $enrollmentIds = Enrollment::pluck('id')->toArray();
            $trainingSessionIds = TrainingSession::pluck('id')->toArray();

            if (empty($enrollmentIds) || empty($trainingSessionIds))
                throw new \Exception("Enrollments and TrainingSessions must exist before creating Attendances.");
        }

        $maxCombos = count($enrollmentIds) * count($trainingSessionIds);
        if (count($used) >= $maxCombos) {
            throw new \Exception("No more unique enrollments-trainingSessions combinations available.");
        }

        do {
            $enrollmentId = fake()->randomElement($enrollmentIds);
            $trainingSessionId = fake()->randomElement($trainingSessionIds);
            $key = "$enrollmentId-$trainingSessionId";
        } while (isset($used[$key]));

        $used[$key] = true;

        $possibleRemarks = [
            "PRESENT",
            "EXCUSED",
            "ABSENT"
        ];

        return [
            //
            "enrollment_id" => $enrollmentId,
            "training_session_id" => $trainingSessionId,
            "time_in" => rand(1, 0) == 1 ? fake()->time() : null,
            "time_out" => rand(1, 0) == 1 ? fake()->time() : null,
            "hours_credit" => fake()->randomFloat(2, 3, 4),
            'remarks' => fake()->randomElement($possibleRemarks)
        ];
    }
}
