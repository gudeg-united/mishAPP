<?php
class Model_Report extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'longitude',
        'latitude',
        'uid',
        'event_id',
        'created_at',
    );

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => true,
        ),
    );

    public static function validate($factory)
    {
        $val = Validation::forge($factory);
        $val->add_field('uid', 'Uid', 'required|max_length[255]');

        return $val;
    }

    /**
     * Find same report within radius
     * @param  object  $record Report record object model
     * @param  integer $radius Radius by km
     * @return object
     */
    public function findByRadius($record, $radius = 10)
    {
        $latitude = $record->latitude;
        $longitude = $record->longitude;

        $query = 'SELECT 
                    id,
                    event_id,
                    longitude,
                    latitude,
                    ACOS( SIN( RADIANS( `latitude` ) ) * SIN( RADIANS( :latitude ) ) + COS( RADIANS( `latitude` ) )
                    * COS( RADIANS(:latitude)) * COS( RADIANS( `longitude` ) - RADIANS(:longitude)) ) * 6380 AS `distance`
                    FROM `reports`
                    WHERE
                    ACOS( SIN( RADIANS( `latitude` ) ) * SIN( RADIANS(:latitude) ) + COS( RADIANS( `latitude` ) )
                    * COS( RADIANS(:latitude)) * COS( RADIANS( `longitude` ) - RADIANS(:longitude)) ) * 6380 < :radius
                    ORDER BY `distance`';

        $reports = DB::query($query)->param('longitude', $longitude)
                                  ->param('latitude', $latitude)
                                  ->param('radius', $radius)
                                  ->execute();

        return $reports;
    }
}
