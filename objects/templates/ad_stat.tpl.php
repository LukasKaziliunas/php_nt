<?php

include_once 'config.php';
include_once 'sql.php';
include_once 'objects/models/estate.php';

    $query = "SELECT count(*) as c FROM estate WHERE fk_CATEGORY = 1";
    $res = mysql::select($query);

    $houseCount = $res[0]['c'];

    $query2 = "SELECT count(*) as c FROM estate WHERE fk_CATEGORY = 2";
    $res2 = mysql::select($query2);

    $flatCount = $res2[0]['c'];

    $query3 = "SELECT count(*) as c FROM estate WHERE fk_CATEGORY = 3";
    $res3 = mysql::select($query3);

    $otherCount = $res3[0]['c'];

    $sum = $houseCount + $flatCount + $otherCount;

   $var1 = (100 * $houseCount) / $sum;
   $var2 = ((100 * $flatCount) / $sum) + $var1;
   $var3 = ((100 * $otherCount) / $sum) + $var1 + $var2;


   
   $this_years_sum_house = mysql::select("SELECT SUM(price) as sum , count(*)+1 as count FROM estate WHERE YEAR(timestamp) = YEAR(CURDATE()) AND fk_CATEGORY = 1");
   $last_years_sum_house = mysql::select("SELECT SUM(price) as sum , count(*)+1 as count FROM estate WHERE YEAR(timestamp) = YEAR(CURDATE()) - 1  AND fk_CATEGORY = 1");
   $this_years_sum_flat = mysql::select("SELECT SUM(price) as sum , count(*)+1 as count FROM estate WHERE YEAR(timestamp) = YEAR(CURDATE()) AND fk_CATEGORY = 2");
   $last_years_sum_flat = mysql::select("SELECT SUM(price) as sum , count(*)+1 as count FROM estate WHERE YEAR(timestamp) = YEAR(CURDATE()) - 1  AND fk_CATEGORY = 2");



   $avgSumThisYearHouse =  $this_years_sum_house[0]['sum'] /  $this_years_sum_house[0]['count'];
   $avgSumLastYearHouse =  $last_years_sum_house[0]['sum'] / $last_years_sum_house[0]['count'];

   $avgSumThisYearFlat =  $this_years_sum_flat[0]['sum'] /  $this_years_sum_flat[0]['count'];
   $avgSumLastYearFlat =  $last_years_sum_flat[0]['sum'] / $last_years_sum_flat[0]['count'];

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

<style>

.chart {
  background: conic-gradient( #decf3f 0 <?php echo $var1 ."%" ?>, #b276b2 0 <?php echo $var2 ."%" ?> , #faa43a 0);
  border-radius: 50%;
  width: 50%;
  height: 0;
  padding-top: 50%;
  float: left;
  padding-right: 20px;
}
.key {
  width: 50%;
  float: right;
  list-style: none;
  display: table;
  border-collapse: separate;
}
.key > li {
  display: table-row;
}
.key > li > * {
  display: table-cell;
  border-bottom: 12px solid #fff;
}
.percent {
  color: #fff;
  padding: 10px 2px;
  text-shadow: 0 0 1px #000;
  text-align: center;
}
.choice {
  padding-left: 10px;
}
.red {
  background: #f15854;
}
.gray {
  background: #4d4d4d;
}
.blue {
  background: #5da5da;
}
.yellow {
  background: #decf3f;
}
.purple {
  background: #b276b2;
}
.orange {
  background: #faa43a;
}
* {
  box-sizing: border-box;
}
body {
  padding: 20px;
  font-family: sans-serif;
}

#stat-category{
  width: 400px;
  height: 350px;
}

.container {
    max-width: 1400px;
    margin: 40px auto 0 auto;
    background-color: #FFF;
    padding: 30px 0;
    display: flex;
    align-items: center;
    justify-content: space-around;
    flex-wrap: wrap;
  }

  /****************Antras chart************ */

  body, html {
	 height: 100%;
}
 body {
	 display: flex;
	 flex-direction: column;
	 justify-content: center;
	 align-items: center;
	 font-family: "fira-sans-2", Verdana, sans-serif;
}
 #q-graph {
	 display: block;
	/* fixes layout wonkiness in FF1.5 */
	 position: relative;
	 width: 600px;
	 height: 300px;
	 margin: 1.1em 0 0;
	 padding: 0;
	 background: transparent;
	 font-size: 11px;
}
 #q-graph caption {
	 caption-side: top;
	 width: 600px;
	 text-transform: uppercase;
	 letter-spacing: 0.5px;
	 top: -40px;
	 position: relative;
	 z-index: 10;
	 font-weight: bold;
}
 #q-graph tr, #q-graph th, #q-graph td {
	 position: absolute;
	 bottom: 0;
	 width: 150px;
	 z-index: 2;
	 margin: 0;
	 padding: 0;
	 text-align: center;
}
 #q-graph td {
	 transition: all 0.3s ease;
}
 #q-graph td:hover {
	 background-color: #4d4d4d;
	 opacity: 0.9;
	 color: white;
}
 #q-graph thead tr {
	 left: 100%;
	 top: 50%;
	 bottom: auto;
	 margin: -2.5em 0 0 5em;
}
 #q-graph thead th {
	 width: 7.5em;
	 height: auto;
	 padding: 0.5em 1em;
}
 #q-graph thead th.sent {
	 top: 0;
	 left: 0;
	 line-height: 2;
}
 #q-graph thead th.paid {
	 top: 2.75em;
	 line-height: 2;
	 left: 0;
}
 #q-graph tbody tr {
	 height: 296px;
	 padding-top: 2px;
	 border-right: 1px dotted #c4c4c4;
	 color: #aaa;
}
 #q-graph #q1 {
	 left: 0;
}
 #q-graph #q2 {
	 left: 150px;
}
 

 #q-graph tbody th {
	 bottom: -1.75em;
	 vertical-align: top;
	 font-weight: normal;
	 color: #333;
}
 #q-graph .bar {
	 width: 60px;
	 border: 1px solid;
	 border-bottom: none;
	 color: #000;
}
 #q-graph .bar p {
	 margin: 5px 0 0;
	 padding: 0;
	 opacity: 0.4;
}
 #q-graph .sent {
	 left: 13px;
	 background-color: #39cccc;
	 border-color: transparent;
}
 #q-graph .paid {
	 left: 77px;
	 background-color: #7fdbff;
	 border-color: transparent;
}
 #ticks {
	 position: relative;
	 top: -300px;
	 left: 2px;
	 width: 296px;
	 height: 300px;
	 z-index: 1;
	 margin-bottom: -300px;
	 font-size: 10px;
	 font-family: "fira-sans-2", Verdana, sans-serif;
}
 #ticks .tick {
	 position: relative;
	 border-bottom: 1px dotted #c4c4c4;
	 width: 300px;
}
 #ticks .tick p {
	 position: absolute;
	 left: -5em;
	 top: -0.8em;
	 margin: 0 0 0 0.5em;
}
 


</style>

<div class="container">

<!--****************************** -->
<div id="stat-category">

<div class="chart"></div>

<ul class="key">
 
  
  <li>
    <strong class="percent purple"><?php  echo round(100 * $flatCount / $sum , 2 ) . "%" ?></strong>
    <span class="choice">butai</span>
  </li>

  <li>
    <strong class="percent yellow"><?php  echo round(100 * $houseCount / $sum , 2 ) . "%" ?></strong>
    <span class="choice">namai</span>
  </li>
  <li>
    <strong class="percent orange"><?php  echo round(100 * $otherCount / $sum , 2 ) . "%" ?></strong>
    <span class="choice">kita</span>
  </li>
</ul>

</div>
<!--****************************** -->

<!--****************************** -->
<div id="stat-category">
<table id="q-graph">
<caption>vidutines kainos</caption>
<thead>

<th class="sent">Namai</th>
<th class="paid">Butai</th>

</thead>
<tbody>
<tr class="qtr" id="q1">
<th scope="row">praeiti metai</th>
<td class="sent bar" style="height: 111px;"><p><?php echo round($avgSumLastYearHouse , 2) ?></p></td>
<td class="paid bar" style="height: 99px;"><p><?php echo round($avgSumLastYearFlat , 2) ?></p></td>
</tr>
<tr class="qtr" id="q2">
<th scope="row">esami metai</th>
<td class="sent bar" style="height: 206px;"><p><?php echo round($avgSumThisYearHouse , 2) ?></p></td>
<td class="paid bar" style="height: 194px;"><p><?php echo round($avgSumThisYearFlat , 2) ?></p></td>
</tr>

</tbody>
</table>


<div id="ticks">
<div class="tick" style="height: 59px;"><p>$200,000</p></div>
<div class="tick" style="height: 59px;"><p>$150,000</p></div>
<div class="tick" style="height: 59px;"><p>$100,000</p></div>
<div class="tick" style="height: 59px;"><p>$50,000</p></div>

</div>
</div>
<!--****************************** -->

</div>


