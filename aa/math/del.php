<?
							session_start();
                                                        include("config.inc.php");
							$accid = $_SESSION["accid"]; 
							$strSQL3 = "SELECT * FROM reserve where reservid = '".$_GET["reservid"]."'";
							$objQuery3 = mysql_query($strSQL3);
							$objResult3 = mysql_fetch_array($objQuery3);
							$date1=$objResult3["time"];
							$ban=$objResult3["branchid"];
                                                        $section1=$objResult3["section"];
							
							$sec=$section1;
							$strSQL9 = "SELECT * FROM seats where branchid = '".$ban."' AND date = '".$date1."'";
							$objQuery9 = mysql_query($strSQL9);
							if(!$objQuery9)
							{
							echo "Error Save [".mysql_error()."]";
							}
							$objResult9 = mysql_fetch_array($objQuery9);
							$seatnew=$objResult9["$sec"]+1;
							$strSQL8 = "UPDATE seats SET ";
							$strSQL8 .="`$sec` = '".$seatnew."' ";
							$strSQL8 .="where branchid = '".$ban."' AND date = '".$date1."' ";
							$objQuery8 = mysql_query($strSQL8);
							
						   
							$strSQL = "DELETE FROM reserve ";
							$strSQL .="WHERE reservid = '".$_GET["reservid"]."' ";
							$objQuery = mysql_query($strSQL);
							if($objQuery)
							{
							$strSQL7 = "SELECT * FROM account where accid = '".$accid."'";
							$objQuery7 = mysql_query($strSQL7);
							$objResult7 = mysql_fetch_array($objQuery7);
							$creditnew = $objResult7["totalcredit"]+1;
							$strSQL6 = "UPDATE account SET ";
							$strSQL6 .="totalcredit = '".$creditnew."' ";
							$strSQL6 .="WHERE accid = '".$accid."' ";
							$objQuery6 = mysql_query($strSQL6);
							}
							if(!$objQuery)
							{
							echo "Error Delete [".mysql_error()."]";
							}
							if(!$objQuery6)
							{
							echo "Error Update [".mysql_error()."]";
							}
							if(!$objQuery7)
							{
							echo "Error Update [".mysql_error()."]";
							}
							
							echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('คุณได้เครดิตคืนจำนวน 1 เครดิตค่ะ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=show.php'>";
							?>