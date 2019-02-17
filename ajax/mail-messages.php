<?php
/*
!!NOT secured against abitrary code execution via get!!


array structure:

[<body>,<name>,<id>,<public>]

<body>:
php echo string containing the body of the message

<name>:
name of the current template e.g. for message selection list

<id>:
id that will be applied to the mail form for js reference

<public>:
whether it should show up in the general message list

*/

$messages=array(
['echo "Hello,

I have reviewed and approved your SRP requests.
The following contracts where create at the respective stations:

".$_GET["contract_string"]."

Fly Safe,
<url=showinfo:1377//". charid().">". $_SESSION["corpmem"][charid()] ."</url>
<url=showinfo:2//". $_SESSION["charinfo"]["CorporationID"].">". $_SESSION["charinfo"]["CorporationName"]."</url>";',
'Hull SRP Message',
'hull_mail_form',
false
],
['echo "Hello,

I have reviewed and approved your SRP requests.
You have been paid for the following losses:

".$_GET["payment_string"]."

Please check your wallet.

Fly Safe,
<url=showinfo:1377//". charid().">". $_SESSION["corpmem"][charid()] ."</url>
<url=showinfo:2//". $_SESSION["charinfo"]["CorporationID"].">". $_SESSION["charinfo"]["CorporationName"]."</url>";',
'ISK SRP Message',
'isk_mail_form',
false
],
['echo "Hello,

We have received your ship replacement request.
However there is at least one issue preventing us from fulfilling your request:



Fell free to contact me with further information regarding these.
Once resolved, we\'ll try to issue the new ship as fast as possible.

Fly Safe,
<url=showinfo:1377//". charid().">". $_SESSION["corpmem"][charid()] ."</url>
<url=showinfo:2//". $_SESSION["charinfo"]["CorporationID"].">". $_SESSION["charinfo"]["CorporationName"]."</url>";',
'Resubmission SRP Message',
'messages_mail_form',
true
],
['echo "Hello,

Unfortunately we have had to decline your ship replacement request due to one or more reasons:



A declined request won\'t influence future requests, so feel free to request ships in the future.
<i>Feel free to contact me in case you think this happened in error.</i>

Fly Safe,
<url=showinfo:1377//". charid().">". $_SESSION["corpmem"][charid()] ."</url>
<url=showinfo:2//". $_SESSION["charinfo"]["CorporationID"].">". $_SESSION["charinfo"]["CorporationName"]."</url>";',
'Rejection SRP Message',
'messages_mail_form',
true
]




)

?>