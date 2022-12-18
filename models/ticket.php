<?php

use PHPMailer\PHPMailer\PHPMailer;

session_start();
class ticket
{
    public function __construct()
    {
    }
    public static function bookTicket($fanme, $lname, $nationality, $email, $phone, $flight_id, $price, $typeofseat)
    {
        require_once "../database/database.php";
        $customer_id = 'null';
        $point = 0;
        $seatID = "";
        $seatName = "";
        $checkSeat = "select MIN(s.seat_id) as seat_id, s.name as seat_name from seat s join flight f on s.plane_id = f.plane_id where s.type = '" . $typeofseat . "' and booked <> 1";
        $resultCheck = $conn->query($checkSeat);
        $ticketId = "";
        //Check seat null
        if ($resultCheck->num_rows == 0) { //if there are no seat null in type of seat which chosed by user then return false
            echo json_encode(array("status" => false));
        } else {
            while ($row = $resultCheck->fetch_assoc()) {
                $seatID = $row['seat_id'];
                $seatName = $row['seat_name'];
            }
            $updateSeat = 'update seat set booked = true where seat_id = ' . $seatID;
            $conn->query($updateSeat);

            if (isset($_SESSION['logged_in'])) {
                $queryCustomerId = 'select customer_id from customer where email = "' . $_SESSION['logged_in'] . '"';
                $resultqueryCustomerId = $conn->query($queryCustomerId);
                while ($row = $resultqueryCustomerId->fetch_assoc()) {
                    $customer_id = $row['customer_id'];
                }
                $point = $price / 100;
                $updateCustomer = "update customer set point = point + " . $point . " where email = '" . $_SESSION['logged_in'] . "'";
                $conn->query($updateCustomer);
            }



            $insertTicket = "insert into ticket (firstname, lastname, nationality, email, phone, flight_id, customer_id, seat_id, price) 
                                        values ('" . $fanme . "','" . $lname . "','" . $nationality . "','" . $email . "','" . $phone . "'," . $flight_id . "," . $customer_id . "," . $seatID . " ," . $price . ")";
            // echo $insertTicket;
            $conn->query($insertTicket);
            $getTicketID = "select ticket_id from ticket where email = '" . $email . "' and $phone = '" . $phone . "' and flight_id = '" . $flight_id . "' and seat_id='" . $seatID . "'";
            $resultTicketID = $conn->query($getTicketID);
            while ($row = $resultTicketID->fetch_assoc()) {
                $ticketId = $row['ticket_id'];
            }

            ticket::ticketMail($email, $ticketId, $fanme, $lname, $phone, $seatName, $typeofseat, $flight_id, $conn);

            echo json_encode(array("status" => true, "ticket_id" => $ticketId));
        }
    }

    public static function ticketMail($email, $ticketID, $fanme, $lname, $phone, $seatName, $typeofseat, $flight_id, $conn)
    {
        $rankSeat = "";
        if ($typeofseat == 'VIP') {
            $rankSeat = "THƯƠNG GIA";
        } else if ($typeofseat == 'SPECIAL') {
            $rankSeat = "PHỔ THÔNG ĐẶT BIỆT";
        } else {
            $rankSeat = "PHỔ THÔNG";
        }

        $query = "select distinct f.flight_id, f.takeofftime, f.takeoffday, f.landingtime, f.landingdate, f.basicprice, concat(a.name, ' (', a.code, ')') as takeoff, concat(a1.name, ' (', a1.code, ')') as landing, p.name as planename, p.no as planeno
            from (((select flight_id, takeofftime, takeoffday, landingtime, landingdate, basicprice, plane_id, takeoff_airport, landing_airport from flight) f 
            join (select airport_id, name, code from airport) a on f.takeoff_airport = a.airport_id) 
            join (select airport_id, name, code from airport) a1 on f.landing_airport = a1.airport_id) 
            join (select plane_id, name, no from plane) p on p.plane_id = f.plane_id where f.flight_id = " . $flight_id . ";";
        $result = $conn->query($query);
        $takeoff = "";
        $landing = "";
        $takeoff_date = "";
        $landing_date = "";
        $plane = "";
        $plane_no = "";

        while ($row = $result->fetch_assoc()) {
            $takeoff = $row['takeoff'];
            $landing = $row['landing'];
            $takeoff_date = $row['takeoffday'] . " " . $row['takeofftime'];
            $landing_date = $row['landingdate'] . " " . $row['landingtime'];
            $plane = $row['planename'];
            $plane_no = $row['planeno'];
        }

        $html = "
        <!DOCTYPE html>
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
                    font-size: 15px;
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
                    font-size: 15px;
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
            <div><b>Hi " . $fanme . ",</b></div>

            <div><b>We recieved you booked a flight ticket in our website. And there is your ticket flight: </b></div>

            <br>

            <img src='https://firebasestorage.googleapis.com/v0/b/mid-term-e59b2.appspot.com/o/1900xxxxxx.png?alt=media&token=58ad5185-08d3-4837-8861-ac2d0789c5b0'
                alt=''>
            <section id='body'>
                <h2>VÉ MÁY BAY ĐIỆN TỬ</h2>
                <h4 class='heading'>1. THÔNG TIN ĐẶT CHỖ </h4>
                <table style='width:100%'>
                    <tbody>
                        <tr>
                            <td class='tb_header' style='width:50%; text-align: center'>Mã đặt chỗ</td>
                            <td class='tb_header' style='width:20%'>Người đặt chỗ </td>
                            <td style='width:30%; text-transform: uppercase;'>" . $fanme . " " . $lname . "</td>
                        </tr>
                        <tr>
                            <td rowspan='3' style='text-align: center;'>
                                <h1>" . $ticketID . "</h1>
                            </td>
                            <td class='tb_header'>Ngày đặt chỗ</td>
                            <td>" . date('Y/m/d') . "</td>
                        </tr>
                        <tr>
                            <td class='tb_header'>Phone</td>
                            <td>" . $phone . "</td>
                        </tr>
                        <tr>
                            <td class='tb_header'>Emai</td>
                            <td>" . $email . "</td>
                        </tr>
                    </tbody>
                </table>
        
                <h4 class='heading'>2. THÔNG TIN KHÁCH HÀNG</h4>
                <table style='width:100%'>
                    <thead>
                        <th style='width:50%'>Tên khách hàng</th>
                        <th style='width:25%'>Số ghế</th>
                        <th style='width:25%'>Hạng ghế</th>
                    </thead>
                    <tbody>
                        <td style='text-align: center; text-transform: uppercase;'>" . $fanme . " " . $lname . " </td>
                        <td style='text-align: center;'>" . $seatName . "</td>
                        <td style='text-align: center;'>" . $rankSeat . "</td>
                    </tbody>
                </table>
        
                <h4 class='heading'>3. THÔNG TIN CHUYẾN BAY</h4>
        
                <table style='width:100%'>
                    <tbody>
                        <tr>
                            <td class='tb_header' style='width:20%'>Đi: </td>
                            <td style='width:30%; text-transform: uppercase;'>" . $takeoff . "</td>
                            <td class='tb_header' style='width:20%'>Đến: </td>
                            <td style='width:30%; text-transform: uppercase;'>" . $landing . "</td>
                        </tr>
                        <tr>
                            <td class='tb_header'>Ngày giờ đi: </td>
                            <td>" . $takeoff_date . "</td>
                            <td class='tb_header'>Ngày giờ đến: </td>
                            <td>" . $landing_date . "</td>
                        </tr>
                        <tr>
                            <td class='tb_header'>Tàu bay: </td>
                            <td style='text-transform: uppercase;'>" . $plane . "</td>
                            <td class='tb_header'>Số hiệu: </td>
                            <td style='text-transform: uppercase;'>" . $plane_no . "</td>
                        </tr>
                    </tbody>
        
                </table>
            </section>
        
            <div><b>Best wish for you!</b></div>
            <div><b>AIRTECH! TAKE-0FF YOUR DREAM!</b></div>
        </body>
        
        </html>
        
        <br>
        
        ";


        require "../vendor/autoload.php";
        $mail = new PHPMailer(true);

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "khapham1909@gmail.com";
        $mail->Password = "addqthixfgyptkbn";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;

        $mail->setFrom('khapham1909@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);

        $mail->Subject = "[AIR TECH] YOUR FLIGHT TICKET";
        $mail->Body = $html;
        $mail->send();
    }

    public static function getTicketsOfUser($userId)
    {
        require_once "../database/database.php";
        $query = "select t.ticket_id, concat(a1.name, ' (', a1.code, ')') as takeoff, concat(a2.name, ' (', a2.code, ')') as ladning, 
		concat(f.takeoffday, ' ', f.takeofftime) as takeoffdate, concat(s.name, ' (', s.type, ')') as seat, t.price
				from ((((select ticket_id, flight_id, seat_id, price, customer_id from ticket) t 
				join (select flight_id, takeofftime, takeoffday, takeoff_airport, landing_airport from flight) f on t.flight_id=f.flight_id)
                join (select name, code, airport_id from airport) a1 on a1.airport_id = f.takeoff_airport)
                join (select name, code, airport_id from airport) a2 on a2.airport_id = f.landing_airport)
                join (select seat_id, name, type from seat) s on s.seat_id = t.seat_id
                where t.customer_id = '" . $userId . "'";
        $result = $conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }

        echo json_encode(array('status' => true, 'data' => $data));
    }
}