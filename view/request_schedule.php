

<?php
//include('controller/counselling.php');
include('model/configuration.php');
include('model/schedule.php');
function getRowSchedule($date,$month,$year){
  $schedule=new Schedule_Model();
  $counselor_id=$_GET['counselor_id'];
  $slot_schedules=$schedule->select_schedule($counselor_id,$date,$month,$year);
  //print_r($slot_schedules);
  if(sizeof($slot_schedules)>0){
    return $slot_schedules[0];  
  }  
  
}

                    //header("Refresh: 20");

                    date_default_timezone_set('Asia/Dhaka');

                    $script_tz = date_default_timezone_get();

                    $current_hour= date("H");
                    ?>

                    <?php
                    //echo "<br>";
                    $d=cal_days_in_month(CAL_GREGORIAN,3,2020);
                    //echo "There was $d days in March 2020";

                    echo "<br>";
                    $jd=gregoriantojd(3,1,2020);//1 march 2020


                    //echo "<br>";
                    $d=mktime(12, 39, 17, 3, 20, 2020);
                    //echo "Created date is " . date("Y-m-d h:i:sa", $d);

                    //echo "<br>";

                    function numtomonth($nmonth)
                    {
                      if($nmonth==1){
                        return "January";
                      }elseif ($nmonth==2) {
                        return "February";
                      }elseif ($nmonth==3) {
                        return "March";
                      }elseif ($nmonth==4) {
                        return "April";
                      }elseif ($nmonth==5) {
                        return "May";
                      }elseif ($nmonth==6) {
                        return "Jun";
                      }elseif ($nmonth==7) {
                        return "July";
                      }elseif ($nmonth==8) {
                        return "August";
                      }elseif ($nmonth==9) {
                        return "September";
                      }elseif ($nmonth==10) {
                        return "October";
                      }elseif ($nmonth==11) {
                        return "November";
                      }elseif ($nmonth==12) {
                        return "December";
                      }else
                      {
                        $nmonth=$nmonth-12;
                        return numtomonth($nmonth);
                      }
                    }



                    if(isset($_GET['done']))
                              {
                                $year=$_GET['year'];
                                $month=$_GET['month'];

                                $day=cal_days_in_month(CAL_GREGORIAN,$month,$year);
                          
                                $jd=gregoriantojd($month,1,$year);//1 march 2020



                              }else
                              {
                                $year=date("Y");
                                $month=date("m");
                                $day=cal_days_in_month(CAL_GREGORIAN,$month,$year);
                          
                                $jd=gregoriantojd($month,1,$year);//1 march 2020
                              }
                    ?>




                    <div class="container cont">
                      <h1>Request Schedule</h1>
                      

                      <div>
                        <form action="index.php" method="get">
                           <div class="form-group">
                              <label for="exampleFormControlSelect1">Select Year</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="year">
                                <option value="<?php echo date("Y");?>"><?php echo date("Y");?></option>
                                
                                
                              </select>
                           </div>
                           <input type="hidden" name="function" value="counselor_dashboard">
                           <div class="form-group">
                              <label for="exampleFormControlSelect1">Select Month</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="month">
                                <option value="<?php echo date("m");?>"  <?php if(date("m")==$month){echo "selected";} ?>  ><?php echo numtomonth(date("m"));?></option>
                                <option value="<?php echo date("m")+1;?>"  <?php if(date("m")+1==$month){echo "selected";} ?>  ><?php echo numtomonth(date("m")+1);?></option>
                                <option value="<?php echo date("m")+2;?>"  <?php if(date("m")+2==$month){echo "selected";} ?>  ><?php echo numtomonth(date("m")+2);?></option>
                              </select>
                           </div>
                           <div>
                            <input type="submit" class="btn btn-success  active" name="done" value="Search" />
                           </div>
                        </form>
                      </div>




















                      <div class="table-responsive-lg" id="divtb">
                        <table class="table table-bordered table-sm ">
                          <thead class="thead-dark">
                            <tr>
                              
                              <th scope="col">Day</th>
                              <th scope="col">10-11</th>
                              <th scope="col">11-12</th>
                              <th scope="col">12-1</th>
                              <th scope="col">1-2</th>
                              <th scope="col">2-3</th>
                              <th scope="col">3-4</th>
                              <th scope="col">4-5</th>
                              <th scope="col">5-6</th>
                              <th scope="col">Date</th>
                            </tr>
                          </thead>
                          <tbody >
                            <?php

                            $available=false;

                            if(date("m")!=$month){# next month will be available.
                              $available=true;
                              
                              
                            }else{
                              $available=false;
                            }

                            function valid_row($i,$month,$year){
                              if($i==date('d')&&$month==date("m")&&$year==date("Y"))
                                {
                                  return true; 
                                }
                              
                            }

                            function valid_slot($hour,$i,$month,$year){
                              

                              if($i==date('d')&&$month==date("m")&&$year==date("Y")&&$hour>date("H"))
                                {
                                  
                                  return true;
                                   
                                }elseif($i>date('d')){
                                  return true;

                                }
                              
                            }

                            

                            $day_schedule = array("2","2","2","2","2","2","2","2");
                            function get_button($schedule_id,$slot_button,$hour,$i,$month,$year)
                            {

                              if($slot_button=="1")
                              { ?>
                              <a href="index.php?function=enter_problem&schedule_id=<?php echo $schedule_id;?>&status=<?php echo "available";?>&slot=<?php echo $hour-10;?>&date=<?php echo $i;?>&month=<?php echo $month;?>&year=<?php echo $year;?>&counselor_id=<?php echo $_GET['counselor_id'];?>">
                              <button type="button" class="btn btn-success w-100 h-100 " >Available</button>
                              </a>
                              <?php
                              }elseif($slot_button=="2"){

                              ?>
                              
                              <button type="button" class="btn btn-light w-100 h-100 " >Not Available</button>
                              
                              <?php

                              }elseif ($slot_button=="3") {
                                # code...
                              ?>
                              
                              <button type="button" class="btn btn-danger w-100 h-100 " >Booked</button>
                              
                              <?php
                              }
                            }


                            function getI($month)
                            {
                              if(date("m")!=$month){# next month will be available.
                                return 1;
                                
                                
                              }else{
                                return date("d");
                              }
                            }
                            for ($i=getI($month); $i <=$day ; $i++) { 
                              $hour=10;
                              $row_slot_schedule=getRowSchedule($i,$month,$year);

                          ?>
                              <tr <?php if(valid_row($i,$month,$year)){echo "bgcolor='#9dfc03'";  }?> >
                                
                                <td class="text-primary font-weight-bold"><?php echo jddayofweek(gregoriantojd($month,$i,$year),1); ?></td>
                                <?php
                                for($hour=10; $hour<18; $hour++){

                                ?>
                                <td class="m-0 p-0 ">
                                  <?php

                                  
                                  if($available){#if available is true no action to be needed. and for all the time it will be true.
                                    


                                  }else{
                                    //echo "false"; #why valid_slot function is calling two times?
                                    $available= valid_slot($hour,$i,$month,$year);#if available is not true then it will be checked and try to make it true.
                                  }
                                  
                                  if($available){


                                    if ($row_slot_schedule['date']==$i&&$row_slot_schedule['month']==$month&&$row_slot_schedule['year']==$year) {
                                      # code...
                                      

                                      get_button($row_slot_schedule['id'],$row_slot_schedule['slot_schedule'][$hour-10],$hour,$i,$month,$year);
                                    }else{
                                      
                                      get_button($row_slot_schedule['id'],$day_schedule[$hour-10],$hour,$i,$month,$year);  
                                    }
                                    
                                              
                                  }else{
                                    expired_button();
                                  }
                                  
                                  ?>
                                </td>
                                <?php
                                }
                                ?>

                                

                                <th class="text-dark" scope="row "><?php echo $i; ?></th>
                              </tr>
                          <?php
                          $jd++;
                            
                            }
                            ?>
                            
                           
                          </tbody>
                        </table>
                      </div>
                      
                    </div>

