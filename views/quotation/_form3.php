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
<script>
function CallPrint(strid) {
	var prtContent = document.getElementById(strid);
	var WinPrint = window.open('', '', 'letf=0,top=0,width=400,height=400,toolbar=0,scrollbars=0,status=0');
	WinPrint.document.write(prtContent.innerHTML);
	WinPrint.document.close();
	WinPrint.focus();
	WinPrint.print();
}
</script>

<div class="quotation-form">	

    <h1 style="text-align: center;">QUOTATION</h1>
		
		<div id="identity">			            
            <table class="top" width="100%">
				<tr>
					<td>
						<table class="info">
							<tr>
								<td><font style="font-size:18px;font-family:verdana;color:#3c3c3c;">To</font></td>					
							</tr>
							<tr>
								<td><input id="customer-list" type="text" class="form-control customer-list" name="customer-list" value=<?php echo $thisCustomer->customer_name;?> readonly></td>
							</tr>
							<tr>
								<td><textarea id="address" name="customer_address" class="form-control" readonly><?php echo $thisCustomer->customer_add1; ?></textarea></td>					
							</tr>
							<tr>
								<td><input id="postcode" type="text" class="form-control poscode" name="poscode" value=<?php echo $thisCustomer->customer_poscode;?> readonly></td>
							</tr>
						</table>            
					</td>
					<td>
						<table id="meta">
							<tr>
								<td class="meta-head">Quotation #</td>
								<td><textarea class="form-control" name="quotation_no" readonly><?php echo $model->quotation_no; ?></textarea></td>
								<td hidden><textarea class="form-control" name="quotation_id"><?php echo $model->quotation_id; ?></textarea></td>
							</tr>
							<tr>
								<td class="meta-head">Date</td>
								<td><?= DatePicker::widget([
										'model' => $model,						
										'attribute' => 'quotation_date',
										'template' => '{addon}{input}',							
											'clientOptions' => [								
												'autoclose' => true,
												'format' => 'yyyy-mm-dd',
											],
											'options' => ['class' => 'form-date', 'name' => 'quotation_date'],
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
								<td><input id="tel" type="text" class="form-control" name="tel" value=<?php echo $thisCustomer->customer_tel;?> readonly></td>
							</tr>								
						</table>
					</td>
					<td>
						<table class="info">								
							<tr>
								<td><span>FAX </span></td>
								<td><span> :</span></td>
								<td><input id="fax" type="text" class="form-control" name="fax" value=<?php echo $thisCustomer->customer_fax;?> readonly></td>
							</tr>
						</table>
					</td>
					<td>
						<table class="info">
							<tr>
								<td><span>EMAIL </span></td>
								<td><span> :</span></td>
								<td><input id="email" type="text" class="form-control" name="email" value=<?php echo $thisCustomer->customer_email;?> readonly></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>        		
		</div>
			
		<table id="items">		
		  <tr>
		      <th width="40%">Description</th>
			  <th width="5%">Tax Code</th>
			  <th width="5%">Tax Rate</th>
			  <th width="5%">Quantity</th>			  
			  <th width="5%">Units</th>
		      <th width="10%">@ Price</th>
			  <th width="15%">Total Excl. GST</th>
		      <th width="10%">GST</th>
		      <th width="15%">Total Incl. GST</th>
		  </tr>
		  <?php foreach($quotationDetails as $quotationDetail){ ?>
			  <tr class="item-row">
				  <td class="description"><span><?php echo $quotationDetail->quotationdetail_productname?></span></td>
				  <td class="code" name="code[]"><span><?php echo $quotationDetail->quotationdetail_tax_code; ?></span></td>
				  <td class="rate" name="rate[]"><span><?php echo $quotationDetail->quotationdetail_tax_rate; ?>%</span></td>
				  <td><span><?php echo $quotationDetail->quotationdetail_unit; ?></span></td>				  
				  <td><span><?php echo $quotationDetail->quotationdetail_unitname; ?></span></td>
				  <td><span><?php echo $quotationDetail->quotationdetail_product_cost; ?></span></td>
				  <td class="price">$<?php echo $quotationDetail->quotationdetail_price; ?></td>
				  <td class="gst">$<?php echo $quotationDetail->quotationdetail_tax_amount; ?></td>
				  <td class="price_gst">$<?php echo $quotationDetail->quotationdetail_total_amount; ?></td>				  
			  </tr>
		  
		  <?php } ?>
		  		  
		  <tr>
		      <td colspan="2" class="blank"></td>
		      <td colspan="5" class="total-line">Total Amount</td>		      
			  <td class="total-price"><div id="total">$<?php echo $model->quotation_parts_total; ?></div></td>
			  <td class="total-gst"><div id="gsttotal">$<?php echo $model->quotation_gst_payable; ?></div></td>
			  <td class="total-price_gst"><div id="gstpricetotal">$<?php echo $model->quotation_total_amount; ?></div></td>			  
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
						<strong><i>Quotation</i></strong>
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
						<td valign="top"><strong>Quotation No</strong></td>
						<td valign="top"><?php echo $model->quotation_no ?></td>
					</tr>
					<tr>
						<td valign="top"><strong>Date</strong></td>
						<td valign="top"><?php echo $model->quotation_date ?></td>
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
		  foreach($quotationDetails as $quotationDetail){ 
		  ?>
		  <tr>
			<td valign="top" style="border-bottom:0px; border-top:0px;"><?php echo $quotationDetail->quotationdetail_productname; ?></td>
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $quotationDetail->quotationdetail_tax_code; ?></td>
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $quotationDetail->quotationdetail_tax_rate; ?>%</td>
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $quotationDetail->quotationdetail_unit; ?></td>   
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $quotationDetail->quotationdetail_unitname; ?></td>
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $quotationDetail->quotationdetail_product_cost; ?></td>
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $quotationDetail->quotationdetail_price; ?></td>
			<td valign="top" style="border-bottom:0px; border-top:0px; border-style: solid dashed;"><?php echo $quotationDetail->quotationdetail_tax_amount; ?></td>
			<td valign="top" style="border-bottom:0px; border-top:0px;"><?php echo $quotationDetail->quotationdetail_total_amount; ?></td>	
		  </tr>
		  <?php			
		  } 
		  ?>
		  <tr>
		    <td valign="top" colspan="5"><strong>Terms & Condition</strong><pre><?php echo $company->company_quotationText ?></pre></td>
		    <td valign="top"><strong>Total Amount</strong></td>		      
			<td valign="top"><?php echo $model->quotation_parts_total; ?></td>
			<td valign="top"><?php echo $model->quotation_gst_payable; ?></td>
			<td valign="top"><?php echo $model->quotation_total_amount; ?></td>
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
</div>
















