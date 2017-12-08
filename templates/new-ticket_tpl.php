<main class="main--body--content">
            <div class="main--body--container">
                <div class="container-fluid">
                    <div class="div-height-80"></div>
                    


<style>
    .div-add-ticket-content {
        max-width: 1000px;
        margin: 0 auto;
        margin-top: 30px;
        padding: 15px;
        background-color: #fff;
    }

    .div-error {
        font-size: 13px;
        color: #dd0000;
        margin-top: 5px;
        display: none;
    }

    .add-ticket-field {
        margin-bottom: 30px;
    }

    textarea#txt-ticket-content {
        resize: none;
        height: 180px;
    }

    .add-ticket-control {
        text-align: center;
        margin-bottom: 30px;
    }

    button#btn-add-ticket {
        border-color: #f8b13d;
        background: #f8b13d;
        color: #fff;
        width: 140px;
        border-radius: 20px;
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
	.send{
		padding:7px 18px;
		border-radius:5px;
		border:none;
		background:#FF915B;
		color:#ffffff;
	}
	.send:hover{
		cursor:pointer;		
		background:#0C6;		
	}
</style>


<script language="javascript" src="aworld/media/scripts/my_script.js"></script>
<script language="javascript">
function kiemtra(){	
	
	if(isEmpty(document.getElementById('txt-ticket-title'), "Please enter title.")){
		document.getElementById('txt-ticket-title').focus();
		return false;
	}
	if(isEmpty(document.getElementById('txt-ticket-content'), "Please enter content.")){
		document.getElementById('txt-ticket-content').focus();
		return false;
	}
	
			
	document.frmTM.submit();
}
</script>



<div class="text-center">
    <h2 class="h2-title" style="color:#3CF; font-weight:400; font-size:25px">
        Add Ticket
    </h2>
</div>
<div class="div-add-ticket-content">

<form name="frmTM" id="frmTM" method="post" action="supports.html" enctype="multipart/form-data">          
               
            
    <div class="add-ticket-field">       
        <label>
            Title
        </label>
        <input type="text" class="form-control" id="txt-ticket-title"  name="tieude" placeholder="Title">
        <div class="div-error" id="div-title-error">
            Please enter ticket title
        </div>
    </div>
    
    <!--
    
    <div class="add-ticket-field">
        <label>
            Type
        </label>
        <select class="form-control" id="slt-ticket-category">
            <option value="">...</option>
            <option value="Deposits">Deposit Issue</option>
            <option value="Widthdrawls">Withdrawal Issue</option>
        </select>
        <div class="div-error" id="div-category-error">
            Please select category
        </div>
    </div>
    <div class="add-ticket-field" name="div-deposit-withdraw" style="display:none">
        <label>
            Coin
        </label>
        <select class="form-control" id="slt-coin">
            <option value="">...</option>
            <option value="BTC">BTC</option>
            <option value="ETH">ETH</option>
        </select>
        <div class="div-error" id="div-coin-error">
            Please select coin
        </div>
    </div>
    <div class="add-ticket-field" name="div-deposit-withdraw" style="display:none">
        <label id="label-tx-wl">

        </label>
        <input type="text" class="form-control" id="txt-tx-wallet" placeholder="TxId">
        <div class="div-error" id="div-tx-wallet-error">
            
        </div>
    </div>
-->
    <div class="add-ticket-field">
        <label>
            Content
        </label>
        <textarea class="form-control" id="txt-ticket-content" name="noidung" maxlength="1000" placeholder="Content"></textarea>
        <div class="div-error" id="div-content-error">
            Please enter content
        </div>
    </div>
    <div class="add-ticket-control">
    
        <input type="button"  class="send" value="SEND" onClick="kiemtra();"  />
        
    </div>
    
     </form>
</div>

<!--<script>
    addTicketAction = {
        addTicket: '/Support/AddNewTicket',
        indexTicket: '/Support/Ticket'
    };
</script>
<script src="/Scripts/client/add-ticket.js?v=1"></script>-->
                </div>
            </div>
        </main>