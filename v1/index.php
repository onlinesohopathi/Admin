<?php

include  'TableSearch.php';

  $table = $_GET["table"];
  $FLIGHT_ID = $_GET["Flight"];
  

if ($table == "Employee") {
    $query = "SELECT * FROM EMPLOYEE ";

    // ShowTable($query);
    JSONsendFLight($query);
}
else if ($table == "Validate") {

    $query = "SELECT * FROM ADMIN ";
    $FLIGHT_ID = sha1($FLIGHT_ID);
    // ShowTable($query);
    EmployeeValidate($query , $FLIGHT_ID);
}
else if ($table == "ScheduleCalendar") {
    $query = "SELECT F.AIRCRAFT_ID , A.CITY \"SOURCE\" , D.CITY \"DESTINATION\" ,
    	F.ARRIVAL_DATE_TIME, F.DEPARTURE_DATE_TIME , F.STATUS , F.TYPE,F.FLIGHT_ID 
    	FROM FLIGHT F JOIN ROUTE R 
		ON F.ROUTE_ID = R.ROUTE_ID
		JOIN AIRPORT A
		ON A.AIRPORT_ID = R.SOURCE
		JOIN AIRPORT D ON D.AIRPORT_ID = R.DESTINATION
        ORDER BY F.DEPARTURE_DATE_TIME ASC ";

    // ShowTable($query);
    CalendarEvents($query);
}
else if( $table == "AirportShow"){
    $query = "SELECT * FROM AIRPORT ORDER BY COUNTRY ASC";
    // $query = "SELECT * FROM AIRPORT";

    fetchJSON($query);
}
else if( $table == "AircraftInfo"){
$query = "SELECT * FROM AIRCRAFT_INFO";
    fetchJSON($query);
}
else if($table == "Aircraft"){
    $query = "SELECT * FROM AIRCRAFT";
    fetchJSON($query);
}
elseif ($table == "RouteShow") {
    # code...
    $query = "SELECT R.ROUTE_ID , S.NAME \"SRC\",S.CITY \"SRCCITY\" ,
            S.LATITUDE \"SourceLat\", S.LONGITUDE \"SourceLNG\", D.NAME \"DST\",
            D.CITY \"DSTCITY\", D.LATITUDE \"DestLat\" , D.LONGITUDE \"DestLng\" 
            FROM ROUTE R JOIN AIRPORT S ON
            R.SOURCE = S.AIRPORT_ID 
            JOIN AIRPORT D ON
            R.DESTINATION = D.AIRPORT_ID";
    fetchJSON($query);
}
elseif($table == "ShowPrice"){
    $query = "SELECT P.PRICE_ID \"ID\",P.ROUTE_ID \"ROUTE\" , S.NAME \"SRC\" , D.NAME \"DST\" , 
            (SELECT PRICE FROM PRICE_ITEM WHERE PRICE_CATEGORY_ID= 1 AND PRICE_ITEM.PRICE_ID = P.PRICE_ID) \"ECONOMY\" , 
            (SELECT PRICE FROM PRICE_ITEM WHERE PRICE_CATEGORY_ID= 2 AND PRICE_ITEM.PRICE_ID = P.PRICE_ID) \"BUSINESS\" , 
            (SELECT PRICE FROM PRICE_ITEM WHERE PRICE_CATEGORY_ID= 3 AND PRICE_ITEM.PRICE_ID = P.PRICE_ID) \"FIRST\" , 
            P.START_DATE \"START\", P.END_DATE \"END\" FROM PRICE P 
            JOIN ROUTE R ON R.ROUTE_ID = P.ROUTE_ID
            JOIN AIRPORT S ON R.SOURCE = S.AIRPORT_ID
            JOIN AIRPORT D ON R.DESTINATION = D.AIRPORT_ID
            WHERE (P.END_DATE IS NOT NULL )";

    fetchJSON($query);
}
elseif ($table == "ShowCurrentPrice") {
    # code...
    $query = "SELECT P.PRICE_ID \"ID\",P.ROUTE_ID \"ROUTE\" , S.NAME \"SRC\" , 
        D.NAME \"DST\" , 
        (SELECT PRICE FROM PRICE_ITEM WHERE PRICE_CATEGORY_ID= 1 AND PRICE_ITEM.PRICE_ID = P.PRICE_ID) \"ECONOMY\" , 
        (SELECT PRICE FROM PRICE_ITEM WHERE PRICE_CATEGORY_ID= 2 AND PRICE_ITEM.PRICE_ID = P.PRICE_ID) \"BUSINESS\" , 
        (SELECT PRICE FROM PRICE_ITEM WHERE PRICE_CATEGORY_ID= 3 AND PRICE_ITEM.PRICE_ID = P.PRICE_ID) \"FIRST\" , 
        P.START_DATE \"START\", P.END_DATE \"END\" FROM PRICE P 
        JOIN ROUTE R ON R.ROUTE_ID = P.ROUTE_ID
        JOIN AIRPORT S ON R.SOURCE = S.AIRPORT_ID
        JOIN AIRPORT D ON R.DESTINATION = D.AIRPORT_ID
        WHERE (P.END_DATE IS NULL) ORDER BY P.PRICE_ID ASC";

    fetchJSON($query);   
}
elseif ($table == "GetCapacity") {
    # code...
    // $query = "SELECT FIRST_CLASS_CAPACITY \"FIRST\", BUSINESS_CLASS_CAPACITY \"BUSINESS\",
    // ECONOMY_CLASS_CAPACITY \"ECONOMY\" FROM AIRCRAFT WHERE AIRCRAFT_ID = 
    // (SELECT AIRCRAFT_ID FROM FLIGHT WHERE FLIGHT.FLIGHT_ID = '".$FLIGHT_ID."')";

    $query = "SELECT B.SEAT_NUMBER \"SEAT\", A.FIRST_CLASS_CAPACITY \"FIRST\",
            A.BUSINESS_CLASS_CAPACITY \"BUSINESS\" , A.ECONOMY_CLASS_CAPACITY \"ECONOMY\" 
            FROM BOARDING B RIGHT OUTER JOIN BOOKING K  
            ON B.BOOKING_ID = K.BOOKING_ID
            JOIN FLIGHT F ON F.FLIGHT_ID = K.FLIGHT_ID
            JOIN AIRCRAFT A ON A.AIRCRAFT_ID = F.AIRCRAFT_ID
            WHERE K.FLIGHT_ID = '".$FLIGHT_ID."'";

    // $query  = "SELECT B.SEAT_NUMBER  FROM 
    //         BOARDING B  JOIN BOOKING K  
    //         ON B.BOOKING_ID = K.BOOKING_ID
    //         WHERE K.FLIGHT_ID = '".$FLIGHT_ID."'";


    fetchJSON($query);
}
elseif ($table == "Passenger") {
    # code...
    $query = "SELECT * FROM PASSENGER";

    fetchJSON($query);
}
elseif ($table == "Booking") {
    # code...
    $query = "SELECT * FROM BOOKING";

    fetchJSON($query);
}
elseif ($table == "DeleteFlight") {
    # code...
    
    $strings = "SELECT P.FIRST_NAME, P.LAST_NAME , P.GENDER , P.ADDRESS, P.EMAIL_ID 
                FROM BOOKING B JOIN PASSENGER P 
                ON P.PASSENGER_ID = B.PASSENGER_ID
                where FLIGHT_ID = '".$FLIGHT_ID."'";

    MailAllPassengers($strings);
    
    $query = "DELETE FROM FLIGHT WHERE FLIGHT_ID = '".$FLIGHT_ID."'";

    ExecuteQuery($query);


    echo "Done";
}
elseif ($table == "EndPrice") {
    # code...
    $strings = "UPDATE PRICE SET END_DATE = SYSDATE WHERE ROUTE_ID = '".$FLIGHT_ID."'";

    ExecuteQuery($strings);
    ExecuteQuery("COMMIT");
    echo "Done...";
}
elseif ($table == "DelRoute") {
    # code...
    $strings = "DELETE FROM ROUTE WHERE ROUTE_ID = '".$FLIGHT_ID."'";
    ExecuteQuery($strings);
    ExecuteQuery("COMMIT");
    echo "Done...";

}
elseif ($table == "DelEmp") {
    # code...
     $strings = "DELETE FROM EMPLOYEE WHERE EMPLOYEE_ID = '".$FLIGHT_ID."'";
    ExecuteQuery($strings);
    ExecuteQuery("COMMIT");
    echo "Done...";
}
elseif ($table == "DelOffer") {
    # code...
    $strings = "UPDATE DISCOUNT SET OFFER_END = SYSDATE WHERE DISCOUNT_ID = '".$FLIGHT_ID."'";
    ExecuteQuery($strings);
    ExecuteQuery("COMMIT");
    echo "Done...";

}
elseif ($table == "GetFlightCrew") {
    # code...
    $strings = "SELECT F.FLIGHT_ID \"FID\", F.ROUTE_ID \"RID\", E.EMPLOYEE_ID \"EID\", 
        E.FIRST_NAME||' '||E.LAST_NAME \"NAME\", E.DESIGNATION \"DESIG\", 
        F.DEPARTURE_DATE_TIME \"DEPART\",F.ARRIVAL_DATE_TIME \"ARRIVE\" 
        FROM FLIGHT_CREW C 
        JOIN FLIGHT F ON F.FLIGHT_ID = C.FLIGHT_ID 
        JOIN EMPLOYEE E ON C.EMPLOYEE_ID = E.EMPLOYEE_ID WHERE ROWNUM <= 10000";

    fetchJSON($strings);

}
elseif($table == "InfligthExp"){
    $strings = "SELECT E.EXPENSE_ID , F.FLIGHT_ID , A.MODEL , E.FIRST_CLASS_PLATTER ,
     E.BUSINESS_CLASS_PLATTER, E.ECONOMY_CLASS_PLATTER FROM INFLIGHT_EXPENSE E
    JOIN FLIGHT F ON F.FLIGHT_ID = E.FLIGHT_ID 
    JOIN AIRCRAFT_INFO A ON F.AIRCRAFT_ID = A.AIRCRAFT_ID";

    fetchJSON($strings);
}
elseif ($table == "BoardingData") {
    # code...
    $strings = "SELECT P.FIRST_NAME||' '||P.LAST_NAME \"NAME\",S.AIRPORT_CODE \"SRCCODE\", 
        S.NAME \"SRCNAM\", D.AIRPORT_CODE \"DSTCODE\", D.NAME \"DSTNAME\",
        F.ARRIVAL_DATE_TIME , F.DEPARTURE_DATE_TIME , B.SEAT_NUMBER , F.FLIGHT_ID
        FROM BOARDING B 
        JOIN BOOKING K ON B.BOOKING_ID = K.BOOKING_ID
        JOIN FLIGHT F ON F.FLIGHT_ID = K.FLIGHT_ID
        JOIN ROUTE R ON R.ROUTE_ID = F.ROUTE_ID
        JOIN AIRPORT S ON S.AIRPORT_ID = R.SOURCE
        JOIN AIRPORT D ON D.AIRPORT_ID = R.DESTINATION
        JOIN PASSENGER P ON P.PASSENGER_ID = K.PASSENGER_ID 
        WHERE B.BOOKING_ID = '".$FLIGHT_ID."'";

        fetchJSON($strings);
}
elseif ($table == "OffersShow") {
    # code...
    $query = "SELECT D.DISCOUNT_ID \"id\", D.ROUTE_ID \"ROUTE_ID\", D.TITLE \"TITLE\",
         D.DESCRIPTION \"DESCRIPTION\", D.IMAGE_URL \"URL\", D.OFFER_START \"START\",
          (SELECT I.RATE FROM DISCOUNT_ITEM I WHERE I.DISCOUNT_ID = D.DISCOUNT_ID AND I.DISCOUNT_CATEGORY_ID = 1) \"BRONZE\",
          (SELECT I.RATE FROM DISCOUNT_ITEM I WHERE I.DISCOUNT_ID = D.DISCOUNT_ID AND I.DISCOUNT_CATEGORY_ID = 2) \"SILVER\",
          (SELECT I.RATE FROM DISCOUNT_ITEM I WHERE I.DISCOUNT_ID = D.DISCOUNT_ID AND I.DISCOUNT_CATEGORY_ID = 3) \"GOLD\",
          (SELECT I.RATE FROM DISCOUNT_ITEM I WHERE I.DISCOUNT_ID = D.DISCOUNT_ID AND I.DISCOUNT_CATEGORY_ID = 4) \"PLATINUM\"
          FROM DISCOUNT D WHERE D.OFFER_END IS NULL";

    fetchJSON($query);
}
elseif ($table == "MaintenanceShow") {
    # code...
    $strings = "SELECT M.MAINTENANCE_ID , M.PLANE_ID , M.EMPLOYEE_ID, M.DEPARTMENT, 
                M.OUT_OF_SERVICE, M.BACK_TO_SERVICE ,I.PARTS_ID ,I.NAME , I.PRICE 
                FROM MAINTENANCE M RIGHT OUTER JOIN PARTS P 
                ON P.MAINTENANCE_ID = M.MAINTENANCE_ID
                JOIN PARTS_INFO I ON I.PARTS_ID = P.PARTS_ID
                ORDER BY M.MAINTENANCE_ID";
    fetchJSON($strings);
}
elseif ($table == "GetBookingInfo") {
    # code...
    $strings = "SELECT P.FIRST_NAME||' '||P.LAST_NAME \"NAME\",S.AIRPORT_CODE \"SRCCODE\", 
        S.NAME \"SRCNAM\", D.AIRPORT_CODE \"DSTCODE\", D.NAME \"DSTNAME\",
        F.ARRIVAL_DATE_TIME , F.DEPARTURE_DATE_TIME , F.FLIGHT_ID , I.NAME
        FROM BOOKING K
        JOIN FLIGHT F ON F.FLIGHT_ID = K.FLIGHT_ID
        JOIN ROUTE R ON R.ROUTE_ID = F.ROUTE_ID
        JOIN AIRPORT S ON S.AIRPORT_ID = R.SOURCE
        JOIN AIRPORT D ON D.AIRPORT_ID = R.DESTINATION
        JOIN PASSENGER P ON P.PASSENGER_ID = K.PASSENGER_ID
        JOIN PRICE_CATEGORY I ON K.PRICE_CATEGORY_ID = I.PRICE_CATEGORY_ID
        WHERE K.BOOKING_ID = '".$FLIGHT_ID."'";

    fetchJSON($strings);

}
elseif ($table == "PaymentInfo") {
    # code...

    $strings = "SELECT * FROM PAYMENT WHERE DATE_OF_PAYMENT IS NOT NULL";

    fetchJSON($strings);
}
elseif ($table == "CrewSchedule") {
    # code...
    $strings = "SELECT F.AIRCRAFT_ID , A.CITY \"SOURCE\" , D.CITY \"DESTINATION\" ,
        F.ARRIVAL_DATE_TIME, F.DEPARTURE_DATE_TIME , F.STATUS , F.TYPE,F.FLIGHT_ID 
        FROM FLIGHT F JOIN ROUTE R 
        ON F.ROUTE_ID = R.ROUTE_ID
        JOIN AIRPORT A
        ON A.AIRPORT_ID = R.SOURCE
        JOIN AIRPORT D ON D.AIRPORT_ID = R.DESTINATION
        JOIN FLIGHT_CREW C ON C.FLIGHT_ID = F.FLIGHT_ID
        WHERE C.EMPLOYEE_ID = '".$FLIGHT_ID."' 
        ORDER BY F.DEPARTURE_DATE_TIME ASC ";

    // echo $FLIGHT_ID;

    CalendarEvents($strings);
}
elseif ($table == "AnalytRoute") {
    # code...
    $strings = "SELECT R.ROUTE_ID, COUNT(F.FLIGHT_ID) \"NO OF FLIGHTS\",COUNT(B.BOOKING_ID) \"NO OF BOOKINGS\"
        FROM ROUTE R JOIN FLIGHT F
        ON R.ROUTE_ID=F.ROUTE_ID
        LEFT OUTER JOIN BOOKING B
        ON B.FLIGHT_ID=F.FLIGHT_ID
        GROUP BY R.ROUTE_ID";

        fetchJSON($strings);
}
elseif ($table == "AnalytBooking") {
    # code...
    $strings = "SELECT F.FLIGHT_ID,COUNT(B.BOOKING_ID) \"HOW MANY BOOKING\" 
        FROM  DISCOUNT D JOIN ROUTE R
        ON D.ROUTE_ID=R.ROUTE_ID
        JOIN FLIGHT F
        ON F.ROUTE_ID=R.ROUTE_ID
        JOIN BOOKING B
        ON B.FLIGHT_ID=F.FLIGHT_ID
        GROUP BY F.FLIGHT_ID";

        fetchJSON($strings);
}

  
?>