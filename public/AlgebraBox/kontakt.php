<?php

include './classes/Page.php';

class Kontakt extends Page{
    
    protected function GetContent() {
$output = <<<END
        <div class="lead">
<h3>Županijska lučka uprava Mali Lošinj</h3>
<h3>County Port Authority of Mali Losinj</h3>
<p>Priko 64, 51550 Mali Lošinj, Croatia</p>
<p>Telephone: 051 232 020 - Fax: 051 520 309</p>
<p>OIB: 54547924664</p>
<p>IBAN: HR2024020061100108193</p>
<p><a title="Location" href="https://goo.gl/maps/oNnV4jJy7un" target="_blank" rel="noopener noreferrer">Location of County Port Authority of Mali Lošinj on Google map &gt;&gt;</a></p>
<p><strong>Office hours:</strong></p>
<p>Office is open from <em>Monday to Friday</em> from <strong>7 a.m. - 3 p.m.</strong></p>
<p>Visitor services hours are from <em>Monday to Friday</em> from <strong>9 a.m. - noon</strong></p>
</div>
END;
        
        return $output;
    }

    protected function PageRequiresAuthenticUser() {
        return false; // ne moras biti logiran da bi pristupio kontaktima
    }

}
$k=new Kontakt();
$k->Display("Moj kontakt");

