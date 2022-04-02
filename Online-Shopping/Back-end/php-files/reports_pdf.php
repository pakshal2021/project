
<?php 

//report_id = 3 and 4 only working other just copy past not.

include_once('FileToPdf/mpdf60/mpdf.php'); 

  
							 include "connection.php";
							 $con = $conn;
							 $report_id = $_REQUEST['id']; 
				
				      if($report_id==1){
									
									 $q_report_detail="SELECT * FROM order_detail ORDER BY created_at DESC";
									 $r_report_detail=mysqli_query($conn,"$q_report_detail");										

										while($row=mysqli_fetch_assoc($r_report_detail)){ 
								$content .= "<tr>".
											"<td>".$row['billing_name']."</td>".
											"<td>".$row['billing_address']."</td>".
											"<td>".$row['billing_mobile']."</td>".
											"<td>".$row['shipping_name']."</td>".
											"<td>".$row['shipping_address']."</td>".
											"<td>".$row['shipping_mobile']."</td>".
											"<td>".$row['status']."</td>".
											"<td>".$row['created_at']."</td>".
											"</tr>";
									}
									$html = "<html xmlns='http://www.w3.org/1999/xhtml'>
									<head>
									<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
									<title>pdf Report</title>
									<style>
										
									</style>
									</head>
									
									<body>
									<center><th>Online Shopping</th></center>
									<th>Report Name : Sales Report</th>
									<hr />
										<table >
											<tr>
							                      <th>Id</th>
							                      <th>Billing Name</th>                     
							                      <th>Billing Address</th>                     
							                      <th>Billing Mobile</th>  
							                      <th>Shipping Name</th>                     
							                      <th>Shipping Address</th>                     
							                      <th>Shipping Mobile</th>                     
							                      <th>Status</th>                     
							                      <th>Purchase on</th>
											</tr>
											".$content."
											</table>
										</body>
								</html>";
								
							}	
							else if($report_id==2){
										  $q_report_detail="SELECT * FROM order_detail WHERE status = 'cancelled' ORDER BY created_at DESC";
									 $r_report_detail=mysqli_query($conn,"$q_report_detail");										

										while($row=mysqli_fetch_assoc($r_report_detail)){ 
								$content .= "<tr>".
											"<td>".$row['order_id']."</td>".
											"<td>".$row['billing_name']."</td>".
											"<td>".$row['billing_address']."</td>".
											"<td>".$row['billing_mobile']."</td>".
											"<td>".$row['shipping_name']."</td>".
											"<td>".$row['shipping_address']."</td>".
											"<td>".$row['shipping_mobile']."</td>".
											"<td>".$row['status']."</td>".
											"<td>".$row['created_at']."</td>".
											"</tr>";
									}
									$html = "<html xmlns='http://www.w3.org/1999/xhtml'>
									<head>
									<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
									<title>pdf Report</title>
									<style>
										
									</style>
									</head>
									
									<body>
									<center><th>Online Shopping</th></center>
									<th>Report Name : Cancelled Orders</th>
									<hr />
										<table >
											<tr>
							                      <th>Id</th>
							                      <th>Billing Name</th>                     
							                      <th>Billing Address</th>                     
							                      <th>Billing Mobile</th>  
							                      <th>Shipping Name</th>                     
							                      <th>Shipping Address</th>                     
							                      <th>Shipping Mobile</th>                     
							                      <th>Status</th>                     
							                      <th>Purchase on</th>
											</tr>
											".$content."
											</table>
										</body>
								</html>";
								
							}							

$mpdf = new mPDF();

$mpdf -> AddPage('P');		
$mpdf -> writeHtml($html);
$mpdf -> output();


?>

