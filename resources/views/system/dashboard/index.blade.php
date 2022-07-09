@permission('dashboard')
@extends('layouts.application')
@section('content')
<style>
.total{
 text-align:left;
}
</style>
<div class="panel panel-default">
  <div class="panel-heading">

    <h4 class="panel-title"><i class="fa fa-home" style="font-size:32px;"></i>&nbsp;Monthly Dashboard</h4>
    <center><span style="font-size:18px;">DAWASA PERFORMANCE DASHBOARD</span></center>
  </div>

  <div class="contentpanel">

    <div class="row row-stat">
      <div class="col-md-4">
        <img src="{{ asset('cms_assets/images/dawasa.jpg') }}" style="width:252px;height:110px;" /> 

      </div>
      <div class="col-md-4" style="background:#F2F2F2;">

        <div style="font-size:18px; text-center">
          <?php 
          $firstmonth=Carbon\Carbon::now()->startOfMonth()->toDateString();
          $today=Carbon\Carbon::now()->toDateString();
          //$today="2018-08-01";
          if($firstmonth != $today ){
            ?>
            DATES: {{  $firstmonth  }} TO  {{  $today  }}
            <?php }else{
             echo "DATES: ".$firstmonth;
           }?>
         </div>
       </div>
       <div class="col-md-4"></div>
     </div>
     <hr>
     <div class="row row-stat">
      <div class="col-md-3"></div>
      <div class="col-md-6">
               <div class="">
          <div class="panel-heading noborder item_height" style="background:#FFFF00 !important; color:black;">
            <div class="media-body">
              <div class="text-center"><u><b>NON REVENUE WATER</b></u></div>
              @if(count($datarv))
              <table class="table">
                <tr>
                  <td>Water Produced</td>
                  <td>
                    <?php 
                    $datasproduced=null;
                    for($d=0;$d<count($datawp);$d++){
                     $datasproduced += $datawp[$d]->total_achievement;
                   }
                   echo $datasproduced;
                   ?></td>
                 </tr>
                 <tr>
                  <td>Water Sold</td>
                  <td><?php 
                  $datasold=null;
                  for($d=0;$d<count($datawc);$d++){
                   $datasold += $datawc[$d]->total_achievement;
                 }
                 echo $datasold;
                 ?></td>
               </tr>
             <tr>
              <td>NRW</td>
              <td>
              <?php 
              if($datasold !=0 && $datasold !=null){
                $datas=(($datasproduced/$datasold)*100)/sizeof($datarv);
                echo number_format($datas,2);
              }

              ?>
            </td>
          </tr>
        </table>
        @else
        <table class="table">
          <tr><td>Water Produced</td><td>NILL</td></tr>
          <tr><td>Water Sold</td><td>NILL</td></tr>
          <tr><td>NRW</td><td>NILL</td></tr>
        </table>
        @endif
      </div>

    </div>
  </div>
      </div>
      <div class="col-md-3"></div>
    </div>
    <hr>

    <div class="row row-stat">
      <div class="col-md-4">
        <div class="">
          <div class="panel-heading noborder item_height" style="background:#F8CBAD !important; color:black;">
            <div class="media-body">
              <div class="text-center"><u><b>REVENUE COLLECTION</b></u></div>
              @if(count($datarv))
              <table class="table">
                <tr>
                  <td>Target</td>
                  <td>
                    <?php 
                    $datas=null;
                    for($d=0;$d<count($datarv);$d++){
                     $datas += $datarv[$d]->total_target;
                   }
                   echo number_format($datas);
                   ?></td>
                 </tr>
                 <tr>
                  <td>Consumption</td>
                  <td><?php 
                  $datas=null;
                  for($d=0;$d<count($datarv);$d++){
                   $datas += $datarv[$d]->total_achievement;
                 }
                 echo number_format($datas);
                 ?></td>
               </tr>
               <tr>
                <td>Other payments</td>
                <td><?php 
                $datas=null;
                for($d=0;$d<count($datarv);$d++){
                 $datas += $datarv[$d]->total_other_payments;
               }
               echo number_format($datas);
               ?></td>
             </tr>
             <tr>
              <td>Performance (%)</td>
              <td><?php 
              $datas=null;
              $total_achievement=null;
              $total_target=null;
              foreach ($datarv as  $nc){
                $total_achievement+=$nc->total_achievement;
                $total_target+=$nc->total_target;
              }
              if($total_target !=0 && $total_target !=null){
              $datas=(($total_achievement/$total_target)*100)/sizeof($datarv);
              echo number_format($datas,2);
               }
              ?>
            </td>
          </tr>
        </table>
        @else
        <table class="table">
          <tr><td>Target</td><td>NILL</td></tr>
          <tr><td>Achievement</td><td>NILL</td></tr>
          <tr><td>Performance</td><td>NILL</td></tr>
        </table>
        @endif
      </div>

    </div>
  </div>
</div>
<div class="col-md-4">
 <div class="">
  <div class="panel-heading noborder item_height" style="background:#B4C6E7 !important; color:black;">
    <div class="media-body">
     <div class="text-center"><u><b>WATER SALES</b></u></div>
     @if(count($datawc))
     <table class="table">
      <tr>
        <td>Target</td>
        <td>
          <?php 
          $datas=null;
          for($d=0;$d<count($datawc);$d++){
           $datas += $datawc[$d]->total_target;
         }
         echo $datas;
         ?></td>
       </tr>
       <tr>
        <td>Achievement</td>
        <td><?php 
        $datas=null;
        for($d=0;$d<count($datawc);$d++){
         $datas += $datawc[$d]->total_achievement;
       }
       echo $datas;
       ?></td>
     </tr>

     <tr>
      <td>Performance (%)</td>
      <td><?php 
      $datas=null;
      $total_achievement=null;
      $total_target=null;
      foreach ($datawc as  $nc){
        $total_achievement+=$nc->total_achievement;
        $total_target+=$nc->total_target;
      } 
      if($total_target !=0 && $total_target !=null){
      $datas=(($total_achievement/$total_target)*100)/sizeof($datawc);
      echo number_format($datas,2);
      }
      ?>
    </td>
  </tr>
</table>
@else
<table class="table">
  <tr><td>Target</td><td>NILL</td></tr>
  <tr><td>Achievement</td><td>NILL</td></tr>
  <tr><td>Performance</td><td>NILL</td></tr>
</table>
@endif
</div>

</div>
</div>
</div>
<div class="col-md-4">
  <div class="">
   <div class="panel-heading noborder item_height" style="background:#F4B084 !important; color:black;">
    <div class="media-body">
     <div class="text-center"><u><b>WATER PRODUCTION</b></u></div>
     @if(count($datawp))
     <table class="table">
      <tr>
        <td>Target (Plants + Boreholes)</td>
        <td>
          <?php 
          $datas=null;
          for($d=0;$d<count($datawp);$d++){
           $datas += $datawp[$d]->total_target;
         }
         echo $datas;
         ?></td>
       </tr>
       <tr>
        <td>Achievement</td>
        <td><?php 
        $datas=null;
        for($d=0;$d<count($datawp);$d++){
         $datas += $datawp[$d]->total_achievement;
       }
       echo $datas;
       ?></td>
     </tr>
     <tr><td>Performance (%)</td>
      <td><?php 
      $datas=null;
      for($d=0;$d<count($datawp);$d++){ 
        $number=($datawp[$d]->total_achievement/$datawp[$d]->total_target);
        $datas += $number;
      }
      $datas=number_format($datas,4);
      $datas=$datas * 100;
      $datas=$datas /sizeof($datawp);
      $datas=number_format($datas,2);
      echo $datas;
      ?>
    </td></tr>
  </table>
  @else
  <table class="table">
    <tr><td>Target</td><td>NILL</td></tr>
    <tr><td>Achievement</td><td>NILL</td></tr>
    <tr><td>Performance</td><td>NILL</td></tr>
  </table>
  @endif
</div>

</div>
</div>
</div>
</div>
<hr>

<div class="row row-stat">
  <div class="col-md-4">
    <div>
      <div class="panel-heading noborder item_height" style="background:#305496 !important; color:white;">
        <div class="media-body">
          <div class="text-center"><u><b>CUSTOMER SERVICE</b></u></div>
          @if(count($datanc))
          <table class="table" style="font-size:14px;">
            <tr>
              <td>Faults Reported</td>
              <td>
                <?php 
                $datas=null;
                for($d=0;$d<count($dataccr);$d++){ 
                  $number=($dataccr[$d]->center + $dataccr[$d]->regions);
                  if($number > 0){
                    $datas += $number;
                  }        
                }
                echo $datas;
                ?>
              </td>
            </tr>
            <tr>
              <td>Resolved</td>
              <td>
               <?php 
               $datas=null;
               for($d=0;$d<count($dataccr);$d++){ 
                $number=($dataccr[$d]->resolved);
                if($number > 0){
                  $datas += $number;
                }        
              }
              echo $datas;
              ?>
            </td>
          </tr>
          <tr><td>Pending</td>
            <td>
             <?php 
             $datas=null;
             for($d=0;$d<count($dataccr);$d++){ 
              $number=($dataccr[$d]->center + $dataccr[$d]->regions) - $dataccr[$d]->resolved;
              if($number > 0){
                $datas += $number;
              }        
            }
            echo $datas;
            ?>
          </td>
        </tr>
        <tr>
          <td>Performance (%)</td>
          <td><?php 
          $datas=null;
          $resolved=null;
          $total=null;
          foreach ($dataccr as  $nc){
            $resolved+=$nc->resolved;
            $total+=$nc->center + $nc->regions;
          } 
           if($total !=0 && $total !=null){
          $datas=(($resolved/$total)*100)/sizeof($dataccr);
          echo number_format($datas,2);
         }
          ?>
        </td>
      </tr>
    </table>
    @else
    <table class="table">
      <tr><td>Faults Reported</td><td>NILL</td></tr>
      <tr><td>Resolved</td><td>NILL</td></tr>
      <tr><td>Pending</td><td>NILL</td></tr>
    </table>
    @endif
  </div>

</div>
</div>
</div>
<div class="col-md-4">
  <div>
    <div class="panel-heading noborder item_height" style="background:#C65911 !important; color:black;">
      <div class="media-body">
        <div class="text-center"><u><b>NEW CONNECTION</b></u></div>
        @if(count($datanc))
        <table class="table" style="font-size:14px;">
          <tr>
            <td>Target</td>
            <td>
              <?php 
              $datas=null;
              for($d=0;$d<count($datanc);$d++){
               $datas += $datanc[$d]->total_target;
             }
             echo $datas;
             ?></td>
           </tr>
           <tr>
            <td>Applied</td>
            <td>
              <?php 
              $datas=null;
              for($d=0;$d<count($datanc);$d++){
               $datas += $datanc[$d]->applied;
             }
             echo $datas;
             ?></td>
           </tr>
           <tr>
            <td>Connected</td>
            <td><?php 
            $datas=null;
            for($d=0;$d<count($datanc);$d++){
             $datas += $datanc[$d]->total_achievement;
           }
           echo $datas;
           ?></td>
         </tr>
         <tr>
          <td>Performance (%)</td>
          <td><?php 
          $datas=null;
          $total_achievement=null;
          $total_target=null;
          foreach ($datanc as  $nc){
            $total_achievement+=$nc->total_achievement;
            $total_target+=$nc->total_target;
          } 
           if($total_target !=0 && $total_target !=null){
          $datas=(($total_achievement/$total_target)*100)/sizeof($datanc);
          echo number_format($datas,2);
          }
          ?>
        </td>
      </tr>
      </table>
      @else
      <table class="table">
        <tr><td>Target</td><td>NILL</td></tr>
        <tr><td>Achievement</td><td>NILL</td></tr>
        <tr><td>Performance</td><td>NILL</td></tr>
      </table>
      @endif
    </div>

  </div>
</div>
</div>
<div class="col-md-4"> 
  <div>
    <div class="panel-heading noborder item_height" style="background:#305496 !important; color:white;">
      <div class="media-body">
       <div class="text-center"><u><b>LEAKAGE CONTROL</b></u></div>

       @if(count($datanc))
       <table class="table" style="font-size:14px;">
        <tr>
          <td>Leak reported</td>
          <td>
            <?php 
            $datas=null;
            for($d=0;$d<count($datalg);$d++){
             $datas += $datalg[$d]->leakage;
           }
           echo $datas;
           ?>
         </td>
       </tr>
       <tr>
        <td>Fixed</td>
        <td>
         <?php 
         $datas=null;
         for($d=0;$d<count($datalg);$d++){
           $datas += $datalg[$d]->fixed;
         }
         echo $datas;
         ?>
       </td>
     </tr>
     <tr><td>Pending</td>
      <td>
        <?php 
        $datas=null;
        for($d=0;$d<count($datalg);$d++){ 
          $number=($datalg[$d]->leakage - $datalg[$d]->fixed);
          if($number > 0){
            $datas += $number;
          }        
        }
        echo $datas;
        ?>
      </td></tr>

      <tr>
        <td>Performance (%)</td>
        <td><?php 
        $datas=null;
        $fixed=null;
        $leakage=null;
        foreach ($datalg as  $nc){
          $fixed+=$nc->fixed;
          $leakage+=$nc->leakage;
        } 
         if($leakage !=0 && $leakage !=null){
        $datas=(($fixed/$leakage)*100)/sizeof($datalg);
        echo number_format($datas,2);
        }
        ?>
      </td>
    </tr>
  </table>
  @else
  <table class="table">
    <tr><td>Leakage Reported</td><td>NILL</td></tr>
    <tr><td>Fixed</td><td>NILL</td></tr>
    <tr><td>Pending</td><td>NILL</td></tr>
  </table>
  @endif
</div>

</div>
</div>
</div>
</div>
<hr>

<div class="row row-stat">
  <div class="col-md-3">
   <div>
    <div class="panel-heading noborder item_height" style="background:#C65911 !important; color:black;">
      <div class="media-body">
       <div class="text-center"><u><b>METER READINGS</b></u></div>
       @if(count($datamr))
       <table class="table" style="font-size:14px;">
        <tr>
          <td>Target</td>
          <td>
            <?php 
            $datas=null;
            for($d=0;$d<count($datamr);$d++){
             $datas += $datamr[$d]->total_target;
           }
           echo $datas;
           ?></td>
         </tr>
         <tr>
          <td>Achievement</td>
          <td><?php 
          $datas=null;
          for($d=0;$d<count($datamr);$d++){
           $datas += $datamr[$d]->total_achievement;
         }
         echo $datas;
         ?></td>
       </tr>
       <tr>
        <td>Performance (%)</td>
        <td><?php 
        $datas=null;
        $total_achievement=null;
        $total_target=null;
        foreach ($datamr as  $nc){
          $total_achievement+=$nc->total_achievement;
          $total_target+=$nc->total_target;
        } 
         if($total_target !=0 && $total_target !=null){
        $datas=(($total_achievement/$total_target)*100)/sizeof($datamr);
        echo number_format($datas,2);
        }
        ?>
      </td>
    </tr>
  </table>
  @else
  <table class="table">
    <tr><td>Target</td><td>NILL</td></tr>
    <tr><td>Achievement</td><td>NILL</td></tr>
    <tr><td>Performance</td><td>NILL</td></tr>
  </table>
  @endif
</div>

</div>
</div>
</div>
<div class="col-md-6">
 <div>
  <div class="panel-heading noborder item_height" style="background:#FF5050 !important; color:black;">
    <div class="media-body">
     <div class="text-center"><u><b>WASTE WATER</b></u></div>
     @if(count($datahww))
     <?php $n=0; ?>
     <table class="table">
      <tr>
        <td><b><u>No</u></b></td>
        <td><b><u>Indicator</u></b></td>
        <td><b><u>Target</u></b></td>
        <td><b><u>Reported</u></b></td>
        <td><b><u>Achieved</u></b></td>
        <td><b><u>Performance</u></b></td>
      </tr>
      @foreach ($datahww as  $wc)
      <?php $n++; ?>
      <tr>
        <td>{{ $n }}</td>
        <td>{{ $wc->indicator_name }}</td>
        <td>{{ $wc->total_target }}</td>
        <td>{{ $wc->total_reported }}</td>
        <td>{{ $wc->total_achievement }}</td>
        <td><?php  
         if($wc->total_target !=0 && $wc->total_target !=null){
        $number=($wc->total_achievement/$wc->total_target) *100;

        ?>
         {{ number_format((float)$number, 2, '.', '')  }} % <?php } ?></td>
       </tr>
       @endforeach
     </table>
     @else
     <table class="table">
      <tr>
        <td><b><u>No</u></b></td>
        <td><b><u>Indicator</u></b></td>
        <td><b><u>Target</u></b></td>
        <td><b><u>Reported</u></b></td>
        <td><b><u>Achieved</u></b></td>
        <td><b><u>Performance</u></b></td>
      </tr>
    </table>
    @endif
  </div>

</div>
</div>
</div>
<div class="col-md-3"> 
 <div>
   <div class="panel-heading noborder item_height" style="background:#C65911 !important; color:black;">
    <div class="media-body">
     <div class="text-center"><u><b>METER REPLACEMENTS</b></u></div>
     @if(count($datar))
     <table class="table" style="font-size:14px;">
      <tr>
        <td>Target</td>
        <td>
          <?php 
          $datas=null;
          for($d=0;$d<count($datar);$d++){
           $datas += $datar[$d]->total_target;
         }
         echo $datas;
         ?></td>
       </tr>
       <tr>
        <td>Achievement</td>
        <td><?php 
        $datas=null;
        for($d=0;$d<count($datar);$d++){
         $datas += $datar[$d]->total_achievement;
       }
       echo $datas;
       ?></td>
     </tr>

     <tr>
      <td>Performance (%)</td>
      <td><?php 
      $datas=null;
      $total_achievement=null;
      $total_target=null;
      foreach ($datar as  $nc){
        $total_achievement+=$nc->total_achievement;
        $total_target+=$nc->total_target;
      } 
       if($total_target !=0 && $total_target !=null){
      $datas=(($total_achievement/$total_target)*100)/sizeof($datar);
      echo number_format($datas,2);
    }
      ?>
    </td>
  </tr>
</table>
@else
<table class="table">
  <tr><td>Target</td><td>NILL</td></tr>
  <tr><td>Achievement</td><td>NILL</td></tr>
  <tr><td>Performance</td><td>NILL</td></tr>
</table>
@endif
</div>

</div>
</div>
</div>
</div>

<hr>
<div class="row">
  <div class="table-responsive">
    <div class="col-md-6">
      <div class="panel panel-warning-alt"><caption><center><h4>Revenue Collection</h4></center></caption></div>
      <?php $n=0;  if(count($datarv)){ ?>
      <table class="tabledata table table-primary table-striped table-bordered table-hover table-sm">
        <thead>
          <tr>
            <th>No</th>
            <th>Region</th>
            <th>Target</th>
            <th>Achievement</th>
            <th>Other</th>
            <th>Performace(%)</th>
          </tr>
        </thead>
        @foreach ($datarv as  $rvn)
        <?php $n++; ?>
        <tr>
          <td>{{ $n }}</td>
          <td>{{ $rvn->region_name }}</td>
          <td>{{ number_format($rvn->total_target)  }}</td>
          <td>{{ number_format($rvn->total_achievement)  }}</td>
          <td>{{ number_format($rvn->total_other_payments)  }}</td>
          <td><?php  
             if($rvn->total_target !=0 && $rvn->total_target !=null){
          $number=($rvn->total_achievement/$rvn->total_target) *100;

          ?>
           {{ number_format((float)$number, 2, '.', '')  }} % <?php } ?></td>
         </tr>

         @endforeach

         <tr class="text-primary" style="font-size:16px;">
          <td><span class="hide"> 99</span></td>
          <td style="text-align:left">Total</td>
          <td style="text-align:left">
            <?php 
            $datas=null;
            for($d=0;$d<count($datarv);$d++){
             $datas += $datarv[$d]->total_target;
           }
           echo number_format($datas) ;
           ?>

         </td>

         <td style="text-align:left">
           <?php 
           $datas=null;
           for($d=0;$d<count($datarv);$d++){
             $datas += $datarv[$d]->total_achievement;
           }
           echo number_format($datas);
           ?>
         </td> 

         <td style="text-align:left">
           <?php 
           $datas=null;
           for($d=0;$d<count($datarv);$d++){
             $datas += $datarv[$d]->total_other_payments;
           }
           echo number_format($datas);
           ?>
         </td>
         <td><?php 
         $datas=null;
         $total_achievement=null;
         $total_target=null;
         foreach ($datarv as  $nc){
          $total_achievement+=$nc->total_achievement;
          $total_target+=$nc->total_target;
        }

         if($total_target !=0 && $total_target !=null){
        $datas=(($total_achievement/$total_target)*100)/sizeof($datarv);
        echo number_format($datas,2); 
         }
        ?>
      </td>
    </tr>
  </table>


  <?php } else { echo "Data Not Found"; } ?>


</div>
</div>

<div class="col-md-6">
 <div class="table-responsive">
   <div class="panel panel-warning-alt"><caption><center><h4>Water Sales</h4></center></caption></div>
   <?php $n=0;  if(count($datawc)){ ?>
   <table class="tabledata table table-primary table table-striped table-bordered table-hover table-sm">
    <thead>
      <tr>
        <th>No</th>
        <th>Region</th>
        <th>Target</th>
        <th>Achievement</th>
        <th>Performace(%)</th>
      </tr>
    </thead>
    @foreach ($datawc as  $wc)
    <?php $n++; ?>
    <tr>
      <td>{{ $n }}</td>
      <td>{{ $wc->region_name }}</td>
      <td>{{ $wc->total_target }}</td>
      <td>{{ $wc->total_achievement }}</td>
      <td><?php  
       if($wc->total_target !=0 && $wc->total_target !=null){
        $number=($wc->total_achievement/$wc->total_target) *100;?>
       {{ number_format((float)$number, 2, '.', '')  }} % <?php } ?></td>
     </tr>
     @endforeach
     <tr class="text-primary" style="font-size:16px;">
      <td><span class="hide"> 99</span></td>
      <td style="text-align:left">Total</td>
      <td style="text-align:left">
        <?php 
        $datas=null;
        for($d=0;$d<count($datawc);$d++){
         $datas += $datawc[$d]->total_target;
       }
       echo number_format($datas) ;
       ?>

     </td>

     <td style="text-align:left">
       <?php 
       $datas=null;
       for($d=0;$d<count($datawc);$d++){
         $datas += $datawc[$d]->total_achievement;
       }
       echo number_format($datas);
       ?>
     </td> 
     <td><?php 
     $datas=null;
     $total_achievement=null;
     $total_target=null;
     foreach ($datawc as  $nc){
      $total_achievement+=$nc->total_achievement;
      $total_target+=$nc->total_target;
    } 
     if($total_target !=0 && $total_target !=null){
    $datas=(($total_achievement/$total_target)*100)/sizeof($datawc);
    echo number_format($datas,2);
     }
    ?>
  </td>
</tr>
</table>  

<?php }else { echo "Data Not Found"; } ?>
</div>
</div>
</div>
<div class="row">
 <div class="col-md-6">
   <div class="table-responsive">
     <div class="panel panel-warning-alt"><caption><center><h4>Meter Readings</h4></center></caption></div>
     <?php $n=0;  if(count($datamr)){ ?>
     <table class="tabledata table table-primary table table-striped table-bordered table-hover table-sm">
      <thead>
        <tr>
          <th>No</th>
          <th>Region</th>
          <th>Target</th>
          <th>Achievement</th>
          <th>Performace(%)</th>
        </tr>
      </thead>
      @foreach ($datamr as  $mr)
      <?php $n++; ?>
      <tr>
        <td>{{ $n }}</td>
        <td>{{ $mr->region_name }}</td>
        <td>{{ $mr->total_target }}</td>
        <td>{{ $mr->total_achievement }}</td>
        <td><?php  
         if($mr->total_target !=0 && $mr->total_target !=null){
        $number=($mr->total_achievement/$mr->total_target) *100;?>
         {{ number_format((float)$number, 2, '.', '')  }} % <?php } ?></td>
       </tr>
       @endforeach
       <tr class="text-primary" style="font-size:16px;">
        <td><span class="hide"> 99</span></td>
        <td style="text-align:left">Total</td>
        <td style="text-align:left">
          <?php 
          $datas=null;
          for($d=0;$d<count($datamr);$d++){
           $datas += $datamr[$d]->total_target;
         }
         echo number_format($datas) ;
         ?>

       </td>

       <td style="text-align:left">
         <?php 
         $datas=null;
         for($d=0;$d<count($datamr);$d++){
           $datas += $datamr[$d]->total_achievement;
         }
         echo number_format($datas);
         ?>
       </td> 

       <td><?php 
       $datas=null;
       $total_achievement=null;
       $total_target=null;
       foreach ($datamr as  $nc){
        $total_achievement+=$nc->total_achievement;
        $total_target+=$nc->total_target;
      }
       if($total_target !=0 && $total_target !=null){
      $datas=(($total_achievement/$total_target)*100)/sizeof($datamr);
      echo number_format($datas,2); 
      }
      ?>
    </td>
  </tr>
</table> 
<?php }else { echo "Data Not Found"; } ?>
</div>
</div>

<div class="col-md-6">
  <div class="table-responsive">
    <div class="panel panel-warning-alt"><caption><center><h4>Meter Replacement</h4></center></caption></div>
    <?php $n=0;  if(count($datar)){ ?>
    <table class="tabledata table table-primary table table-striped table-bordered table-hover table-sm">
      <thead>
        <tr>
          <th>No</th>
          <th>Region</th>
          <th>Target</th>
          <th>Achievement</th>
          <th>Performace(%)</th>
        </tr>
      </thead>
      @foreach ($datar as  $mr)
      <?php $n++; ?>
      <tr>
        <td>{{ $n }}</td>
        <td>{{ $mr->region_name }}</td>
        <td>{{ $mr->total_target }}</td>
        <td>{{ $mr->total_achievement }}</td>
        <td><?php  
         if($mr->total_target !=0 && $mr->total_target !=null){
        $number=($mr->total_achievement/$mr->total_target) *100;?>
         {{ number_format((float)$number, 2, '.', '')  }} % <?php } ?></td>
       </tr>
       @endforeach
       <tr class="text-primary" style="font-size:16px;">
        <td><span class="hide"> 99</span></td>
        <td style="text-align:left">Total</td>
        <td style="text-align:left">
          <?php 
          $datas=null;
          for($d=0;$d<count($datar);$d++){
           $datas += $datar[$d]->total_target;
         }
         echo number_format($datas) ;
         ?>

       </td>

       <td style="text-align:left">
         <?php 
         $datas=null;
         for($d=0;$d<count($datar);$d++){
           $datas += $datar[$d]->total_achievement;
         }
         echo number_format($datas);
         ?>
       </td> 

       <td><?php 
       $datas=null;
       $total_achievement=null;
       $total_target=null;
       foreach ($datar as  $nc){
        $total_achievement+=$nc->total_achievement;
        $total_target+=$nc->total_target;
      }
       if($total_target !=0 && $total_target !=null){
      $datas=(($total_achievement/$total_target)*100)/sizeof($datar);
      echo number_format($datas,2); 
     }
      ?>
    </td>
  </tr>
</table> 
<?php }else { echo "Data Not Found"; } ?>
</div>
</div>
</div>
<div class="row">
 <div class="col-md-6">
   <div class="table-responsive">
    <div class="panel panel-warning-alt"><caption><center><h4>New Connection</h4></center></caption></div>
    <?php $n=0; if(count($datanc)){ ?>
    <table class="tabledata table table-primary table table-striped table-bordered table-hover table-sm">
      <thead>
        <tr>
          <th>No</th>
          <th>Region</th>
          <th>Target</th>
          <th>Achievement</th>
          <th>Applied</th>
          <th>Performace(%)</th>
        </tr>
      </thead>
      @foreach ($datanc as  $nc)
      <?php $n++; ?>
      <tr>
        <td>{{ $n }}</td>
        <td>{{ $nc->region_name }}</td>
        <td>{{ $nc->total_target }}</td>
        <td>{{ $nc->total_achievement }}</td>
        <td>{{ $nc->applied }}</td>
        <td><?php  
         if($nc->total_target !=0 && $nc->total_target !=null){
        $number=($nc->total_achievement/$nc->total_target) *100;?>
         {{ number_format((float)$number, 2, '.', '')  }} % <?php } ?></td>
       </tr>
       @endforeach
       <tr class="text-primary" style="font-size:16px;">
        <td><span class="hide"> 99</span></td>
        <td style="text-align:left">Total</td>
        <td style="text-align:left">
          <?php 
          $datas=null;
          for($d=0;$d<count($datanc);$d++){
           $datas += $datanc[$d]->total_target;
         }
         echo number_format($datas) ;
         ?>

       </td>

       <td style="text-align:left">
         <?php 
         $datas=null;
         for($d=0;$d<count($datanc);$d++){
           $datas += $datanc[$d]->total_achievement;
         }
         echo number_format($datas);
         ?>
       </td>
       <td style="text-align:left">
         <?php 
         $datas=null;
         for($d=0;$d<count($datanc);$d++){
           $datas += $datanc[$d]->applied;
         }
         echo number_format($datas);
         ?>
       </td> 

       <td><?php 
       $datas=null;
       $total_achievement=null;
       $total_target=null;
       foreach ($datanc as  $nc){
        $total_achievement+=$nc->total_achievement;
        $total_target+=$nc->total_target;
      }
       if($total_target !=0 && $total_target !=null){
      $datas=(($total_achievement/$total_target)*100)/sizeof($datanc);
      echo number_format($datas,2);
    }
      ?>
    </td>
  </tr>
</table> 
<?php }else { echo "Data Not Found"; } ?>
</div> 
</div> 
<div class="col-md-6">
  <div class="table-responsive">
    <div class="panel panel-warning-alt"><caption><center><h4>Water Production</h4></center></caption></div>
    <?php $n=0;  if(count($datawp)){ ?>
    <table class="tabledata table table-primary table-striped table-bordered table-hover table-sm">
      <thead>
        <tr>
          <th>No</th>
          <th>Region</th>
          <th>Target</th>
          <th>Achievement</th>
          <th>Performace(%)</th>
        </tr>
      </thead>
      @foreach ($datawp as  $rvn)
      <?php $n++; ?>
      <tr>
        <td>{{ $n }}</td>
        <td>{{ $rvn->region_name }}</td>
        <td>{{ $rvn->total_target }}</td>
        <td>{{ $rvn->total_achievement }}</td>
        <td><?php  
         if($rvn->total_target !=0 && $rvn->total_target !=null){
        $number=($rvn->total_achievement/$rvn->total_target) *100;?>
         {{ number_format((float)$number, 2, '.', '')  }} % <?php } ?></td>
       </tr>

       @endforeach
       <tr class="text-primary" style="font-size:16px;">
        <td><span class="hide"> 99</span></td>
        <td style="text-align:left">Total</td>
        <td style="text-align:left">
          <?php 
          $datas=null;
          for($d=0;$d<count($datawp);$d++){
           $datas += $datawp[$d]->total_target;
         }
         echo number_format($datas) ;
         ?>

       </td>

       <td style="text-align:left">
         <?php 
         $datas=null;
         for($d=0;$d<count($datawp);$d++){
           $datas += $datawp[$d]->total_achievement;
         }
         echo number_format($datas);
         ?>
       </td> 

       <td><?php 
       $datas=null;
       $total_achievement=null;
       $total_target=null;
       foreach ($datawp as  $nc){
        $total_achievement+=$nc->total_achievement;
        $total_target+=$nc->total_target;
      }
       if($total_target !=0 && $total_target !=null){
      $datas=(($total_achievement/$total_target)*100)/sizeof($datawp);
      echo number_format($datas,2); 
    }
      ?>
    </td>
  </tr>

</table>
<?php } else { echo "Data Not Found"; } ?>

</div>
</div>

</div>

<div class="row">
 <div class="col-md-6">
   <div class="table-responsive">
    <div class="panel panel-warning-alt"><caption><center><h4>Leakage Control</h4></center></caption></div>
    <?php $n=0; if(count($datalg)){ ?>
    <table class="tabledata table table-primary table table-striped table-bordered table-hover table-sm">
      <thead>
        <tr>
          <th>No</th>
          <th>Region</th>
          <th>No of Leakage</th>
          <th>No of Fixed</th>
          <th>Pending</th>
        </tr>
      </thead>
      @foreach ($datalg as  $nc)
      <?php $n++; ?>
      <tr>
        <td>{{ $n }}</td>
        <td>{{ $nc->region_name }}</td>
        <td>{{ $nc->leakage }}</td>
        <td>{{ $nc->fixed }}</td>
        <td>
          <?php if($nc->leakage > $nc->fixed){?>
          {{ $nc->leakage- $nc->fixed }}
          <?php }else { echo "NILL"; }?>
        </td>

      </tr>
      @endforeach
      <tr class="text-primary" style="font-size:16px;">
        <td><span class="hide"> 99</span></td>
        <td style="text-align:left">Total</td>
        <td>
          <?php 
          $datas=null;
          for($d=0;$d<count($datalg);$d++){
           $datas += $datalg[$d]->leakage;
         }
         echo $datas;
         ?>

       </td>
       <td style="text-align:left">
         <?php 
         $datas=null;
         for($d=0;$d<count($datalg);$d++){
           $datas += $datalg[$d]->fixed;
         }
         echo $datas;
         ?>
       </td>
       <td style="text-align:left">
        <?php 
        $datas=null;
        for($d=0;$d<count($datalg);$d++){ 
          $number=($datalg[$d]->leakage - $datalg[$d]->fixed);
          if($number > 0){
            $datas += $number;
          }        
        }
        echo $datas;
        ?>
      </td>
    </tr>
  </table> 
  <?php }else { echo "Data Not Found"; } ?>
</div> 
</div> 
<div class="col-md-6">
  <div class="table-responsive">
    <div class="panel panel-warning-alt"><caption><center><h4>Customer Service</h4></center></caption></div>
    <?php $n=0; if(count($dataccr)){ ?>
    <table class="tabledata table table-primary table table-striped table-bordered table-hover table-sm">
      <thead>
        <tr>
          <th>No</th>
          <th>Region</th>
          <th>Call Center</th>
          <th>Region</th>
          <th>Total</th>
          <th>Resolved</th>
          <th>Pending</th>
        </tr>
      </thead>
      @foreach ($dataccr as  $nc)
      <?php $n++; ?>
      <tr>
        <td>{{ $n }}</td>
        <td>{{ $nc->region_name }}</td>
        <td>{{ $nc->center }}</td>
        <td>{{ $nc->regions }}</td>
        <td>{{ $nc->center + $nc->regions }}</td>
        <td>{{ $nc->resolved }}</td>
        <td>
          <?php if(($nc->center + $nc->regions) > $nc->resolved){?>
          {{ ($nc->center + $nc->regions) - $nc->resolved }}
          <?php }else { echo "NILL"; }?>
        </td>

      </tr>
      @endforeach
      <tr class="text-primary" style="font-size:16px;">
        <td><span class="hide"> 99</span></td>
        <td style="text-align:left">Total</td>
        <td>
          <?php 
          $datas=null;
          for($d=0;$d<count($dataccr);$d++){
           $datas += $dataccr[$d]->center;
         }
         echo $datas;
         ?>

       </td>
       <td style="text-align:left">
         <?php 
         $datas=null;
         for($d=0;$d<count($dataccr);$d++){
           $datas += $dataccr[$d]->regions;
         }
         echo $datas;
         ?>
       </td>
       <td style="text-align:left">
        <?php 
        $datas=null;
        for($d=0;$d<count($dataccr);$d++){ 
          $number=($dataccr[$d]->center + $dataccr[$d]->regions);
          if($number > 0){
            $datas += $number;
          }        
        }
        echo $datas;
        ?>
      </td>
      <td style="text-align:left">
        <?php 
        $datas=null;
        for($d=0;$d<count($dataccr);$d++){ 
          $number=($dataccr[$d]->resolved);
          if($number > 0){
            $datas += $number;
          }        
        }
        echo $datas;
        ?>
      </td>
      <td style="text-align:left">
        <?php 
        $datas=null;
        for($d=0;$d<count($dataccr);$d++){ 
          $number=($dataccr[$d]->center + $dataccr[$d]->regions) - $dataccr[$d]->resolved;
          if($number > 0){
            $datas += $number;
          }        
        }
        echo $datas;
        ?>
      </td>

    </table> 

    <?php }else { echo "Data Not Found"; } ?>
  </div>
</div>

</div>

<div class="row">
 <div class="col-md-12">
  <div class="table-responsive">
    <div class="panel panel-warning-alt"><caption><center><h4>Waste water</h4></center></caption></div>
    @if(count($dataww))
    <?php $n=0; ?>
    <table class="tabledata table table-primary table table-striped table-bordered table-hover table-sm">
     <thead>
      <tr>
        <th><b><u>No</u></b></th>
        <th><b><u>Region</u></b></th>
        <th><b><u>Indicator</u></b></th>
        <th><b><u>Target</u></b></th>
        <th><b><u>Reported</u></b></th>
        <th><b><u>Achieved</u></b></th>
        <th><b><u>Performance</u></b></th>
      </tr>
    </thead>
    @foreach ($dataww as  $wc)
    <?php $n++; ?>
    <tr>
      <td>{{ $n }}</td>
      <td>{{ $wc->region_name }}</td>
      <td>{{ $wc->indicator_name }}</td>
      <td>{{ $wc->total_target }}</td>
      <td>{{ $wc->total_reported }}</td>
      <td>{{ $wc->total_achievement }}</td>
      <td><?php  
       if($wc->total_target !=0 && $wc->total_target !=null){
      $number=($wc->total_achievement/$wc->total_target) *100;?>
       {{ number_format((float)$number, 2, '.', '')  }} % <?php } ?></td>
     </tr>
     @endforeach
   </table>
   @else
   <table class="tabledata table table-primary table table-striped table-bordered table-hover table-sm">
     <thead>
      <tr>
        <th><b><u>No</u></b></th>
        <th><b><u>Region</u></b></th>
        <th><b><u>Indicator</u></b></th>
        <th><b><u>Target</u></b></th>
        <th><b><u>Reported</u></b></th>
        <th><b><u>Achieved</u></b></th>
        <th><b><u>Performance</u></b></th>
      </tr>
    </thead>
  </table>
  @endif
</div>
</div>
</div>

</div>
</div>

@permission('dashboard')

@else
<h5>Data not Found</h5>
@endpermission	

@section('js-content')
<script>

$(document).ready(function() {
  var table = $('.tabledata').DataTable( {

    lengthChange: false,
    searching: false, 
    paging: false, 
    info: false,
         //order: [[ 0, "asc" ]],
         buttons: {

          buttons: [

          { extend: 'copy', className: 'btn-warning', text: '<i class="fa fa-files-o"></i>', titleAttr: 'Copy', title: 'Table Title Goes Here' },

          { extend: 'excel', className: 'btn-success', text: '<i class="fa fa-file-excel-o"></i>', titleAttr: 'Excel', title: 'Table Title Goes Here' },

          { extend: 'pdf', className: 'btn-danger', text: '<i class="fa fa-file-pdf-o"></i>', titleAttr: 'PDF', title: 'Table Title Goes Here' },

          { extend: 'print', className: 'btn-info', text: '<i class="fa fa-print"></i>', titleAttr: 'Print', titleAttr: 'Print', title: 'Table Title Goes Here'},

          { extend: 'csvHtml5', className: 'btn-dark', text: 'CSV', titleAttr: 'CSV', title: 'Table Title Goes Here'},

          { extend: 'colvis', className: 'btn-outline-primary' }

          ]

        }

      } );

} );


</script>
@endsection

@endsection 
@endpermission 



