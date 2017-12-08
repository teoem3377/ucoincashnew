<main class="main--body--content">
            <div class="main--body--container">
                <div class="container-fluid">
                    <div class="div-height-80"></div>
                    


<style>
    @media(max-width:768px) {
        .user-info-controller {
            margin-top: 15px;
        }
        .user-item{
            margin-bottom:10px !important;
        }
    }
</style>
<link href="custome/css/user-profile-item.css?v=1" rel="stylesheet">
<div class="text-center">
    <h2 class="h2-title">User Profile</h2>
</div>

<div class="user-info-controller">
    <div class="div-user-container">
        <div class="user-item">
            <div class="user-item-left">
                User name
            </div>
            <div class="user-item-right">
                <input type="text" value="teoem" disabled="" class="form-control">
            </div>
        </div>
        <div class="user-item">
            <div class="user-item-left">
                Email
            </div>
            <div class="user-item-right">
                <input type="text" value="teoem3377@gmail.com" disabled="" class="form-control">
            </div>
        </div>
        <div class="user-item">
            <div class="user-item-left">
                Phone number
            </div>
            <div class="user-item-right">
                <input type="text" id="phone" value="0909123456" class="form-control">
            </div>
        </div>
        <div class="user-item">
            <div class="user-item-left">
                Country
            </div>
            <div class="user-item-right" data-toggle="modal" data-target="#div-select-country">
                <img id="img-flag-identity" data-value="US" src="images/flag-of-Vietnam.png">
                <img src="images/arrow-bottom.png" class="slt-flag-ico">
                <strong id="span-country-name">Vietnam</strong>
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-success uch-button-radius" id="btn-update">Update profile</button>
            <button class="btn btn-warning uch-button-radius" data-toggle="modal" data-target="#modal-change-pass">Change password</button>
        </div>
    </div>
</div>




<script>
    var urlChangePassword = '/User/ChangePassword';
    var urlUpdate = '/User/UpdateProfile';

    $(document).ready(function () {
        var _code = 'VN';

        var getCountry = function (__code) {
            var name = "";
            var src = "";
            if (__code == "AF") {
                name = "Afghanistan";
                src = "images/flag-of-Afghanistan.png";
            }
            else if (__code == "AL") {
                src = "images/flag-of-Albania.png";
                name = "Albania";
            }
            else if (__code == "DZ") {
                name = "Algeria";
                src = "images/flag-of-Algeria.png";
            }
            else if (__code == "AD") {
                name = "Andorra";
                src = "images/flag-of-Andorra.png";
            }
            else if (__code == "AO") {
                src = "images/flag-of-Angola.png";
                name = "Angola";
            }
            else if (__code == "AI") {
                src = "images/flag-of-Antigua.png";
                name = "Antigua and Barbuda";
            }
            else if (__code == "AG") {
                src = "images/flag-of-Argentina.png";
                name = "Argentina";
            }
            else if (__code == "AR") {
                src = "images/flag-of-Armenia.png";
                name = "Armenia";
            }
            else if (__code == "AU") {
                src = "images/flag-of-Australia.png";
                name = "Australia";
            }
            else if (__code == "AT") {
                src = "images/flag-of-Austria.png";
                name = "Austria";
            }
            else if (__code == "AZ") {
                src = "images/flag-of-Azerbaijan.png";
                name = "Azerbaijan";
            }
            else if (__code == "BS") {
                src = "images/flag-of-Bahamas.png";
                name = "Bahamas";
            }
            else if (__code == "BH") {
                src = "images/flag-of-Bahrain.png";
                name = "Bahrain";
            }
            else if (__code == "BD") {
                src = "images/flag-of-Bangladesh.png";
                name = "Bangladesh";
            }
            else if (__code == "BB") {
                src = "images/flag-of-Barbados.png";
                name = "Barbados";
            }
            else if (__code == "BY") {
                src = "images/flag-of-Belarus.png";
                name = "Belarus";
            }
            else if (__code == "BE") {
                src = "images/flag-of-Belgium.png";
                name = "Belgium";
            }
            else if (__code == "BZ") {
                src = "images/flag-of-Belize.png";
                name = "Belize";
            }
            else if (__code == "BJ") {
                src = "images/flag-of-Benin.png";
                name = "Benin";
            }
            else if (__code == "BT") {
                src = "images/flag-of-Bhutan.png";
                name = "Bhutan";
            }
            else if (__code == "BO") {
                src = "images/flag-of-Bolivia.png";
                name = "Bolivia";
            }
            else if (__code == "BA") {
                src = "images/flag-of-Bosnia-Herzegovina.png";
                name = "Bosnia and Herzegovina";
            }
            else if (__code == "BW") {
                src = "images/flag-of-Botswana.png";
                name = "Botswana";
            }
            else if (__code == "BR") {
                src = "images/flag-of-Brazil.png";
                name = "Brazil";
            }
            else if (__code == "BN") {
                src = "images/flag-of-Brunei.png";
                name = "Brunei";
            }
            else if (__code == "BL") {
                src = "images/flag-of-Bulgaria.png";
                name = "Bulgaria";
            }
            else if (__code == "BG") {
                src = "images/flag-of-Burkina-Faso.png";
                name = "Burkina Faso";
            }
            else if (__code == "BI") {
                src = "images/flag-of-Burundi.png"; name = "Burundi";
            }
            else if (__code == "KH") {
                src = "images/flag-of-Cambodia.png"; name = "Cambodia";
            }
            else if (__code == "CM") {
                src = "images/flag-of-Cameroon.png"; name = "Cameroon";
            }
            else if (__code == "CA") {
                src = "images/flag-of-Canada.png"; name = "Canada";
            }
            else if (__code == "CF") {
                src = "images/flag-of-Central-African-Republic.png"; name = "Central African Republic";
            }
            else if (__code == "TD") {
                src = "images/flag-of-Chad.png"; name = "Chad";
            }
            else if (__code == "CL") {
                src = "images/flag-of-Chile.png"; name = "Chile";
            }
            else if (__code == "CN") {
                src = "images/flag-of-China.png"; name = "China";
            }
            else if (__code == "CO") {
                src = "images/flag-of-Colombia.png"; name = "Colombia";
            }
            else if (__code == "KM") {
                src = "images/flag-of-Comoros.png"; name = "Comoros";
            }
            else if (__code == "CD") {
                src = "images/flag-of-Congo-Democratic-Republic-of.png"; name = "Democratic Republic of the Congo";
            }
            else if (__code == "CG") {
                src = "images/flag-of-Congo.png"; name = "Congo";
            }
            else if (__code == "CR") {
                src = "images/flag-of-Costa-Rica.png"; name = "Costa Rica";
            }
            else if (__code == "HR") {
                src = "images/flag-of-Croatia.png"; name = "Croatia";
            }
            else if (__code == "CU") {
                src = "images/flag-of-Cuba.png"; name = "Cuba";
            }
            else if (__code == "CY") {
                src = "images/flag-of-Cyprus.png"; name = "Cyprus";
            }
            else if (__code == "CZ") {
                src = "images/flag-of-Czech-Republic.png"; name = "Czech Republic";
            }
            else if (__code == "DK") {
                src = "images/flag-of-Denmark.png"; name = "Denmark";
            }
            else if (__code == "DJ") {
                src = "images/flag-of-Djibouti.png"; name = "Djibouti";
            }
            else if (__code == "DM") {
                src = "images/flag-of-Dominica.png"; name = "Dominica";
            }
            else if (__code == "DO") {
                src = "images/flag-of-Dominican-Republic.png"; name = "Dominican Republic";
            }
            else if (__code == "EC") {
                src = "images/flag-of-Ecuador.png"; name = "Ecuador";
            }
            else if (__code == "EG") {
                src = "images/flag-of-Egypt.png"; name = "Egypt";
            }
            else if (__code == "SV") {
                src = "images/flag-of-El-Salvador.png"; name = "El Salvador";
            }
            else if (__code == "GQ") {
                src = "images/flag-of-Equatorial-Guinea.png"; name = "Equatorial Guinea";
            }
            else if (__code == "ER") {
                src = "images/flag-of-Eritrea.png"; name = "Eritrea";
            }
            else if (__code == "EE") {
                src = "images/flag-of-Estonia.png"; name = "Estonia";
            }
            else if (__code == "ET") {
                src = "images/flag-of-Ethiopia.png"; name = "Ethiopia";
            }
            else if (__code == "FJ") {
                src = "images/flag-of-Fiji.png"; name = "Fiji";
            }
            else if (__code == "FI") {
                src = "images/flag-of-Finland.png"; name = "Finland";
            }
            else if (__code == "FR") {
                src = "images/flag-of-France.png"; name = "France";
            }
            else if (__code == "GA") {
                src = "images/flag-of-Gabon.png"; name = "Gabon";
            }
            else if (__code == "GM") {
                src = "images/flag-of-Gambia.png"; name = "Gambia";
            }
            else if (__code == "GE") {
                src = "images/flag-of-Georgia.png"; name = "Georgia";
            }
            else if (__code == "DE") {
                src = "images/flag-of-Germany.png"; name = "Germany";
            }
            else if (__code == "GH") {
                src = "images/flag-of-Ghana.png"; name = "Ghana";
            }
            else if (__code == "GR") {
                src = "images/flag-of-Greece.png"; name = "Greece";
            }
            else if (__code == "GD") {
                src = "images/flag-of-Grenada.png"; name = "Grenada";
            }
            else if (__code == "GT") {
                src = "images/flag-of-Guatemala.png"; name = "Guatemala";
            }
            else if (__code == "GN") {
                src = "images/flag-of-Guinea.png"; name = "Guinea";
            }
            else if (__code == "GW") {
                src = "images/flag-of-Guinea-Bissau.png"; name = "Guinea-Bissau";
            }
            else if (__code == "GY") {
                src = "images/flag-of-Guyana.png"; name = "Guyana";
            }
            else if (__code == "FT") {
                src = "images/flag-of-Haiti.png"; name = "Haiti";
            }
            else if (__code == "HN") {
                src = "images/flag-of-Honduras.png"; name = "Honduras";
            }
            else if (__code == "HU") {
                src = "images/flag-of-Hungary.png"; name = "Hungary";
            }
            else if (__code == "IS") {
                src = "images/flag-of-Iceland.png"; name = "Iceland";
            }
            else if (__code == "IN") {
                src = "images/flag-of-India.png"; name = "India";
            }
            else if (__code == "ID") {
                src = "images/flag-of-Indonesia.png"; name = "Indonesia";
            }
            else if (__code == "IR") {
                src = "images/flag-of-Iran.png"; name = "Iran";
            }
            else if (__code == "IQ") {
                src = "images/flag-of-Iraq.png"; name = "Iraq";
            }
            else if (__code == "IE") {
                src = "images/flag-of-Ireland.png"; name = "Ireland";
            }
            else if (__code == "IL") {
                src = "images/flag-of-Israel.png"; name = "Israel";
            }
            else if (__code == "IT") {
                src = "images/flag-of-Italy.png"; name = "Italy";
            }
            else if (__code == "JM") {
                src = "images/flag-of-Jamaica.png"; name = "Jamaica";
            }
            else if (__code == "JP") {
                src = "images/flag-of-Japan.png"; name = "Japan";
            }
            else if (__code == "JO") {
                src = "images/flag-of-Jordan.png"; name = "Jordan";
            }
            else if (__code == "KZ") {
                src = "images/flag-of-Kazakhstan.png"; name = " Kazakhstan";
            }
            else if (__code == "KE") {
                src = "images/flag-of-Kenya.png"; name = "Kenya";
            }
            else if (__code == "KI") {
                src = "images/flag-of-Kiribati.png"; name = "Kiribati";
            }
            else if (__code == "XK") {
                src = "images/flag-of-Kosovo.png"; name = "Kosovo";
            }
            else if (__code == "KW") {
                src = "images/flag-of-Kuwait.png"; name = "Kuwait";
            }
            else if (__code == "KG") {
                src = "images/flag-of-Kyrgyzstan.png"; name = "Kyrgyzstan";
            }
            else if (__code == "LA") {
                src = "images/flag-of-Laos.png"; name = "Laos";
            }
            else if (__code == "LV") {
                src = "images/flag-of-Latvia.png"; name = "Latvia";
            }
            else if (__code == "LB") {
                src = "images/flag-of-Lebanon.png"; name = "Lebanon";
            }
            else if (__code == "LS") {
                src = "images/flag-of-Lesotho.png"; name = "Lesotho";
            }
            else if (__code == "LR") {
                src = "images/flag-of-Liberia.png"; name = "Liberia";
            }
            else if (__code == "LY") {
                src = "images/flag-of-Libya.png"; name = "Libya";
            }
            else if (__code == "LI") {
                src = "images/flag-of-Liechtenstein.png"; name = "Liechtenstein";
            }
            else if (__code == "LT") {
                src = "images/flag-of-Lithuania.png"; name = "Lithuania";
            }
            else if (__code == "LU") {
                src = "images/flag-of-Luxembourg.png"; name = "Luxembourg";
            }
            else if (__code == "MK") {
                src = "images/flag-of-Macedonia.png"; name = "Macedonia (FYROM)";
            }
            else if (__code == "MG") { src = "images/flag-of-Madagascar.png"; name = "Madagascar"; }
            else if (__code == "MW") { src = "images/flag-of-Malawi.png"; name = "Malawi"; }
            else if (__code == "MY") { src = "images/flag-of-Malaysia.png"; name = "Malaysia"; }
            else if (__code == "MV") { src = "images/flag-of-Maldives.png"; name = "Maldives"; }
            else if (__code == "ML") { src = "images/flag-of-Mali.png"; name = "Mali"; }
            else if (__code == "MT") { src = "images/flag-of-Malta.png"; name = "Malta"; }
            else if (__code == "MH") { src = "images/flag-of-Marshall-Islands.png"; name = "Marshall Islands"; }
            else if (__code == "MR") { src = "images/flag-of-Mauritania.png"; name = "Mauritania"; }
            else if (__code == "MU") { src = "images/flag-of-Mauritius.png"; name = "Mauritius"; }
            else if (__code == "MX") { src = "images/flag-of-Mexico.png"; name = "Mexico"; }
            else if (__code == "FM") { src = "images/flag-of-Micronesia.png"; name = "Micronesia"; }
            else if (__code == "MD") { src = "images/flag-of-Moldova.png"; name = "Moldova"; }
            else if (__code == "MC") { src = "images/flag-of-Monaco.png"; name = "Monaco"; }
            else if (__code == "MN") { src = "images/flag-of-Mongolia.png"; name = "Mongolia"; }
            else if (__code == "ME") { src = "images/flag-of-Montenegro.png"; name = "Montenegro"; }
            else if (__code == "MA") { src = "images/flag-of-Morocco.png"; name = "Morocco"; }
            else if (__code == "MZ") { src = "images/flag-of-Mozambique.png"; name = "Mozambique"; }
            else if (__code == "MM") { src = "images/flag-of-Myanmar.png"; name = "Myanmar (Burma)"; }
            else if (__code == "NA") { src = "images/flag-of-Namibia.png"; name = "Namibia"; }
            else if (__code == "NR") { src = "images/flag-of-Nauru.png"; name = "Nauru"; }
            else if (__code == "NP") { src = "images/flag-of-Nepal.png"; name = "Nepal"; }
            else if (__code == "NL") { src = "images/flag-of-Netherlands.png"; name = "Netherlands"; }
            else if (__code == "NZ") { src = "images/flag-of-New-Zealand.png"; name = "New Zealand"; }
            else if (__code == "NI") { src = "images/flag-of-Nicaragua.png"; name = "Nicaragua"; }
            else if (__code == "NE") { src = "images/flag-of-Niger.png"; name = "Niger"; }
            else if (__code == "NG") { src = "images/flag-of-Nigeria.png"; name = "Nigeria"; }
            else if (__code == "KP") { src = "images/flag-of-Korea-North.png"; name = "North Korea"; }
            else if (__code == "NO") { src = "images/flag-of-Norway.png"; name = "Norway"; }
            else if (__code == "OM") { src = "images/flag-of-Oman.png"; name = "Oman"; }
            else if (__code == "PK") { src = "images/flag-of-Pakistan.png"; name = "Pakistan"; }
            else if (__code == "PW") { src = "images/flag-of-Palau.png"; name = "Palau"; }
            else if (__code == "PS") { src = "images/flag-of-Palestine.png"; name = "Palestine"; }
            else if (__code == "PA") { src = "images/flag-of-Panama.png"; name = "Panama"; }
            else if (__code == "PG") { src = "images/flag-of-Papua-New-Guinea.png"; name = "Papua New Guinea"; }
            else if (__code == "PY") { src = "images/flag-of-Paraguay.png"; name = "Paraguay"; }
            else if (__code == "PE") { src = "images/flag-of-Peru.png"; name = "Peru"; }
            else if (__code == "PH") { src = "images/flag-of-Philippines.png"; name = "Philippines"; }
            else if (__code == "PL") { src = "images/flag-of-Poland.png"; name = "Poland"; }
            else if (__code == "PT") { src = "images/flag-of-Portugal.png"; name = "Portugal"; }
            else if (__code == "QA") { src = "images/flag-of-Qatar.png"; name = "Qatar"; }
            else if (__code == "RO") { src = "images/flag-of-Romania.png"; name = "Romania"; }
            else if (__code == "RU") { src = "images/flag-of-Russia.png"; name = "Russia"; }
            else if (__code == "RW") { src = "images/flag-of-Rwanda.png"; name = "Rwanda"; }
            else if (__code == "KN") { src = "images/flag-of-St-Kitts-Nevis.png"; name = "Saint Kitts and Nevis"; }
            else if (__code == "LC") { src = "images/flag-of-St-Lucia.png"; name = "Saint Lucia"; }
            else if (__code == "VC") { src = "images/flag-of-St-Vincent-the-Grenadines.png"; name = "Saint Vincent and the Grenadines"; }
            else if (__code == "WS") { src = "images/flag-of-Samoa.png"; name = "Samoa"; }
            else if (__code == "SM") { src = "images/flag-of-San-Marino.png"; name = "San Marino"; }
            else if (__code == "ST") { src = "images/flag-of-Sao-Tome-and-Principe.png"; name = "Sao Tome and Principe"; }
            else if (__code == "SA") { src = "images/flag-of-Saudi-Arabia.png"; name = "Saudi Arabia"; }
            else if (__code == "SN") { src = "images/flag-of-Senegal.png"; name = "Senegal"; }
            else if (__code == "RS") { src = "images/flag-of-Serbia.png"; name = "Serbia"; }
            else if (__code == "SC") { src = "images/flag-of-Seychelles.png"; name = "Seychelles"; }
            else if (__code == "SL") { src = "images/flag-of-Sierra-Leone.png"; name = "Sierra Leone"; }
            else if (__code == "SG") { src = "images/flag-of-Singapore.png"; name = "Singapore"; }
            else if (__code == "SK") { src = "images/flag-of-Slovakia.png"; name = "Slovakia"; }
            else if (__code == "SI") { src = "images/flag-of-Slovenia.png"; name = "Slovenia"; }
            else if (__code == "SB") { src = "images/flag-of-Solomon-Islands.png"; name = "Solomon Islands"; }
            else if (__code == "SO") { src = "images/flag-of-Somalia.png"; name = "Somalia"; }
            else if (__code == "ZA") { src = "images/flag-of-South-Africa.png"; name = "South Africa"; }
            else if (__code == "KR") { src = "images/flag-of-Korea-South.png"; name = "South Korea"; }
            else if (__code == "SS") { src = "images/flag-of-South-Sudan.png"; name = "South Sudan"; }
            else if (__code == "ES") { src = "images/flag-of-Spain.png"; name = "Spain"; }
            else if (__code == "LK") { src = "images/flag-of-Sri-Lanka.png"; name = "Sri Lanka"; }
            else if (__code == "SD") { src = "images/flag-of-Sudan.png"; name = "Sudan"; }
            else if (__code == "SR") { src = "images/flag-of-Suriname.png"; name = "Suriname"; }
            else if (__code == "CH") { src = "images/flag-of-Swaziland.png"; name = "Swaziland"; }
            else if (__code == "SE") { src = "images/flag-of-Sweden.png"; name = "Sweden"; }
            else if (__code == "CH") { src = "images/flag-of-Switzerland.png"; name = "Switzerland"; }
            else if (__code == "SY") { src = "images/flag-of-Syria.png"; name = "Syria"; }
            else if (__code == "TW") { src = "images/flag-of-Taiwan.png"; name = "Taiwan"; }
            else if (__code == "TJ") { src = "images/flag-of-Tajikistan.png"; name = "Tajikistan"; }
            else if (__code == "TZ") { src = "images/flag-of-Tanzania.png"; name = "Tanzania"; }
            else if (__code == "TH") { src = "images/flag-of-Thailand.png"; name = "Thailand"; }
            else if (__code == "TG") { src = "images/flag-of-Togo.png"; name = "Togo"; }
            else if (__code == "TO") { src = "images/flag-of-Tonga.png"; name = "Tonga"; }
            else if (__code == "TT") { src = "images/flag-of-Trinidad-and-Tobago.png"; name = "Trinidad and Tobago"; }
            else if (__code == "TN") { src = "images/flag-of-Tunisia.png"; name = "Tunisia"; }
            else if (__code == "TR") { src = "images/flag-of-Turkey.png"; name = "Turkey"; }
            else if (__code == "TM") { src = "images/flag-of-Turkmenistan.png"; name = "Turkmenistan"; }
            else if (__code == "TV") { src = "images/flag-of-Tuvalu.png"; name = "Tuvalu"; }
            else if (__code == "UG") { src = "images/flag-of-Uganda.png"; name = "Uganda"; }
            else if (__code == "UA") { src = "images/flag-of-Ukraine.png"; name = "Ukraine"; }
            else if (__code == "AE") { src = "images/flag-of-United-Arab-Emirates.png"; name = "United Arab Emirates"; }
            else if (__code == "GB") { src = "images/flag-of-United-Kingdom.png"; name = "United Kingdom"; }
            else if (__code == "US") { src = "images/flag-of-United-States-of-America.png"; name = "United States of America"; }
            else if (__code == "UY") { src = "images/flag-of-Uruguay.png"; name = "Uruguay"; }
            else if (__code == "UZ") { src = "images/flag-of-Uzbekistan.png"; name = "Uzbekistan"; }
            else if (__code == "VU") { src = "images/flag-of-Vanuatu.png"; name = "Vanuatu"; }
            else if (__code == "VA") { src = "images/flag-of-Vatican-City.png"; name = "Vatican City (Holy See)"; }
            else if (__code == "VE") { src = "images/flag-of-Venezuela.png"; name = "Venezuela"; }
            else if (__code == "VN") { src = "images/flag-of-Vietnam.png"; name = "Vietnam"; }
            else if (__code == "YE") { src = "images/flag-of-Yemen.png"; name = "Yemen"; }
            else if (__code == "ZW") { src = "images/flag-of-Zimbabwe.png"; name = "Zimbabwe"; }
            else if (__code == "ZM") { src = "images/flag-of-Zambia.png"; name = "Zambia"; }

            return { src: src, name: name };
        };

        var dataCountry = getCountry(_code);

        $('#span-country-name').html(dataCountry.name);
        $('#img-flag-identity').attr('src', dataCountry.src).data('value', _code);
        $('#btn-update').click(function () {
            var CountryCode = $('#img-flag-identity').data('value');
            if (CountryCode == null || CountryCode.trim().length > 2) {
                CountryCode = "US";
            }
            var phone = $('#phone').val();
            var validation = new Validation();
            if (phone != null && phone.trim().length > 0) {
                if (!validation.Phone(phone.trim())) {
                    bootbox.dialog({
                        size: 'small',
                        message: "Phone number is invalid",
                        title: "Warning",
                        buttons: {
                            confirm: {
                                label: '<i class="fa fa-times"></i> Close',
                                className: "btn-warning button-bootbox-close"
                            }
                        }
                    });
                    return;
                }
            }
            else {
                phone = "";
            }

            $.ajax({
                url: urlUpdate,
                data: { __RequestVerificationToken: $('input[name="__RequestVerificationToken"]').val(), phone: phone, country: CountryCode },
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    if (data.Data.IsSuccess) {
                        bootbox.dialog({
                            size: 'small',
                            message: "Successfully updated",
                            title: "Alert",
                            buttons: {
                                confirm: {
                                    label: '<i class="fa fa-times"></i> Close',
                                    className: "btn-warning button-bootbox-close",
                                    callback: function () {
                                    }
                                }
                            }
                        });
                    }
                    else {
                        bootbox.dialog({
                            size: 'small',
                            message: data.Data.Message,
                            title: "Alert",
                            buttons: {
                                confirm: {
                                    label: '<i class="fa fa-times"></i> Close',
                                    className: "btn-warning button-bootbox-close",
                                    callback: function () {
                                    }
                                }
                            }
                        });
                    }
                }
            });
        });

        $(document).on('click', '#button-change-password', function () {
            var currentPassword = $('#password').val();
            var newPassword = $('#newPassword').val();
            var confirmationPassword = $('#confirmation-password').val();
            if (currentPassword == "") {
                $('#msg-error-current-pass').text('Please input your current password');
                $('#msg-error-current-pass').show();
                setTimeout(function () {
                    $('#msg-error-current-pass').hide();
                }, 4000);
                return;
            }
            if (newPassword == "") {
                $('#msg-error-new-pass').text('Please input new password');
                $('#msg-error-new-pass').show();
                setTimeout(function () {
                    $('#msg-error-new-pass').hide();
                }, 4000);
                return;
            }

            var validation = new Validation();
            if (!validation.Password(newPassword)) {
                $('#msg-error-new-pass').text('The password must be at least 6 characters long, contain at least 1 number, 1 letter');
                $('#msg-error-new-pass').show();
                setTimeout(function () {
                    $('#msg-error-new-pass').hide();
                }, 4000);
                return;
            }
            if (newPassword != confirmationPassword) {
                $('#msg-error-password-confirm').text('Password does not match');
                $('#msg-error-password-confirm').show();
                setTimeout(function () {
                    $('#msg-error-password-confirm').hide();
                }, 4000);
                return;
            }
            $.ajax({
                url: urlChangePassword,
                data: { __RequestVerificationToken: $('input[name="__RequestVerificationToken"]').val(), currentPass: currentPassword, newPass: newPassword },
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    if (data.Data.IsSuccess) {
                        $('#modal-change-pass').modal('hide');
                        bootbox.dialog({
                            size: 'small',
                            message: data.Data.Message,
                            title: "Alert",
                            buttons: {
                                confirm: {
                                    label: '<i class="fa fa-times"></i> Close',
                                    className: "btn-warning button-bootbox-close",
                                    callback: function () {
                                    }
                                }
                            }
                        });
                    }
                    else {
                        bootbox.dialog({
                            size: 'small',
                            message: data.Data.Message,
                            title: "Alert",
                            buttons: {
                                confirm: {
                                    label: '<i class="fa fa-times"></i> Close',
                                    className: "btn-warning button-bootbox-close",
                                    callback: function () {
                                    }
                                }
                            }
                        });
                    }
                }
            });
        });

        $(document).on('click', '.img-flag', function () {
            var that = $(this);
            var src = that.attr('src');
            var value = that.data('value');
            var _dataCountry = getCountry(value);
            $('#img-flag-identity').attr('src', src).data('value', value);
            $('#span-country-name').html(_dataCountry.name);
            $('#div-select-country').modal('hide');
        });

    });


</script>

                </div>
            </div>
        </main>