<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>

<link rel='stylesheet' type='text/css' href='css/style.css' />
<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
<script type='text/javascript' src='js/example.js'></script>
<div class="quotation-form">


    <?php $form = ActiveForm::begin([
		'fieldConfig' => [
			'template' => '{input}',			
		],
	]); ?>
	
	<?php $listData=ArrayHelper::map($product,'product_id','product_name');
		$productList = json_encode($listData);
	?>
	<?php $listData2=ArrayHelper::map($service,'product_id','product_name');
		$serviceList = json_encode($listData2);
	?>
	<?php $listData3=ArrayHelper::map($customer,'customer_id','customer_name');
		$customerList = json_encode($listData3);
	?>
	
<script>
function CallPrint(strid) {
	var prtContent = document.getElementById(strid);
	var WinPrint = window.open('', '', 'letf=0,top=0,width=400,height=400,toolbar=0,scrollbars=0,status=0');
	WinPrint.document.write(prtContent.innerHTML);
	WinPrint.document.close();
	WinPrint.focus();
	WinPrint.print();
}
		
function print_today() {
  // ***********************************************
  // AUTHOR: WWW.CGISCRIPT.NET, LLC
  // URL: http://www.cgiscript.net
  // Use the script, just leave this message intact.
  // Download your FREE CGI/Perl Scripts today!
  // ( http://www.cgiscript.net/scripts.htm )
  // ***********************************************
  var now = new Date();
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
  function fourdigits(number) {
    return (number < 1000) ? number + 1900 : number;
  }
  var today =  months[now.getMonth()] + " " + date + ", " + (fourdigits(now.getYear()));
  return today;
}

// from http://www.mediacollege.com/internet/javascript/number/round.html
function roundNumber(number,decimals) {
  var newString;// The new rounded number
  decimals = Number(decimals);
  if (decimals < 1) {
    newString = (Math.round(number)).toString();
  } else {
    var numString = number.toString();
    if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
      numString += ".";// give it one at the end
    }
    var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
    var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
    var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
    if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
      if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
          if (d1 != ".") {
            cutoff -= 1;
            d1 = Number(numString.substring(cutoff,cutoff+1));
          } else {
            cutoff -= 1;
          }
        }
      }
      d1 += 1;
    } 
    if (d1 == 10) {
      numString = numString.substring(0, numString.lastIndexOf("."));
      var roundedNum = Number(numString) + 1;
      newString = roundedNum.toString() + '.';
    } else {
      newString = numString.substring(0,cutoff) + d1.toString();
    }
  }
  if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
    newString += ".";
  }
  var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
  for(var i=0;i<decimals-decs;i++) newString += "0";
  //var newNumber = Number(newString);// make it a number if you like
  return newString; // Output the result to the form field (change for your purposes)
}

function update_price() {
  var row = $(this).parents('.item-row');
  var price = row.find('.cost').val().replace("$","") * row.find('.qty').val();
  var rate = row.find('.hidden_tax_rate').html();
  price = roundNumber(price,2);
  if(rate == '6' || rate == 6){
	var gst = (price * rate)/100;
  }else if(rate == '0' || rate == '' || rate == 0){
	var gst = 0;
  }
  gst = roundNumber(gst,2);
  var price_gst = parseFloat(price)+parseFloat(gst);
  price_gst = roundNumber(price_gst,2);
  isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html("$"+price);  
  isNaN(gst) ? row.find('.gst').html("N/A") : row.find('.gst').html("$"+gst); 
  isNaN(price_gst) ? row.find('.price_gst').html("N/A") : row.find('.price_gst').html("$"+price_gst);
  
  isNaN(price) ? row.find('.hidden_price').html("N/A") : row.find('.hidden_price').html(price);  
  isNaN(gst) ? row.find('.hidden_gst').html("N/A") : row.find('.hidden_gst').html(gst); 
  isNaN(price_gst) ? row.find('.hidden_price_gst').html("N/A") : row.find('.hidden_price_gst').html(price_gst);
  
  update_total();
}

function update_total() {
  var total = 0;
  var gsttotal = 0;
  var gstpricetotal = 0;
  
  $('.price').each(function(i){
    price = $(this).html().replace("$","");
    if (!isNaN(price)) total += Number(price);
  });
  
  $('.gst').each(function(i){
    gst = $(this).html().replace("$","");
    if (!isNaN(gst)) gsttotal += Number(gst);
  });
  
  $('.price_gst').each(function(i){
    price_gst = $(this).html().replace("$","");
    if (!isNaN(price_gst)) gstpricetotal += Number(price_gst);
  });

  total = roundNumber(total,2);
  gsttotal = roundNumber(gsttotal,2);
  gstpricetotal = roundNumber(gstpricetotal,2);

  $('#total').html("$"+total);
  $('#gsttotal').html("$"+gsttotal);  
  $('#gstpricetotal').html("$"+gstpricetotal);
  $('#hidden_total').html(total);
  $('#hidden_gsttotal').html(gsttotal);  
  $('#hidden_gstpricetotal').html(gstpricetotal);   
  
}



function delete_row() {
  $(this).parents('.item-row').remove();
    update_total();
    if ($(".delete").length < 2) $(".delete").hide();
}

function bind() {
  $(".cost").blur(update_price);
  $(".qty").blur(update_price);  
  $(".delete").click(delete_row);  
}

$(document).ready(function() {

  var productList = <?php echo $productList; ?>; 
  var serviceList = <?php echo $serviceList; ?>; 
  var dropdownlist = "";
  var list = "";
  if($(".productType").val() == "p"){
	list = productList;
	dropdownlist += "<option value>--Select a product--</option>";
  }else if($(".productType").val() == "s"){
	list = serviceList;
	dropdownlist += "<option value>--Select a service--</option>";
  }
  $.each( list, function( key, value ) {
	dropdownlist += "<option value="+key+">"+value+"</option>";
  });

  $('input').click(function(){
    $(this).select();
  });  
   
  $("#addrow").click(function(){
    $(".item-row:last").after('<tr class="item-row"><td class="item-name"><div class="delete-wpr"><a class="delete" href="javascript:;" title="Remove row">X</a><select id="" class="form-control productType" name="productType"><option value="p">Product</option><option value="s">Service</option></select></div></td><td class="description"><select class="form-control product-name" name="description[]">'+dropdownlist+'</select></td><td class="code" name="code[]"><span></span></td><td class="rate" name="rate[]"><span></span></td><td><textarea class="qty" placeholder="0" name="qty[]"></textarea></td><td><textarea class="unit" placeholder="pcs" name="unit[]"></textarea></td><td><textarea class="cost" placeholder="0.00" name="cost[]"></textarea></td><td class="price"><span>$0.00</span></td><td class="gst"><span>$0.00</span></td><td class="price_gst"><span>$0.00</span></td><td hidden><textarea name="hidden_product_name[]" class="hidden_product_name"></textarea></td><td hidden><textarea name="hidden_tax_code[]" class="hidden_tax_code"></textarea></td><td hidden><textarea name="hidden_tax_rate[]" class="hidden_tax_rate"></textarea></td><td hidden><textarea name="hidden_price[]" class="hidden_price"></textarea></td><td hidden><textarea name="hidden_gst[]" class="hidden_gst"></textarea></td><td hidden><textarea name="hidden_price_gst[]" class="hidden_price_gst"></textarea></td><td hidden><textarea name="hidden_id[]" class="hidden_id"></textarea></td><td hidden><textarea name="hidden_poid[]" class="hidden_poid"></textarea></td>');
    if ($(".delete").length > 0) $(".delete").show();
    bind();
  });
  
  bind();
  
  $(".delete").live('click',function(){
    $(this).parents('.item-row').remove();
    update_total();
    if ($(".delete").length < 2) $(".delete").hide();
  });
  
  $("#cancel-logo").click(function(){
    $("#logo").removeClass('edit');
  });
  $("#delete-logo").click(function(){
    $("#logo").remove();
  });
  $("#change-logo").click(function(){
    $("#logo").addClass('edit');
    $("#imageloc").val($("#image").attr('src'));
    $("#image").select();
  });
  $("#save-logo").click(function(){
    $("#image").attr('src',$("#imageloc").val());
    $("#logo").removeClass('edit');
  });
  
  $("#date").val(print_today());  
});
</script>
    <h1 style="text-align: center;">PURCHASE ORDER</h1>
		
		<div id="identity">			            
            <table class="top" width="100%">
				<tr>
					<td>
						<table class="info">
							<tr>
								<td><font style="font-size:18px;font-family:verdana;color:#3c3c3c;">To</font></td>					
							</tr>
							<tr>
								<td><?php echo Html::dropDownList('customer-list', $thisCustomer->customer_id, $listData3,['id' => 'customer', 'class' => 'form-control','prompt' => '--Select a customer--']);?></td>					
							</tr>
							<tr>
								<td><textarea id="address" name="customer_address" class="form-control"><?php echo $thisCustomer->customer_add1; ?></textarea></td>					
							</tr>
							<tr>
								<td><input id="postcode" type="text" class="form-control poscode" name="poscode" value=<?php echo $thisCustomer->customer_poscode;?>></td>
							</tr>
						</table>            
					</td>
					<td>
						<table id="meta">
							<tr>
								<td class="meta-head">Purchase Order #</td>
								<td><textarea class="form-control" name="po_no"><?php echo $model->purchaseorder_no; ?></textarea></td>
								<td hidden><textarea class="form-control" name="po_id"><?php echo $model->purchaseorder_id; ?></textarea></td>
							</tr>
							<tr>
								<td class="meta-head">Date</td>
								<td><?= DatePicker::widget([
										'model' => $model,						
										'attribute' => 'purchaseorder_date',
										'template' => '{addon}{input}',							
											'clientOptions' => [								
												'autoclose' => true,
												'format' => 'yyyy-mm-dd',
											],
											'options' => ['class' => 'form-date', 'name' => 'po_date'],
									]);?>
								</td>
							</tr>
							<tr>
								<td class="meta-head">Amount Due</td>
								<td><div class="due">$0.00</div></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>		
		</div>
		
		<div style="clear:both"></br></div>
		
		<div id="customer">
			<table class="info" width="100%">
				<tr>
					<td>
						<table class="info">
							<tr>
								<td><span>TEL </span></td>
								<td><span> :</span></td>
								<td><input id="tel" type="text" class="form-control" name="tel" value=<?php echo $thisCustomer->customer_tel;?>></td>
							</tr>								
						</table>
					</td>
					<td>
						<table class="info">								
							<tr>
								<td><span>FAX </span></td>
								<td><span> :</span></td>
								<td><input id="fax" type="text" class="form-control" name="fax" value=<?php echo $thisCustomer->customer_fax;?>></td>
							</tr>
						</table>
					</td>
					<td>
						<table class="info">
							<tr>
								<td><span>EMAIL </span></td>
								<td><span> :</span></td>
								<td><input id="email" type="text" class="form-control" name="email" value=<?php echo $thisCustomer->customer_email;?>></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>        		
		</div>
			
		<table id="items">		
		  <tr>
		      <th width="10%">Item</th>
		      <th width="25%">Description</th>
			  <th width="5%">Tax Code</th>
			  <th width="5%">Tax Rate</th>
			  <th width="5%">Quantity</th>			  
			  <th width="5%">Units</th>
		      <th width="10%">@ Price</th>
			  <th width="10%">Total Excl. GST</th>
		      <th width="10%">GST</th>
		      <th width="15%">Total Incl. GST</th>
		  </tr>
		  <?php foreach($poDetails as $poDetail){ ?>
			  <tr class="item-row">
				  <td class="item-name">
						<div class="delete-wpr">
							<a class="delete" href="javascript:;" title="Remove row">X</a>
							<select id="" class="form-control productType" name="productType[]">
								<option value="p">Product</option>
								<option value="s">Service</option>
							</select>
						</div>
				  </td>
				  <td class="description"><?php echo Html::dropDownList('description[]', $poDetail->purchaseorderdetail_purchaseorderid, $listData,['class' => 'form-control product-name','prompt' => '--Select a product--']);?></td>
				  <td class="code" name="code[]"><span><?php echo $poDetail->purchaseorderdetail_tax_code; ?></span></td>
				  <td class="rate" name="rate[]"><span><?php echo $poDetail->purchaseorderdetail_tax_rate; ?>%</span></td>
				  <td><textarea class="qty" placeholder="0" name="qty[]"><?php echo $poDetail->purchaseorderdetail_unit; ?></textarea></td>				  
				  <td><textarea class="unit" placeholder="pcs" name="unit[]"><?php echo $poDetail->purchaseorderdetail_unitname; ?></textarea></td>
				  <td><textarea class="cost" placeholder="0.00" name="cost[]"><?php echo $poDetail->purchaseorderdetail_product_cost; ?></textarea></td>
				  <td class="price">$<?php echo $poDetail->purchaseorderdetail_price; ?></td>
				  <td class="gst">$<?php echo $poDetail->purchaseorderdetail_tax_amount; ?></td>
				  <td class="price_gst">$<?php echo $poDetail->purchaseorderdetail_total_amount; ?></td>
				  <td hidden><textarea name="hidden_product_name[]" class="hidden_product_name"><?php echo $poDetail->purchaseorderdetail_productname; ?></textarea></td>
				  <td hidden><textarea name="hidden_tax_code[]" class="hidden_tax_code"><?php echo $poDetail->purchaseorderdetail_tax_code; ?></textarea></td>
				  <td hidden><textarea name="hidden_tax_rate[]" class="hidden_tax_rate"><?php echo $poDetail->purchaseorderdetail_tax_rate; ?></textarea></td>			  
				  <td hidden><textarea name="hidden_price[]" class="hidden_price"><?php echo $poDetail->purchaseorderdetail_price; ?></textarea></td>
				  <td hidden><textarea name="hidden_gst[]" class="hidden_gst"><?php echo $poDetail->purchaseorderdetail_tax_amount; ?></textarea></td>
				  <td hidden><textarea name="hidden_price_gst[]" class="hidden_price_gst"><?php echo $poDetail->purchaseorderdetail_total_amount; ?></textarea></td>
				  <td hidden><textarea name="hidden_id[]" class="hidden_id"><?php echo $poDetail->purchaseorderdetail_id; ?></textarea></td>
				  <td hidden><textarea name="hidden_poid[]" class="hidden_poid"><?php echo $poDetail->purchaseorderdetail_purchaseorderid; ?></textarea></td>
			  </tr>
		  
		  <?php } ?>
		  
		  <tr id="hiderow">
		    <td colspan="9"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"></td>
		      <td colspan="5" class="total-line">Total Amount</td>		      
			  <td class="total-price"><div id="total">$<?php echo $model->purchaseorder_parts_total; ?></div></td>
			  <td class="total-gst"><div id="gsttotal">$<?php echo $model->purchaseorder_gst_payable; ?></div></td>
			  <td class="total-price_gst"><div id="gstpricetotal">$<?php echo $model->purchaseorder_total_amount; ?></div></td>
			  <td hidden><textarea name="hidden_total" id="hidden_total"></textarea></td>
			  <td hidden><textarea name="hidden_gsttotal" id="hidden_gsttotal"></textarea></td>
			  <td hidden><textarea name="hidden_gstpricetotal" id="hidden_gstpricetotal"></textarea></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"></td>			  
		      <td colspan="7" class="total-line"></td>
		      <td class="total-value"></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"></td>			  
		      <td colspan="7" class="total-line"></td>
		      <td class="total-value"></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"></td>			  
		      <td colspan="7" class="total-line "></td>
		      <td class="total-value "><div class="due"></div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	<a href="#" onclick="javascript:CallPrint('print-all1')"><span>print</span></a>
	<div class="visible-print" id="print-all1">
		<table width="100%">
			<tr>
				<td width="40%">
					<p>
						<strong><?php echo $company->company_name ?></strong>
					</p>
					<p>
						<pre><?php echo $company->company_add1 ?></pre>
					</p>
				</td>
				<td width="30%">
					<p> </p>
				</td>
				<td width="30%">
					<p style="text-align: right;">
						<strong><i>Purchase Order</i></strong>
					</p>
					<p>
						Company No : <?php echo $company->company_number ?></br>
						GST ID No : <?php echo $company->company_GSTno ?></br>
					</p>
				</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td>
					TEL : <?php echo $company->company_tel1 ?> 
				</td>
				<td>
					FAX : <?php echo $company->company_fax ?>   
				</td>
				<td>
					EMAIL : <?php echo $company->company_email ?>
				</td>
			</tr>
		</table>
<p style="border-bottom: solid 1px;"></p>
		<table cellpadding="5" cellspacing="5" width="100%" border="1" style="border-collapse: collapse;font-size:11px;border: solid 1px #000000;font-family: Arial, Helvetica, sans-serif;">
		  <tr>
			<td valign="top" colspan="5" style="padding-top: 10px;font-size:14px;">
				<table cellpadding="5" cellspacing="5" width="100%" style="font-size:12px;font-family: Arial, Helvetica, sans-serif;">
					<tr>
						<td valign="top"><strong>Att</strong></td>
						<td valign="top" colspan="5"><?php echo $thisCustomer->customer_attention ?></td>
					</tr>
					<tr>
						<td valign="top"><strong>Name</strong></td>
						<td valign="top" colspan="5"><?php echo $thisCustomer->customer_name ?></td>
					</tr>
					<tr>
						<td valign="top"><strong>Address</strong></td>
						<td valign="top" colspan="3"><pre><?php echo $thisCustomer->customer_add1 ?></pre></td>
						<td valign="top"><strong>Tel</strong></td>
						<td valign="top"><?php echo $thisCustomer->customer_tel ?></td>
					</tr>					
				</table>
			</td>
			<td valign="top" colspan="4" style="padding-top: 10px;font-size:14px;">
				<table cellpadding="5" cellspacing="5" width="100%" style="font-size:12px;font-family: Arial, Helvetica, sans-serif;">
					<tr>
						<td valign="top"><strong>Purchase Order No</strong></td>
						<td valign="top"><?php echo $model->purchaseorder_no ?></td>
					</tr>
					<tr>
						<td valign="top"><strong>Date</strong></td>
						<td valign="top"><?php echo $model->purchaseorder_date ?></td>
					</tr>									
				</table>
			</td>
		  </tr>
		  <tr>
			<td valign="top" colspan="9" style="border-bottom: 0px;"><strong>Remarks : </strong></td>			
		  </tr>
		  <tr>
			<td valign="top" colspan="9" style="border-top: 0px; height: 50px">
				<pre></pre>
			</td>			
		  </tr>	
		  <tr>
			<td valign="top" width="40%"><strong>Description</strong></td>
			<td valign="top" width="5%"><strong>Tax Code</strong></td>
			<td valign="top" width="5%"><strong>Tax Rate</strong></td>
			<td valign="top" width="5%"><strong>Quantity</strong></td>   
			<td valign="top" width="5%"><strong>Units</strong></td>
			<td valign="top" width="10%"><strong>Price (RM)</strong></td>
			<td valign="top" width="10%"><strong>Total (RM)</strong></td>
			<td valign="top" width="10%"><strong>GST (RM)</strong></td>
			<td valign="top" width="10%"><strong>Total Incl. GST (RM)</strong></td>			
		  </tr>
		  <?php 
		  foreach($poDetails as $poDetail){ 
		  ?>
		  <tr>
			<td valign="top" style="border-bottom:0px; border-top:0px;"><?php echo $poDetail->purchaseorderdetail_productname; ?></td>
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $poDetail->purchaseorderdetail_tax_code; ?></td>
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $poDetail->purchaseorderdetail_tax_rate; ?>%</td>
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $poDetail->purchaseorderdetail_unit; ?></td>   
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $poDetail->purchaseorderdetail_unitname; ?></td>
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $poDetail->purchaseorderdetail_product_cost; ?></td>
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $poDetail->purchaseorderdetail_price; ?></td>
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $poDetail->purchaseorderdetail_tax_amount; ?></td>
			<td valign="top" style="border-bottom:0px; border-top:0px;"><?php echo $poDetail->purchaseorderdetail_total_amount; ?></td>	
		  </tr>
		  <?php			
		  } 
		  ?>
		  <tr>
		    <td valign="top" colspan="5"><strong>Terms & Condition</strong><pre><?php echo $company->company_purchaseOrderText ?></pre></td>
		    <td valign="top"><strong>Total Amount</strong></td>		      
			<td valign="top"><?php echo $model->purchaseorder_parts_total; ?></td>
			<td valign="top"><?php echo $model->purchaseorder_gst_payable; ?></td>
			<td valign="top"><?php echo $model->purchaseorder_total_amount; ?></td>
		  </tr>
		</table>
		<table cellpadding="5" cellspacing="5" width="100%" style="border-collapse: collapse;font-size:13px;font-family: Arial, Helvetica, sans-serif;">
			<tr>
				<td width="70%">
				
				</td>
				<td width="30%">
					<p style="text-align:center;">
						For <?php echo $company->company_name ?>
					</p>
					<pre>
					
					</pre>
					<p>
						<table width="100%" style="border-top: 0px; border-left: 0px; border-right: 0px; border-bottom: 1px; border-style: dashed;">
							<tr>
								<td></td>
							</tr>
						</table>
					</p>
					<p style="text-align:center;">
						Authorised Signature
					</p>
				</td>
			</tr>
		</table>
	</div>
	
	<?php
	$script = <<< JS
	$('#customer').change(function(){
		var customerID = $(this).val();
		$.get('index.php?r=quotation/get-customer-detail', {customerID : customerID}, function(data){
			var data = $.parseJSON(data);
			$('#address').html(data.customer_add1);
			$('#postcode').attr('value', data.customer_poscode);
			$('#tel').attr('value', data.customer_tel);
			$('#fax').attr('value', data.customer_fax);
			$('#email').attr('value', data.customer_email);
		});
	});
	
	function update_list() {
	  var productList = $productList; 
	  var serviceList = $serviceList;; 
	  var dropdownlist = "";
	  var list = "";
	  if($(this).val() == "p"){
		  list = productList;
		  dropdownlist += "<option value>--Select a product--</option>";
		  $.each( list, function( key, value ) {
			dropdownlist += "<option value="+key+">"+value+"</option>";
		  });
		  var row = $(this).parents('.item-row');
		  row.find('.description').html('<select class="form-control product-name" name="description[]">'+dropdownlist+'</select>');
		  bind();
		
	  }else if($(this).val() == "s"){
		  list = serviceList;
		  dropdownlist += "<option value>--Select a service--</option>";
		  $.each( list, function( key, value ) {
			dropdownlist += "<option value="+key+">"+value+"</option>";
		  });
		  var row = $(this).parents('.item-row');
		  row.find('.description').html('<select class="form-control product-name" name="description[]">'+dropdownlist+'</select>');
		  bind();
	  }
	  
	}
	
	bind();
	
	function bind() {
		$(".productType").change(update_list);
		$(".product-name").change(update_code);
		$(".product-name").blur(update_rate);
	}
	
	function update_code() {
	    var row = $(this).parents('.item-row');
		var productID = $(this).val();
		$.get('index.php?r=quotation/get-product-detail', {productID : productID}, function(data){
			var data = $.parseJSON(data);
			row.find('.code').html(data.product_supply_tax);
			row.find('.hidden_tax_code').html(data.product_supply_tax);	
			row.find('.cost').html(data.product_sellingPice);
			row.find('.hidden_product_name').html(data.product_name);
		});				
	}
	
	function update_rate(){
		var row = $(this).parents('.item-row');		
		var tax_code = row.find('.code').html();
		$.get('index.php?r=quotation/get-gst-rate', {tax_code : tax_code}, function(data){
			var data = $.parseJSON(data);
			row.find('.rate').html(data.tax_rate+'%');
			row.find('.hidden_tax_rate').html(data.tax_rate);
		});
	}

	$("#addrow").click(function(){
		bind();
	});
		
JS;
	$this->registerJS($script);
	
	?>

</div>
















