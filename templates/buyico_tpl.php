<main class="main--body--content">
            <div class="main--body--container">
                <div class="container-fluid">
                    <div class="div-height-80"></div>
                    



<style>
    .div-ico-controller {
        max-width: 1000px;
        margin: 0 auto;
    }

    .div-user-coin {
        background: #fff;
        margin: 0 auto;
        padding: 15px 0px;
        border-radius: 3px;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .btc--value--color {
        color: #f7931a;
    }

    .uch--value--color {
        color: #52c0ad;
        margin-left: 20px;
    }

    .eth--value--color {
        color: #62688f;
        margin-left: 20px;
    }

    .progress {
        height: 16px;
        border-radius: 8px;
        margin-bottom: 0px;
        background-color: #e4e2ff;
    }

    .progress-bar {
        background-color: #5f57ca;
        line-height: 16px;
    }

        .progress-bar.progress-bar-striped.progress-bar-animated {
            -webkit-animation: progress-bar-stripes 1s linear infinite;
            animation: progress-bar-stripes 1s linear infinite;
            text-align: right;
            padding-right: 10px;
            border-radius: 8px;
        }

    .div-process {
        display: table;
        width: 100%;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .div-process-left {
        width: calc(100% - 100px);
        float: left;
    }

    .div-process-right {
        width: 100px;
        float: left;
        line-height: 16px;
        font-weight: 500;
    }

    .div-price.text-center {
        margin-top: 35px;
        margin-bottom: 10px;
    }

    .ico-action.text-center {
        margin-top: 20px;
        margin-bottom: -10px;
    }

    .div-user-coin-item {
        padding: 10px;
        border: 1px solid #dadee7;
        border-radius: 3px;
        text-align: center;
    }

        .div-user-coin-item b {
            margin-left: 20px;
        }

        .div-user-coin-item img {
            width: 18px;
            margin-top: -4px;
            margin-right: 6px;
        }

    .div-time-count-down {
        display: none;
        width: 100%;
        text-align: center;
    }

    .div-time-count-down-left {
        width: 90px;
        display: inline-block;
        margin: 0px 10px;
    }

        .div-time-count-down-left div {
            font-weight: 600;
        }

    .time-count-down-item {
        background: #17181a;
        color: #f7f7f7;
        font-weight: 900;
        font-size: 40px;
        height: 80px;
        line-height: 80px;
    }

        .time-count-down-item.days {
            color: #89d4c3;
        }

    .status-title {
        font-size: 18px;
        font-weight: 500;
    }

    .div-time-count-down.enabled {
        display: table;
    }

    #buy--ico--now {
        display: none;
    }

        #buy--ico--now.enabled {
            display: inline-block;
            background: #f8b13d;
            border-color: #f8b13d;
            width: 150px;
            border-radius: 20px;
        }

    .row-item {
        display: table;
        width: 100%;
        margin-bottom: 8px;
    }

        .row-item .left {
            float: left;
            width: 120px;
            line-height: 34px;
            font-weight: 500;
        }

        .row-item .right {
            float: left;
            width: calc(100% - 120px);
        }

    #btn-bitcoin, #btn-ethereum {
        width: 110px;
        line-height: 22px;
        padding: 2px;
        border-radius: 14px;
        margin: 0 10px;
    }

    .modal-footer {
        border-top: none;
    }

    .btn-ico-custome {
        width: 100px;
    }

    #total--coin--can {
        cursor: pointer;
    }

    #table--list--transaction > thead > tr > th {
        padding: 10px;
        border-top: 1px solid #dadee7;
    }

    #table--list--transaction > tbody > tr > td {
        border-top: none;
    }

    #table--list--transaction > tbody > tr:first-child > td {
        border-top: none;
    }

    #table--list--transaction > thead > tr > th {
        border-bottom: none;
    }

    #no-item-found-alert {
        display: none;
    }

        #no-item-found-alert.enabled {
            display: table-row;
        }

    .ico-transaction-container {
        background: #fff;
        padding: 20px;
        margin-top: 30px;
    }

    .ico-transaction-body {
        margin-top: 15px;
    }

    .ico-transaction-header img {
        width: 20px;
    }

    .ico-transaction-header span {
        line-height: 20px;
        font-weight: 500;
        color: #202020;
    }

    .flip-clock-wrapper {
        margin: 10px 0px 0px !important;
    }



    .buy-ico-title-time {
        color: #4caf50;
    }

    .flip-clock-controller {
        margin: 0 auto;
        text-align: center;
        display: table;
    }

    .flip-clock-divider {
        height: 80px !important;
    }

    .ico-title-time img, .buy-ico-title-time img {
        width: 30px;
        margin-top: -4px;
        margin-right: 6px;
    }

    .ico-transaction-header {
        line-height: 28px;
    }

        .ico-transaction-header select {
            height: 28px;
            padding: 3px 12px;
        }

    .price-coin-info {
        display: table;
        margin: 0 auto;
    }


    .price-coin-info-item {
        display: table;
        width: 100%;
    }

    .dl-inline-left {
        width: 140px;
        float: left;
        text-align: left;
    }

    .dl-inline-right {
        width: calc(100% - 140px);
        float: left;
        text-align: left;
    }
</style>

<style>
    .flipclock hr {
        position: absolute;
        left: 0;
        top: 65px;
        width: 100%;
        height: 3px;
        border: 0;
        background: #000;
        z-index: 10;
        opacity: 0;
    }

    ul.flip {
        position: relative;
        float: left;
        margin: 10px 6px;
        padding: 0;
        width: 85px;
        height: 80px;
        font-size: 40px;
        font-weight: bold;
        line-height: 83px;
        border: 1px solid #7e7e80;
    }

        ul.flip li {
            float: left;
            margin: 0;
            padding: 0;
            width: 50%;
            height: 100%;
            -webkit-perspective: 200px;
            list-style: none;
        }

            ul.flip li.d1 {
                float: right;
            }

            ul.flip li section {
                z-index: 1;
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
            }

                ul.flip li section:first-child {
                    z-index: 2;
                }

            ul.flip li div {
                z-index: 1;
                position: absolute;
                left: 0;
                width: 100%;
                height: 49.3%;
                overflow: hidden;
            }

                ul.flip li div .shadow {
                    display: block;
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    z-index: 2;
                }

                ul.flip li div.up {
                    -webkit-transform-origin: 50% 100%;
                    top: 0;
                }

                ul.flip li div.down {
                    -webkit-transform-origin: 50% 0%;
                    bottom: 0;
                    height: 50%;
                }

    .flip-clock-wrapper .flip:before {
        content: "";
        width: 100%;
        height: 1px;
        position: absolute;
        display: block;
        top: 35px;
        z-index: 10000;
    }

    #flipclock-container ul:nth-child(11) li:nth-child(2)::before,
    #flipclock-container ul:nth-child(8) li:nth-child(2)::before,
    #flipclock-container ul:nth-child(5) li:nth-child(2)::before,
    #flipclock-container ul:nth-child(2) li:nth-child(2)::before {
        content: "";
        height: 6px;
        width: 3px;
        display: block;
        background-color: #2d2d31;
        position: absolute;
        left: 0;
        margin-top: 32px;
        z-index: 10;
    }

    #flipclock-container ul:nth-child(9) li:nth-child(2)::before,
    #flipclock-container ul:nth-child(12) li:nth-child(2)::before,
    #flipclock-container ul:nth-child(6) li:nth-child(2)::before,
    #flipclock-container ul:nth-child(3) li:nth-child(2)::before {
        content: "";
        height: 6px;
        width: 3px;
        display: block;
        background-color: #2d2d31;
        position: absolute;
        right: 0;
        margin-top: 32px;
        z-index: 10;
    }

    #flipclock-container ul:nth-child(2),
    #flipclock-container ul:nth-child(5),
    #flipclock-container ul:nth-child(8),
    #flipclock-container ul:nth-child(11) {
        text-align: right;
    }

    #flipclock-container ul:nth-child(3),
    #flipclock-container ul:nth-child(6),
    #flipclock-container ul:nth-child(9),
    #flipclock-container ul:nth-child(12) {
        text-align: left;
    }

    ul.flip li div div.inn {
        position: absolute;
        left: 0;
        z-index: 1;
        width: 100%;
        height: 200%;
        color: #000;
        text-shadow: 0 0 2px #000;
        background: linear-gradient(to bottom, white 0%, #f1f1f1 47%, #dddddd 97%, #dedede 100%);
        font-size: 45px;
        font-weight: 500;
    }

    .refresh-captcha, .refresh-robot-captcha {
        float: left;
        margin-top: 10px;
        margin-left: 20px;
        cursor: pointer;
        color: #52c0ad;
    }

    .img-captcha, .img-robot-captcha {
        float: left;
        height: 34px;
        margin-left: 20px;
    }

    input[name="captcha"], input[name="robot-check"],#input-captcha {
        width: 120px;
        float: left;
    }

    #max--coin-label {
        cursor: pointer;
    }

    #div-buy-uch .modal-dialog {
        max-width: 500px;
    }

    @media(max-width:490px) {
        input[name="captcha"] ,#input-captcha{
            width: 100%;
            margin-bottom: 10px;
        }

        .img-captcha {
            margin-left: 0px;
        }
    }
</style>
<style>
    @media(max-width:768px) {
        .row.div-user-coin div.div-user-coin-item {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .div-user-coin {
            margin-top: 20px !important;
        }

        .div-item-ico {
            padding: 5px;
        }
    }

    div#google-check-bot {
        display: inline-block;
        text-align: center;
        margin-top: 20px;
    }

    div#robot-check-container{
        display: table;
    margin: 0 auto;
    margin-bottom: 16px;
    }

    #btn-robot-check{
        width: 200px;
        line-height: 30px;
        margin-top: 20px;
    }
</style>
<div class="div-ico-controller" id="div-ico-controller">
    <div class="row div-user-coin">
        <div class="col-sm-4 col-xs-12">
            <div class="div-user-coin-item">
                <img src="images/bitcoin.png"><span>BTC</span>
                <b class="btc--value--color">0.00000000</b>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="div-user-coin-item">
                <img src="images/logo.png"><span>BBC</span><b class="uch--value--color">0.00000000</b>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="div-user-coin-item">
                <img src="images/eth.png"><span>ETH</span><b class="eth--value--color">0.00000000</b>
            </div>
        </div>
    </div>
   
	
	
	<div class="div-time-count-down enabled" data-bind="with: ICO" id="div-time-count-down">


            <h4 class="buy-ico-title-time"><img src="./Buy ICO_files/time-buy-ico.png">BUY ICO TIME: </h4>
            <div class="flip-clock-controller">
              <div class="clock_ico"></div>
        


              </div>
    
    <div class="div-price text-center">
        <b>Price: <?= get_giabbcsapban()?></b><b> USD</b>
    </div>
    
    <?php
		$phantram=(get_bbcdangban()/get_bbcduban())*100;
		
	?>
    
    
    <div class="div-process">
        <div class="div-process-left">
            <div class="progress">
                <div id="process--ico" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?=$phantram?>%"><?=$phantram?>%</div>
            </div>
        </div>
        <div class="div-process-right">
            <span class="moneyFormat"><?=get_bbcduban()?></span><span> BBC</span>
        </div>

    </div>

    <div class="ico-transaction-container">
        <div class="ico-transaction-header">
            <img src="images/transaction.png">
            <span>Last Transaction</span>
            
        </div>
        <div class="ico-transaction-body table-responsive">
            <table class="table" id="table--list--transaction">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Transaction hash</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="no-item-found-alert">
                        <td colspan="3"></td>
                    </tr>
                    <!-- ko foreach:transactionList-->
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:16:32</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">bb6cbc0dfb9248098e2b7fcf9f9ebfd8</span>
                        </td>
                        <td><span data-bind="text:Amount">60.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:16:28</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">bd5533754b404b1d9400af85cc6dda33</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:16:27</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">8c7c4df7dcbf4519af8a9b91ec2a78f3</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:16:27</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">d82b921176dc4cdb9048d51b8c87935f</span>
                        </td>
                        <td><span data-bind="text:Amount">30.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:16:26</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">0fcdd5efb2fc41109b910e2afec3cb59</span>
                        </td>
                        <td><span data-bind="text:Amount">106.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:16:23</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">ac241dcc94f247c484d03b40a39f12c2</span>
                        </td>
                        <td><span data-bind="text:Amount">111.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:16:23</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">0ac5e991c8c14904901b95d0419664ec</span>
                        </td>
                        <td><span data-bind="text:Amount">100.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:16:23</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">f3c6ef0f07534a6fa7eaa9dfa0712541</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:16:21</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">93507642750d49baa2898b540f768b4b</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:16:20</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">c86b0057917146b6bd96514878300f98</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:34</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">f89cbc88c0804023b44102700b2e027c</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:34</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">2ecaa157a74142799ea4469b3488c89d</span>
                        </td>
                        <td><span data-bind="text:Amount">50.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:34</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">0f2bb3050d914164b7608beb6bf6a559</span>
                        </td>
                        <td><span data-bind="text:Amount">35.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">f616038129ca41d6ab1d0d41f61517d1</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">7a80c8751d3147faa2511e4ba6cb499d</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">5a941819551044929a1f25169ff86dcf</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">ca9381a818784f04a257406571647609</span>
                        </td>
                        <td><span data-bind="text:Amount">147.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">2aa3e61c2a884796bb1f4d34478d2fc8</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">bbe2837179da4e1095b26c7f5bde6f1d</span>
                        </td>
                        <td><span data-bind="text:Amount">100.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">e4657f32fc5547408b94873e2fcfc4dd</span>
                        </td>
                        <td><span data-bind="text:Amount">80.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">63440a4b27f748b7b1809532f749a25f</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">bc4234437ac64cd29753ac4b07e72845</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">d40c5997deb7482fb44aca025a9a2963</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">6524b7e03c5d4f3f8d52f64bd2bb9118</span>
                        </td>
                        <td><span data-bind="text:Amount">123.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">93569985524a40ac9c4cfa0553cf2d6d</span>
                        </td>
                        <td><span data-bind="text:Amount">100.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:33</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">436aa4e59b0743eea2befc1a10b0a023</span>
                        </td>
                        <td><span data-bind="text:Amount">33.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:32</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">491f267827834c29bbfbc8ebde398d9f</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:32</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">a0e86635bc7644d7a87cdc0a1ee83a32</span>
                        </td>
                        <td><span data-bind="text:Amount">110.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:31</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">99f3a89a3a074c3f8e5c653fb5f0a962</span>
                        </td>
                        <td><span data-bind="text:Amount">118.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:30</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">50a82bf5369048d6ab8b3fb8f7401895</span>
                        </td>
                        <td><span data-bind="text:Amount">20.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:30</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">31251e3613fc4b14a10740c595ba8a04</span>
                        </td>
                        <td><span data-bind="text:Amount">40.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:30</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">320101c161a846369c094b0e19316b86</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:30</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">b0366afffc5148f1bae09a0a389ddde3</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:30</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">ce9fac60dab245369a909e95712ae22e</span>
                        </td>
                        <td><span data-bind="text:Amount">109.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:30</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">d7df33e5d80147f689a7a67a1717e5fc</span>
                        </td>
                        <td><span data-bind="text:Amount">85.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:30</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">a7ff6b4b2f60463da3d6da8c713477e1</span>
                        </td>
                        <td><span data-bind="text:Amount">55.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:30</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">6fa6d02c5af1496cabc5fb81f822ac12</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:29</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">11ba2d8fd9aa477586933df97542d976</span>
                        </td>
                        <td><span data-bind="text:Amount">85.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:29</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">7afb5c97e067493cb3d14b3c953e453a</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:29</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">d61c1f47570541c6bfaf642866e63740</span>
                        </td>
                        <td><span data-bind="text:Amount">75.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:29</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">9f692fddeb874bff9b04670d17b6f18d</span>
                        </td>
                        <td><span data-bind="text:Amount">99.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:29</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">ef8ccf13b04e492eaa60685fc67bdf7b</span>
                        </td>
                        <td><span data-bind="text:Amount">45.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:29</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">4cd743d96a4a48739f40a3339ff3d8a4</span>
                        </td>
                        <td><span data-bind="text:Amount">50.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:29</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">41662177fb434694a292ac1ac26da573</span>
                        </td>
                        <td><span data-bind="text:Amount">40.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:29</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">c38da1954090465899e7c2c8c4656e0a</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:29</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">7e72e5ee886e417383d7ce9f6955c665</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:29</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">2709eb83ed244f09ba42fc447ec8979d</span>
                        </td>
                        <td><span data-bind="text:Amount">41.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:24</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">2a9b5027da7745dfbf5e10fc74296118</span>
                        </td>
                        <td><span data-bind="text:Amount">150.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:24</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">f50e1ce9601448e4a1781d01cf03b344</span>
                        </td>
                        <td><span data-bind="text:Amount">90.00000000</span></td>
                    </tr>
                    
                    <tr>
                        <td>
                            <div class="div-item-date">
                                <span data-bind="text: DateCreated">2017-11-30 22:14:24</span>
                            </div>
                        </td>
                        <td>
                            <span data-bind="text:TransactionHash">484736cfd5164ef9ba542c26dd4403ba</span>
                        </td>
                        <td><span data-bind="text:Amount">40.00000000</span></td>
                    </tr>
                    <!--/ko-->
                </tbody>
            </table>
        </div>
    </div>
    
</div>






<!-- <script>
    var urlTransaction = '/ICO/GetTransaction';
    var urlBuy = '/ICO/BuyICO';
    var urlGetPrice = '/ICO/GetPrice';
    var urlRefresh = '/ICO/RefreshCaptcha';
    var urlRefreshRobot = '/ICO/RefreshRobotCaptcha';
    var urlRobotCheck ='/ICO/RobotCheck';
</script>
<link rel="stylesheet" href="custome/css/flipclock.css">
<script src="/Scripts/client/flipclock.min.js"></script>
<script src="/Scripts/client/pagination.js"></script>
<script src="/Scripts/client/ico-transaction.js?v=36"></script>
<script>
    var xyz = function () {
        var datalocal = {"Id":9,"TotalCoin":500000.000000000000000000,"SoldCoin":0.000000000000000000,"TimeICO":"\/Date(1512226800000)\/","TimeBuyICO":"\/Date(1512226800000)\/","OpenBuyTime":2,"OpenICOTime":false,"Price":1.06000,"Limit":150,"TimeLeft":160874.7761992};
        this.s=function(){return datalocal.TimeICO},this.e=function(){return datalocal.TimeBuyICO};
    };
    $(document).ready(function () {
        var icoTransaction = new ICOTransaction();
        icoTransaction.init({"Id":9,"TotalCoin":500000.000000000000000000,"SoldCoin":0.000000000000000000,"TimeICO":"\/Date(1512226800000)\/","TimeBuyICO":"\/Date(1512226800000)\/","OpenBuyTime":2,"OpenICOTime":false,"Price":1.06000,"Limit":150,"TimeLeft":160874.7761992}, {"BTC":0.00000000,"ETH":0.00000000,"UCH":0.00000000,"USD":0.00000000,"BTCAddress":"1Kw5mRVmrjSZJbyWVsz3L6bTZTniVpAPXz","ETHAddress":"0x41d9791693fa2d2e847c44881a819c9759aef55e","UCHAddress":"U9doSSabeKssSN22KyAxURf4rJJ9BpczQW","SecondPass":false});
        $("#select-transaction").change(function(){icoTransaction.GetListTransaction(1)}),$(document).on("click","#btn-submit-buy",function(){$(this).blur(),icoTransaction.Buy()}),$(document).on("click","#buy--ico--now",function(){$(this).blur(),icoTransaction.OpenBuyICO()}), $(document).on("click","#btn-bitcoin",function(){$(this).blur(),icoTransaction.changeBTC()}), $(document).on("click","#btn-ethereum",function(){$(this).blur(),icoTransaction.changeETH()}), $(document).on("click","#total--coin--can",function(){/*$(this).blur(),icoTransaction.buyAll()*/}),$(document).on("keyup",'input[name="4amount--4coin--2ver3"]',function(n){/*var i=$(this),c=i.val();return null==c||0==c.trim().length||isNaN(c)||0>c?(i.val(""),void $('input[name="4amount--4uch--2ver3"]').val("")):void icoTransaction.transferCoin(1)*/}),$(document).on("keyup",'input[name="4amount--4uch--2ver3"]',function(n){var i=$(this),c=i.val();return null==c||0==c.trim().length||isNaN(c)||0>c?(i.val(""),void $('input[name="4amount--4coin--2ver3"]').val("")):void icoTransaction.transferCoin(2)});
        /*var icoSocket=$.connection.uchHub;
        icoSocket.client.buyICOResponse=function(n,i,a,t){
            if(n==client_user.uid()){
                icoTransaction.ICO().SoldCoin=i;
            }
            else{
                var c=Number(parseFloat(100*i/icoTransaction.ICO().TotalCoin).toFixed(2));
                $("#process--ico").css("width",c+"%").attr("aria-valuenow",c).html(c+"%");
                var x ={};
                x.TransactionHash = t;
                x.Amount = a;
                var utcTime = moment(moment()).format('YYYY-MM-DD HH:mm:ss');
                x.DateCreated = utcTime;
                x.UserId = n;
                x.Id ="";
                icoTransaction.transactionList.unshift(x);}},*/
                $(document).on("click",".refresh-new-captcha",function(){$(this);icoTransaction.refreshCaptcha()}),$(document).on("click",".refresh-robot-captcha",function(){$(this);icoTransaction.refreshRobotCaptcha()}),$(document).on("click","#max--coin-label",function(){$('input[name="4amount--4uch--2ver3"]').val(icoTransaction.MaxBuy),icoTransaction.transferCoin(2)});
    });
</script> -->


                </div>
            </div>
        </main>