<?php 
extract($_POST);
if(isset($save))
{

mysqli_query($conn,"update loan set group_id='$group',loan_come_from='$source',loan_amount='$amount',payment_schedule='$payment',due_date='$due'");
		
$err="<font color='blue'>Loan records updated</font>";
		
}

$sql=mysqli_query($conn,"select * from loan where loan_id='".$_GET['loan_id']."'");
$res=mysqli_fetch_array($sql);
//print_r($res);
?>
<h2 align="center">Update Allotted Loan Records</h2>
<form method="post">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Group</div>
		<div class="col-sm-5">
		<select name="group" class="form-control" required>
			<option value="">---Select Group---</option>
			<?php 
$q1=mysqli_query($conn,"select * from groups");
while($r1=mysqli_fetch_assoc($q1))
{
?>
<option >
<?php echo $r1['group_name']; ?></option>
<?php 
}
			?>
		</select>
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Loan Source</div>
		<div class="col-sm-5">
		<select name="source" class="form-control" required>
			<option value="">---Select Loan Source---</option>
			<option >Government</option>
			<option >Council</option>
		</select>
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Loan Amount</div>
		<div class="col-sm-5">
		<input type="number" value="<?php echo $res['loan_amount']; ?>" name="amount" class="form-control" required/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Loan Intereset</div>
		<div class="col-sm-5">
		<input type="text"  name="intereset" value="10%" readonly="true" class="form-control" required/></div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Payment Schedule</div>
		<div class="col-sm-5">
		<input type="date" value="<?php echo $res['payment_schedule']; ?>" name="payment" class="form-control"  required/>
	
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Payment Due Date</div>
		<div class="col-sm-5">
		<input type="date" value="<?php echo $res['due_date']; ?>" name="due" class="form-control" required/>
	
		</div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		
		
<input type="submit" value="Allowt New Loan" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-danger"/>
		</div>
	</div>
</form>	