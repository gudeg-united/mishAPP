<?php
class Model_Report extends \Orm\Model
{
    const MIN_NEAR_BY_REPORT = 5;

    protected static $_properties = array(
        'id',
        'longitude',
        'latitude',
        'uid',
        'event_id',
        'created_at',
        'is_valid',
        'is_verify',
        'ip_address',
    );

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert', 'after_save'),
            'mysql_timestamp' => true,
        )
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

        return $this->findNearByReport($longitude, $latitude, $radius, $record->event_id);
    }

    /**
     * Find near report by community
     * @param  decimal $longitude longitude position
     * @param  decimal $latitude  latitude position
     * @param  int     $radius    Range from current position
     * @param  int     $event_id  Type of event
     * @return object
     */
    public function findNearByReport($longitude, $latitude, $radius, $event_id)
    {
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
                    AND event_id = :event
                    ORDER BY `distance`';

        $reports = DB::query($query)->param('longitude', $longitude)
                                  ->param('latitude', $latitude)
                                  ->param('radius', $radius)
                                  ->param('event', $event_id)
                                  ->execute();

        return $reports;
    }

    /**
     * Set report as valid
     */
    public function setAsValid()
    {
        $this->is_valid = 1;
        return $this->save();
    }

    /**
     * Set report as valid
     */
    public function setAsVerified()
    {
        $this->is_verify = 1;
        return $this->save();
    }
}
