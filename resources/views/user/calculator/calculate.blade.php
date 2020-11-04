@extends('layouts.back-layout')

@section('main-content')
    <section class="section">
        <div class="section-header">
            <h1>Currency Calculator</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('home.page') }}">Home</a></div>
                <div class="breadcrumb-item ">Calculator</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="selected-coin" class="text-primary" style="font-size: 0.9rem;font-weight: bold">
                                    Crypto Currency
                                </label>
                                <select class="form-control" id="selected-coin"
                                        onchange="bitconCalculateOnCryptoChange(this.value);">
                                    <option value="bitcoin">Bitcoin</option>
                                    <option value="ethereum">Ethereum</option>
                                    <option value="bitcoin-cash">Bitcoin Cash</option>
                                    <option value="litecoin">Litecoin</option>
                                    <option value="ripple">Ripple</option>
                                    <option value="monero">Monero</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="amtBTC" value="1"/>
                            </div>

                            <hr class="mb-4" style="background: #F4F6F9">



                            <div class="form-group">
                                <label for="amtUSD" class="text-primary" style="font-size: 0.9rem;font-weight: bold">
                                    Your Currency
                                </label>

                                <select id="selected-currency" onchange="bitconCalculateOnCurrencyChange(this.value);"
                                        class="form-control capitalize">
                                    <option value="GGP">GGP - Guernsey Pound</option>
                                    <option value="LKR">LKR - Sri Lankan-rupee</option>
                                    <option value="UYU">UYU - Uruguayan Peso</option>
                                    <option value="ARS">ARS - Argentine Peso</option>
                                    <option value="BBD">BBD - Barbadian Dollar</option>
                                    <option value="BIF">BIF - Burundian Franc</option>
                                    <option value="AED">AED - United Arab-emirates-dirham</option>
                                    <option value="IRR">IRR - Iranian Rial</option>
                                    <option value="RWF">RWF - Rwandan Franc</option>
                                    <option value="TMT">TMT - Turkmenistani Manat</option>
                                    <option value="ZMW">ZMW - Zambian Kwacha</option>
                                    <option value="BRL">BRL - Brazilian Real</option>
                                    <option value="UGX">UGX - Ugandan Shilling</option>
                                    <option value="HRK">HRK - Croatian Kuna</option>
                                    <option value="VEF">VEF - Venezuelan Bolívar-fuerte</option>
                                    <option value="GBP">GBP - British Pound-sterling</option>
                                    <option value="NOK">NOK - Norwegian Krone</option>
                                    <option value="DKK">DKK - Danish Krone</option>
                                    <option value="GEL">GEL - Georgian Lari</option>
                                    <option value="AFN">AFN - Afghan Afghani</option>
                                    <option value="CVE">CVE - Cape Verdean-escudo</option>
                                    <option value="TWD">TWD - New Taiwan-dollar</option>
                                    <option value="AZN">AZN - Azerbaijani Manat</option>
                                    <option value="ZAR">ZAR - South African-rand</option>
                                    <option value="PKR">PKR - Pakistani Rupee</option>
                                    <option value="VUV">VUV - Vanuatu Vatu</option>
                                    <option value="KHR">KHR - Cambodian Riel</option>
                                    <option value="MOP">MOP - Macanese Pataca</option>
                                    <option value="SGD">SGD - Singapore Dollar</option>
                                    <option value="JPY">JPY - Japanese Yen</option>
                                    <option value="MDL">MDL - Moldovan Leu</option>
                                    <option value="KMF">KMF - Comorian Franc</option>
                                    <option value="COP">COP - Colombian Peso</option>
                                    <option value="IQD">IQD - Iraqi Dinar</option>
                                    <option value="SRD">SRD - Surinamese Dollar</option>
                                    <option value="KES">KES - Kenyan Shilling</option>
                                    <option value="LSL">LSL - Lesotho Loti</option>
                                    <option value="ETB">ETB - Ethiopian Birr</option>
                                    <option value="KGS">KGS - Kyrgystani Som</option>
                                    <option value="LYD">LYD - Libyan Dinar</option>
                                    <option value="QAR">QAR - Qatari Rial</option>
                                    <option value="KRW">KRW - South Korean-won</option>
                                    <option value="NGN">NGN - Nigerian Naira</option>
                                    <option value="GMD">GMD - Gambian Dalasi</option>
                                    <option value="TJS">TJS - Tajikistani Somoni</option>
                                    <option value="KZT">KZT - Kazakhstani Tenge</option>
                                    <option value="SVC">SVC - Salvadoran Colón</option>
                                    <option value="CLF">CLF - Chilean Unit-of-account-(uf)</option>
                                    <option value="JOD">JOD - Jordanian Dinar</option>
                                    <option value="PLN">PLN - Polish Zloty</option>
                                    <option value="NPR">NPR - Nepalese Rupee</option>
                                    <option value="LBP">LBP - Lebanese Pound</option>
                                    <option value="XCD">XCD - East Caribbean-dollar</option>
                                    <option value="XOF">XOF - Cfa Franc-bceao</option>
                                    <option value="BAM">BAM - Bosnia Herzegovina-convertible-mark</option>
                                    <option value="XPT">XPT - Platinum Ounce</option>
                                    <option value="RUB">RUB - Russian Ruble</option>
                                    <option value="BYN">BYN - Belarusian Ruble</option>
                                    <option value="SBD">SBD - Solomon Islands-dollar</option>
                                    <option value="AOA">AOA - Angolan Kwanza</option>
                                    <option value="HUF">HUF - Hungarian Forint</option>
                                    <option value="SHP">SHP - Saint Helena-pound</option>
                                    <option value="MNT">MNT - Mongolian Tugrik</option>
                                    <option value="IDR">IDR - Indonesian Rupiah</option>
                                    <option value="PGK">PGK - Papua New-guinean-kina</option>
                                    <option value="SZL">SZL - Swazi Lilangeni</option>
                                    <option value="BND">BND - Brunei Dollar</option>
                                    <option value="SOS">SOS - Somali Shilling</option>
                                    <option value="GYD">GYD - Guyanaese Dollar</option>
                                    <option value="GIP">GIP - Gibraltar Pound</option>
                                    <option value="IMP">IMP - Manx Pound</option>
                                    <option value="EUR">EUR - Euro</option>
                                    <option value="SAR">SAR - Saudi Riyal</option>
                                    <option value="BDT">BDT - Bangladeshi Taka</option>
                                    <option value="LAK">LAK - Laotian Kip</option>
                                    <option value="UZS">UZS - Uzbekistan Som</option>
                                    <option selected value="USD">USD - United States-dollar</option>
                                    <option value="HKD">HKD - Hong Kong-dollar</option>
                                    <option value="KYD">KYD - Cayman Islands-dollar</option>
                                    <option value="FJD">FJD - Fijian Dollar</option>
                                    <option value="MVR">MVR - Maldivian Rufiyaa</option>
                                    <option value="MYR">MYR - Malaysian Ringgit</option>
                                    <option value="SYP">SYP - Syrian Pound</option>
                                    <option value="NAD">NAD - Namibian Dollar</option>
                                    <option value="HTG">HTG - Haitian Gourde</option>
                                    <option value="CUP">CUP - Cuban Peso</option>
                                    <option value="XPD">XPD - Palladium Ounce</option>
                                    <option value="TND">TND - Tunisian Dinar</option>
                                    <option value="LRD">LRD - Liberian Dollar</option>
                                    <option value="XAG">XAG - Silver Ounce</option>
                                    <option value="HNL">HNL - Honduran Lempira</option>
                                    <option value="VND">VND - Vietnamese Dong</option>
                                    <option value="ERN">ERN - Eritrean Nakfa</option>
                                    <option value="VES">VES - Venezuelan Bolívar-soberano</option>
                                    <option value="RSD">RSD - Serbian Dinar</option>
                                    <option value="XPF">XPF - Cfp Franc</option>
                                    <option value="JMD">JMD - Jamaican Dollar</option>
                                    <option value="MRU">MRU - Mauritanian Ouguiya</option>
                                    <option value="BOB">BOB - Bolivian Boliviano</option>
                                    <option value="BWP">BWP - Botswanan Pula</option>
                                    <option value="DZD">DZD - Algerian Dinar</option>
                                    <option value="CDF">CDF - Congolese Franc</option>
                                    <option value="CRC">CRC - Costa Rican-colón</option>
                                    <option value="TRY">TRY - Turkish Lira</option>
                                    <option value="FKP">FKP - Falkland Islands-pound</option>
                                    <option value="ANG">ANG - Netherlands Antillean-guilder</option>
                                    <option value="BHD">BHD - Bahraini Dinar</option>
                                    <option value="WST">WST - Samoan Tala</option>
                                    <option value="BTN">BTN - Bhutanese Ngultrum</option>
                                    <option value="CNY">CNY - Chinese Yuan-renminbi</option>
                                    <option value="MAD">MAD - Moroccan Dirham</option>
                                    <option value="MUR">MUR - Mauritian Rupee</option>
                                    <option value="TTD">TTD - Trinidad And-tobago-dollar</option>
                                    <option value="BZD">BZD - Belize Dollar</option>
                                    <option value="PAB">PAB - Panamanian Balboa</option>
                                    <option value="YER">YER - Yemeni Rial</option>
                                    <option value="XAF">XAF - Cfa Franc-beac</option>
                                    <option value="CZK">CZK - Czech Republic-koruna</option>
                                    <option value="OMR">OMR - Omani Rial</option>
                                    <option value="PHP">PHP - Philippine Peso</option>
                                    <option value="CAD">CAD - Canadian Dollar</option>
                                    <option value="ZWL">ZWL - Zimbabwean Dollar</option>
                                    <option value="MGA">MGA - Malagasy Ariary</option>
                                    <option value="GHS">GHS - Ghanaian Cedi</option>
                                    <option value="STD">STD - São Tomé-and-príncipe-dobra-(pre-2018)</option>
                                    <option value="RON">RON - Romanian Leu</option>
                                    <option value="MWK">MWK - Malawian Kwacha</option>
                                    <option value="CHF">CHF - Swiss Franc</option>
                                    <option value="DJF">DJF - Djiboutian Franc</option>
                                    <option value="GTQ">GTQ - Guatemalan Quetzal</option>
                                    <option value="BMD">BMD - Bermudan Dollar</option>
                                    <option value="KWD">KWD - Kuwaiti Dinar</option>
                                    <option value="SEK">SEK - Swedish Krona</option>
                                    <option value="XDR">XDR - Special Drawing-rights</option>
                                    <option value="SLL">SLL - Sierra Leonean-leone</option>
                                    <option value="BGN">BGN - Bulgarian Lev</option>
                                    <option value="AUD">AUD - Australian Dollar</option>
                                    <option value="NZD">NZD - New Zealand-dollar</option>
                                    <option value="MRO">MRO - Mauritanian Ouguiya-(pre-2018)</option>
                                    <option value="ILS">ILS - Israeli New-sheqel</option>
                                    <option value="AMD">AMD - Armenian Dram</option>
                                    <option value="CNH">CNH - Chinese Yuan-(offshore)</option>
                                    <option value="MZN">MZN - Mozambican Metical</option>
                                    <option value="AWG">AWG - Aruban Florin</option>
                                    <option value="DOP">DOP - Dominican Peso</option>
                                    <option value="UAH">UAH - Ukrainian Hryvnia</option>
                                    <option value="JEP">JEP - Jersey Pound</option>
                                    <option value="SCR">SCR - Seychellois Rupee</option>
                                    <option value="TZS">TZS - Tanzanian Shilling</option>
                                    <option value="PYG">PYG - Paraguayan Guarani</option>
                                    <option value="SDG">SDG - Sudanese Pound</option>
                                    <option value="MKD">MKD - Macedonian Denar</option>
                                    <option value="EGP">EGP - Egyptian Pound</option>
                                    <option value="MXN">MXN - Mexican Peso</option>
                                    <option value="PEN">PEN - Peruvian Nuevo-sol</option>
                                    <option value="INR">INR - Indian Rupee</option>
                                    <option value="CUC">CUC - Cuban Convertible-peso</option>
                                    <option value="STN">STN - São Tomé-and-príncipe-dobra</option>
                                    <option value="CLP">CLP - Chilean Peso</option>
                                    <option value="XAU">XAU - Gold Ounce</option>
                                    <option value="SSP">SSP - South Sudanese-pound</option>
                                    <option value="GNF">GNF - Guinean Franc</option>
                                    <option value="THB">THB - Thai Baht</option>
                                    <option value="KPW">KPW - North Korean-won</option>
                                    <option value="MMK">MMK - Myanma Kyat</option>
                                    <option value="ISK">ISK - Icelandic Króna</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control decrement" id="amtUSD" value="0.00"/>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

