<?php
include_once('waCommonFunction.php');
include_once('waErrorFunction.php');
$reply_to="";
$text="";
$b_have_info=false;
$wa_form0= waRetrievePostParameter('field_0_wa_id_2785j4838sws4ep');
$text.= "Nom*\n".$wa_form0."\n\n";
if (($b_have_info==false) && (strlen($wa_form0)>0)) $b_have_info=true;
$wa_form1= waRetrievePostParameter('field_1_wa_id_2785j4838sws4ep');
$text.= "Email*\n".$wa_form1."\n\n";
if (($b_have_info==false) && (strlen($wa_form1)>0)) $b_have_info=true;
if (strlen($wa_form1)>0){
$reply_to=$wa_form1;
}
$wa_form2= waRetrievePostParameter('field_2_wa_id_2785j4838sws4ep');
$text.= "Motif *\n".$wa_form2."\n\n";
if (($b_have_info==false) && (strlen($wa_form2)>0)) $b_have_info=true;
$wa_form3= waRetrievePostParameter('field_3_wa_id_2785j4838sws4ep');
$text.= $wa_form3."\n\n";
if (($b_have_info==false) && (strlen($wa_form3)>0)) $b_have_info=true;
$message_error="";
$res=false;
$destinataire="lamamaucoeurdesvergers@gmail.com";
$title="Contacte via site internet";
if ($b_have_info){
$res = waSendMail($destinataire, $title,$text,$reply_to);
$message_error=waGetError();
if (($res==true) && ($waErrorPhpMailReporting==1)) $message_error="";
}
else
{
$message_error="Nothing to send $wa_form2";
}
echo "{\"success\":".(($res)?'true':'false').",\"error\":\"".$message_error."\"}";
?>
