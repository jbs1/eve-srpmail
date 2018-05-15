<?php
/*
!!NOT secured against abitrary code execution via get!!


array structure:

[<header>,<body>,<name>,<id>,<public>,<hidden>]

<header> [optional]:
Header e.g. for api methoded that are needed for the body

<body>:
php echo string containing the body of the message

<name>:
name of the current templated e.g. for message selection list

<id>:
id that will be applied to the mail form for js reference

<public>:
whether it should show up in the general message list

<hidden>:
extra hidden input fields
*/


$messages=array(
['$api_universe = new Swagger\Client\Api\UniverseApi(null,$config);
$station=$api_universe->getUniverseStationsStationId($_GET["station"], $datasource);',
'echo "Hello,

I have reviewed and approved your SRP request.
Your replacement ship is available at the following station: <url=showinfo:".$station["type_id"]."//".$station["station_id"].">".$station["name"]."</url>

The contract for the ship can be found here: <url=contract:".$station["system_id"]."//".$_GET["contractid"].">Contract</url>

Fly Safe,
<url=showinfo:1377//". charid().">". $_SESSION["corpmem"][charid()] ."</url>
<url=showinfo:2//". $_SESSION["charinfo"]["CorporationID"].">". $_SESSION["charinfo"]["CorporationName"]."</url>";',
'Hull SRP Message',
'hull_mail_form',
false,
'echo "<input type=\'hidden\' id=\'contract\' name=\'contract\' value=".$_GET[\'contractid\']."></input>";'
],
['',
'echo "Hello,

I have reviewed and approved your SRP requests.
You have been paid for the following losses:



Please check your wallet.

Fly Safe,
<url=showinfo:1377//". charid().">". $_SESSION["corpmem"][charid()] ."</url>
<url=showinfo:2//". $_SESSION["charinfo"]["CorporationID"].">". $_SESSION["charinfo"]["CorporationName"]."</url>";',
'ISK SRP Message',
'isk_mail_form',
false,
''
],
['',
'echo "Hello,

We have received your ship replacement request.
However there is at least one issue preventing us from fulfilling your request:



Fell free to contact me with further information regarding these.
Once resolved, we\'ll try to issue the new ship as fast as possible.

Fly Safe,
<url=showinfo:1377//". charid().">". $_SESSION["corpmem"][charid()] ."</url>
<url=showinfo:2//". $_SESSION["charinfo"]["CorporationID"].">". $_SESSION["charinfo"]["CorporationName"]."</url>";',
'Resubmission SRP Message',
'messages_mail_form',
true,
''
],
['',
'echo "Hello,

Unfortunately we have had to decline your ship replacement request due to one or more reasons:



A declined request won\'t influence future requests, so feel free to request ships in the future.
<i>Feel free to contact me in case you think this happened in error.</i>

Fly Safe,
<url=showinfo:1377//". charid().">". $_SESSION["corpmem"][charid()] ."</url>
<url=showinfo:2//". $_SESSION["charinfo"]["CorporationID"].">". $_SESSION["charinfo"]["CorporationName"]."</url>";',
'Rejection SRP Message',
'messages_mail_form',
true,
''
]




)

?>