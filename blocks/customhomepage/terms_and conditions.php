<?php require_once("../../config.php");
global $DB,$CFG, $OUTPUT, $PAGE, $USER;

?>
<meta content="width=device-width, initial-scale=1" name="viewport" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/style/lds.css" />

 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

<style type="text/css">



body{

    padding-top: 0;

}



nav.navbar.navbar-expand-lg.navbar-light.bg-transparent {

    background-color: transparent;

}

    header#page-header {

    display: none;

}



header.navbar ,img.lambda-shadow , div#page-navbar {

    display: none;

}



/*div#wrapper {

    display: none;

}*/

#wrapper{

    border-top: unset;

        width: 100%;

}



body#page-blocks-customhomepage-campustutr_for_students {

    background-image: unset;

}

.student_bg-layer{

    background-image: url("<?php echo $CFG->wwwroot;?>/blocks/customhomepage/image/CampusTutr_tutor-banner.png");

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 675px;



}

input.btn.btn-info {

    font-weight: 600;

    color: #fff;

    border-radius: 20px;

    padding: 10px;

    background-color: #138496;

    border-color: #138496;

}

textarea {

    overflow: hidden;

    resize: vertical;

    width: 100%;

}

div#page {

    padding: 0;

}

#page-header-nav {

    min-height: 0;

}

ul.nav.justify-content {

    justify-content: space-evenly;

}

section#region-main .row{

    display: flex;

}

@media only screen and (max-width: 768px) {
.student_bg-layer{
        min-height: 499px;
    background-position: 84%;
    }
}


</style>



<section class="bg-layer">
    <!-- Navigation -->


 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&amp;display=swap" rel="stylesheet">

  
<?php global $DB, $OUTPUT, $PAGE, $USER;
          $instancesql = $DB->get_record_sql("SELECT * FROM {config} where `name`='custommenuitems'");
       $a=$instancesql->value;
   include('menu.php');


require_once($CFG->dirroot.'/theme/lambda/layout/includes/custom_header.php'); ?>

  


<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <div class="banner-text">
        <span class="online-text">on-line Education</span>
        <p class="lets-text">Lets Grow Your<br>Education Level up with <span class="yello-text">CAMPUSTUTR</span></p>
      </div>
        </div>
        <div class="col-md-4">
        <div class="top-layer">
            <img src="<?php echo $CFG->wwwroot;?>/theme/lambda/layout/image/HeroImg.png" class="img-fluid">
        </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
</section>
<div class="container my-3">
<div class="row mt-3">
    <div class="col-12">
        <h3 class="headeing">Terms and Conditions Privacy Policy</h3>
    </div>
</div>
    <div class="row">
    <div class="col-12">
        <p>We value your trust. In order to honour that trust, CampusTutr adheres to ethical standards in gathering, using, and safeguarding any information you provide. Arohak Technologies Private Limited, is a leading ed tech company, incorporated in India, for imparting learning. This privacy policy governs your use of the website, www.campustutr.com and the other associated applications, products, websites and services managed by the Company. Please read this privacy policy ('Policy') carefully before using the Application, Website, our services and products, along with the Terms of Use ('ToU') provided on the Website. Your use of the Website, or services in connection with the Website or products ('Services'), or registrations with us through any modes or usage of any products including through SD cards, tablets or other storage/transmitting device shall signify your acceptance of this Policy and your agreement to be legally bound by the same. If you do not agree with the terms of this Policy, do not use the Website, Application our products or avail any of our Services.</p>
     
        <h3>User Provided Information</h3>
     
        <p>
            The Application/Website/Services/products obtains the information you provide when you download and register for the Application or Services or products. When you register with us, you generally provide (a) your name, age, email address, location, phone number, password and your ward's educational interests; (b) transaction-related information, such as when you make purchases, respond to any offers, or download or use applications from us; (c) information you provide us when you contact us for help; (d) information you enter into our system when using the Application/Services/products, such as while asking doubts, participating in discussions and taking tests. The said information collected from the users could be categorized as “Personal Information”, “Sensitive Personal Information” and “Associated Information”. Personal Information, Sensitive Personal Information and Associated Information (each as individually defined under this Information Technology (Reasonable security practices and procedures and sensitive personal data or information) Rules, 2011 (the “Data Protection Rules”)) shall collectively be referred to as 'Information' in this Policy. We may use the Information to contact you from time to time, to provide you with the Services, important information, required notices and marketing promotions. We will ask you when we need more information that personally identifies you (personal information) or allows us to contact you. We will not differentiate between who is using the device to access the Application, Website or Services or products, so long as the log in/access credentials match with yours. In order to make the best use of the Application/Website/Services/products and enable your Information to be captured accurately on the Application/Website/Services/products, it is essential that you have logged in using your own credentials. We will, at all times, provide the option to you to not provide the Personal Information or Sensitive Personal Information, which we seek from you. Further, you shall, at any time while using the Application/Services/products, also have an option to withdraw your consent given earlier to us to use such Personal Information or Sensitive Personal Information. Such withdrawal of the consent is required to be sent in writing to us at the contact details provided in this Policy below. In such event, however, the Company fully reserves the right not to allow further usage of the Application or provide any Services/products thereunder to you.
        </p>
        <h3>Automatically Collected Information</h3>
     <p>In addition, the Application/products/Services may collect certain information automatically, including, but not limited to, the type of mobile device you use, your mobile devices unique device ID, the IP address of your mobile device, your mobile operating system, the type of mobile Internet browsers you use, and information about the way you use the Application/Services/products. As is true of most Mobile applications, we also collect other relevant information as per the permissions that you provide. We use an outside credit card processing company to bill you for goods and services. These companies do not retain, share, store or use personally identifiable information for any other purpose.</p>
     
     <h3>Use of your Personal Information</h3>
     
     <p>We use the collected Information to analyse trends, to conduct research, to administer the Services and products, to learn about each user's learning patterns and movements around the Services and products and to gather demographic information and usage behaviour about our user base as a whole. Aggregated and individual, anonymized and non-anonymized data may periodically be transmitted to external service providers to help us improve the  products and our Services. We will share your information with third parties only in the ways that are described below in this Policy. We may use the individual data and behavior patterns combined with personal information to provide you with personalized content, and better your learning objectives. Third parties provide certain services which we may use to analyze the data and information to personalize, drive insights and help us better your experience or reach out to you with more value added products, information and services. However, these third party companies do not have any independent right to share this information. We do not sell, trade or share your Information to any third party (except subsidiaries/affiliates of the Company for related offerings) unless, we have been expressly authorized by you either in writing or electronically to do so. We may at times provide aggregate statistics about our customers, traffic patterns, and related site information to reputable third parties, however this information when disclosed will be in an aggregate form and does not contain any of your Personally Identifiable Information. CampusTutr  will occasionally send email notices, messages or contact you to communicate about our Services, products and benefits, as they are considered an essential part of the Services/products you have chosen. We may disclose Information:<br><br>
     
     as required by law, such as to comply with a subpoena, or similar legal process; <br>
     
     to enforce applicable ToU, including investigation of potential violations thereof; <br>
     </p>
     <p>when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, address security or technical issues or respond to a government request; </p>
     
     
     </p>
     <p>with our trusted services providers who work on our behalf, do not have an independent use of the information we disclose to them, and have agreed to adhere to the rules set forth in this Policy; </p>
     
     
     <p>to protect against imminent harm to the rights, property or safety of the Website or its users or the public as required or permitted by law; </p>
     
     <p>with third party service providers in order to personalize the Website/Services/products for a better user experience and to perform behavioural analysis; </p>
     
     <p>Any portion of the Information containing personal data relating to minors provided by you shall be deemed to be given with the consent of the minor's legal guardian. Such consent is deemed to be provided by your registration with us. </p>
     
     <h3>Access to your Personal Information</h3>
     
     <p>We will provide you with the means to ensure that your Personal Information is correct and current. If you have filled out a user profile, we will provide an obvious way for you to access and change your profile from our Services/Website/products. We adopt reasonable security measures to protect your password from being exposed or disclosed to anyone. </p>
     
     <h3>Cookies</h3>
     
     <p>We send cookies (small files containing a string of characters) to your computer, thereby uniquely identifying your browser. Cookies are used to track your preferences, help you login faster, and aggregated to determine user trends. This data is used to improve our offerings, such as providing more content in areas of greater interest to a majority of users. Most browsers are initially set up to accept cookies, but you can reset your browser to refuse all cookies or to indicate when a cookie is being sent. Some of our features and services may not function properly if your cookies are disabled. </p>
     
     <h3>Links</h3>
     
     <p>We may present links in a format that enables us to keep track of whether these links have been followed. We use this information to improve our customized content. Clicking on links may take you to sites outside our domain. We are not responsible for the privacy practices of other web sites. We encourage our users to be aware when they leave our site to read the privacy statements of each and every web site that collects personally identifiable information. This Privacy Policy applies solely to information collected by our Website. </p>
     
     <h3>Alerts</h3>
     
     <p>We may alert you by email or phone (through sms/call) to inform you about new service offerings of the Company and its subsidiaries/affiliatesor other information which we feel might be useful for you, through the Company or its subsidiaries/affiliates. </p>
     
     <h3>Public Forums</h3>
     
     <p>When you use certain features on our website like the discussion forums and you post or share your personal information such as comments, messages, files, photos, will be available to all users, and will be in the public domain. All such sharing of information is done at your own risk. Please keep in mind that if you disclose personal information in your profile or when posting on our forums this information may become publicly available. </p>
     
     <h3>Security</h3>
     
     <p>We are concerned about safeguarding the confidentiality of your Information. We provide physical, electronic, and procedural safeguards to protect Information we process and maintain. For example, we limit access to this Information to authorized employees only who need to know that information in order to operate, develop or improve our Services/products/Website. Please be aware that, although we endeavor to provide reasonable security for information we process and maintain, no security system can prevent all potential security breaches. </p>
     
     <h3>How Long Do We Retain User Data?</h3>
     
     <p>Currently, we plan to retain user data while an account is active and for at least three years afterward. We may alter this practice according to legal and business requirements. For example, we may lengthen the retention period for some data if needed to comply with law or voluntary codes of conduct. Unless otherwise prohibited, we may shorten the retention period for some types of data if needed to free up storage space. </p>
     
     <h3>Log information</h3>
     
     <p>When you access our Website, our servers automatically record information that your browser sends whenever you visit a website. These server logs may include information such as your web request, internet protocol address, browser type, browser language, the date and time of your request and one or more cookies that may uniquely identify your browser. </p>
     
     <h3>User communications</h3>
     
     <p>When you send an email or other communication to us, we may retain those communications in order to process your inquiries, respond to your requests and improve our Services. </p>
     
     <h3>Changes to this Statement</h3>
     
     <p>As the Company evolves, our privacy policy will need to evolve as well to cover new situations. You are advised to review this Policy regularly for any changes, as continued use is deemed approval of all changes. </p>
     
     <h3>Your Consent</h3>
     
     <p>We believe that, every user of our Services/products/Website must be in a position to provide an informed consent prior to providing any Information required for the use of the Services/products/Website. By registering with us, you are expressly consenting to our collection, processing, storing, disclosing and handling of your information as set forth in this Policy now and as amended by us. Processing, your information in any way, including, but not limited to, collecting, storing, deleting, using, combining, sharing, transferring and disclosing information, all of which activities will take place in India. If you reside outside India your information will be transferred, processed and stored in accordance with the applicable data protection laws of India. </p>
     
     <h3>Contact Information</h3>
     
     <p>Our Grievance Officer shall undertake all reasonable efforts to address your grievances at the earliest possible opportunity. You may contact us at Address:5 th floor, IT HUB, Khammam – 507002, Telangana, India. Reach out to us on support@campustutr.com, in case of any queries. </p>
     
     
     <h3>Terms & Conditions</h3>
     <p>These Terms & Conditions (“Terms”) of (a) use of our website www.campustutr.com (“Website”) or any products or services in connection with the Website/products (“Services”)  or (b) any modes of registrations or usage of products, including through SD cards, tablets or other storage/transmitting device  are between Arohak Technologies Private Limited(“Company/We/Us/Ours) and its users (“User/You/Your”).</p>
     <p>These Terms constitute an electronic record in accordance with the provisions of the Information Technology Act, 2000 and the Information Technology (Intermediaries guidelines) Rules, 2011 thereunder, as amended from time to time. </p>
     <p>Please read the Terms and the privacy policy of the Company (“Privacy Policy”) with respect to registration with us, the use of the Application, Website, Services and products carefully before using the Website, Services or products. In the event of any discrepancy between the Terms and any other policies with respect to the Website or Services or products, the provisions of the Terms shall prevail. </p>
     
     <p>Your use/access/browsing of the Application or Website or the Services or products or registration (with or without payment/with or without subscription) through any means shall signify Your acceptance of the Terms and Your agreement to be legally bound by the same. </p>
     
     <p>If you do not agree with the Terms or the Privacy Policy, please do not use the Website or avail the Services or products. Any access to our Services/products through registrations/subscription is non transferable. </p>
     
     <p>Except as mentioned below, all information, content, material, trademarks, services marks, trade names, and trade secrets including but not limited to the software, text, images, graphics, video, script and audio, contained in the Application, Website, Services and products are proprietary property of the Company (“Proprietary Information”). No Proprietary Information may be copied, downloaded, reproduced, modified, republished, uploaded, posted, transmitted or distributed in any way without obtaining prior written permission from the Company and nothing on this Application or Website or Services shall be or products deemed to confer a license of or any other right, interest or title to or in any of the intellectual property rights belonging to the Company, to the User. You may own the medium on which the information, content or materials resides, but the Company shall at all times retain full and complete title to the information, content or materials and all intellectual property rights inserted by the Company on such medium. Certain contents on the Website may belong to third parties. Such contents have been reproduced after taking prior consent from said party and all rights relating to such content will remain with such third party. Further, you recognize and acknowledge that the ownership of all trademarks, copyright, logos, service marks and other intellectual property owned by any third party shall continue to vest with such party and You are not permitted to use the same without the consent of the respective third party.
     <p>Your use of our products, Website and Services is solely for Your personal and non-commercial use. Any use of the Website, Services or products or their contents other than for personal purposes is prohibited. Your personal and non-commercial use of this Website, products and / or our Services shall be subjected to the following restrictions:<br>
     <p>You may not decompile, reverse engineer, or disassemble the contents of our Website and/or Services/ products or modify, copy, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell any information or software obtained from our Website and/or Services/products, or remove any copyright, trademark registration, or other proprietary notices from the contents of our Website and/or Services/products. </p>
     <p>You will not (a) use this Website and/or any of our product/s or Service/s for commercial purposes of any kind, or (b) advertise or sell any products, Services or domain names or otherwise (whether or not for profit), or solicit others (including, without limitation, solicitations for contributions or donations) or use any public forum for commercial purposes of any kind, or (c) use the Website/our products and Services in any way that is unlawful, or harms the Company or any other person or entity as determined by the Company. </p>
     <p>No User shall be permitted to perform any of the following prohibited activities while availing our Services: </p>
     <p>Making available any content that is misleading, unlawful, harmful, threatening, abusive, tortious, defamatory, libelous, vulgar, obscene, child-pornographic, lewd, lascivious, profane, invasive of another's privacy, hateful, or racially, ethnically or otherwise objectionable;
     Stalking, intimidating and/or harassing another and/or inciting other to commit violence;
     Transmitting material that encourages anyone to commit a criminal offence, that results in civil liability or otherwise breaches any relevant laws, regulations or code of practice;
     Interfering with any other person's use or enjoyment of the Website/Services;
     Making, transmitting or storing electronic copies of materials protected by copyright without the permission of the owner, committing any act that amounts to the infringement of intellectual property or making available any material that infringes any intellectual property rights or other proprietary rights of anyone else; </p>
     <p>Make available any content or material that You do not have a right to make available under any law or contractual or fiduciary relationship, unless You own or control the rights thereto or have received all necessary consents for such use of the content;
     Impersonate any person or entity, or falsely state or otherwise misrepresent Your affiliation with a person or entity; </p>
     <p>Post, transmit or make available any material that contains viruses, trojan horses, worms, spyware, time bombs, cancelbots, or other computer programming routines, code, files or such other programs that may harm the services, interests or rights of other users or limit the functionality of any computer software, hardware or telecommunications, or that may harvest or collect any data or personal information about other Users without their consent;
     Access or use the Website/Services/products in any manner that could damage, disable, overburden or impair any of the Website's servers or the networks connected to any of the servers on which the Website is hosted; </p>
     <p>Intentionally or unintentionally interfere with or disrupt the services or violate any applicable laws related to the access to or use of the Application/Website/Services/products, violate any requirements, procedures, policies or regulations of networks connected to the Website/Services/products, or engage in any activity prohibited by these Terms;
     Disrupt or interfere with the security of, or otherwise cause harm to, the Website/Services/products, materials, systems resources, or gain unauthorized access to user accounts, passwords, servers or networks connected to or accessible through the Website/Services/products or any affiliated or linked sites; </p>
     <p>Interfere with, or inhibit any user from using and enjoying access to the Website/ Services/products, or other affiliated sites, or engage in disruptive attacks such as denial of service attack on the Website/Services/products; </p>
     <p>Use deep-links, page-scrape, robot, spider or other automatic device, program, algorithm or methodology, or any similar or equivalent manual process, to increase traffic to the Website/Services/products, to access, acquire, copy or monitor any portion of the Website/Services/products, or in any way reproduce or circumvent the navigational structure or presentation of the Application, or any content, to obtain or attempt to obtain any content, documents or information through any means not specifically made available through the  Website/Services/products; </p>
     <h3>Alter or modify any part of the Services;</h3>
     <p>Use the Services for purposes that are not permitted by: (i) these Terms; and (ii) any applicable law, regulation or generally accepted practices or guidelines in the relevant jurisdiction; or
     Violate any of the terms specified under the Terms for the use of the Website/Services/products.
     By submitting content on or through the Services (your “Material”), you grant us a worldwide, non-exclusive, royalty-free license (with the right to sublicense) to use, copy, reproduce, process, adapt, modify, publish, transmit, display and distribute such Material in any and all media or distribution methods (now known or later developed) and to associate your Material with you, except as described below. You agree that others may use Your Material in the same way as any other content available through the Services. Other users of the Services may fork, tweak and repurpose your Material in accordance with these Terms. If you delete your user account your Material and name may remain available through the Services</p>
     <p>In the preparation of the Website/Services/products and contents therein, every effort has been made to offer the most current, correct, and clearly expressed information possible. Nevertheless, inadvertent errors may occur. In particular, but without limiting anything here, the Company disclaims any responsibility for any errors and accuracy of the information that may be contained in the Application. Any feedback from User is most welcome to make the Application and contents thereof error free and user friendly. Company also reserves the right and discretion to make any changes/corrections or withdraw/add contents at any time without notice. Neither the Company nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on Website/Services/products for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law. </p>
     <p>Our Website provides Users with access to compiled educational information and related sources. Such information is provided on an As Is basis and We assume no liability for the accuracy or completeness or use or non obsolescence of such information. We shall not be liable to update or ensure continuity of such information contained on the Website. We would not be responsible for any errors, which might appear in such information, which is compiled from third party sources or for any unavailability of such information. From time to time the Website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s). You may not create a link to the Website from another website or document without the Company's prior written consent. </p>
     <p>The contents of the Services/products are developed on the concepts covered in the structured curriculum syllabus prescribed for students of various courses. The usage of the Services/products is not endorsed as a substitution to the curriculum based education provided by the educational institutions but is intended to supplement the same by explaining and presenting the concepts in a manner enabling easy understanding. The basic definitions and formulae of the subject matter would remain the same. The Company acknowledges that there are various means of delivering structured curriculum pedagogy and inclusion of methods in the Services/products does not imply endorsement of any particular method nor exclusion imply disapproval. Subscription to the  usage of our Services/Website/products does not in any manner guarantee admission to any educational institutions or passing of any exams or achievement of any specified percentage of marks in any examinations. </p>
     <p>Certain contents in the Services/Website/products (in particular relating to assistance in preparations for administrative services) may contain opinions and views. The Company shall not be responsible for such opinions or any claims resulting from them. Further, the Company makes no warranties or representations whatsoever regarding the quality, content, completeness, or adequacy of such information and data. </p>
     <p>Some parts of the Services are interactive, and we encourage contributions by Users, which may or may not be subject to editorial control prior to being posted. The Company accepts no responsibility or liability for any material communicated by third parties in this way. The Company reserves the right at its sole discretion to remove, review, edit or delete any content. Similarly, We will not be responsible or liable for any content uploaded by Users directly on the Website, irrespective of whether We have certified any answer uploaded by the User. We would not be responsible to verify whether such questions/answers or contents placed by any User contain infringing materials or not. </p>
     <p>The Company (including but not limited to its subsidiaries/affiliates) may, based on any form of access to the website (including free download/trials) or Services or Website or registrations through any source whatsoever, contact the User through sms, email and call, to give information about their offerings and products as well as notifications on various important updates and/or to seek permission for demonstration of its products. The User expressly grants such permission to contact him/her through telephone, SMS, e-mail and holds the Company (including but not limited to its subsidiaries/affiliates) indemnified against any liabilities including financial penalties, damages, expenses in case the User's mobile number is registered with Do not Call (DNC) database. By registering yourself, you agree to make your contact details available to Our employees, associates, subsidiaries,affiliates and partners so that you may be contacted for education information, offerings and promotions through telephone, SMS, email etc. </p>
     <p>While the Company may, based on the User's confirmation, facilitate the demonstration of its products at the location sought by the User, the User acknowledges that he/she has not been induced by any statements or representations of any person with respect to the quality or conditions of the products and that User has relied solely on the investigations, examinations and inspections as the User has chosen to make and that the Company has afforded the User the opportunity for full and complete investigations, examinations and inspections. </p>
     <p>Upon registration through any means whatsoever, the Company may contact You through the registered mobile number or e-mail or any other mobile number or contact number or email provided by You to enable effective provision of Services. The User expressly permits the Company to contact him/her and the student utilising the Services, through the above mentioned means at any time post registration. .-. Further, the Company shall have the right to monitor the download and usage of the Services/products and the contents thereof by the User/student, to analyze such usage and discuss the same with the User/student to enable effective and efficient usage of the Services. The User expressly permits the Company to clear the doubts of the student using the Services/online portal by answering the questions placed before it, providing study plans, informing of the progress, providing feedback, communicating with the student and mentoring the student through telephone or e-mail on express consent of the legal guardian/parent of the User or through any other forum.</p>
     <p>While the Company has made efforts to train the personnel engaged in the sales and services relating to its products to enable quality control, it makes no warranties or representations whatsoever regarding the quality and competence of such personnel and would not be responsible for any deviant behaviour of any such personnel. Any feedback from User relating to the same is most welcome and Company reserves the right and discretion to take any action in this regard.
     Access to certain elements of the Services including doubt clearance, mentoring services etc may be subject to separate terms, conditions and fair usage policy. The Company reserves the right to determine the criteria for provision of various elements of Services to the different categories of Users based on its policies. Hence, subscription to the products or registrations do not automatically entitle the User to any and all elements of Services provided by the Company and the Company shall be entitled to exercise its discretion while providing access to and determining continuity of certain elements of Services. We reserve the right to extend, cancel, discontinue, prematurely withdraw or modify any of Our Services at Our discretion. </p>
     <p>The Company's products and / or Services, including the content, are compatible only with certain devices/tablets/instruments/hardware < . The Company shall not be obligated to provide workable products and / or services for any instruments that are not recognized by the Company or those instruments that may be purchased from any third party which are not compatible with the Company's products and Services The company reserves the right to upgrade the type of compatible devices as required from time to time. </p>
     <p>The Company shall have no responsibility for any loss or damage caused to  other hardware and / or software and/or instrument, including loss of data or effect on the processing speed, resulting from Your use of our products and Services. </p>
     <p>You have to specify the address to which the shipment has to be made at the time of purchase. All product(s) shall be delivered directly to the address as specified at the point of ordering and You cannot, under any circumstances whatsoever, change the address after the order is processed. In case of any change in the address, You need to specify the same to us in writing well in advance to the shipping date. Any inconsistencies in name or address will result in non-delivery of the product(s).
     (a) For return of product(s) damaged at the time of delivery, the shipping charges shall be borne by the Company. However, for return any of the product(s) for any other reasons, it shall be the responsibility of the User to arrange for the return of such cancelled product(s) and the shipping charges shall be borne by such User. (b)We request You not to accept any product package that seems to be tampered with, opened or damaged at the time of delivery. The products must be returned in the same condition as delivered by the Company. Any products returned showing signs of any use or damage in any manner shall not be accepted for return. (c)All requests for return of products have to be placed within 15 (fifteen) days from the date of delivery. Please note that no refunds shall be claimed or will be entertained post 15 (fifteen) days from the date of delivery.
     You acknowledge that the Company is not the manufacturer of the instrument/medium/hardware and hence, any defect relating to the same shall be reported to the manufacturer whose details shall be specifed on the packaging and the Company shall not be in any manner responsible for the same. The Company does not provide any guarantee or warranty relating to the instrument/medium/hardware</p>
     <p>In order to access the Services and to avail the use of the products, You shall be required to register yourself with the Services/products, and maintain an account with the Services/products. You will be required to furnish certain information and details, including Your name, mobile number, e-mail address, residential address, grade/class of the student, school name, payment information (credit/debit card details) if required, and any other information deemed necessary by the Application. </p>
     <p>With respect to the provision of information, the following may be noted:- </p>
     <p>It is Your sole responsibility to ensure that the account information provided by You is accurate, complete and latest. </p>
     <p>You shall be responsible for maintaining the confidentiality of the account information and for all activities that occur under Your account. You agree to (a) ensure that You successfully log out from Your account at the end of each session; and (b) immediately notify the Company of any unauthorized use of Your account. If there is reason to believe that there is likely to be a breach of security or misuse of Your account, we may request You to change the password or we may suspend Your account without any liability to the Company, for such period of time as we deem appropriate in the circumstances. We shall not be liable for any loss or damage arising from Your failure to comply with this provision. </p>
     <p>You acknowledge that Your ability to use Your account is dependent upon external factors such as internet service providers and internet network availability and the Company cannot guarantee accessibility to the website at all times. In addition to the disclaimers set forth in the Terms, the Company shall not be liable to You for any damages arising from Your inability to log into Your account and access the services of the Application at any time. </p>
     <p>Persons who are "competent/capable" of contracting within the meaning of the Indian Contract Act, 1872 shall be eligible to register for the Application and all Our products or Services. Persons who are minors, un-discharged insolvents etc. are not eligible to register for Our products or Services. As a minor if You wish to use Our products or Services, such use shall be made available to You by Your legal guardian or parents, who has agreed to these Terms. In the event a minor utilizes the Website/Services, it is assumed that he/she has obtained the consent of the legal guardian or parents and such use is made available by the legal guardian or parents. The Company will not be responsible for any consequence that arises as a result of misuse of any kind of Our Application or any of Our products or Services that may occur by virtue of any person including a minor registering for the Services/products provided. By using the products or Services You warrant that all the data provided by You is accurate and complete and that student using the Application has obtained the consent of parent/legal guardian (in case of minors). The Company reserves the right to terminate Your subscription and / or refuse to provide You with access to the products or Services if it is discovered that You are under the age of 18 (eighteen) years and the consent to use the products or Services is not made by Your parent/legal guardian or any information provided by You is inaccurate. You acknowledge that the Company does not have the responsibility to ensure that You conform to the aforesaid eligibility criteria. It shall be Your sole responsibility to ensure that You meet the required qualification. Any persons under the age of 18 (eighteen) should seek the consent of their parents/legal guardians before providing any Information about themselves or their parents and other family members on the Application. </p>
     <p>You agree to defend, indemnify and hold harmless the Company, its officers, directors, employees and agents, from and against any and all claims, damages, obligations, losses, liabilities, costs or debt, and expenses (including but not limited to attorney's fees) arising from: (i) Your use of and access of the Website/Services; (ii) Your violation of any term of these Terms or any other policy of the Company; (iii) Your violation of any third party right, including without limitation, any copyright, property, or privacy right; or (iv) any claim that Your use of the Website/Services has caused damage to a third party. This defense and indemnification obligation will survive these Terms.
     In no event shall the Company, its officers, directors, employees, partners or agents be liable to You or any third party for any special, incidental, indirect, consequential or punitive damages whatsoever, including those resulting from loss of use, data or profits or any other claim arising out, of or in connection with, Your use of, or access to, the Application. </p>
     <p>In the event of Your breach of these Terms, You agree that the Company will be irreparably harmed and may not have an adequate remedy in money or damages. The Company therefore, shall be entitled in such event to obtain an injunction against such a breach from any court of competent jurisdiction. The Company's right to obtain such relief shall not limit its right to obtain other remedies.
     Any violation by You of the terms of this Clause may result in immediate suspension or termination of Your Accounts apart from any legal remedy that the Company can avail. In such instances, the Company may also disclose Your Account Information if required by any Governmental or legal authority. You understand that the violation of these Terms could also result in civil or criminal liability under applicable laws. </p>
     <p>The Terms shall be governed by and construed in accordance with the laws of India, without regard to conflict of law principles. Further, the Terms shall be subject to the exclusive jurisdiction of the competent courts located in Bangalore and You hereby accede to and accept the jurisdiction of such courts. </p>
     <p>The Company has the right to change modify, suspend, or discontinue and/or eliminate any aspect(s), features or functionality of the Application or the Services as it deems fit at any time without notice. Further, the Company has the right to amend these Terms from time to time without prior notice to you. The Company makes no commitment, express or implied, to maintain or continue any aspect of the website. You agree that the Company shall not be liable to You or any third party for any modification, suspension or discontinuance of the Services. All prices are subject to change without notice. </p>
     <p>DISCLAIMER: THIS WEBSITE AND THE SERVICES ARE PROVIDED ON AN "AS IS" BASIS WITH ALL FAULTS AND WITHOUT ANY WARRANTY OF ANY KIND. THE COMPANY HEREBY DISCLAIMS ALL WARRANTIES AND CONDITIONS WITH REGARD TO THE WEBSITE,PRODUCTS AND THE SERVICES, INCLUDING WITHOUT LIMITATION, ALL IMPLIED WARRANTIES AND CONDITIONS OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, ACCURACY, TIMELINESS. PERFORMANCE, COMPLETENESS, SUITABILITY AND NON-INFRINGEMENT. ADDITIONALLY, THE COMPANY SHALL NOT BE LIABLE FOR ANY DAMAGES ARISING OUT OF OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SITE, OR THE SERVICES. YOUR USE OF ANY INFORMATION OR MATERIALS ON THIS WEBSITE/SERVICES/PRODUCTS IS ENTIRELY AT YOUR OWN RISK, FOR WHICH WE SHALL NOT BE LIABLE. IT SHALL BE YOUR OWN RESPONSIBILITY TO ENSURE THAT SERVICES PROVIDED BY US MEET YOUR SPECIFIC REQUIREMENTS. </p>
     General Provisions:
     <p>Notice: All notices served by the Company shall be provided via email to Your account or as a general notification on the website. Any notice to be provided to the Company should be sent to support@campustutr.com. </p>
     <p>Entire Agreement: The Terms, along with the Privacy Policy, and any other guidelines made applicable to the website from time to time, constitute the entire agreement between the Company and You with respect to Your access to or use of the Website and the Services thereof. </p>
     <p>Assignment: You cannot assign or otherwise transfer Your obligations under the Terms, or any right granted hereunder to any third party. The Company's rights under the Terms are freely transferable by the Company to any third parties without the requirement of seeking Your consent.
     Severability: If, for any reason, a court of competent jurisdiction finds any provision of the Terms, or portion thereof, to be unenforceable, that provision shall be enforced to the maximum extent permissible so as to give effect to the intent of the parties as reflected by that provision, and the remainder of the Terms shall continue in full force and effect.
     <p>Waiver: Any failure by the Company to enforce or exercise any provision of the Terms, or any related right, shall not constitute a waiver by the Company of that provision or right.
     Relationship: You acknowledge that Your participation on the website, does not make You an employee or agency or partnership or joint venture or franchise of the Company.
     The Company provides these Terms so that You are aware of the terms that apply to your use of the Website and Services. You acknowledge that, the Company has given You a reasonable opportunity to review these Terms and that You have agreed to them.
     Feedback: </p>
     <p>Any feedback You provide with respect to the Application shall be deemed to be non-confidential. The website shall be free to use such information on an unrestricted basis. Further, by submitting the feedback, You represent and warrant that (i) Your feedback does not contain confidential or proprietary information of You or of third parties; (ii) the Company is not under any obligation of confidentiality, express or implied, with respect to the feedback; (iii) the website may have something similar to the feedback already under consideration or in development; and (iv) You are not entitled to any compensation or reimbursement of any kind from the Company for the feedback under any circumstances, unless specified.<br>
     Under no circumstances shall the Company be held responsible in any manner for any content provided by other users even such content is offensive, hurtful or offensive. Please exercise caution while accessing the website. </p>
     <h3>Customer Care:</h3>
     <p>We make all best endeavors to provide You with a pleasant experience. In the unlikely event that You face any issues, please contact us at support@campustutr.com.</p>
    </div>

    </div>
</div>
<?php
require_once($CFG->dirroot.'/theme/lambda/layout/includes/enquiry.php');
require_once($CFG->dirroot.'/theme/lambda/layout/custom_footer.php');
 ?>



 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<style>

         .headeing {

    color: #ffae00;

} 

section#region-main {

    width: 100%!important;

    display: inline-block;

}

section#region-main .row {

    display: inline-flex;

    justify-content: space-between;

}

aside#block-region-side-pre {

    display: none;

}

.campus_tutur-image.first img {

    margin-left: 4em;

}

@media only screen and (max-width: 768px) {

    section#region-main .row {

    display: inline-block;

    justify-content: space-between;

}

.campus_tutur-image.first img {

    margin-left: 0em;

}

}

</style>

  

