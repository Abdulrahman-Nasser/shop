   <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'send_mail/phpmailer/src/Exception.php';
    require 'send_mail/phpmailer/src/PHPMailer.php';
    require 'send_mail/phpmailer/src/SMTP.php';
    $message_success = [];

    if (isset($_POST['send'])) {

        try {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = '3bodynasser72@gmail.com';
            $mail->Password   = 'lqzogwictijzwfgk';

            // Disable SSL certificate verification
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setFrom($_POST['email']);
            $mail->addAddress('3bodynasser72@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = 'Problem Message From' . "    " . $_POST['email'];
            $mail->Body = $_POST['message']. "<hr>" . 'رقم الهاتف :'. " " . $_POST['phone'] . "<br>"  .  $_POST['name'] . " ". " : الاسم" ;
            $mail->send();

            echo "<script> document.location.href='#'; </script>";
            $message_success[] = "تم ارسال الشكوى ، سوف يتم حل المشكلة في اقرب وقت";
        } catch (Exception $e) {
            $message_success[] = "خطا في ارسال الشكوى ، برجاء حاول مرةاخري";
            echo "Mailer Error: " . $e->getMessage();
        }
    }

    ?>

   <!-- chat content -->
   <section class="chat-content direction_right">

       <!-- chat icon -->

       <div class="chat" id="chat_icon">
           <span class="chat-icon"><i class="bi bi-chat-dots"></i></span>
       </div>
       <!-- end chat icon -->

       <!-- chat-content -->

       <div class="chat-container text-center animate__animated " id="chat_box">
           <div id="chat-box">
               <?php foreach ($message_success as $item) : ?>
                <div class="alert alert-success text-success bg-transparent">
                    <?= $item ?>
                </div>
               <?php endforeach; ?>
               <div class="chat-message">
                   <p>اهلا وسهلا بك</p>
               </div>

               <form method="post">
                   <div class="row justify-content-center">

                       <div class="col-lg-7 mt-3">
                           <input type="text" name="name" id="" required placeholder="الاسم" class="form-control">
                       </div>
                       <div class="col-lg-7 mt-3">
                           <input type="email" name="email" id="" required placeholder="الايميل" class="form-control">
                       </div>
                       <div class="col-lg-7 mt-3">
                           <input type="number" name="phone" id="" required placeholder="الرقم" class="form-control">
                       </div>
                       <div class="col-lg-7 mt-3">
                           <textarea name="message" id="" class="w-100 message" cols="30" rows="5" placeholder="يمكنك التواصل من خلال هذه المحادثه "></textarea>
                       </div>
                       <div class="col-lg-12">
                           <button class="btn btn-primary" name="send">Send</button>
                       </div>
                   </div>
               </form>
           </div>
       </div>

   </section>
   <!-- end chat content -->