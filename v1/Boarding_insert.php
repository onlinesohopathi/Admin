<?php 

  $Booking=$_POST["Booking"];
  $Passport=$_POST["Passport"];
  $Weight=$_POST["Weight"];
  $BagNumber=$_POST["BagNumber"];
  $Flight=$_POST["Flight"];
  $Seat=$_POST["Seat"];



  
  
   $strings = "INSERT INTO BOARDING VALUES (SEQ_BOARDING.NEXTVAL, '".$Booking."',
   				'".$BagNumber."' , '".$Weight."' , '".$Seat."')";



  $conn=oci_connect("BUETAIRLINES" , "113114","localhost/xe");
		if (!$conn) {
		  $e = oci_error();
		  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
	

	    
		$stid = oci_parse($conn, $strings);
		if (!$stid) {
		    $e = oci_error($conn);
		      trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}

	    // Perform the logic of the query
	    $r = oci_execute($stid);
	    if (!$r) {
	      $e = oci_error($stid);
	      trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	    }



// $message_body = "<head>
// <title>BUET Airlines</title>
// <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
// <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
// <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
// <style type=\"text/css\">
// html {
// 	width: 100%;
// }
// #outlook a {
// 	padding: 0;
// } /* Force Outlook to provide a \"view in browser\" menu link. */
// body {
// 	width: 100% !important;
// 	-webkit-text-size-adjust: 100%;
// 	-ms-text-size-adjust: 100%;
// 	-webkit-font-smoothing: antialiased;
// 	margin: 0;
// 	padding: 0;
// } /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
// .ExternalClass {
// 	width: 100%;
// } /* Force Hotmail to display emails at full width */
// .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
// 	line-height: 100%;
// } /* Force Hotmail to display normal line spacing. */
// #backgroundTable {
// 	margin: 0;
// 	padding: 0;
// 	width: 100% !important;
// 	line-height: 100% !important;
// }
// img {
// 	outline: none;
// 	text-decoration: none;
// 	border: none;
// 	-ms-interpolation-mode: bicubic;
// }
// a img {
// 	border: none;
// }
// table td {
// 	border-collapse: collapse;
// }
// table {
// 	border-collapse: collapse;
// 	mso-table-lspace: 0pt;
// 	mso-table-rspace: 0pt;
// }
// sup {
// 	vertical-align: top;
// 	line-height: 100%;
// }
// .appleLinksGrey a {color: #36495A !important; text-decoration: none;}
// .appleLinksBlue a {color: #0061AB !important; text-decoration: none;}

 
//  @media screen and (max-width:480px) {
// table[class=nomob], span[class=nomob], td[class=nomob], img[class=nomob] {
// 	display: none !important;
// }
// /* Mobile width resize */
// *[class=emailphoneresize] {
// 	width: 320px !important;
// }
// *[class=footerResize] {
// 	width: 320px !important;
// 	background-color: #ffffff !important;
// }
// *[class=email300resize] {
// 	width: 300px !important;
// }
// *[class=email280resize] {
// 	width: 280px !important;
// }
// *[class=email127resize] {
// 	width: 127px !important;
// }
// *[class=appResize] {
// 	width: 280px !important;
// 	border: 0px solid #ebeff0 !important;
// 	border-bottom-left-radius: 3px !important;
// 	border-bottom-right-radius: 3px !important;
// }
// *[class=newsletterresize] {
// 	width: 300px !important;
// 	padding-left: 20px !important;
// }
// *[class=Wemail130resize] {
// 	width: 130px !important;
// 	height: 52px !important;
// }
// *[class=Wemail170resize] {
// 	width: 170px !important;
// 	height: 52px !important;
// }
// *[class=emailtable1resize] {
// 	width: 50% !important;
// }
// *[class=email300resizecta] {
// 	width: 300px !important;
// 	padding: 10px !important;
// 	line-height: 50px !important;
// 	font-size: 15px !important;
// 	letter-spacing: 2px !important;
// }
// *[class=email280resizecta] {
// 	width: 280px !important;
// 	line-height: 35px !important;
// 	font-size: 14px !important;
// 	letter-spacing: 2px !important;
// }
// *[class=resize80px] {
// 	width: 80px !important;
// }
// *[class=resize114px] {
// 	width: 114px !important;
// }
// *[class=resize120px] {
// 	width: 120px !important;
// }
// *[class=resize130px] {
// 	width: 130px !important;
// }
// *[class=resize137px] {
// 	width: 137px !important;
// }
// *[class=resize140px] {
// 	width: 140px !important;
// }
// *[class=resize140pxPadL10px] {
// 	width: 140px !important;
// 	padding-left: 10px !important;
// }
// *[class=resize143px] {
// 	width: 143px !important;
// }
// *[class=resize150px] {
// 	width: 150px !important;
// }
// *[class=resize160px] {
// 	width: 160px !important;
// }
// *[class=resize140pxPadL10px] {
// 	width: 140px !important;
// 	padding-left:10px !important;

// }
// /* Spacer Images Resize */

// *[class=Resizeto10w] {
// 	width: 10px !important;
// }
// *[class=Resizeto30w] {
// 	width: 30px !important;
// }
// *[class=Resize42header] {
// 	width: 42px !important;
// 	height: 42px !important;
// }
// /* Showing hidden Elements*/
// *[class=Show_one_world] {
// 	width: 32px !important;
// 	height: 32px !important;
// 	display: inline !important;
// 	margin: 17px 0px 0px 60px;
// }
// /*Image Resizing*/
// *[class=resizeimageto320] {
// 	width: 320px !important;
// 	height: auto !important;
// }
// *[class=resizeimageto250] {
// 	width: 250px !important;
// 	height: auto !important;
// }
// *[class=resizeimageto300] {
// 	width: 300px !important;
// 	height: auto !important;
// }
// *[class=resizeimageto200] {
// 	width: 200px !important;
// 	height: auto !important;
// }
// /*Font Size Change */
// *[class=bullets14px] {
// 	font-size: 14px !important;
// }
// *[class=font14px] {
// 	font-size: 14px !important;
// 	line-height: 14px !important;
// }
// *[class=Resizefontto28hd] {
// 	font-size: 28px !important;
// 	line-height: 28px !important;
// 	padding: 15px 10px 15px 10px !important;
// }
// *[class=headline21px] {
// 	font-size: 21px !important;
// 	line-height: 21px !important;
// 	padding: 24px 20px 15px 20px !important;
// }
// *[class=Resizefontto20hd] {
// 	font-size: 20px !important;
// 	line-height: 20px !important;
// 	padding: 15px 10px 15px 10px !important;
// }
// *[class=Resizefontto17] {
// 	font-size: 17px !important;
// }
// *[class=Resizefontto17pad10] {
// 	font-size: 17px !important;
// 	padding-left: 10px !important;
// }
// *[class=Resizefontto16subhd] {
// 	font-size: 16px !important;
// 	line-height: 22px !important;
// 	padding: 0px 10px 20px 10px !important;
// }
// *[class=Resizefontto16] {
// 	font-size: 16px !important;
// 	line-height: 18px !important;
// }
// *[class=Resizefontto13] {
// 	font-size: 13px !important;
// }
// *[class=Resizefontto12] {
// 	font-size: 12px !important;
// }
// *[class=Resizefontto14] {
// 	font-size: 14px !important;
// 	line-height: 15px !important;
// }
// *[class=Resizefontto15] {
// 	font-size: 15px !important;
// 	line-height: 17px !important;
// }
// *[class=Resizefontto10] {
// 	font-size: 10px !important;
// }
// *[class=Resizefontto9] {
// 	font-size: 9px !important;
// 	line-height: 12px !important;
// }
// *[class=Resizefontto8] {
// 	font-size: 8px !important;
// }
// *[class=smcolor] {
// 	color: #999999;
// }
// *[class=showmobile320] {
// 	display: block !important;
// 	width: 320px !important;
// 	height: auto !important;
// 	padding: 0;
// 	max-height: inherit !important;
// 	overflow: visible !important;
// }
// *[class=showmobile310] {
// 	display: block !important;
// 	width: 310px !important;
// 	height: auto !important;
// 	padding: 0;
// 	max-height: inherit !important;
// 	overflow: visible !important;
// }
// *[class=showmobile300] {
// 	display: block !important;
// 	width: 300px !important;
// 	height: auto !important;
// 	padding: 0;
// 	max-height: inherit !important;
// 	overflow: visible !important;
// 	color: #999999;
// }
// *[class=showmobile280] {
// 	display: block !important;
// 	width: 280px !important;
// 	height: auto !important;
// 	padding: 0;
// 	max-height: inherit !important;
// 	overflow: visible !important;
// }
// table[class=\"stack\"] {
// 	width: 100%;
// 	display: block;
// 	box-sizing: border-box;
// }
// *[class=showmobile30] {
// 	display: block !important;
// 	margin: auto !important;
// 	width: 30px !important;
// 	height: auto !important;
// 	padding: 0;
// 	max-height: inherit !important;
// 	overflow: visible !important;
// }
//  *[class=iphone6hide] {
// 	 display:none !important;
//  }
// /* Padding Resize*/
// *[class=mobpadoneworld] {
// 	padding: 0 !important;
// }
// *[class=mobpadnav] {
// 	padding: 5px 0px 5px 0px !important;
// }
// *[class=mobpadcopy] {
// 	padding: 2px 10px 2px 10px !important;
// }
// *[class=mobpad0] {
// 	padding-left: 0px !important;
// 	padding-right: 0px !important;
// }
// *[class=mobpadl] {
// 	padding-left: 10px !important;
// 	font-size: 14px !important;
// }
// *[class=padleft10] {
// 	padding-left: 10px !important;
// }
// *[class=mobpadr] {
// 	padding-right: 10px !important;
// 	font-size: 10px !important;
// }
// *[class=mobpadheader] {
// 	padding-left: 0px !important;
// 	padding-right: 0px !important;
// }
// *[class=showmobilebutton] {
// 	display: table !important;
// 	margin: auto !important;
// 	width: 100% !important;
// 	height: auto !important;
// 	text-align: center !important;
// 	max-height: inherit !important;
// 	overflow: visible !important;
// }
// *[class=paddingLR20px] {
// 	padding-left: 20px !important;
// 	padding-right: 20px !important;
// }
// *[class=paddingDisclaimer] {
// 	padding: 24px 24px 24px 20px !important;
// }
// *[class=paddingR20px] {
// 	padding-right: 20px !important;
// }
// *[class=paddingL20px] {
// 	padding-left: 20px !important;
// }
// *[class=paddingL20pxFont14px] {
// 	padding-left: 20px !important;
// 	font-size: 14px !important;
// }
// *[class=paddingB30px] {
// 	padding-bottom: 30px !important;
// }
// *[class=paddingT30pxB0px] {
// 	padding-bottom: 0px !important;
// 	padding-top: 30px !important;
// }
// *[class=paddingB30pxLR20px] {
// 	padding-bottom: 30px !important;
// 	padding-left: 20px !important;
// 	padding-right: 20px !important;
// 	font-size:14px !important;
// }
// *[class=paddingAppIcon] {
// 	padding: 0 11px 0 20px !important;
// }
// *[class=paddingGoogleIcon] {
// 	padding: 0 18px 0 11px !important;
// }
// /*NEWSLETTER RESIZE */
// *[class=newsletterHeadline] {
// 	padding: 0px 0px 5px 20px !important;
// }
// *[class=newsletterColumnContainer] {
// 	display: block !important;
// 	width: 100% !important;
// }
// *[class=newsletterLeftColumn] {
// 	padding: 5px 0px 0px 20px !important;
// }
// *[class=newsletterRightColumn] {
// 	padding: 5px 0px 0px 20px !important;
// }
// *[class=mobpadnewsletter] {
// 	padding: 5px 0px 20px 20px !important;
// }
// *[class=mobpadimage] {
// 	padding: 0 29px 20px 29px !important;
// }
// *[class=oneWorldPad] {
// 	padding: 0 20px 0 0 !important;
// }
// *[class=AAlogoPad] {
// 	padding: 0 0 0 5px !important;
// }
// }

// /* ]]> */
// </style>
// </head>

// <body bgcolor=\"#ebeff0\">
// <table align=\"center\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#ebeff0\">
//   <tbody><tr>
//     <td align=\"center\"><table align=\"center\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#ffffff\">
//         <tbody><tr>
//           <td align=\"center\">
//           <table align=\"center\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#ebeff0\">
// <tbody><tr>
// <td class=\"mobpadnav\" style=\"padding: 20px 30px 20px 30px;\" bgcolor=\"#ebeff0\">


// <table class=\"emailphoneresize\" width=\"446\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"left\" bgcolor=\"#ebeff0\">
// <tbody><tr>
// <td class=\"padleft10\" bgcolor=\"#ebeff0\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#374959;\"><a href=\"#\" style=\"color:#374959; text-decoration:none;\" target=\"_blank\">Thursday, March 16, 2017 at 10:01 am</a></td>
// </tr>
// </tbody></table>
  
// <table class=\"nomob\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"left\" bgcolor=\"#ebeff0\">
// <tbody><tr>
// <td class=\"padleft10\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#374959;\">
// <a href=\"#\" style=\"color:#374959; text-decoration:none;\" target=\"_blank\">View on the web</a></td>
// </tr>
// </tbody></table>
 


// </td>

// </tr>
// </tbody></table>
//           <table class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#ffffff\">
//                     <tbody><tr>
//                       <td align=\"left\" style=\"padding-left:10px\" class=\"AAlogoPad\"><a href=\"http://www.aa.com/homePage.do\" target=\"_blank\"><img style=\"display:block;\" src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/aa_logo.png\" border=\"0\" alt=\"American Airlines\" title=\"American Airlines\" width=\"255\" height=\"52\" align=\"left\" class=\"resizeimageto200\"></a></td>
//                       <td align=\"right\" style=\"padding-right:30px;\" class=\"oneWorldPad\"><a href=\"https://www.aa.com/i18n/travel-info/partner-airlines/oneworld-airline-partners.jsp\" target=\"_blank\"><img style=\"display:block;\" title=\"oneworld\" src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/oneworld_logo.png\" border=\"0\" alt=\"oneworld\" width=\"30\" height=\"30\" align=\"right\"></a></td>
//                     </tr>
//             </tbody></table>
//             <table align=\"center\" style=\"font-size:1px; line-height:1px; border-collapse:collapse;\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#bfbfbf\">
//               <tbody><tr>
//                 <td height=\"1\" style=\"padding:0px; background-color:#bfbfbf; font-size:0px; line-height:0px; border-collapse:collapse;\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/spacer50.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"1\" style=\"display:block;\"></td>
//               </tr>
//             </tbody></table>
//             <table align=\"center\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#ffffff\">
//               <tbody><tr>
//                 <td class=\"paddingLR20px\" style=\"padding:20px 30px 24px 30px;\" bgcolor=\"#ffffff\" align=\"left\"><table class=\"stack\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" bgcolor=\"#ffffff\">
//                           <tbody><tr align=\"left\">
//                             <td bgcolor=\"#ffffff\"><table class=\"resize140px\" width=\"325\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"left\" bgcolor=\"#ffffff\">
//                                 <tbody><tr>
//                                   <td class=\"Resizefontto13\" bgcolor=\"#ffffff\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#36495A;\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\">Hello Smiles Davis,</span></td>
//                                 </tr>
//                               </tbody></table>
                               
//                               <!--[if gte mso 9]>
//         				</td>
//         				<td valign=\"top\">
//         				<![endif]-->
                             
//                               <table class=\"resize140px\" width=\"215\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"left\" bgcolor=\"#ffffff\">
//                                 <tbody><tr>
//                                   <td class=\"Resizefontto13\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#36495A;text-align:right;\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\"> AAdvantage #: <a href=\"https://www.aa.com/loyalty/profile/summary\" style=\"color:#6699ff; text-decoration:none; font-size:14px;\" class=\"Resizefontto13\" target=\"_blank\">0RGE650</a></span></td>
//                                 </tr>
//                               </tbody></table>
                              
// </td>
//                           </tr>
//                         </tbody></table></td>
//               </tr>
//             </tbody></table>
//             <table align=\"center\" class=\"nomob\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#ffffff\">
//               <tbody><tr>
//                 <td class=\"resizeimageto320\" align=\"center\" width=\"600\"><a href=\"#\" target=\"_blank\"><img style=\"display:block;\" src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/check_in_banner_600_desktop.png\" border=\"0\" alt=\"It's time to check in\" title=\"It's time to check in\" class=\"nomob\" width=\"600\" height=\"166\"></a></td>
//               </tr>
//             </tbody></table>
            
//             <!--[if !mso]><!-->
            
//             <div align=\"center\" style=\"display:none; width:0px; max-height:0px; overflow:hidden;\" class=\"showmobile320\">
//               <table align=\"center\" class=\"showmobile320\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"320\" bgcolor=\"#ffffff\">
//                 <tbody><tr>
//                   <td align=\"center\" width=\"320\"><a href=\"#\" target=\"_blank\"><img style=\"display:block;\" src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/check_in_banner_320_mobile.png\" border=\"0\" alt=\"It's time to check in\" title=\"It's time to check in\" width=\"320\" height=\"135\"></a></td>
//                 </tr>
//               </tbody></table>
//             </div>
            
//             <!--<![endif]--> 
//             <table align=\"center\" style=\"font-size:1px; line-height:1px; border-collapse:collapse;\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#ffffff\">
//               <tbody><tr>
//                 <td height=\"30\" style=\"padding:0px; background-color:#ffffff; font-size:0px; line-height:0px; border-collapse:collapse;\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/spacer50.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"30\" style=\"display:block;\"></td>
//               </tr>
//             </tbody></table>
            
            
//             <table class=\"emailphoneresize\" align=\"center\" width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
//               <tbody><tr>
//               <td style=\"padding: 0 112px 0 113px;\" class=\"mobpad0\">
//             <table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"375\" bgcolor=\"#ffffff\" class=\"nomob\">
//               <tbody><tr>
//                 <td width=\"375\" height=\"86\" align=\"center\" bgcolor=\"#ffffff\" style=\"padding:0 0 36px 0;\" class=\"paddingB30px\">
//                  <a href=\"#\" class=\"\" target=\"_blank\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/desktopCTA.png\" border=\"0\" style=\"display:block;\" alt=\"Check In Now\" title=\"Check In Now\" width=\"375\" height=\"50\" class=\"nomob\"></a>

//                 </td>
//               </tr>
//             </tbody></table>
            
//             <!--[if !mso]><!-->
// <div style=\"display:none; width:0px; max-height:0px; overflow:hidden;\" class=\"showmobile280\">
//             <table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"280\" bgcolor=\"#ffffff\" class=\"showmobile280\">
//               <tbody><tr>
//                 <td width=\"280\" height=\"65\" align=\"center\" bgcolor=\"#ffffff\" style=\"padding:0 20px 30px 20px;\">
//                  <a href=\"#\" class=\"\" target=\"_blank\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/mobileCTA.png\" border=\"0\" style=\"display:block;\" alt=\"Check In Now\" title=\"Check In Now\" width=\"280\" height=\"35\" class=\"showmobile280\"></a>

//                 </td>
//               </tr>
//             </tbody></table>
//             </div>
// <!--<![endif]-->

//             </td>
//             </tr>
//             </tbody></table>
//             <table align=\"center\" style=\"font-size:1px; line-height:1px; border-collapse:collapse;\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#bfbfbf\">
//               <tbody><tr>
//                 <td height=\"1\" style=\"padding:0px; background-color:#bfbfbf; font-size:0px; line-height:0px; border-collapse:collapse;\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/spacer50.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"1\" style=\"display:block;\"></td>
//               </tr>
//             </tbody></table>
//             <table class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" align=\"center\">
//   <tbody><tr>
//     <td class=\"paddingB30pxLR20px\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:18px; line-height:18px; color:#36495A; font-weight:bold;padding:30px 30px 34px 30px;\" align=\"left\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\"><!--Begin SPOTLIGHT HEADING--> Record locator: SMLDVS</span></td>
//   </tr>
//   <tr>
//     <td class=\"paddingLR20px\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:30px; line-height:30px; color:#0061AB; padding:0 30px 3px 30px;\" align=\"left\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\">CHI <span style=\"font-size:18px;\">to</span> SFO</span></td>
//   </tr>
//   <tr>
//     <td class=\"paddingLR20px\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:16px; line-height:16px; color:#0061AB; padding:0 30px 36px 30px;\" align=\"left\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;color: #0061AB !important; text-decoration: none;\" class=\"appleLinksBlue\">Thursday, March 16, 2017</span></td>
//   </tr>
//   <tr>
//     <td style=\"padding: 0 30px 15px 30px;\" align=\"left\" class=\"paddingLR20px\">
    
    
//     <table class=\"email280resize\" cellspacing=\"0\" cellpadding=\"0\" width=\"306\" style=\"border-collapse:collapse;\">
//         <tbody><tr>
//           <td class=\"resize140px\" width=\"166\" align=\"left\" valign=\"top\">
//           <table class=\"resize140px\" cellspacing=\"0\" cellpadding=\"0\" width=\"156\" style=\"border-collapse:collapse;\">
//         <tbody><tr>
//           <td class=\"resize114px\" width=\"130\" align=\"left\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:27px; color:#36495A; text-align:left; text-decoration: none; line-height:27px; padding: 0 10px 7px 0; text-transform:uppercase;\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;color: #36495A !important; text-decoration: none;\" class=\"appleLinksGrey\">10:01 am</span></td>
          
//           <td width=\"26\" align=\"left\" style=\"padding: 0 0 7px 0;\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/grey_arrow.png\" border=\"0\" alt=\"\" title=\"\" width=\"26\" height=\"20\"></td>
//         </tr>
//       </tbody></table>
//       <table class=\"resize140px\" cellspacing=\"0\" cellpadding=\"0\" width=\"166\" style=\"border-collapse:collapse;\">
//         <tbody><tr>
//           <td class=\"resize140px\" width=\"166\" align=\"left\" style=\"font-family: Arial, Helvetica, sans-serif; font-size:14px; line-height:14px; color:#36495A; text-align:left; text-decoration: none; padding: 0 0 0 0; border-collapse:collapse;\"><span class=\"Resizefontto12\" style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\">CHICAGO ILLINOIS</span></td>
          
          
//         </tr>
//       </tbody></table>
          
//           </td>
          
//           <td class=\"resize140px\" width=\"140\" align=\"left\" valign=\"top\">
//           <table class=\"resize140px\" cellspacing=\"0\" cellpadding=\"0\" width=\"166\" style=\"border-collapse:collapse;\">
//         <tbody><tr>
//           <td class=\"resize140pxPadL10px\" width=\"140\" align=\"left\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:27px; color:#36495A;text-align:left; text-decoration: none; line-height:27px; padding: 0 0 7px 20px; text-transform:uppercase;\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;color: #36495A !important; text-decoration: none;\" class=\"appleLinksGrey\">12:31 pm</span></td>
          
          
//         </tr>
//                 <tr>
//           <td class=\"resize140pxPadL10px\" width=\"140\" align=\"left\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:14px; color:#36495A; text-align:left; text-decoration: none; padding: 0 0 0 20px;\"><span class=\"Resizefontto12\" style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\">San Francisco, CA</span></td>
          
          
//         </tr>
//       </tbody></table>
//           </td>
//         </tr>
//       </tbody></table>
    
    
    
//       </td>
//   </tr>
//   <tr>
//     <td class=\"paddingLR20px\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:14px; color:#36495A; padding:0 30px 0 30px;\" align=\"left\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\" class=\"appleLinksGrey\">AA 6500</span></td>
//   </tr>

    



    
//   <tr>
//   <td>
//   <table align=\"center\" style=\"font-size:1px; line-height:1px; border-collapse:collapse;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"1\" bgcolor=\"#ffffff\">
//               <tbody><tr>
//                 <td height=\"36\" style=\"padding:0px; background-color:#ffffff; font-size:0px; line-height:0px; border-collapse:collapse;\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/spacer50.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"36\" style=\"display:block;\"></td>
//               </tr>
//             </tbody></table>
//             </td>
//             </tr>

// </tbody></table>

//             <table align=\"center\" style=\"font-size:1px; line-height:1px; border-collapse:collapse;\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#bfbfbf\">
//               <tbody><tr>
//                 <td height=\"1\" style=\"padding:0px; background-color:#bfbfbf; font-size:0px; line-height:0px; border-collapse:collapse;\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/spacer50.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"1\" style=\"display:block;\"></td>
//               </tr>
//             </tbody></table>
//             <table align=\"center\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#ffffff\">
//               <tbody><tr>
//                 <td class=\"paddingLR20px\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:21px; line-height:21px; color:#0061AB; padding:30px 30px 15px 30px;\" align=\"left\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\">Important Information</span></td>
//               </tr>
//             </tbody></table>
//             <table class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" align=\"center\">
//               <tbody><tr>
//                 <td style=\"padding: 0 0 36px 0;\" align=\"center\" valign=\"top\" class=\"paddingB30px\"><table class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" align=\"center\">
                    
//                     <tbody><tr>
//                       <td class=\"paddingL20pxFont14px\" style=\"font-family:Arial, Helvetica, sans-serif; padding: 0 0 0 30px; color:#9DA6AB; font-size:14px; line-height:24px;\" width=\"40\" align=\"center\" valign=\"top\">■</td>
//                       <td style=\"font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:24px; color:#36495A; padding:0 30px 0 5px;\" width=\"100%\" align=\"left\" valign=\"top\" class=\"paddingR20px\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\">We've introduced new boarding group names.                         <a href=\"https://www.aa.com/i18n/travel-info/boarding-process.jsp\" style=\"color:#0078D2; text-decoration:none;\" target=\"_blank\">View our boarding process »</a></span></td>
//                     </tr>
 
//                   </tbody></table></td>
//               </tr>
//             </tbody></table>
//             <table align=\"center\" style=\"font-size:1px; line-height:1px; border-collapse:collapse;\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#bfbfbf\">
//               <tbody><tr>
//                 <td height=\"1\" style=\"padding:0px; background-color:#bfbfbf; font-size:0px; line-height:0px; border-collapse:collapse;\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/spacer50.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"1\" style=\"display:block;\"></td>
//               </tr>
//             </tbody></table>
            
//             <table align=\"center\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#ffffff\">
//               <tbody><tr>
//                 <td class=\"mobpad0\" bgcolor=\"#ffffff\"><table class=\"email300resize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#ffffff\">
//                     <tbody><tr>
//                       <td style=\"padding: 36px 0 36px 0;\" class=\"paddingT30pxB0px\"><table class=\"stack\" width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#ffffff\">
//                           <tbody><tr>
//                             <td bgcolor=\"#ffffff\" valign=\"top\"><table class=\"email300resize\" width=\"292\" align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
//                                 <tbody><tr>
//                                   <td class=\"mobpadimage\" width=\"292\" align=\"left\" style=\"padding: 0 0 20px 30px;\"><a href=\"https://www.aa.com/i18n/customer-service/support/freddie-awards.jsp?c=EML%7C%7C20170215%7CADV%7CMKT%7CTRANS%7C%7CLPM_freddie_awards_PDP\" target=\"_blank\"><img style=\"display:block;\" src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/262x80_freddies.jpg\" border=\"0\" width=\"262\" height=\"80\"></a></td>
//                                 </tr>
//                               </tbody></table>
                              
//                               <!--[if gte mso 9]>
//         				</td>
//         				<td valign=\"top\">
//         				<![endif]-->
                              
//                               <table class=\"email300resize\" width=\"292\" align=\"right\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
//                                 <tbody><tr>
//                                   <td class=\"mobpadimage\" width=\"292\" style=\"padding: 0 30px 20px 0;\" align=\"left\"><a href=\"https://www.aa.com/i18n/travel-info/clubs/admirals-club.jsp?c=EML||20170228|ADC|MKT|TRANS||LPM_AcAcqPDP\" target=\"_blank\"><img style=\"display:block;\" src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/262x80_admirals-club-female.jpg\" border=\"0\" width=\"262\" height=\"80\" align=\"left\"></a></td>
//                                 </tr>
//                               </tbody></table></td>
//                           </tr>
//                         </tbody></table>
//                         <table class=\"stack\" width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" bgcolor=\"#ffffff\">
//                           <tbody><tr>
//                             <td bgcolor=\"#ffffff\" valign=\"top\"><table class=\"email300resize\" width=\"292\" align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
//                                 <tbody><tr>
//                                   <td class=\"mobpadimage\" width=\"292\" align=\"left\" style=\"padding: 0 0 20px 30px;\"><a href=\"http://www.aa.com/car?src=AAHP1C&amp;cint=EML||20170101|ANC|MKT|TRANS||LPM_Car_Planner_PDP\" target=\"_blank\"><img style=\"display:block;\" src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/262x80_ancillary-car.jpg\" border=\"0\" width=\"262\" height=\"80\"></a></td>
//                                 </tr>
//                               </tbody></table>
                              
//                               <!--[if gte mso 9]>
//         				</td>
//         				<td valign=\"top\">
//         				<![endif]-->
                              
//                               <table class=\"email300resize\" width=\"292\" align=\"right\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
//                                 <tbody><tr>
//                                   <td class=\"mobpadimage\" width=\"292\" style=\"padding: 0 30px 20px 0;\" align=\"left\"><a href=\"http://www.booking.com/\" target=\"_blank\"><img style=\"display:block;\" src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/262x80_hotel-booking-com.jpg\" border=\"0\" width=\"262\" height=\"80\" align=\"left\"></a></td>
//                                 </tr>
//                               </tbody></table></td>
//                           </tr>
//                         </tbody></table></td>
//                     </tr>
//                   </tbody></table></td>
//               </tr>
//             </tbody></table>
//             <table align=\"center\" style=\"font-size:1px; line-height:1px; border-collapse:collapse;\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#bfbfbf\">
//               <tbody><tr>
//                 <td height=\"1\" style=\"padding:0px; background-color:#bfbfbf; font-size:0px; line-height:0px; border-collapse:collapse;\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/spacer50.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"1\" style=\"display:block;\"></td>
//               </tr>
//             </tbody></table>
            
            
//             <table align=\"center\" style=\"font-size:1px; line-height:1px; border-collapse:collapse;\" class=\"emailphoneresize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" bgcolor=\"#bfbfbf\">
//               <tbody><tr>
//                 <td height=\"1\" style=\"padding:0px; background-color:#bfbfbf; font-size:0px; line-height:0px; border-collapse:collapse;\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/spacer50.gif\" border=\"0\" alt=\"\" width=\"1\" height=\"1\" style=\"display:block;\"></td>
//               </tr>
//             </tbody></table>
            
            
//             <table class=\"emailphoneresize\" align=\"center\" width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
//               <tbody><tr>
//                 <td style=\"font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#0078D2; padding:36px 0 36px 0;\" align=\"center\" bgcolor=\"#ffffff\"><a href=\"https://www.aa.com/i18n/customer-service/contact-american/american-customer-service.jsp\" style=\"color:#137acf; text-decoration:underline;\" target=\"_blank\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\">Contact us</span></a> &nbsp;&nbsp;<span style=\"color:#36495A; text-decoration:none;\">|</span>&nbsp;&nbsp; <a href=\"https://www.aa.com/i18n/customer-service/support/privacy-policy.jsp\" style=\"color:#0078D2; text-decoration:underline;\" target=\"_blank\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\">Privacy&nbsp;policy</span></a></td>
//               </tr>
//             </tbody></table>
//             <table class=\"emailphoneresize\" align=\"center\" width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
//               <tbody><tr>
//               <td style=\"padding:0 150px 0 150px;\" class=\"mobpad0\">
            
//             <table class=\"email280resize\" align=\"center\" width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ebeff0\" style=\"border-top:0px solid #ebeff0;border-top-left-radius:3px;border-top-right-radius:3px;\">
//               <tbody><tr>
//                 <td style=\"font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:14px; color:#0078D2; text-decoration:none; padding:8px 0 0 0;\" align=\"center\"><a href=\"https://www.aa.com/i18n/travel-info/travel-tools/mobile-and-app.jsp\" style=\"color:#137acf; text-decoration:none;\" target=\"_blank\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\">Get the American Airlines app</span></a></td>
//               </tr>
//             </tbody></table>
//             </td>
//             </tr>
//             </tbody></table>
            
//             <table class=\"appResize\" align=\"center\" width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ebeff0\">
//               <tbody><tr>
//                 <td style=\"padding:10px 0 10px 0;\" align=\"center\"><table class=\"email280resize\" align=\"center\" width=\"300\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ebeff0\">
//                     <tbody><tr>
//                       <td width=\"150\" style=\"padding:0 11px 0 29px;\" class=\"paddingAppIcon\"><a href=\"https://itunes.apple.com/us/app/american-airlines/id382698565?mt=8\" target=\"_blank\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/appstore.png\" border=\"0\" alt=\"\" title=\"\" style=\"display:block;\" width=\"110\" height=\"34\"></a></td>
//                       <td width=\"150\" style=\"padding:0 29px 0 11px;\" class=\"paddingGoogleIcon\"><a href=\"https://play.google.com/store/apps/details?id=com.aa.android\" target=\"_blank\"><img src=\"http://www.aa.com/content/images/email/marketingOneOff/PDP/googleplay.png\" border=\"0\" alt=\"\" title=\"\" style=\"display:block;\" width=\"110\" height=\"34\"></a></td>
//                     </tr>
//                   </tbody></table></td>
//               </tr>
//             </tbody></table>
//           </td>
//         </tr>
//         <tr>
//           <td align=\"center\" style=\"background-color:#ebeff0; padding-bottom:10px;\">
//           <table align=\"center\" class=\"footerResize\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" style=\"background-color:#ebeff0;\">
//               <tbody><tr>
//                 <td class=\"paddingLR20px\" style=\"font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#999999; padding:20px 30px 40px 30px;\" align=\"left\"><span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\">Please do not reply to this email address as it is not monitored. This email as sent to <a href=\"#\" style=\"color:#0078D2; text-decoration:none;\" target=\"_blank\">hello@SmilesDavis.yeah </a></span><br>
//                   <br>
//                   <span style=\"font-family:'Helvetica Neue', Helvetica, Arial, sans-serif !important;mso-line-height-rule:exactly;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;\"><strong>one</strong>world is a registered trademark of <strong>one</strong>world Alliance, LLC.<br>
//                   © American Airlines, Inc. All Rights Reserved.</span></td>
//               </tr>
//             </tbody></table>
//           </td>
//           </tr>
//       </tbody></table></td>
//   </tr>
// </tbody></table>



// </body>";



?>