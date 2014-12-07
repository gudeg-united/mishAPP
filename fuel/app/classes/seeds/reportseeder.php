<?php
// Required namespace
namespace Seeds;
class ReportSeeder
{
    // Required static method
    public static function seed()
    {
        // Prints this message on terminal
        echo "\n\n";
        echo "\nSeeding Reports:";
        echo "\n------------------------";
        // Call separated methods for organization
        $data = \Model_Report::find('all');
        if (empty($data)) {
            self::addReports();
        }
    }

    public static function addReports()
    {
        // Adds the page, using ORM Model defined for the project:
        try {
            $faker = \Faker\Factory::create();
            $event = \Model_Event::query()->where('name', 'Earthquake')->get_one();

            for ($i=0; $i < 10; $i++) {

                $report = \Model_Report::forge(array(
                    'uid' => $faker->uuid,
                    'latitude' => $faker->latitude,
                    'longitude' => $faker->longitude,
                    'event_id' => $event->id,
                    'location' => $faker->address,
                    'is_verify' => true
                ));
                $report->save();
            }


            // Prints this message on terminal
            // echo "\nhome";
        } catch (\Exception $e) {

            // In case of error, prints the message on terminal,
            // You can implement any error handling you need
            echo "\nError saving reports:";
            echo "\n" . $e->getMessage(). "\n";
        }
    }
}
