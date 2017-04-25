FROM: [eveonline-third-party-documentation](https://github.com/ccpgames/eveonline-third-party-documentation/blob/master/docs/xmlapi/character/char_contracts.md)


# Contracts
Returns available contracts to character.

* __Path:__ ``/char/Contracts.xml.aspx``
* __Cache timer:__ 60 minutes
* __Access mask:__ 67108864
* __Parameters:__
    <table border="1">
        <tbody>
            <tr>
                <th>Argument</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>characterID</td>
                <td><strong>long</strong></td>
                <td>ID of character</td>
            </tr>
            <tr>
                <td>contractID</td>
                <td><strong>long</strong></td>
                <td>ID of a specific contract <em>(Optional)</em></td>
            </tr>
        </tbody>
    </table>

### Sample Response

```xml
<result>
    <rowset columns="contractID,issuerID,issuerCorpID,assigneeID,acceptorID,startStationID,endStationID,type,status,title,forCorp,availability,dateIssued,dateExpired,dateAccepted,numDays,dateCompleted,price,reward,collateral,buyout,volume" key="contractID" name="contractList">
        <row title="MWD Scimitar + Kin Hardener - Rigs in cargo" volume="89000" buyout="0.00" collateral="0.00" reward="0.00" price="220000000.00" dateCompleted="2015-10-16 04:36:30" numDays="0" dateAccepted="2015-10-16 04:36:30" dateExpired="2015-10-23 15:32:31" dateIssued="2015-10-09 15:32:31" availability="Private" forCorp="0" status="Completed" type="ItemExchange" endStationID="60015108" startStationID="60015108" acceptorID="258695360" assigneeID="386292982" issuerCorpID="673319797" issuerID="91512526" contractID="97809127"/>
        <row title="" volume="216000" buyout="0.00" collateral="0.00" reward="0.00" price="149000000.00" dateCompleted="2015-10-16 04:39:27" numDays="0" dateAccepted="2015-10-16 04:39:27" dateExpired="2015-10-26 03:31:21" dateIssued="2015-10-12 03:31:21" availability="Private" forCorp="0" status="Completed" type="ItemExchange" endStationID="60015108" startStationID="60015108" acceptorID="258695360" assigneeID="386292982" issuerCorpID="1941177176" issuerID="1524136743" contractID="97884327"/>
        <row title="" volume="43000" buyout="0.00" collateral="0.00" reward="0.00" price="74000000.00" dateCompleted="2015-10-16 04:36:47" numDays="0" dateAccepted="2015-10-16 04:36:47" dateExpired="2015-10-28 05:30:02" dateIssued="2015-10-14 05:30:02" availability="Private" forCorp="0" status="Completed" type="ItemExchange" endStationID="60015108" startStationID="60015108" acceptorID="258695360" assigneeID="386292982" issuerCorpID="98254901" issuerID="1077170504" contractID="97937400"/>
        <row title="" volume="47000" buyout="0.00" collateral="0.00" reward="0.00" price="70000000.00" dateCompleted="2015-10-16 04:37:09" numDays="0" dateAccepted="2015-10-16 04:37:09" dateExpired="2015-10-29 23:44:29" dateIssued="2015-10-15 23:44:29" availability="Private" forCorp="0" status="Completed" type="ItemExchange" endStationID="60015108" startStationID="60015108" acceptorID="258695360" assigneeID="386292982" issuerCorpID="98416600" issuerID="92084830" contractID="97981024"/>
        <row title="" volume="35900" buyout="0.00" collateral="0.00" reward="0.00" price="55000000.00" dateCompleted="2015-11-03 19:14:05" numDays="0" dateAccepted="2015-11-03 19:14:05" dateExpired="2015-11-07 22:22:47" dateIssued="2015-10-24 22:22:47" availability="Public" forCorp="0" status="Completed" type="ItemExchange" endStationID="60015106" startStationID="60015106" acceptorID="258695360" assigneeID="0" issuerCorpID="116777001" issuerID="337129922" contractID="98256398"/>
    </rowset>
</result>
```  

### Result Data

<table border="1">
    <tbody>
        <tr>
            <th>Name</th>
            <th>Data type</th>
            <th>Description</th>
        </tr>
        <tr>
            <td>contractID</td>
            <td>long</td>
            <td>Unique Identifier for the contract.</td>
        </tr>
        <tr>
            <td>issuerID</td>
            <td>long</td>
            <td>Character ID for the issuer.</td>
        </tr>
        <tr>
            <td>issuerCorpID</td>
            <td>long</td>
            <td>Characters corporation ID for the issuer.</td>
        </tr>
        <tr>
            <td>assigneeID</td>
            <td>long</td>
            <td>ID to whom the contract is assigned, can be corporation or character ID.</td>
        </tr>
        <tr>
            <td>acceptorID</td>
            <td>long</td>
            <td>Who will accept the contract. If assigneeID is same as acceptorID then CharacterID else CorporationID (The contract accepted by the corporation).</td>
        </tr>
        <tr>
            <td>startStationID</td>
            <td>int</td>
            <td>Start station ID (for Couriers contract).</td>
        </tr>
        <tr>
            <td>endStationID</td>
            <td>int</td>
            <td>End station ID (for Couriers contract).</td>
        </tr>
        <tr>
            <td>type</td>
            <td>string</td>
            <td>Type of the contract (ItemExchange, Courier, Loan or Auction).</td>
        </tr>
        <tr>
            <td>status</td>
            <td>string</td>
            <td>Status of the the contract (Outstanding, Deleted, Completed, Failed, CompletedByIssuer, CompletedByContractor, Cancelled, Rejected, Reversed or InProgress)</td>
        </tr>
        <tr>
            <td>title</td>
            <td>string</td>
            <td>Title of the contract</td>
        </tr>
        <tr>
            <td>forCorp</td>
            <td>boolean</td>
            <td>1 if the contract was issued on behalf of the issuer's corporation, 0 otherwise</td>
        </tr>
        <tr>
            <td>availability</td>
            <td>string</td>
            <td>Public or Private</td>
        </tr>
        <tr>
            <td>dateIssued</td>
            <td>datetime</td>
            <td>Сreation date of the contract</td>
        </tr>
        <tr>
            <td>dateExpired</td>
            <td>datetime</td>
            <td>Expiration date of the contract</td>
        </tr>
        <tr>
            <td>dateAccepted</td>
            <td>datetime</td>
            <td>Date of confirmation of contract</td>
        </tr>
        <tr>
            <td>numDays</td>
            <td>int</td>
            <td>Number of days to perform the contract</td>
        </tr>
        <tr>
            <td>dateCompleted</td>
            <td>datetime</td>
            <td>Date of completed of contract</td>
        </tr>
        <tr>
            <td>price</td>
            <td>float</td>
            <td>Price of contract (for ItemsExchange and Auctions)</td>
        </tr>
        <tr>
            <td>reward</td>
            <td>float</td>
            <td>Remuneration for contract (for Couriers only)</td>
        </tr>
        <tr>
            <td>collateral</td>
            <td>float</td>
            <td>Collateral price (for Couriers only)</td>
        </tr>
        <tr>
            <td>buyout</td>
            <td>float</td>
            <td>Buyout price (for Auctions only)</td>
        </tr>
        <tr>
            <td>volume</td>
            <td>float</td>
            <td>Volume of items in the contract </td>
        </tr>
    </tbody>
</table>

### References

[CAKs and Contracts in the API](http://community.eveonline.com/news/dev-blogs/caks-and-contracts-in-the-api/)
