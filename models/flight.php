<?php 

class flight {
    private $flight_id, $takeOfTime, $takeOfDay, $landingTime, $landingDay, $basicPrice, $note, $planeID, $takeOfAirport, $landingAirport;

    public function __construct()
    {
        
    }

    public static function findFlights($takeOfDayInput, $takeOfAirportInput, $landingAirportInput) {
        $sql = "SELECT * FROM Flight where takeoffday = '".$takeOfDayInput."' and takeoff_airport = ".$takeOfAirportInput." and landing_airport = ".$landingAirportInput."";
        // echo $sql;
        require_once('../database/database.php');
        $result = $conn->query($sql);
        $data = array();
        while ($row = $result->fetch_assoc())
        {
            $data[] = $row;
        }
    
        echo json_encode(array('status' => true, 'data' => $data));
    }

    public static function getFlights() {
        require_once('../database/database.php');
        $query = "select distinct f.flight_id, f.takeofftime, f.takeoffday, f.landingtime, f.landingdate, f.basicprice, concat(a.name, ' (', a.code, ')') as takeoff, concat(a1.name, ' (', a1.code, ')') as landing, p.name as planename, p.no as planeno
            from (((select flight_id, takeofftime, takeoffday, landingtime, landingdate, basicprice, plane_id, takeoff_airport, landing_airport from flight) f 
            join (select airport_id, name, code from airport) a on f.takeoff_airport = a.airport_id) 
            join (select airport_id, name, code from airport) a1 on f.landing_airport = a1.airport_id) 
            join (select plane_id, name, no from plane) p on p.plane_id = f.plane_id
            order by f.takeoffday, f.takeofftime asc;";
        $result = $conn->query($query);
        $data = array();
        while($row = $result->fetch_assoc()) {
        $data[] = $row;
        }
        echo json_encode(array('status' => true, 'data' => $data));
    }

    public static function getFligthsById($fid) {
        require_once('../database/database.php');
        $query = "select distinct f.flight_id, f.takeofftime, f.takeoffday, f.landingtime, f.landingdate, f.basicprice, concat(a.name, ' (', a.code, ')') as takeoff, concat(a1.name, ' (', a1.code, ')') as landing, p.name as planename, p.no as planeno
            from (((select flight_id, takeofftime, takeoffday, landingtime, landingdate, basicprice, plane_id, takeoff_airport, landing_airport from flight) f 
            join (select airport_id, name, code from airport) a on f.takeoff_airport = a.airport_id) 
            join (select airport_id, name, code from airport) a1 on f.landing_airport = a1.airport_id) 
            join (select plane_id, name, no from plane) p on p.plane_id = f.plane_id where f.flight_id = ".$fid.";";
        $result = $conn->query($query);
        $data = array();
        while($row = $result->fetch_assoc()) {
        $data[] = $row;
        }
        echo json_encode(array('status' => true, 'data' => $data));
    }

    public static function addFlight($takeofftime, $takeoffday, $landingtime, $landingdate, $basicprice, $notes, $plane_id, $takeoff_airport, $landing_airport) {
        require_once('../database/database.php');
        $query = "insert into Flight (takeofftime, takeoffday, landingtime, landingdate, basicprice, notes, plane_id, takeoff_airport, landing_airport)
                values ('" . $takeofftime . "', '" . $takeoffday . "', '" . $landingtime . "', '" . $landingdate . "', '" . $basicprice . "', '" . $notes . "', " . $plane_id . ", " . $takeoff_airport . ", " . $landing_airport . ");";
        $conn->query($query);
        echo json_encode(array('status' => true));
    }

    public static function updateFlight($flight_id, $basicprice) {
        require_once('../database/database.php');
        $query = "update flight set basicprice = " . $basicprice . " where flight_id = " . $flight_id . ";";
        $conn->query($query);
        echo json_encode(array('status' => true));
    }
}

?>