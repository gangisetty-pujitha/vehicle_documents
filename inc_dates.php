<?php
set_time_limit(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
$mail=new PHPMailer();
$mail->isSMTP();
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'vechile_documents');
// Retrieve the current date value from the database
$result=mysqli_query($conn,"SELECT count(*) as total from v_docs");
$data=mysqli_fetch_assoc($result);
$no_of_rows=$data['total'];
$id1=1;
while($id1<=$no_of_rows-1){
$result = mysqli_query($conn, "SELECT * FROM v_docs where id=$id1");
$row = mysqli_fetch_assoc($result);
$d=$row['StartDate_DL'];
$date = $row['StartDate_DL'];
$date1=$row['EndDate_DL'];
$email = $row['Email'];
echo $date,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$date1."<br>";
echo $email."<br>";
$startdate=date("Y-m-d",strtotime($date));
$enddate=date("Y-m-d",strtotime($date1));
$diff = strtotime($startdate) - strtotime($enddate);
$no_of_days=abs(round($diff / 86400));
$msg="Dear".$row['Name'].'.....'.'Your Vehicle Pollution Certificate is going to expire on  '.$row['EndDate_PC'].'. Please Renewal'."<br>";
while($no_of_days!=0)
{ if($no_of_days==30 or $no_of_days==15 or $no_of_days==7 or $no_of_days==1)
    {
        $scheduled_time = date('Y-m-d H-i-s',strtotime($date));
        $current_time = date('Y-m-d H-i-s',strtotime($d));
        $delay_time = $scheduled_time - $current_time;
        echo $delay_time;
        if ($delay_time < 0) {
            $delay_time = 0;
        }
        // Use the sleep function to delay the execution of the code until the scheduled time
        sleep($delay_time);
        $mail->Host="smtp.gmail.com";
        $mail->SMTPAuth="true";
        $mail->SMTPSecure="tls";
        $mail->Port="587";
        $mail->Username="lankaanusha2001@gmail.com";
        $mail->Password="ygkgvoihalenalno";
        $mail->Subject='';
        $mail->setFrom("lankaanusha2001@gmail.com");
        $mail->Body=$msg;
        $mail->addAddress($email);
        if($mail->Send())
        {echo "Email Sent"."<br>";}
        else
        {echo "Error";}
        $mail->smtpClose();
    }
    $date = date('Y-m-d', strtotime($date. ' + 24 hours'));
    $diff = strtotime($date) - strtotime($enddate);
    $no_of_days=abs(round($diff / 86400));
}
if($no_of_days==0)
{
    $scheduled_time = strtotime($date1);
        $current_time = strtotime($date);
        $delay_time = $scheduled_time - $current_time;
        echo $delay_time;
        if ($delay_time < 0) {
            $delay_time = 0;
        }
        // Use the sleep function to delay the execution of the code until the scheduled time
        sleep($delay_time);
        $mail->Host="smtp.gmail.com";
        $mail->SMTPAuth="true";
        $mail->SMTPSecure="tls";
        $mail->Port="587";
        $mail->Username="lankaanusha2001@gmail.com";
        $mail->Password="ygkgvoihalenalno";
        $mail->Subject='';
        $mail->setFrom("lankaanusha2001@gmail.com");
        $mail->Body=$msg;
        $mail->addAddress($email);
        if($mail->Send())
        {echo "Email Sent"."<br>";}
        else
        {echo "Error";}
        $mail->smtpClose();
}
$id1+=1;}
?>