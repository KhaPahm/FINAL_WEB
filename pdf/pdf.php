<?php

use Dompdf\Dompdf;
use Dompdf\Options;

if (isset($_GET['ticket_id'])) {
    require_once "../database/database.php";
    $qery = 'select t.book_day, t.ticket_id, t.firstname, t.lastname, t.nationality, t.email, t.phone, 
    f.takeofftime, f.takeoffday, f.landingtime, f.landingdate, concat(a.name, " (", a.code, ")") as takeoff, concat(a1.name, " (", a1.code, ")") as landing, 
    p.name as planename, p.no as planeno,
    s.name as seat, s.type as seattype
                from (ticket t join ((((select flight_id, takeofftime, takeoffday, landingtime, landingdate, basicprice, plane_id, takeoff_airport, landing_airport from flight) f 
                join (select airport_id, name, code from airport) a on f.takeoff_airport = a.airport_id) 
                join (select airport_id, name, code from airport) a1 on f.landing_airport = a1.airport_id) 
                join (select plane_id, name, no from plane) p on p.plane_id = f.plane_id) on t.flight_id = f.flight_id)
                join (select seat_id, name, type from seat) s  on t.seat_id = s.seat_id
                where t.ticket_id = "' . $_GET['ticket_id'] . '";';


    $result = $conn->query($qery);
    $ticket_id = "";
    $fname = "";
    $lastname = "";
    $nationality = "";
    $email = "";
    $phone = "";
    $takeoffDate = "";
    $landingDate = "";
    $takeoff = "";
    $landing = "";
    $planename = "";
    $planeno = "";
    $seat = "";
    $seattype = "";
    $bookday = "";
    while ($row = $result->fetch_assoc()) {
        $ticket_id = $row['ticket_id'];
        $fname = $row['firstname'];
        $lastname = $row['lastname'];
        $nationality = $row['nationality'];
        $email = $row['email'];
        $phone = $row['phone'];
        $takeoffDate = $row['takeoffday'] . " " . $row['takeofftime'];
        $landingDate = $row['landingdate'] . " " . $row['landingtime'];
        $takeoff = $row['takeoff'];
        $landing = $row['landing'];
        $planename = $row['planename'];
        $planeno = $row['planeno'];
        $seat = $row['seat'];
        $seattype = $row['seattype'];
        $bookday = $row['book_day'];
    }


    $image = file_get_contents("../public/img/1900xxxxxx.jpg");
    $imagedata = base64_encode($image);
    $imgpath = '<img src="data:image/png;base64, ' . $imagedata . '">';

    $html = "<!DOCTYPE html>
        <html lang='en'>
        
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
        
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;800&display=swap' rel='stylesheet'>
            <style>
                @font-face {
                    font-family: 'Open Sans';
                    src: url('font/OpenSans-Medium.ttf');
                }
                body {
                    margin: 0;
                    width: 100%;
                    font-family: 'Open Sans', sans-serif;
                }
        
                img {
                    width: 100%;
                }
        
                #body {
                    padding: 20px;
                }
        
                .heading {
                    background-color: #00AC9D;
                    color: white;
                    padding: 10px;
                }
        
                td {
                    font-size: 10px;
                    padding: 10px;
                    background-color: rgb(216, 236, 253);
                }
        
                .tb_header {
                    background-color: #00467F;
                    font-weight: bolder;
                    color: white;
                }
        
                th {
                    background-color: #00467F;
                    font-size: 10px;
                    padding: 10px;
                    color: white;
                }
        
                h2 {
                    text-align: center;
                    color: #00467F;
                }
            </style>
        </head>
        
        <body>
            " . $imgpath . "
            <section id='body'>
                <h2>DIGITAL TICKET AIRPLANE</h2>
                <h4 class='heading'>1. INFRMATION ABOUT BOOKING: </h4>
                <table style='width:100%'>
                    <tbody>
                        <tr>
                            <td class='tb_header' style='width:50%; text-align: center'>CODE</td>
                            <td class='tb_header' style='width:20%'>Booking person </td>
                            <td style='width:30%; text-transform: uppercase;'>" . $fname . " " . $lastname . "</td>
                        </tr>
                        <tr>
                            <td rowspan='3' style='text-align: center;'>
                                <h1>" . $ticket_id . "</h1>
                            </td>
                            <td class='tb_header'>Booking date</td>
                            <td>" . $bookday . "</td>
                        </tr>
                        <tr>
                            <td class='tb_header'>Phone</td>
                            <td>" . $phone . "</td>
                        </tr>
                        <tr>
                            <td class='tb_header'>Email</td>
                            <td>" . $email . "</td>
                        </tr>
                    </tbody>
                </table>
        
                <h4 class='heading'>2. CUSTOMER INFORMATION</h4>
                <table style='width:100%'>
                    <thead>
                        <th style='width:50%'>Customer name </th>
                        <th style='width:25%'>Seat No</th>
                        <th style='width:25%'>Seat class</th>
                    </thead>
                    <tbody>
                        <td style='text-align: center; text-transform: uppercase;'>" . $fname . " " . $lastname . "</td>
                        <td style='text-align: center;'>" . $seat . "</td>
                        <td style='text-align: center;'>" . $seattype . "</td>
                    </tbody>
                </table>
        
                <h4 class='heading'>3. FLIGHT INFORMATION</h4>
        
                <table style='width:100%'>
                    <tbody>
                        <tr>
                            <td class='tb_header' style='width:20%'>Form: </td>
                            <td style='width:30%; text-transform: uppercase;'>" . $takeoff . "</td>
                            <td class='tb_header' style='width:20%'>To: </td>
                            <td style='width:30%; text-transform: uppercase;'>" . $landing . "</td>
                        </tr>
                        <tr>
                            <td class='tb_header'>Departure date: </td>
                            <td>" . $takeoffDate . "</td>
                            <td class='tb_header'>Arrival date: </td>
                            <td>" . $landingDate . "</td>
                        </tr>
                        <tr>
                            <td class='tb_header'>Airplane: </td>
                            <td style='text-transform: uppercase;'>" . $planename . "</td>
                            <td class='tb_header'>Number: </td>
                            <td style='text-transform: uppercase;'>" . $planeno . "</td>
                        </tr>
                    </tbody>
        
                </table>
            </section>
        
        
        </body>
        
        </html>";

    // echo $html;

    require_once "../vendor/autoload.php";

    $options = new Options();
    $options->set('defaultFont', 'Helvetica');
    $options->set('dpi', '120');
    $options->set('enable_html5_parser', true);
    $options->set('tempDir', 'C:\xampp\htdocs\final_web\pdf');
    $dompdf = new Dompdf($options);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A5', 'portrait');
    $dompdf->render();
    $dompdf->stream('document', array('Attachment' => 0));
}