<?php

function fb_msg_body ($team, $email, $mobile) {

  $tel = preg_replace('/\s+/', '',$mobile);
  $tel = preg_replace('/[^0-9]/', '', $tel);
  preg_match('~.*(\d{5})(\d{6}).*~', $tel, $matches);
  $mobile = $matches['1'].' '.$matches['2'];

  $body = '
<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=unicode">
<title>Facebook</title>

<style>
<!--
@media all and (max-width: 480px){*[class].ib_t{min-width:100% !important}*[class].ib_row{display:block !important}*[class].ib_ext{display:block !important;padding:10px 0 5px 0;vertical-align:top !important;width:100% !important}*[class].ib_img,*[class].ib_mid{vertical-align:top !important}*[class].mb_blk{display:block !important;padding-bottom:10px;width:100% !important}*[class].mb_hide{display:none !important}*[class].mb_inl{display:inline !important}*[class].d_mb_flex{display:block !important}}
@media only screen and (max-device-width: 480px){.d_mb_hide{display:none !important}.d_mb_show{display:block !important}.d_mb_flex{display:block !important}}
.D\_MB\_SHOW\_CENTER
	{display:table;}
.D\_MB\_FLEX
	{display:flex;}

 /* Font Definitions */
 @font-face
	{font-family:Helvetica;
	panose-1:2 11 6 4 2 2 2 2 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-536859905 -1073711037 9 0 511 0;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:roman;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1107305727 0 0 415 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-536870145 1073786111 1 0 415 0;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-520081665 -1073717157 41 0 66047 0;}
@font-face
	{font-family:"Segoe UI";
	panose-1:2 11 5 2 4 2 4 2 2 3;
	mso-font-charset:0;
	mso-generic-font-family:swiss;
	mso-font-pitch:variable;
	mso-font-signature:-469750017 -1073683329 9 0 511 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
h1
	{mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 1 Char";
	mso-margin-top-alt:auto;
	margin-right:0cm;
	mso-margin-bottom-alt:auto;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	mso-outline-level:1;
	font-size:24.0pt;
	font-family:"Times New Roman","serif";
	font-weight:bold;}
h2
	{mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 2 Char";
	mso-margin-top-alt:auto;
	margin-right:0cm;
	mso-margin-bottom-alt:auto;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	mso-outline-level:2;
	font-size:18.0pt;
	font-family:"Times New Roman","serif";
	font-weight:bold;}
h3
	{mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 3 Char";
	mso-margin-top-alt:auto;
	margin-right:0cm;
	mso-margin-bottom-alt:auto;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	mso-outline-level:3;
	font-size:13.5pt;
	font-family:"Times New Roman","serif";
	font-weight:bold;}
h4
	{mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 4 Char";
	mso-margin-top-alt:auto;
	margin-right:0cm;
	mso-margin-bottom-alt:auto;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	mso-outline-level:4;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	font-weight:bold;}
h5
	{mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 5 Char";
	mso-margin-top-alt:auto;
	margin-right:0cm;
	mso-margin-bottom-alt:auto;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	mso-outline-level:5;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	font-weight:bold;}
h6
	{mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-link:"Heading 6 Char";
	mso-margin-top-alt:auto;
	margin-right:0cm;
	mso-margin-bottom-alt:auto;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	mso-outline-level:6;
	font-size:7.5pt;
	font-family:"Times New Roman","serif";
	font-weight:bold;}
a:link, span.MsoHyperlink
	{mso-style-noshow:yes;
	mso-style-priority:99;
	color:blue;
	text-decoration:underline;
	text-underline:single;}
a:visited, span.MsoHyperlinkFollowed
	{mso-style-noshow:yes;
	mso-style-priority:99;
	color:purple;
	text-decoration:underline;
	text-underline:single;}
p
	{mso-style-noshow:yes;
	mso-style-priority:99;
	mso-margin-top-alt:auto;
	margin-right:0cm;
	mso-margin-bottom-alt:auto;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
span.Heading1Char
	{mso-style-name:"Heading 1 Char";
	mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 1";
	mso-ansi-font-size:14.0pt;
	mso-bidi-font-size:14.0pt;
	font-family:"Calibri Light","sans-serif";
	mso-ascii-font-family:"Calibri Light";
	mso-ascii-theme-font:major-latin;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:major-fareast;
	mso-hansi-font-family:"Calibri Light";
	mso-hansi-theme-font:major-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:major-bidi;
	color:#2E74B5;
	mso-themecolor:accent1;
	mso-themeshade:191;
	mso-fareast-language:EN-GB;
	font-weight:bold;}
span.Heading2Char
	{mso-style-name:"Heading 2 Char";
	mso-style-noshow:yes;
	mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 2";
	mso-ansi-font-size:13.0pt;
	mso-bidi-font-size:13.0pt;
	font-family:"Calibri Light","sans-serif";
	mso-ascii-font-family:"Calibri Light";
	mso-ascii-theme-font:major-latin;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:major-fareast;
	mso-hansi-font-family:"Calibri Light";
	mso-hansi-theme-font:major-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:major-bidi;
	color:#5B9BD5;
	mso-themecolor:accent1;
	mso-fareast-language:EN-GB;
	font-weight:bold;}
span.Heading3Char
	{mso-style-name:"Heading 3 Char";
	mso-style-noshow:yes;
	mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 3";
	mso-ansi-font-size:12.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Calibri Light","sans-serif";
	mso-ascii-font-family:"Calibri Light";
	mso-ascii-theme-font:major-latin;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:major-fareast;
	mso-hansi-font-family:"Calibri Light";
	mso-hansi-theme-font:major-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:major-bidi;
	color:#5B9BD5;
	mso-themecolor:accent1;
	mso-fareast-language:EN-GB;
	font-weight:bold;}
span.Heading4Char
	{mso-style-name:"Heading 4 Char";
	mso-style-noshow:yes;
	mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 4";
	mso-ansi-font-size:12.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Calibri Light","sans-serif";
	mso-ascii-font-family:"Calibri Light";
	mso-ascii-theme-font:major-latin;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:major-fareast;
	mso-hansi-font-family:"Calibri Light";
	mso-hansi-theme-font:major-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:major-bidi;
	color:#5B9BD5;
	mso-themecolor:accent1;
	mso-fareast-language:EN-GB;
	font-weight:bold;
	font-style:italic;}
span.Heading5Char
	{mso-style-name:"Heading 5 Char";
	mso-style-noshow:yes;
	mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 5";
	mso-ansi-font-size:12.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Calibri Light","sans-serif";
	mso-ascii-font-family:"Calibri Light";
	mso-ascii-theme-font:major-latin;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:major-fareast;
	mso-hansi-font-family:"Calibri Light";
	mso-hansi-theme-font:major-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:major-bidi;
	color:#1F4D78;
	mso-themecolor:accent1;
	mso-themeshade:127;
	mso-fareast-language:EN-GB;}
span.Heading6Char
	{mso-style-name:"Heading 6 Char";
	mso-style-noshow:yes;
	mso-style-priority:9;
	mso-style-unhide:no;
	mso-style-locked:yes;
	mso-style-link:"Heading 6";
	mso-ansi-font-size:12.0pt;
	mso-bidi-font-size:12.0pt;
	font-family:"Calibri Light","sans-serif";
	mso-ascii-font-family:"Calibri Light";
	mso-ascii-theme-font:major-latin;
	mso-fareast-font-family:"Times New Roman";
	mso-fareast-theme-font:major-fareast;
	mso-hansi-font-family:"Calibri Light";
	mso-hansi-theme-font:major-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:major-bidi;
	color:#1F4D78;
	mso-themecolor:accent1;
	mso-themeshade:127;
	mso-fareast-language:EN-GB;
	font-style:italic;}
p.dmbshow, li.dmbshow, div.dmbshow
	{mso-style-name:d_mb_show;
	mso-style-unhide:no;
	mso-margin-top-alt:auto;
	margin-right:0cm;
	mso-margin-bottom-alt:auto;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	display:none;
	mso-hide:all;}
p.dmbshowcenter, li.dmbshowcenter, div.dmbshowcenter
	{mso-style-name:d_mb_show_center;
	mso-style-unhide:no;
	mso-margin-top-alt:auto;
	margin-right:0cm;
	mso-margin-bottom-alt:auto;
	margin-left:0cm;
	mso-pagination:widow-orphan;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";}
.MsoChpDefault
	{mso-style-type:export-only;
	mso-default-props:yes;
	font-size:10.0pt;
	mso-ansi-font-size:10.0pt;
	mso-bidi-font-size:10.0pt;}
@page Section1
	{size:612.0pt 792.0pt;
	margin:72.0pt 72.0pt 72.0pt 72.0pt;
	mso-header-margin:0;
	mso-footer-margin:0;
	mso-paper-source:0;}
div.Section1
	{page:Section1;}
a
    {text-decoration:none !important;
    color:#141823 !important;}
-->
</style>
</head>

<body bgcolor=white lang=EN-GB link=blue vlink=purple style="tab-interval:36.0pt;
max-width:420px">

<div class=Section1>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="100%""
 style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
 0cm 0cm 0cm 0cm">
 <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
  <td width="100%" style="width:100.0%;padding:0cm 0cm 0cm 0cm">
  <div align=center>
  <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
   style="border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm">
   <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
    <td width=840 style="width:630.0pt;padding:0cm 0cm 0cm 0cm">
    <div align=center>
    <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
     style="border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
     0cm 0cm 0cm 0cm">
     <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:yes">
      <td style="background:white;padding:0cm 0cm 0cm 0cm">
      <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
       width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
       1184;mso-padding-alt:0cm 0cm 0cm 0cm">
       <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;height:15.0pt">
        <td colspan=3 style="padding:0cm 0cm 0cm 0cm;height:15.0pt">
        <p class=MsoNormal style="line-height:15.0pt">&nbsp;</p>
        </td>
       </tr>
       <tr style="mso-yfti-irow:1;height:.75pt">
        <td colspan=3 style="padding:0cm 0cm 0cm 0cm;height:.75pt">
        <p class=MsoNormal style="mso-line-height-alt:.75pt">
        <span style="font-size:1.0pt;color:white">Players Wanted [Facebook Group]</span>
        </p>
        </td>
       </tr>
       <tr style="mso-yfti-irow:2">
        <td width=15 style="width:11.25pt;padding:0cm 0cm 0cm 0cm">
        <p class=MsoNormal>&nbsp;&nbsp;&nbsp;</p>
        </td>
        <td style="padding:0cm 0cm 0cm 0cm">
        <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
         width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
         1184;mso-padding-alt:0cm 0cm 0cm 0cm">
         <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;height:11.25pt">
          <td colspan=3 style="padding:0cm 0cm 0cm 0cm;height:11.25pt">
          <p class=MsoNormal style="mso-line-height-alt:11.25pt">&nbsp;</p>
          </td>
         </tr>
         <tr style="mso-yfti-irow:1;height:24.0pt">
          <td width=32 style="width:24.0pt;padding:0cm 0cm 0cm 0cm;height:24.0pt">
          <p class=MsoNormal style="mso-line-height-alt:0pt">
<!--- Facebook logo --->
          <a href="https://www.facebook.com/groups/218738725475116/">
          <span style="color:#3B5998;text-decoration:none;text-underline:none">
            <img border=0 width=32 height=32 id="_x0000_i1025" src="https://static.xx.fbcdn.net/rsrc.php/v3/yP/r/nblMrq1jYuK.png" style="border-bottom-width:0in;border-left-width:0in;border-right-width:0in;border-top-width:0in">
          </span>
          </a>
          </p>
          </td>
          <td width=15 style="width:11.25pt;padding:0cm 0cm 0cm 0cm;height:
          24.0pt">
          <p class=MsoNormal>&nbsp;&nbsp;&nbsp;</p>
          </td>
          <td width="100%" style="width:100.0%;padding:0cm 0cm 0cm 0cm;
          height:24.0pt">
          <p class=MsoNormal>
<!--- Facebook name --->
          <a href="https://www.facebook.com/groups/218738725475116/">
          <span style="font-size:14.5pt;font-family:"Helvetica,sans-serif;
          color:#3B5998;text-decoration:none;text-underline:none">Facebook</span>
          </a>
          </p>
          </td>
         </tr>
         <tr style="mso-yfti-irow:2;mso-yfti-lastrow:yes;height:11.25pt">
          <td colspan=3 style="padding:0cm 0cm 0cm 0cm;height:11.25pt">
          <p class=MsoNormal style="mso-line-height-alt:11.25pt">&nbsp;</p>
          </td>
         </tr>
        </table>
        </td>
        <td width=15 style="width:11.25pt;padding:0cm 0cm 0cm 0cm">
        <p class=MsoNormal>&nbsp;&nbsp;&nbsp;</p>
        </td>
       </tr>
       <tr style="mso-yfti-irow:3">
        <td width=15 style="width:11.25pt;padding:0cm 0cm 0cm 0cm">
        <p class=MsoNormal>&nbsp;&nbsp;&nbsp;</p>
        </td>
        <td style="padding:0cm 0cm 0cm 0cm">
        <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
         width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
         1184;mso-padding-alt:0cm 0cm 0cm 0cm">
         <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;height:21.0pt">
          <td style="padding:0cm 0cm 0cm 0cm;height:21.0pt">
          <p class=MsoNormal style="line-height:21.0pt">&nbsp;</p>
          </td>
         </tr>
         <tr style="mso-yfti-irow:1">
          <td style="padding:0cm 0cm 0cm 0cm;border-radius:4px">
          <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
           width="100%" style="width:100.0%;border-collapse:collapse;
           mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm">
           <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
            yes">
            <td style="border:solid #E5E5E5 1.0pt;mso-border-alt:solid #E5E5E5 .75pt;
            background:#ECF3FF;padding:11.25pt 11.25pt 11.25pt 11.25pt">
            <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
             width="100%" style="width:100.0%;border-collapse:collapse;
             mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm">
             <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
              yes">
              <td valign=top style="padding:0cm 0cm 0cm 0cm">
              <p class=MsoNormal>
<!--- User Image --->
              <a href="https://www.facebook.com/groups/218738725475116/">
              <span style="color:#3B5998;text-decoration:none;text-underline:none">
              <img border=0 width=64 height=64 id="_x0000_i1026" src="https://scontent.flba1-1.fna.fbcdn.net/v/t1.0-9/39397629_10217347755072404_3264046807042228224_n.jpg?_nc_cat=105&amp;_nc_sid=825194&amp;_nc_ohc=JvNbimU7ZaoAX_iKyvK&amp;_nc_ht=scontent.flba1-1.fna&amp;oh=ff140a9d39e49049c3ff6029494bea49&amp;oe=5F1EFC7B" style="border:rgba(0,0,0,0.15);border-radius:50%">
              </span>
              </a>
              </p>
              </td>
              <td width=10 style="width:7.5pt;padding:0cm 0cm 0cm 0cm">
              <p class=MsoNormal>&nbsp;&nbsp;&nbsp;</p>
              </td>
              <td width="100%" style="width:100.0%;padding:0cm 0cm 0cm 0cm">
              <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
               width="100%" style="width:100.0%;border-collapse:collapse;
               mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm">
               <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes">
                <td style="padding:0cm 0cm 0cm 0cm">
                <p class=MsoNormal style="line-height:15.75pt">
<!--- Short Message --->
                <span style="font-family:"Helvetica,sans-serif;color:#141823">&#128196;<b><span style="word-wrap:break-word"><a href="mailto:'.$email.'">'.$team.'</a></span></b> are looking for players.<br>Please call <a href="tel:'.$tel.'">'.$mobile.'</a> for more details.<o:p></o:p></span></p>
                </td>
               </tr>
               <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
                <td style="padding:0cm 0cm 0cm 0cm">
                <p class=MsoNormal><span class=mbtext><span style="font-size:
                10.5pt;font-family:"Helvetica,sans-serif;color:#898F9C">'.date("j M").' at '.date("H:i").'</span></span></p>
                </td>
               </tr>
              </table>
              </td>
             </tr>
            </table>
            </td>
           </tr>
          </table>


          <p class=MsoNormal><span style="display:none;mso-hide:all"><o:p>&nbsp;</o:p></span></p>
          <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
           style="border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
           0cm 0cm 0cm 0cm">
           <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
            yes;height:11.25pt">
            <td style="padding:0cm 0cm 0cm 0cm;height:11.25pt">
            <p class=MsoNormal style="mso-line-height-alt:11.25pt">&nbsp;</p>
            </td>
           </tr>
          </table>
          <p class=MsoNormal><span style="display:none;mso-hide:all"><o:p>&nbsp;</o:p></span></p>
          
          <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
           width="100%" style="width:100.0%;border-collapse:collapse;
           mso-yfti-tbllook:1184;mso-padding-alt:0cm 0cm 0cm 0cm">
           <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
            yes">
            <td style="border:solid #E5E5E5 1.0pt;mso-border-alt:solid #E5E5E5 .75pt;
            background:white;padding:10.5pt 11.25pt 10.5pt 11.25pt;border-radius:4px">
            <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
             style="border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:
             0cm 0cm 0cm 0cm">
             <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
              yes">
              <td width=24 style="width:18.0pt;padding:0cm 0cm 0cm 0cm">
              <p class=MsoNormal><img border=0 width=16 height=16
              id="_x0000_i1027"
              src="https://static.xx.fbcdn.net/rsrc.php/v3/y5/r/F6wdt9G6iUX.png"
              style="border-bottom-width:0in;border-left-width:0in;border-right-width:
              0in;border-top-width:0in;padding-top:2px"></p>
              </td>
              <td width=5 style="width:3.75pt;padding:0cm 0cm 0cm 0cm">
              <p class=MsoNormal></p>
              </td>
              <td style="padding:0cm 0cm 0cm 0cm">
<!--- Sent on behalf of --->
              <p class=MsoNormal style="line-height:15.75pt"><span
              style="font-family:"Helvetica,sans-serif;color:#141823">Sent on behalf of <a href="mailto:'.$email.'">'.$team.'</a>.<br><font style="font-size: small;">a member club of the <a href="https://www.communitypartnershipleague.co.uk">Community Partnership League</a>.</font><o:p></o:p></span></p>
              </td>
             </tr>
            </table>
            </td>
           </tr>
          </table>
          
          </td>
         </tr>
         <tr style="mso-yfti-irow:2;mso-yfti-lastrow:yes;height:21.0pt">
          <td style="padding:0cm 0cm 0cm 0cm;height:21.0pt">
          <p class=MsoNormal style="line-height:21.0pt">&nbsp;</p>
          </td>
         </tr>
        </table>
        </td>
        <td width=15 style="width:11.25pt;padding:0cm 0cm 0cm 0cm">
        <p class=MsoNormal>&nbsp;&nbsp;&nbsp;</p>
        </td>
       </tr>
       <tr style="mso-yfti-irow:4">
        <td width=15 style="width:11.25pt;padding:0cm 0cm 0cm 0cm">
        <p class=MsoNormal>&nbsp;&nbsp;&nbsp;</p>
        </td>

        <td style="padding:0cm 0cm 0cm 0cm">
        </td>

        <td width=15 style="width:11.25pt;padding:0cm 0cm 0cm 0cm">
        <p class=MsoNormal>&nbsp;&nbsp;&nbsp;</p>
        </td>
       </tr>
       <tr style="mso-yfti-irow:5">
        <td width=15 style="width:11.25pt;padding:0cm 0cm 0cm 0cm">
        <p class=MsoNormal>&nbsp;&nbsp;&nbsp;</p>
        </td>
        <td style="padding:0cm 0cm 0cm 0cm">
        <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
         align=left width="100%" style="width:100.0%;border-collapse:collapse;
         mso-yfti-tbllook:1184;mso-table-lspace:2.25pt;mso-table-rspace:2.25pt;
         mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:column;
         mso-table-left:left;mso-padding-alt:0cm 0cm 0cm 0cm">
         <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;height:14.25pt">
          <td style="padding:0cm 0cm 0cm 0cm;height:14.25pt">
          <p class=MsoNormal style="line-height:14.25pt">&nbsp;</p>
          </td>
         </tr>
         <tr style="mso-yfti-irow:1;mso-yfti-lastrow:yes">
          <td style="padding:0cm 0cm 0cm 0cm">
          <p class=MsoNormal style="line-height:12.0pt"><span style="font-size:
          8.5pt;font-family:"Helvetica,sans-serif;color:#AAAAAA;">
          Facebook Ireland Ltd., Attention: Community Operations, 4 Grand Canal
          Square, Dublin 2, Ireland<o:p></o:p></span></p>
          </td>
         </tr>
        </table>
        </td>
        <td width=15 style="width:11.25pt;padding:0cm 0cm 0cm 0cm">
        <p class=MsoNormal>&nbsp;&nbsp;&nbsp;</p>
        </td>
       </tr>
       <tr style="mso-yfti-irow:6">
        <td width=15 style="width:11.25pt;padding:0cm 0cm 0cm 0cm">
        <p class=MsoNormal>&nbsp;&nbsp;&nbsp;</p>
        </td>
        <td style="padding:0cm 0cm 0cm 0cm">
        <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
         width="100%" style="width:100.0%;border-collapse:collapse;mso-yfti-tbllook:
         1184;mso-padding-alt:0cm 0cm 0cm 0cm">

         <tr style="mso-yfti-irow:0;mso-yfti-firstrow:yes;mso-yfti-lastrow:
          yes">
          <td style="padding:0cm 0cm 0cm 0cm">
          <p class=MsoNormal style="line-height:12.0pt"><span style="font-size:
          8.5pt;font-family:"Helvetica,sans-serif;color:#AAAAAA;">To help
          keep your account secure, please don"t forward this email. <a
          href="https://www.facebook.com/email_forward_notice/?mid=5a89e0bab39e8G26ff2ddcG5a89e55413cbaG313"><span
          style="color:#3B5998;text-decoration:none;text-underline:none">Learn
          more</span></a><o:p></o:p></span></p>
          </td>
         </tr>
        </table>
        </td>
        <td width=15 style="width:11.25pt;padding:0cm 0cm 0cm 0cm">
        <p class=MsoNormal>&nbsp;&nbsp;&nbsp;</p>
        </td>
       </tr>
       <tr style="mso-yfti-irow:7;mso-yfti-lastrow:yes;height:15.0pt">
        <td colspan=3 style="padding:0cm 0cm 0cm 0cm;height:15.0pt">
        <p class=MsoNormal style="line-height:15.0pt">&nbsp;</p>
        </td>
       </tr>
      </table>
      <p class=MsoNormal><span style="font-family:Helvetica,sans-serif;"><img
      border=0 id="_x0000_i1028"
      src="https://www.facebook.com/email_open_log_pic.php?mid=5a89e0bab39e8G26ff2ddcG5a89e55413cbaG313"
      style="border-bottom-width:0in;border-left-width:0in;border-right-width:
      0in;border-top-width:0in;height:1px;width:1px"><o:p></o:p></span></p>
      </td>
     </tr>
    </table>
    </div>
    </td>
   </tr>
  </table>
  </div>
  </td>
 </tr>
</table>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

</div>

</body>

</html>
  ';

  return $body;
}