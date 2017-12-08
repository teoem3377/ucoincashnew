

<main class="main--body--content">
            <div class="main--body--container">
                <div class="container-fluid">
                    <div class="div-height-80"></div>
                    


<!-- 
<link href="custome/css/ico-index-page.css?v=1" rel="stylesheet">
 -->
<div class="home-controller">
    <div class="row">
        <div class="">
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="div-item-ico">
                    <span>Total BBC Token</span><b class="total-coin-b moneyFormat"><?=number_format(2000000,0, '.', ',')?></b>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="div-item-ico">
                    <span>Sold BBC Token</span><b class="sold-coin-b moneyFormat"><?=number_format(get_bbcdaban(),0, '.', ',')?></b>
                </div>
            </div>
        </div>
    </div>
    <div class="row div-margin-top">
        <div class="col-md-4 col-sm-12 col-xs-12" id="div-time-ddicmain--body--container">
            <div class="div-time-icmain--body--container">


                <div class="block-time-ico text-center" style="">

                        <h4 class="ico-title-time"><img style="width:30px" src="images/time-ico.png"><span id="ico-title-time">ICO END AT: </span></h4>
                        <div id="block_countdown" class="block_time_content">
    <div id="minute_countdown" class="countdown_content">
        <div class="clock"></div>
    </div>
  
</div>
                </div>
                <div class="time-ico-item" id="time--open--ico"></div>
            </div>
            <div class="time-ico-line"></div>
                <div class="div-time-icmain--body--container" id="div-time-icmain--body--container">

                    <div class="block-time-ico text-center" style="">
                            <h4 class="buy-ico-title-time"><img src="images/time-buy-ico.png">BUY ICO TIME: </h4>
                             <div id="block_countdown" class="block_time_content">
    <div id="minute_countdown" class="countdown_content">
        <div class="clock_ico"></div>
    </div>
  
</div>
                                            </div>

                </div>

        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="div-ico-list">
                <div class="div-ico-header">
                    <img src="images/calendar-icon.png"><span>Calendar ICO</span>
                 </div>
                <div class="div-ico-body table-responsive" id="ico--list">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="padding:15px">
                                    <b>Date</b>
                                </th>
                                <th><b>BBC Token</b></th>
                                <th><b>Price (USD)</b></th>
                                <th><b>Status</b></th>
                            </tr>
                        </thead>
                        <tbody data-bind="foreach:ICOList">
                            <tr data-bind="css: trenabled" class="enabled">
                                <td style="padding:15px">
                                    <span data-bind="text: TxtTime">2017-12-13</span>
                                </td>
                                <td>
                                    <span class="total-coin-ico" data-bind="text: Coin">100,000 </span>
                                </td>
                                <td>
                                    <span data-bind="text: Price">0.80</span>
                                </td>
                                <td>
                                    <!-- ko if: Status ==1 --><!-- /ko -->
                                    <!-- ko if: Status ==2 --><!-- /ko -->
                                    <!-- ko if: Status ==3 -->
                                    <div>
                                        <img src="images/waiting.png">
                                        <span class="item-waiting">Waiting</span>
                                        <!--
                                        <img src="images/sold.png">
                                        <span class="item-sold">Sold</span>
                                        -->
                                    </div>
                                    <!-- /ko -->
                                </td>
                            </tr>
                        
                            <tr data-bind="css: trenabled" class="enabled">
                                <td style="padding:15px">
                                    <span data-bind="text: TxtTime">2017-12-16</span>
                                </td>
                                <td>
                                    <span class="total-coin-ico" data-bind="text: Coin">200,000 </span>
                                </td>
                                <td>
                                    <span data-bind="text: Price">0.85</span>
                                </td>
                                <td>
                                    <!-- ko if: Status ==1 --><!-- /ko -->
                                    <!-- ko if: Status ==2 --><!-- /ko -->
                                    <!-- ko if: Status ==3 -->
                                    <div>
                                       <img src="images/waiting.png">
                                        <span class="item-waiting">Waiting</span>
                                    </div>
                                    <!-- /ko -->
                                </td>
                            </tr>
                        
                            <tr data-bind="css: trenabled" class="enabled">
                                <td style="padding:15px">
                                    <span data-bind="text: TxtTime">2017-12-19</span>
                                </td>
                                <td>
                                    <span class="total-coin-ico" data-bind="text: Coin">200,000 </span>
                                </td>
                                <td>
                                    <span data-bind="text: Price">0.90</span>
                                </td>
                                <td>
                                    <!-- ko if: Status ==1 --><!-- /ko -->
                                    <!-- ko if: Status ==2 --><!-- /ko -->
                                    <!-- ko if: Status ==3 -->
                                    <div>
                                        <img src="images/waiting.png">
                                        <span class="item-waiting">Waiting</span>
                                    </div>
                                    <!-- /ko -->
                                </td>
                            </tr>
                        
                            <tr data-bind="css: trenabled" class="enabled">
                                <td style="padding:15px">
                                    <span data-bind="text: TxtTime">2017-12-22</span>
                                </td>
                                <td>
                                    <span class="total-coin-ico" data-bind="text: Coin">500,000 </span>
                                </td>
                                <td>
                                    <span data-bind="text: Price">0.95</span>
                                </td>
                                <td>
                                    <!-- ko if: Status ==1 --><!-- /ko -->
                                    <!-- ko if: Status ==2 --><!-- /ko -->
                                    <!-- ko if: Status ==3 -->
                                    <div>
                                        <img src="images/waiting.png">
                                        <span class="item-waiting">Waiting</span>
                                    </div>
                                    <!-- /ko -->
                                </td>
                            </tr>
                        
                            <tr data-bind="css: trenabled" class="enabled">
                                <td style="padding:15px">
                                    <span data-bind="text: TxtTime">2017-12-24</span>
                                </td>
                                <td>
                                    <span class="total-coin-ico" data-bind="text: Coin">500,000 </span>
                                </td>
                                <td>
                                    <span data-bind="text: Price">1.00</span>
                                </td>
                                <td>
                                    <!-- ko if: Status ==1 --><!-- /ko -->
                                    <!-- ko if: Status ==2 --><!-- /ko -->
                                    <!-- ko if: Status ==3 -->
                                    <div>
                                       <img src="images/waiting.png">
                                        <span class="item-waiting">Waiting</span>
                                    </div>
                                    <!-- /ko -->
                                </td>
                            </tr>
                        
                            <tr data-bind="css: trenabled" class="enabled">
                                <td style="padding:15px">
                                    <span data-bind="text: TxtTime">2017-12-26</span>
                                </td>
                                <td>
                                    <span class="total-coin-ico" data-bind="text: Coin">500,000 </span>
                                </td>
                                <td>
                                    <span data-bind="text: Price">1.10</span>
                                </td>
                                <td>
                                    <!-- ko if: Status ==1 --><!-- /ko -->
                                    <!-- ko if: Status ==2 --><!-- /ko -->
                                    <!-- ko if: Status ==3 -->
                                    <div>
                                       <img src="images/waiting.png">
                                        <span class="item-waiting">Waiting</span>
                                    </div>
                                    <!-- /ko -->
                                </td>
                            </tr>
                        
                           
                        
                            
                          
                        </tbody>
                    </table>
                </div>
                <div class="div-ico-footer text-left">
                    <b>Reminder:</b> There will be a limit to the amount of BBC that each individual is allowed to buy, and limiting the amount of BBC purchased will be informed each ICO time. Therefore you should check your email constantly to update the ICO time so that you wouldn’t lose the chance to acquire the amount of coin that you desire.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    var urlGetList = '/Home/ListICO';
    var x = function () {
        var datalocal = {"Id":9,"TotalCoin":6000000,"SoldCoin":3500000.00000000,"TimeICO":"\/Date(1512226800000)\/","TimeEndICO":"\/Date(1512936000000)\/","TimeBuyICO":"\/Date(1512226800000)\/","OpenBuyTime":2,"OpenICOTime":false,"Price":1.06000,"TimeLeft":164032.12856399998,"TimeEnd":873232.128564,"TimeStart":873232.128564};
        this.y = function () {
            return datalocal;
        };

        this.s = function () {
            return datalocal.TimeICO;
        };

        this.e = function () {
            return datalocal.TimeBuyICO;
        };
        this.f = function(){
            return datalocal.TimeLeft;
        };

        this.g = function(){
            return datalocal.TimeStart;
        };
        this.h = function(){
            return datalocal.TimeEnd;
        };
    };

</script> -->
<!-- <link rel="stylesheet" href="custome/css/flipclock.css">
<script src="/Scripts/client/flipclock.min.js"></script>
<script src="/Scripts/client/home-dashboard.js?v=12"></script>
 -->
                </div>
            </div>
        </main>