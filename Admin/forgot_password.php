<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   
   // Timezone set pannrom – India time
   date_default_timezone_set('Asia/Kolkata');
   
   // PHPMailer files include pannunga
   require 'src/PHPMailer.php';
   require 'src/SMTP.php';
   require 'src/Exception.php';
   
   include 'db.php';
   
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
       $email = $_POST['email'];
   
       // DB la email iruka-nu check panrom
       $stmt = $conn->prepare("SELECT * FROM greens WHERE email = ?");
       if (!$stmt) {
           die("Prepare failed: " . $conn->error);
       }
   
       $stmt->bind_param("s", $email);
       $stmt->execute();
       $result = $stmt->get_result();
   
       if ($result->num_rows === 1) {
           // Token generate + expiry time
           $token = bin2hex(random_bytes(32));
           $expire = date("Y-m-d H:i:s", strtotime("+15 minutes"));
   
           // Token DB la update panrom
           $stmt = $conn->prepare("UPDATE greens SET reset_token=?, token_expiry=? WHERE email=?");
           if (!$stmt) {
               die("Prepare failed: " . $conn->error);
           }
           $stmt->bind_param("sss", $token, $expire, $email);
           $stmt->execute();
   
           // Reset link create panrom
           $link = "http://localhost/Greens/admin/reset_pass.php?token=$token";
   
           // Mail object ready panrom
           $mail = new PHPMailer(true);
   
           try {
               $mail->isSMTP();
               $mail->Host = 'smtp.gmail.com';
               $mail->SMTPAuth = true;
               $mail->Username = 'greenscloud0909@gmail.com';   // 🔁 Un Gmail ID
               $mail->Password = 'vqbxtelhkloioyvw';              // 🔁 App password (16 digits)
               $mail->SMTPSecure = 'tls';
               $mail->Port = 587;
   
               $mail->setFrom('greenscloud0909@gmail.com', 'Greens Admin');
               $mail->addAddress($email); // User kitta anuprom
   
               $mail->isHTML(true);
   $mail->Subject = 'Reset Your Greens Technologies Admin Password';
   $mail->Body = "
       <div style='font-family: Arial, sans-serif; font-size: 15px; color: #333;'>
           <div style='text-align: center; margin-bottom: 20px;'>
               <img src='https://www.greenstechnologys.com/images/greenstechnologys_logo.png' alt='Greens Logo' style='max-width: 150px;'>
           </div>
           <p>Hi <b>$email</b>,</p>
           <p>We received a request to reset your <b>Greens Technologies Admin</b> account password.</p>
           <p>Please click the button below to reset your password:</p>
           <p style='margin: 20px 0; text-align: center;'>
               <a href='$link' style='background-color: #008080; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Reset Password</a>
           </p>
           <p>If you did not request this, you can safely ignore this email.</p>
           <p style='color: #888;'>This link will expire in 15 minutes for security reasons.</p>
           <br>
           <p>Regards,<br><b>Greens Technologies Admin</b></p>
       </div>
   ";
   
   $mail->AltBody = "Hi $email,\nClick the following link to reset your password:\n$link\nThis link expires in 15 minutes.";
   
   
               $mail->send();
               echo "<script>alert('Password Reset link Sended Successfully! Check your mail.'); window.location.href='frgt_pass.php';</script>";
           } catch (Exception $e) {
               echo "<script>alert('Mail Didn't Send: {$mail->ErrorInfo}'); window.location.href='frgt_pass.php';</script>";
           }
   
       } else {
           echo "<script>alert('Email not found'); window.location.href='frgt_pass.php';</script>";
       }
   }
   ?>