<main class="main--body--content">
            <div class="main--body--container">
                <div class="container-fluid">
                    <div class="div-height-80"></div>
                    


<style>
    .div-ticket-content {
        max-width: 1000px;
        margin: 0 auto;
    }
    button.btn.btn-open-ticket {
        border-color: #f8b13d;
        background: #f8b13d;
        color: #fff;
        /*width: 140px;*/
        border-radius: 20px;
    }
    .div-ticket-control {
        padding: 15px;
        background-color: #fff;
        margin-top: 30px;
    }
    .div-list-ticket {
        margin-top: 30px;
        padding: 15px;
        background-color: #fff;
    }
    .div-table-header {
        font-weight: bold;
        padding-bottom: 15px;
        border-bottom: 1px solid #d3d3d3;
    }
    table.table-list-ticket {
        width: 100%;
        margin-top: 15px;
    }

    table.table-list-ticket thead{
        font-weight:bold;
        text-align:left;
    }

        table.table-list-ticket thead td{
            padding:5px;
        }
        
        table.table-list-ticket tbody td {
            padding: 15px 5px;
            vertical-align: top;
        }
    button.btn.btn-confirm-delete {
        border-radius: 20px;
        right: 0px;
        width: 100px;
        border-top-left-radius: 20px !important;
        border-bottom-left-radius: 20px !important;
        line-height: 20px;
        border-color: #37b5a3;
        background: #37b5a3;
        color: #fff;
        border-left: 1px solid #37b5a3 !important;
    }

    button.btn.btn-unconfirm-delete {
        border-radius: 20px;
        right: 0px;
        width: 100px;
        border-top-left-radius: 20px !important;
        border-bottom-left-radius: 20px !important;
        line-height: 20px;
        border-color: #f8b13d;
        background: #f8b13d;
        color: #fff;
        border-left: 1px solid #f8b13d !important;
    }

    .btn-delete-ok {
        border-radius: 20px;
        right: 0px;
        width: 100px;
        border-top-left-radius: 20px !important;
        border-bottom-left-radius: 20px !important;
        line-height: 20px;
        border-color: #f8b13d;
        background: #f8b13d;
        color: #fff;
        border-left: 1px solid #f8b13d !important;
    }

    .lb-opening {
        color: #37b5a3;
    }

    .lb-processing {
        color: #f8b13d;
    }
    i.fa.fa-times {
        color: #dd0000;
    }
    td.td-content{
        width:50%;
    }
</style>

<?php
	$sqlsup= "select * from table_support where user='".$_SESSION['login']['user']."' order by id desc";
	$d->query($sqlsup);		
	$kqsup = $d->result_array();

?>



<div class="text-center">
    <h2 class="h2-title">
        Support and Ticket
    </h2>
    <div class="ticket-explain">
        <p>
            We are always available and accessible to support you at anytime you need us. 
        </p>
        <p>
            In case you need a technical support, it would be more convenient if you could create a ticket.
        </p>
    </div>
</div>
<div class="div-ticket-content">
    <div class="div-ticket-control">
        <a href="Home/new-ticket.html">
            <button class="btn btn-open-ticket"><i class="fa fa-plus"></i> New support ticket</button>
        </a>
    </div>
    <div class="div-list-ticket">
        <div class="table-responsive">
            <div class="div-table-header">
                <i class="fa fa-ticket"></i><span>List Ticket</span>
            </div>
            <table class="table-list-ticket">
                <thead style="background:#0080FF">
                     <tr>
                        <td width="3%">
                            #
                        </td>
                        <td width="20%" style="color:#fff">
                            Title
                        </td>             
                        <td width="34%" style="color:#fff">
                            Content
                        </td>
                        <td width="34%" style="color:#fff">
                            Answer
                        </td>
                        <td width="9%" style="color:#fff">
                           Time
                        </td>
                      
                    </tr>
                </thead>
                
                <?php for($i=0;$i<count($kqsup);$i++){
				
				$mau="#EAFFFF";
				if(($i+1)%2==0) $mau="#fbfbfb";
					
				?>               
                
                 <thead style="background:<?=$mau?>;">
                     <tr>
                        <td width="3%"  style="padding:15px 0; color:#f00; padding-left:4px">
                            <?=$i+1?>
                        </td>
                        <td width="20%" style="font-weight:normal; text-align:justify; padding: 5px 10px">
                            <?=$kqsup[$i]['tieude']?>
                        </td>             
                        <td width="34%" style="font-weight:normal; text-align:justify; padding: 5px 10px">
                            <?=$kqsup[$i]['noidung']?>
                        </td>
                        <td width="34%" style="font-weight:normal; text-align:justify; padding: 5px 10px">
                            <?=$kqsup[$i]['traloi']?>
                        </td>
                        <td width="9%" style="font-weight:normal; text-align:justify">
                           <?=date('d/m/Y',$kqsup[$i]['ngaytao'])?>
						   
                        </td>
                      
                    </tr>
                </thead>
                
                <?php }?> 
                
            </table>
        </div>
    </div>
</div>
<script src="/cdn-cgi/scripts/0e574bed/cloudflare-static/email-decode.min.js"></script><script>
    var ticketAction = {
        deleteTicket:'/Support/DeleteTicket'
    };
</script>
<script src="/Scripts/client/ticket.js"></script>
                </div>
            </div>
        </main>