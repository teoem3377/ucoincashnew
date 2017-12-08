<nav class="navbar navbar-layout-page" style="background:#EAFFF5">
        <div class="container-fluid">
            <div class="navbar-header layout">
                <button type="button" id="button-menu-left-toggle" class="navbar-toggle-layout is-active">
                    <img src="images/menu-ico.png">
                </button>
                <a href="Home/index.html"><img border="0" class="nav-logo-site" src="images/logo.png" alt="BitBankCoin the next generation of advanced solution for global money transaction"></a>
            </div>
            <div class="collapse navbar-collapse" id="navigation-example-2">
                <ul class="nav navbar-nav navbar-right">
                    <li class="li-menu-pc">
                        <b>1 BTC = </b><b id="btc--price"><?=get_giabtc()?><span> USD</span></b>
                    </li>
                    <li class="navbar-right-li-line li-menu-pc">|</li>
                    <li class="li-menu-pc">
                        <b>1 ETH = </b><b id="eth--price"><?=get_giaeth()?><span> USD</span></b>
                    </li>
                    <li class="navbar-right-li-line li-menu-pc">|</li>
                    <li class="li-menu-pc">
                        <b>1 BBC = </b><b id="uch--price"><?=get_giabbc()?><span> USD</span></b>
                    </li>
                        <li class="navbar-right-li-line li-menu-pc">|</li>
                        <li>
                            <b style="font-size:14px; text-transform:uppercase"><?=$_SESSION['login']['user']?></b>
                        </li>
                        <li class="navbar-right-li-line">|</li>
                        <li>
                            <a href="sign-out.html" class="btn-signout" style="padding:0px;">
                                <span style="color:#202020"><i class="fa fa-sign-out"></i> Sign out</span>
                            </a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>