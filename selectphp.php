 <?php
include_once('connection.php');

if(isset($_REQUEST['selectenroll']) )
{
    $select="select * from student where EnrollMent='".$_REQUEST['selectenroll']."'";
    $res=mysql_query($select);
    if(mysql_num_rows($res)) {
      echo "success";
    }
    else {
      echo "error";
    }
}
if(isset($_REQUEST['selectsuser']) )
{
    $select="select * from student where Username='".$_REQUEST['selectsuser']."'";
    $res=mysql_query($select);
    if(mysql_num_rows($res)) {
      echo "success";
    }
    else {
      echo "error";
    }

}
if(isset($_REQUEST['selectemp']) )
{
    $select="select * from faculty where EmpCode='".$_REQUEST['selectemp']."'";
    $res=mysql_query($select);
    if(mysql_num_rows($res)) {
      echo "success";
    }
    else {
      echo "error";
    }

}
if(isset($_REQUEST['selectfuser']) )
{
    $select="select * from faculty where Username='".$_REQUEST['selectfuser']."'";
    $res=mysql_query($select);
    if(mysql_num_rows($res)) {
      echo "success";
    }
    else {
      echo "error";
    }
}

if(isset($_REQUEST["code"]))
{
	$emails=$_REQUEST["email"];
	$number=$_REQUEST["code"];
	$log="select * from faculty where Mailid='$emails'  and EmpCode='$number'";
	$log2="select * from student where Mailid='$emails' and EnrollMent='$number'";
	if($res=mysql_query($log))
	{
		if($data=mysql_fetch_assoc($res))
		{
			$id=$data["FacID"];
			$name=$data["Fullname"];
      echo '<input type="text"  class="form-control width-20" name="code" value="'.$name.'" readonly required/>
            <input type="hidden" id="id" value="'.$id.'"/>
            <input type="hidden" id="type" value="F"/>
            <input class="form-control width-20" type="password" id="newpassword" oninvalid="password(this);" oninput="password(this);" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^*]).{8,20}$"  placeholder="Password" required>
            <input type="password"   class="form-control width-20" id="confrompassword" placeholder="Conform Password" required/>
            <input type="submit" class="btn btn-info" name="submit" value="Submit">';
				}
				else if($res2=mysql_query($log2))
				{
					if($data2=mysql_fetch_assoc($res2))
					{
						$id=$data2["StudId"];
						$fname=$data2["Firstname"];
						$mname=$data2["Middlename"];
						$lname=$data2["Lastname"];
            echo '<input type="text"  class="form-control width-20" name="code" value="'.$fname.' '.$mname.' '.$lname.' " readonly required/>
                  <input type="hidden" id="id" value="'.$id.'"/>
                  <input type="hidden" id="type" value="S"/>
                  <input class="form-control width-20" type="password" id="newpassword" oninvalid="password(this);" oninput="password(this);" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^*]).{8,20}$"  placeholder="Password" required>
                  <input type="password"   class="form-control width-20" id="confrompassword" placeholder="Conform Password" required/>
                  <input type="submit" class="btn btn-info" name="submit" value="Submit">';
					}
					else
					{
            echo "Sorry Not Found Data";
          }
				}
			}
}
if(isset($_REQUEST['selectstud']) )
{
  $select=$_REQUEST['selectstud'];
  $value=$_REQUEST['values'];
  echo '<table id="mytable" class="table"><thead>
        <tr align="center"><th>No</th>
        <th>EnrollMent Number</th>
        <th>FNAME</th>
        <th>MNAME</th>
        <th>LNAME</th>
        <th>EMAIL</th>
        <th>MOBILE</th>
        <th>ADDRESS</th>
        <th>SEMESTER</th>
        <th>DATE OF BIRTH</th>
        <th>GENDER</th>
        <th>COURSE</th>
        <th>ADMISSION YEAR</th>
        <th>IMAGE</th>
        <th>DELETE</th>
        </tr></thead><tbody>';
  $search="select * from student where $select LIKE '$value%'";
  $res=mysql_query($search);
  $no=1;
	while($data=mysql_fetch_assoc($res))
	{
		echo "<tr>";
		echo "<td align='center'>".$no."</td>";
    echo "<td align='center'>".$data["EnrollMent"]."</td>";
    echo "<td align='center'>".$data["Firstname"]."</td>";
        echo "<td align='center'>".$data["Middlename"]."</td>";
        echo "<td align='center'>".$data["Lastname"]."</td>";
        echo "<td align='center'>".$data["Mailid"]."</td>";
        echo "<td align='center'>".$data["Mobileno"]."</td>";
        echo "<td align='center'>".$data["Address"]."</td>";
        echo "<td align='center'>".$data["SemId"]."</td>";
        echo "<td align='center'>".$data["Dob"]."</td>";
        echo "<td align='center'>".$data["Gender"]."</td>";
        echo "<td align='center'>".$data["Course"]."</td>";
        echo "<td align='center'>".$data["YearOfAdd"]."</td>";
        echo "<td align='center'><img class='image-square' src='Image/Student/".$data["Image"]."'></td>";
			  echo "<td align='center'><button onclick='deletestud(this.value)' class='link2' value='".$data["StudId"]."'><i class='fas fa-trash-alt'></i></button></td>";
		echo "</tr>";
		$no++;
	}
  echo "</tbody></table>";
}

if(isset($_REQUEST['selectfact']) )
{
  $select=$_REQUEST['selectfact'];
  $value=$_REQUEST['values'];
  echo '<table id="mytable" class="table"><thead>
       <tr><th>NO</th>
       <th>EMPLOYEE CODE</th>
       <th>EMP NAME</th>
       <th>EMAIL</th>
       <th>MOBILE</th>
       <th>DATE OF BIRTH</th>
       <th>ADDRESS</th>
       <th>GENDER</th>
       <th>DATE OF JONING</th>
       <th>QUALIFICATION</th>
       <th>EXPERIANCE</th>
       <th>IMAGE</th>
       <th>DELETE</th>
       </tr></thead><tbody>';
  $search="select * from faculty where $select LIKE '%$value%'";
  $res=mysql_query($search);
  $no=1;
	while($data=mysql_fetch_assoc($res))
	{
    echo "<tr>";
    echo "<td align='center'>".$no++."</td>";
    echo "<td align='center'>".$data["EmpCode"]."</td>";
    echo "<td align='center'>".$data["Fullname"]."</td>";
    echo "<td align='center'>".$data["Mailid"]."</td>";
    echo "<td align='center'>".$data["Mobileno"]."</td>";
    echo "<td align='center'>".$data["Dob"]."</td>";
    echo "<td align='center'>".$data["Address"]."</td>";
    echo "<td align='center'>".$data["Gender"]."</td>";
    echo "<td align='center'>".$data["DateOfJoin"]."</td>";
    echo "<td align='center'>".$data["Qualification"]."</td>";
    echo "<td align='center'>".$data["Experiance"]."</td>";
    echo "<td align='center'><img class='image-square' src='Image/Faculty/".$data["Image"]."'></td>";
    echo "<td align='center'><button onclick='deletefact(this.value)' class='link2' value='".$data["FacID"]."'><i class='fas fa-trash-alt'></i></button></td>";
    echo "</tr>";
	}
  echo "</tbody></table>";
}

if(isset($_REQUEST['selcourse']) )
{
  $search="select * from degree";
  $res=mysql_query($search);
  echo '<table id="mytable" class="table"><thead>
        <tr><th>NO</th>
        <th>Course</th>
        <th>Year</th>
        <th>Delete</th>
        </tr></thead><tbody>';
  $no=1;
  while($data=mysql_fetch_assoc($res))
  {
    echo "<tr><td align='center'>".$no++."</td>";
    echo "<td align='center'><button onclick='show(this.value)' class='link1' value='".$data["DegId"]."'>".$data["DegName"]."</button></td>";
    echo "<td align='center'>".$data["Year"]."</td>";
    echo "<td align='center'><button onclick='deletecourse(this.value)' class='link2' value='".$data["DegId"]."'><i class='fas fa-trash-alt'></i></button></td></tr>";
  }
  echo "</tbody></table>";
}

if(  isset($_REQUEST['selsem']) )
{
  $degid=$_REQUEST['selsem'];
  $search="select * from semester where DegId=$degid";
  $res=mysql_query($search);
  echo '<table id="mytable" class="table"><thead>
        <tr><th>NO</th>
        <th>SEMESTER</th>
        <th>FEES</th>
        <th>Update</th>
        <th>Delete</th>
        </tr></thead><tbody>';
  $no=1;
  while($data=mysql_fetch_assoc($res))
  {
    echo "<tr><td align='center'>".$no++."</td>";
    echo "<td align='center'>".$data["SemName"]."</td>";
    echo "<td align='center'>".$data["FEES"]."</td>";
    echo "<td align='center'><button onclick='Updatefees(this.value)' class='link2' value='".$data["SemId"]."'><i class='fas fa-edit'></i></button></td>";
    echo "<td align='center'><button onclick='deletesem(this.value)' class='link2' value='".$data["SemId"]."'><i class='fas fa-trash-alt'></i></button></td></tr>";
  }
  echo "</tbody></table>";
}

if(  isset($_REQUEST['showsem']) )
{
    $semid=$_REQUEST['showsem'];
    echo '<select id="selectsem" name="Semid" class="form-control"><option value="none">...Please Select Semester ...</option>';
    $cou="select * from semester where DegId='$semid'";
    $res=mysql_query($cou);
    while($row=mysql_fetch_assoc($res))
    {
      echo "<option value=".$row['SemId'].">".$row['SemName']."</option>";
    }
    echo '</select>';
}

if(  isset($_REQUEST['showsub']) )
{
  $semid=$_REQUEST['showsub'];
  $search="select * from subject where SemId=$semid";
  $res=mysql_query($search);
  echo '<table id="mytable" class="table"><thead>
        <tr><th>NO</th>
        <th>SUBJECT</th>
        <th>Delete</th>
        </tr></thead><tbody>';
  $no=1;
  while($data=mysql_fetch_assoc($res))
  {
    echo "<tr><td align='center'>".$no++."</td>";
    echo "<td align='center'>".$data["SubName"]."</td>";
    echo "<td align='center'><button onclick='deletesub(this.value)' class='link2' value='".$data["SubId"]."'><i class='fas fa-trash-alt'></i></button></td></tr>";
  }
  echo "</tbody></table>";
}

if(  isset($_REQUEST['selectcourse']) )
{
  $degid=$_REQUEST['selectcourse'];
  $search="select * from semester where DegId=$degid";
  $res=mysql_query($search);
  echo "<option value='nonesemester'>...Please Select Semester ...</option>";
  while($data=mysql_fetch_assoc($res))
  {
    echo "<option value='".$data['SemId']."'>".$data['SemName']."</option>";
  }
}

if(  isset($_REQUEST['selectmaterial']) )
{
  $semid=$_REQUEST['selectmaterial'];
  $search="select * from metarial where SemId=$semid";
  $res=mysql_query($search);
  echo '<table id="mytable" class="table"><thead>
        <tr><th>NO</th>
        <th>FileName</th>
        <th>SubjectName</th>
        <th>View</th>
        <th>Delete</th>
        </tr></thead><tbody>';
  $no=1;
  while($data=mysql_fetch_assoc($res))
  {
    $subId=$data["SubId"];
    $search1="select * from subject where SubId=$subId";
    echo "<tr><td align='center'>".$no++."</td>";
    $res2=mysql_query($search1);
    $data1=mysql_fetch_assoc($res2);
    echo "<td align='center'>".$data["FileName"]."</td>";
    echo "<td align='center'>".$data1["SubName"]."</td>";
    echo "<td align='center'><a href='Material/".$data["DowPath"]."' target='_blank'><i class='fas fa-file-pdf'></i></a></td>";
    echo "<td align='center'><button onclick='deletematerial(this.value)' class='link2' value='".$data["DowId"]."'><i class='fas fa-trash-alt'></i></button></td></tr>";
  }
  echo "</tbody></table>";
}

if(  isset($_REQUEST['selectsub']) )
{
  $semid=$_REQUEST['selectsub'];
  $search="select * from subject where SemId=$semid";
  $res=mysql_query($search);
  echo "<option value='nonesemester'>...Please Select Subject ...</option>";
  while($data=mysql_fetch_assoc($res))
  {
    echo "<option value='".$data['SubId']."'>".$data['SubName']."</option>";
  }
}

if(  isset($_REQUEST['selectpayment']) )
{
  $select="select * from student where SemId=".$_REQUEST['selectpayment'];
  $res=mysql_query($select);
  $no=1;
  echo '<table id="mytable" class="table"><thead>
        <tr><th>ID</th>
   		  <th>STUDENT</th>
  		  <th>DATE</th>
   	 	  <th>STATUS</th>
   	 	  <th>PaymentId</th>
        </tr></thead><tbody>';
  while($data2=mysql_fetch_assoc($res))
  {
    echo "<tr><td>".$no++."</td>";
    echo "<td>".$data2['Firstname']."&nbsp;".$data2['Middlename']."&nbsp;".$data2['Lastname']."</td>";
    $qry="select * from payment where StudId=".$data2['StudId']." and SemId=".$_REQUEST['selectpayment'];
    $res1=mysql_query($qry);
    if($data3=mysql_fetch_assoc($res1))
    {
      echo "<td align='center'>".$data3['Date']."</td>";
      echo "<td align='center'><font color='Green'>Paid</font></td>";
      echo "<td align='center'>".$data3['paymentid']."</td>";
    }
    else
    {
      echo "<td align='center'></td>";
      echo "<td align='center'><font color='Red'>UnPaid</font></td>";
      echo "<td align='center'></td>";
    }
    echo "</tr>";
  }
  echo "</tbody></table>";
}

if(  isset($_REQUEST['updatesel']) )
{
  $semid=$_REQUEST['updatesel'];
  $select="select * from semester where SemId=$semid";
  $res=mysql_query($select);
  $data=mysql_fetch_assoc($res);
  echo "<input type='text' class='form-control' id='semname' value='".$data['SemName']."' readonly>";
  echo "<input type='hidden' id='semid' value='".$data['SemId']."' read only>";
  echo "<input type='text' class='form-control' id='updatefees' value='".$data['FEES']."'>";
  echo "<button type='button' onclick='updatedata();' class='btn btn-info btn-margin'>Update</button>";
}

if(  isset($_REQUEST['selectatt']) )
{
  $id=$_REQUEST['id'];
  $semid=$_REQUEST['selectatt'];
  $select="select * from student where SemId=$semid";
  $res=mysql_query($select);
  $no=1;
  $maxdate=date("Y-m-d");
  echo '<form id="attandance" method="post" action="insertphp.php">
        <table>
        <tr>
        <td><input class="form-control btn-margin" type="date" name="atdate" style="width:200px;"  max="'.$maxdate.'" Required></td>
        <td> <button type="submit" name="Mark" class="btn btn-info btn-margin" >Marked</button>
        <input type="hidden" name="id" value="'.$id.'"></td></tr>
        </table>
        <table id="mytable" class="table"><thead>
        <tr><th>NO</th>
        <th>STUDENT NAME</th>
        <th>Present</th>
        <th>Absent</th>
        </tr></thead><tbody>';
  $counter=0;
  while($data1=mysql_fetch_assoc($res))
  {
      echo "<tr>";
      echo "<td align='center'><input type='hidden' name='StudId[]' value='".$data1['StudId']."'>".$no++."</td>";
      echo "<td align='center'>".$data1['Firstname']."&nbsp;".$data1['Middlename']."&nbsp;".$data1['Lastname']."&nbsp;"."</td>";
      echo "<td align='center'><input type='radio' name='att[$counter]' value='1'>Present</td>";
      echo "<td align='center'><input type='radio' name='att[$counter]' value='0' checked='true'>Absent</td></tr>";
      $counter++;
  }
  echo "</form>";
  echo "</tbody></table>";
}

if(  isset($_REQUEST['selatt']) )
{
  echo '<table id="mytable" class="table"><thead>
         <tr> <th>NO</th>
         <th>STUDENT NAME</th>
         <th>Present Day</th>
         <th>Total Day</th></tr>
         </thead><tbody>';
 $sem=$_REQUEST["selatt"];
 $fdate=$_REQUEST["fromdate"];
 $tdate=$_REQUEST["todate"];
 $date2=strtotime($fdate);
 $date1=strtotime($tdate);
 $diff=abs($date1-$date2);
 $year=floor($diff / (365*60*60*24));
 $month=floor(($diff - $year * 365*60*60*24)/(365*60*60*24));
 $days=floor(($diff - $year * 365*60*60*24 - $month*30*60*60*24)/(60*60*24))+1;
 $qry="select * from student where SemId='$sem'";
 $res=mysql_query($qry);
 $no=0;
 $counter=0;
 while($data1=mysql_fetch_assoc($res))
 {
    echo "<tr>";
    echo "<td align='center'>".++$no."</td>";
    echo "<td align='center'>".$data1['Firstname']."&nbsp;".$data1['Middlename']."&nbsp;".$data1['Lastname']."&nbsp;"."</td>";
    $qry1="select * from  attandance where StudId='".$data1['StudId']."' and Date between '$fdate' and '$tdate'";
    $res1=mysql_query($qry1);
    $come=0;
    while($data3=mysql_fetch_assoc($res1))
    {
       $come=$come+$data3['Attvalue'];
    }
    echo "<td align='center'>$come Days</td>";
    echo "<td align='center'>".$days." Days</td>";
    $counter++;
  }
  echo "</tbody></table>";
}

if(  isset($_REQUEST['selectstudent']) )
{
  $semid=$_REQUEST['selectstudent'];
  $search="select * from student where SemId=$semid";
  $res=mysql_query($search);
  echo "<option value='none'>...Select Student ...</option>";
  while($data=mysql_fetch_assoc($res))
  {
    echo "<option value='".$data['StudId']."'>".$data['Firstname']."</option>";
  }
}

if(  isset($_REQUEST['selectmark']) )
{
  $semid=$_REQUEST['selectmark'];
  $search="select * from subject where SemId=$semid";
  $res=mysql_query($search);
  $no=0;
	while($sub=mysql_fetch_assoc($res))
	{

			echo $sub['SubName'].":-<input class='form-control' style='width:80%;' type='number' onchange='mark(this);' min='0' max='51' name='".++$no."'>";
	}
  echo "<input type='hidden' class='btn btn-info' id='col' name='insertresult'  value='".$no."'>";
  echo "<input type='button' class='btn btn-info btn-margin' id='btn1' onClick='insert()' value='Add'>";
}

if(  isset($_REQUEST['showres']) )
{
  $semid=$_REQUEST["showres"];
  $no=$_REQUEST["no"];
  $selectstud="select * from student where SemId=$semid";
  $studres=mysql_query($selectstud);
  echo '<table id="mytable" class="table"><thead>
         <tr> <th>NO</th>
         <th>STUDENT NAME</th>';
         $qry1="select * from subject where SemId='$semid'";
         $res4=mysql_query($qry1);
         while($data4=mysql_fetch_assoc($res4))
         {
           echo "<th>".$data4['SubName']."</th>";
         }
        echo "<th>DELETE</th></tr>
               </thead><tbody>";
  while ($dataresult=mysql_fetch_assoc($studres)) {
    $select="select * from result where SemId=$semid and StudId=$dataresult[StudId]";
    $res=mysql_query($select);
    $num=0;
    while($data=mysql_fetch_assoc($res))
    {
  	    $num++;
        echo "<tr>";
        echo "<td align='center'>$data[StudId]</td>";
        $srch="select * from student where StudId=".$data['StudId'];
        $res1=mysql_query($srch);
        $data1=mysql_fetch_assoc($res1);
        echo "<td align='center'>".$data1['Firstname']."&nbsp;".$data1['Lastname']."</td>";
        for($i=1;$i<=$no;$i++)
        {
            $a="Sub".$i;
            echo "<td align='center'>".$data[$a]."</td>";
        }
        echo "<td align='center'><button onclick='deleteresult(this.value)' class='link2' value='".$data["ResId"]."'><i class='fas fa-trash-alt'></i></button></td>";
        echo "</tr>";
    }

  }
  echo "</tbody></table>";
}


if(  isset($_REQUEST['select4studmaterial']) )
{
  $semid=$_REQUEST['select4studmaterial'];
  $search="select * from metarial where SemId=$semid";
  $res=mysql_query($search);
  echo '<table id="mytable" class="table"><thead>
        <tr><th>NO</th>
        <th>FileName</th>
        <th>SubjectName</th>
        <th>View</th>
        </tr></thead><tbody>';
  $no=1;
  while($data=mysql_fetch_assoc($res))
  {
    $subId=$data["SubId"];
    $search1="select * from subject where SubId=$subId";
    echo "<tr><td align='center'>".$no++."</td>";
    $res2=mysql_query($search1);
    $data1=mysql_fetch_assoc($res2);
    echo "<td align='center'>".$data["FileName"]."</td>";
    echo "<td align='center'>".$data1["SubName"]."</td>";
    echo "<td align='center'><a href='Material/".$data["DowPath"]."' target='_blank'><i class='fas fa-file-pdf'></i></a></td>";
  }
  echo "</tbody></table>";
}

if(  isset($_REQUEST['selectresult']) )
{
  $StudId=$_REQUEST['StudId'];
  $SemId=$_REQUEST['selectresult'];
  $select3="select * from result where StudId='$StudId' and SemId='$SemId'";
  $res3=mysql_query($select3);
  if(mysql_num_rows($res3))
  {
    $select="select * from student where StudId='$StudId'";
    $res=mysql_query($select);
    $data=mysql_fetch_assoc($res);
    $gender=$data['Gender'];
    if($gender="M"){$gender="Male";}
  	else{$gender="Female";}
    echo "<table border=1>
    		  <tr><td><table  width=100%>
    			   <tr><td><img src='css/banner/logo.png' height='120' width='120'></td>
    				     <td><b><font size='5'>Shree Sardar Vallabhbhai Patel Collage Of Commerce</font>&ensp;&ensp;&ensp;&ensp;</b><br>
    					       <font size='4' color='grey'><b>Internal Exam Result</b></font></td>
    			   </tr>
    			   <tr align='right'><td colspan='2'>Course:-&ensp;".$data['Course']."</td></tr>
    			</table></td></tr>";
    $select2="select * from subject where SemId='".$SemId."'";
    $res2=mysql_query($select2);
    $no=mysql_num_rows($res2);

    $data3=mysql_fetch_assoc($res3);
    echo "<tr><td><table width=100%>
            <tr><td align='right'>Seat No:- E203".$data3['ResId']."</td></tr>
          <tr><td>Name: ".$data["Firstname"]."&nbsp;".$data["Middlename"]."&nbsp;".$data["Lastname"]."</td></tr>
          <tr><td>Gender:".$gender."</font></td></tr></table></td></tr>";
    echo "<tr><td><table border=1 width=100%>
          <tr><th><i>No. of Subject</i></th><th><i>Subject name</i></th><th><i>Min marks</i></th><th><i>Max marks</i></th><th><i>Marks obtained</i></th></tr>";
          $result="Pass";
          for($i=1;$i<=$no;$i++)
          {
            echo "<tr><td>0$i </td>";
            $data2=mysql_fetch_assoc($res2);
            echo "<td>".$data2['SubName']."</td>";
            echo "<td>18</td><td>50</td>";
            $a="Sub".$i;
            echo "<td>";
            if($data3[$a]<18){$result="Fail"; echo "<font style='color:red;'>".$data3[$a]."</font>";}
            else{echo $data3[$a];}
            echo "</td></tr>";
        }
    echo "</table></td></tr>
          <tr><td><table border='2' width='100%'>
            <tr>
              <td><b><font size='4'>Result:&nbsp;".$result."</font></b></td>
              <td><b><font size='4'>Average:&nbsp;".$data3['ResAvg']."</font></b></td>
              <td><b><font size='4'>Total:&nbsp;".$data3['ResTotal']."</font></b></td></tr>
            </table></td></tr>";
    echo "<tr><td><table width='100%'>
          <tr><td align='center'><img src='css/banner/swach.jpg' height='150' width='150' ></td>
          <td><img src='css/banner/res2.png' height='150' width='150'></td></tr></table></td></tr>
          </table>";
  }
  else{
    echo "<font color='Red'>*Result Not Available in Site</font>";
  }
}
?>
