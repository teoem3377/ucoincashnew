        <main class="main--body--content">
            <div class="main--body--container">
                <div class="container-fluid">
                    <div class="div-height-80"></div>
                    
<!-- 
<link href="custome/css/ico-index-page.css" rel="stylesheet">
 --><style>
    .lending-controller {
        padding: 30px 15px;
    }

    .row-button-item {
        display: table;
        width: 100%;
    }

    .row-button-left {
        width: 400px;
        float: left;
    }

    .row-button-right {
        width: calc(100% - 400px);
        float: left;
        text-align: right;
    }

        .row-button-right div {
            display: inline-block;
        }

    .div-ref {
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        width: calc(100% - 30px) !important;
        border-color: #fff;
        border: none;
        box-shadow: none;
        font-size: 13px;
        line-height: 22px;
        padding-left: 20px;
    }

    .row-button-left .input-group {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
        margin-bottom: 10px;
    }

    button.input-group-addon {
        border-radius: 20px;
        right: 0px;
        width: 100px;
        border-top-left-radius: 20px !important;
        border-bottom-left-radius: 20px !important;
        position: absolute;
        line-height: 20px;
        z-index: 2;
        border-color: #37b5a3;
        background: #37b5a3;
        color: #fff;
        border-left: 1px solid #37b5a3 !important;
    }

    #btn-lending, #btn-convert, #btn-exchange, #btn-reinvest {
        width: 140px;
        border-radius: 20px;
        border-color: #d1d2d5;
        float: left;
        margin-left: 20px;
    }

        #btn-lending.enable, #btn-convert.enable, #btn-exchange.enable, #btn-reinvest.enable {
            border-color: #f8b13d;
            background: #f8b13d;
            color: #fff;
        }

    .div-coin-item {
        background: #fff;
        border: 1px solid #dadee7;
        border-radius: 3px;
        display: table;
        width: 100%;
        padding: 20px;
        text-align: center;
        line-height: 25px;
        margin: 2px 0px;
    }

    .coin-item-left {
        float: left;
        width: 60px;
    }

        .coin-item-left img {
            width: 50px;
        }

    .coin-item-right {
        float: left;
        width: calc(100% - 60px);
        text-align: left;
        padding-left: 15px;
        padding-top: 2px;
    }

    .div-coin-controller {
        background: #fff;
        padding: 15px;
        border-radius: 3px;
        margin-top: 30px;
    }

    .coin-color {
        font-size: 18px;
        font-weight: 500;
    }

    .btc-color, .span-daily {
        color: #f7931a;
    }

    .eth-color {
        color: #62688f;
    }

    .uch-color {
        color: #37b5a3;
    }

    .usd-color {
        color: #202020;
    }

    .div-earn-controller {
        margin-top: 30px;
    }

    .div-earn-row {
        background: #fff;
        display: table;
        width: 100%;
    }

    .earn-item {
        width: 33.33%;
        float: left;
        border-right: 1px solid #e5e8ef;
        text-align: center;
        padding: 15px;
    }

    .div-earn-controller .earn-item:last-child {
        border-right: none;
    }

    .div-earn-header {
        color: #8d9ab4;
        font-size: 14px;
        font-weight: 100;
        margin-bottom: 5px;
    }

    .div-earn-body {
        line-height: 40px;
    }

        .div-earn-body img {
            width: 40px;
            margin-right: 10px;
            margin-top: -5px;
        }

    .usd-earn-color {
        color: #5f57ca;
        font-size: 18px;
        font-weight: 500;
    }

    .div-package-controller {
        margin-top: 30px;
    }

    .package-container {
        background: #fff;
        padding: 15px;
        min-height: 272px;
        margin-bottom: 30px;
    }

    .package-header {
        line-height: 26px;
        padding: 10px 10px 20px;
        border-bottom: 1px solid #e5e8ef;
    }

        .package-header img {
            margin-top: -5px;
        }

        .package-header span {
            font-size: 18px;
            font-weight: 500;
            margin-left: 10px;
        }

    .package-body {
        padding: 10px;
    }

        .package-body table tbody tr td {
            border: none;
        }

    .div-learn-more {
        padding-left: 20px;
    }

    @media (max-width:1420px) {

        .div-coin-item{
            padding:20px 15px;
        }

        .coin-color{
            font-size:16px;
        }
    }

    @media (max-width:1380px) {

        .div-coin-item{
            padding:20px 10px;
        }

        .coin-color{
            font-size:16px;
        }

        .coin-item-left{
            width:50px;
        }

        .coin-item-right{
                width: calc(100% - 50px);
        }

        .coin-item-left img {
            width: 40px;
        }
    }

    @media (max-width:1370px){
        .row-button-left {
            width: 100%;
            float: left;
            text-align: center;
        }

        .row-button-right {
            width: 100%;
            float: left;
            text-align: center;
            margin-top: 15px;
        }
    }

    @media (max-width:1280px) {

        .div-coin-item{
            padding:20px 10px;
        }

        .coin-color{
            font-size:15px;
        }

        .coin-item-left{
            width:45px;
        }

        .coin-item-right{
                width: calc(100% - 45px);
                padding-left: 10px;
        }

        .coin-item-left img {
            width: 40px;
        }
    }

    @media (max-width:1280px) {

        .div-coin-item{
            padding:20px 10px;
        }

        .coin-color{
            font-size:14px;
        }

        .coin-item-left{
            width:40px;
        }

        .coin-item-right{
                width: calc(100% - 40px);
                padding-left: 8px;
        }

        .coin-item-left img {
            width: 35px;
        }
    }

    @media (max-width:768px) {
        .div-coin-item {
            padding: 10px;
            line-height: 18px;
        }

        .coin-item-left img {
            width: 35px;
        }

        .row-button-left {
            width: 100%;
            float: left;
            text-align: center;
        }

        .row-button-right {
            width: 100%;
            float: left;
            text-align: center;
            margin-top: 15px;
        }

        .earn-item {
            width: 100%;
            border-bottom: 1px solid #e5e8ef;
            border-right: none;
            padding: 10px;
        }

        .div-earn-controller .earn-item:last-child {
            border-bottom: none;
        }

        .div-earn-body {
            line-height: 30px;
        }

            .div-earn-body img {
                width: 30px;
                margin-right: 10px;
                margin-top: -5px;
            }
    }

    @media (max-width:400px){
        .lending-controller {
            padding: 30px 0px;
        }

        #btn-lending, #btn-convert, #btn-exchange, #btn-reinvest{
            width:120px;
        }
    }

    .span-lending-amount{
        font-weight:500;
    }

    .div-time-icmain--body--container {
    display: table;
    width: 100%;
    min-height: 165px;
}
</style>

<div class="lending-controller">
    <div class="div-button-container">
        <div class="row-button-item">
            <div class="row-button-left">
                <div class="input-group">
                    <div class="div-ref form-control" aria-label="Username" id="identity-ref" aria-describedby="btn-copy">https://bitbankcoin.co/ref/<?=$_SESSION['login']['user']?></div>
                    <button class="input-group-addon" data-clipboard-action="copy" data-clipboard-target="#identity-ref" id="btn-copy" aria-hidden="true">Copy</button>
                </div>
                <div class="div-learn-more">
                    Get bonus by referring new members <a href="/Network/Share">learn more</a><br />
                    ( <span style="font-style:italic; color:#F30; font-size:14px">Bonus for the sponsor is: <b>10% BBC</b> </span> )
                    
                </div>
            </div>
            <!--
            <div class="row-button-right">
                <div class="">
                    <button class="btn btn-default enable" id="btn-lending" data-toggle="modal" data-target="#modal-lending">Lending</button>
                    <button class="btn btn-default" id="btn-reinvest" disabled="">Reinvest</button>
                </div>
                <div class="">
                    <button class="btn btn-default" id="btn-convert" disabled="">Convert USD</button>
                    <a class="btn btn-default" href="/Exchange" id="btn-exchange">Exchange</a>
                </div>
            </div>
            -->
        </div>
    </div>
    <div class="div-coin-controller">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="div-coin-item">
                    <div class="coin-item-left">
                        <img src="images/bitcoin.png">
                    </div>
                    <div class="coin-item-right">
                        <div>BTC</div>
                        <div class="coin-color btc-color" id="div--current--btc">0.00000000</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="div-coin-item">
                    <div class="coin-item-left">
                        <img src="images/logo.png">
                    </div>
                    <div class="coin-item-right">
                        <div>BBC</div>
                        <div class="coin-color uch-color" id="div--current--uch">0.00000000</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="div-coin-item">
                    <div class="coin-item-left">
                        <img src="images/eth.png">
                    </div>
                    <div class="coin-item-right">
                        <div>ETH</div>
                        <div class="coin-color eth-color" id="div--current--eth">0.00000000</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="div-coin-item">
                    <div class="coin-item-left">
                        <img src="images/usd.png">
                    </div>
                    <div class="coin-item-right">
                        <div>USD</div>
                        <div class="coin-color usd-color" id="div--current--usd">0.00000000</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="div-earn-controller">
        <div class="div-earn-row">
            <div class="earn-item">
                <div class="div-earn-header">
                    Today Earn
                </div>
                <div class="div-earn-body">
                    <img src="images/usd-ico-yellow.png">
                    <span class="usd-earn-color">0 USD</span>
                </div>
            </div>
            <div class="earn-item">
                <div class="div-earn-header">
                    Total Earn
                </div>
                <div class="div-earn-body">
                    <img src="images/usd-ico-yellow.png">
                    <span class="usd-earn-color">0 USD</span>
                </div>
            </div>
            <div class="earn-item">
                <div class="div-earn-header">
                    Total Lending
                </div>
                <div class="div-earn-body">
                    <img src="images/usd-ico-yellow.png">
                    <span class="usd-earn-color">0 USD</span>
                </div>
            </div>
        </div>
    </div>

    <div class="div-package-controller">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="package-container">
                    <div class="package-header">
                        <img src="images/calendar-icon.png">
                        <span>Balance Systems</span>
                    </div>
                    <div class="package-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><b>Date</b></td>
                                    <td><b>Percent</b></td>
                                </tr>
                                <tr>
                                    <td>2017-12-01</td>
                                    <td>1.5%</td>
                                </tr>
                                <tr>
                                    <td>2017-11-30</td>
                                    <td>1.5%</td>
                                </tr>
                                <tr>
                                    <td>2017-11-29</td>
                                    <td>1.5%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="package-container">
                    <div class="package-header">
                        <img src="images/calendar-icon.png">
                        <span>History Lending</span>
                    </div>
                    <div class="package-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><b>Date</b></td>
                                    <td><b>Package Lending</b></td>
                                    <td><b>Amount</b></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- 
<script src="/Scripts/client/clipboard.min.js"></script>
<link rel="stylesheet" href="custome/css/flipclock.css">
<script src="/Scripts/client/flipclock.min.js"></script>
<script>
    var clipboard = new Clipboard('#btn-copy', {
        text: function (trigger) {
            $('#btn-copy').blur();
            return trigger.getAttribute('aria-label');
        }
    });


    clipboard.on('success', function (e) {
        $('#btn-copy').html('Copied').attr('disabled', true);
        setTimeout(function () { $('#btn-copy').html('Copy').removeAttr('disabled');}, 5000);
    });

    var eventTime = moment(moment('2017-12-20 00:00:00').format("YYYY-MM-DD HH:mm:ss"), "YYYY-MM-DD HH:mm:ss");

    var __currentTime = moment();// moment(moment.utc().format("YYYY-MM-DD HH:mm:ss"), "YYYY-MM-DD HH:mm:ss");
    var duration1 = eventTime.unix() - __currentTime.unix();
    duration1 = duration1 < 0 ? 0 : duration1;
    var clock = $('#open--ico--time').FlipClock({
        clockFace: 'DailyCounter',
        autoStart: false,
        callbacks: {
            stop: function () {
                
            }
        }
    });

    clock.setTime(duration1);
    clock.setCountdown(true);
    clock.start();

</script> -->
                </div>
            </div>
        </main>