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


        return [
            //
            "enrollment_id" => $enrollmentId,
            "training_session_id" => $trainingSessionId,
            "time_in" => fake()->time(),
            "time_out" => fake()->time(),
            "hours_credit" => rand(3, 4),
            'remarks' => fake()->text(20)
        ];
    }
}
