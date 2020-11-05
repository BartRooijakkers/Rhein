<ul>
    <li class="formTile testUitvoeren">
        <label class="voorbladLabel" for="kabel_ID">Kabel ID:</label>
        <input type="number" name="kabel_ID" placeholder="Vul Kabel-ID in"></input>

        <label class="voorbladLabel" for="draadbreuk_6D">Aantal Draadbreuken met een lengte van 6D:</label>
        <input type="number" name="draadbreuk_6D" placeholder="Vul Aantal Draadbreuken met een lengte van 6D in"></input>

        <label class="voorbladLabel" for="draadbreuk_30D">Aantal Draadbreuken met een lengte van 30D:</label>
        <input type="number" name="draadbreuk_30D" placeholder="Vul Aantal Draadbreuken met een lengte van 30D in"></input>
    </li>
    <li class="formTile testUitvoeren">
        <label class="voorbladLabel" for="beschadiging_buitenzijde">Afslijping van de aan de buitenzijde gelegen draden:</label>
        <select name="beschadiging_buitenzijde">
            <option disabled hidden selected>Selecteer mate van beschadiging</option>
            <option value="gering" style="background:#89AB0D;">Gering</option>
            <option value="gemiddeld" style="background:#F7F14A;">Gemiddeld</option>
            <option value="hoog" style="background:#F9DB22;">Hoog</option>
            <option value="zeer_hoog" style="background:Orange;">Zeer hoog</option>
            <option value="afleggen" style="background:red; color:white; font-weight:bold;">Afleggen</option>
        </select>

        <label class="voorbladLabel" for="beschadiging_roest_corrosie">Roest en corrosie:</label>
        <select name="beschadiging_roest_corrosie">
            <option disabled hidden selected>Selecteer mate van beschadiging</option>
            <option value="gering" style="background:#89AB0D;">Gering</option>
            <option value="gemiddeld" style="background:#F7F14A;">Gemiddeld</option>
            <option value="hoog" style="background:#F9DB22;">Hoog</option>
            <option value="zeer_hoog" style="background:Orange;">Zeer hoog</option>
            <option value="afleggen" style="background:red; color:white; font-weight:bold;">Afleggen</option>
        </select>

        <label class="voorbladLabel" for="vermindere_kabeldiameter">Verminderde kabeldiameter in %:</label>
        <input type="number" name="vermindere_kabeldiameter" placeholder="Vul Verminderde kabeldiameter in % in"></input>
    </li>
    <li class="formTile testUitvoeren">
        <label class="voorbladLabel" for="positie_meetpunten">Positie van meetpunten:</label>
        <input type="number" name="positie_meetpunten" placeholder="Vul Positie van meetpunten in"></input>

        <label class="voorbladLabel" for="beschadiging_totaal"> Totale beoordeling:</label>
        <select name="beschadiging_totaal">
            <option disabled hidden selected>Selecteer mate van beschadiging</option>
            <option value="gering" style="background:#89AB0D;">Gering</option>
            <option value="gemiddeld" style="background:#F7F14A;">Gemiddeld</option>
            <option value="hoog" style="background:#F9DB22;">Hoog</option>
            <option value="zeer_hoog" style="background:Orange;">Zeer hoog</option>
            <option value="afleggen" style="background:red; color:white; font-weight:bold;">Afleggen</option>
        </select>

        <label class="voorbladLabel" for="type_beschadiging_roest"> Beschadiging en roestvorming Type:</label>
        <input type="number" name="type_beschadiging_roest" placeholder="Vul Beschadiging en roestvorming Type in"></input>
    </li>
</ul>