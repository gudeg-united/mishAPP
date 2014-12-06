<?php
// Required namespace
namespace Seeds;
class EventSeeder
{
    // Required static method
    public static function seed()
    {
        // Prints this message on terminal
        echo "\n\n";
        echo "\nSeeding Events:";
        echo "\n------------------------";
        // Call separated methods for organization
        $data = \Model_Event::find('all');
        if (empty($data)) {
            self::addDefaultEvents();
        }
    }
    public static function addDefaultEvents()
    {
        // Adds the page, using ORM Model defined for the project:
        try {
            $event_types = array('Earthquake'
                                ,'Flood'
                                ,'Hurricane'
                                ,'Nuclear'
                                ,'Tornado'
                                ,'Tsunami'
                                ,'Volcano'
                                ,'Wildfire');

            foreach ($event_types as $name) {
                $event = \Model_Event::forge(array(
                    'name' => $name,
                ));
                $event->save();
            }


            // Prints this message on terminal
            // echo "\nhome";
        } catch (\Exception $e) {

            // In case of error, prints the message on terminal,
            // You can implement any error handling you need
            echo "\nError saving the default events:";
            echo "\n" . $e->getMessage(). "\n";
        }
    }
}
