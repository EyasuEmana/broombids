<?php

$newUser=new Users();

?>

<?php $this->start('head');?>

<?php $this->setSiteTitle('Get in touch | Broombids ');?>



<?php $this->end();?>



<?php $this->start('body');?>

<section class="page-banner-contact">

    <div class="container">

        <div class="row">

            <div class="col-lg-7">

                <div class="page-title-wrapper">

                    <div class="page-title-inner">

                        <h1 class="page-title">Get in touch with Us</h1>

                        <p>
                        Please save our time and yours
                        </p>
                        <p>
                        All answers are added in the FAQ field .
                        </p>
                        <p>
                        If you have any other question you are kindly requested to fill the form and we will gladly respond to you as soon as possible
                        Keep your form fields to the exact point and don't ask questions that are already answered or don't need an immidiate answer
                        You help other users that really need help in  their journey and us to support all of you the best way we can .
                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-4">

                <div class="animate-element-contact">

                    <img src="<?=PROOT?>images/Get-in-touch-amico.svg" alt="Get in touch with Us | Broombids"  class="wow pixFadeDown" data-wow-duration="1s"  />

                </div>

            </div>

        </div>

    </div>                

    <ul class="animate-ball">

        <li class="ball"></li>

        <li class="ball"></li>

        <li class="ball"></li>

        <li class="ball"></li>

        <li class="ball"></li>

    </ul>

</section>





<section class="contactus">

    <div class="container">

        <div class="row">

            <div class="col-md-4">

                <div class="contact-infos">

                    <div class="contact-info">

                        <h3 class="title">Our Location</h3>

                        <p class="description">

                            Kos dodecaneese, 853 02, Greece

                        </p>

                        <div class="info phone"><i class="ei ei-icon_phone"></i> <span>+30 690 785 7745</span></div>

                    </div>

                    <div class="contact-info">

                        <h3 class="title">Say Hello</h3>

                        <p class="description">

                            Kos dodecaneese, 853 02, Greece

                        </p>

                        <div class="info"><i class="ei ei-icon_mail_alt"></i> <span>support@broombids.com</span></div>

                    </div>

                </div>

            </div>

            <div class="col-md-8">

                <div class="contact-froms">

                    

                        <div class="row">

                            <div class="col-md-6"><input type="text" id="name" name="name" placeholder="Name" required /></div>

                            <div class="col-md-6"><input type="email" id="email" name="email" placeholder="Email" required /></div>

                        </div>

                        <input type="text" name="subject" id="subject" placeholder="Subject" /> <textarea name="content" id="content" placeholder="Your Comment" required></textarea>

                        <div id="err"> </div>

                        <button type="button" id="getintouch" class="pix-btn submit-btn"><span class="btn-text" >Send Your Massage</span></button>                       

                        

                   

                </div>

            </div>

        </div>

    </div>

</section>



<section id="google-maps">

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12776.22519804894!2d27.0904749!3d36.8171708!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8988084a12e1f2ae!2sBroomBids!5e0!3m2!1sen!2sin!4v1599890877155!5m2!1sen!2sin" width="100%" height="470" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

            </section>





<?php $this->end();?>



