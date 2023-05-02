<div style='color:red'> Красненько </div>
<?php echo "<div style='color:green'> Зелененько </div>";
?>
<div> Привет </div>

<div style='background-color:yellow'!important;> 
    <div style='color:red'> Красненько </div>
    <div style='color:green'> Зелененько </div>
    <div style='background-color:black'> Черныш </div>
</div>

<div><?php echo 5*6;?></div>

<?php for($i=0; $i<10; $i++){ ?>
    <div style='color:magenta'><?php echo $i;?></div>
<?php } ?>

<div style='background-color:yellow'> ДИВ </div>
<span style='background-color:red'> Текст1 </span><span style='background-color:green'> Текст2 </span><span style='background-color:blue'> Текст3 </span>

<ul>    
    <li> 1 </li>
    <li> 2 </li>
</ul>


<table>
    <thread>
        <tr> 
            <td> 3ar1 </td><td> 3ar2 </td><td> 3ar3 </td>
        </tr>
        <tr> 
            <td> 3ar1 </td><td> 3ar2 </td><td> 3ar3 </td>
        </tr>
        <tr> 
            <td> 3ar1 </td><td> 3ar2 </td><td> 3ar3 </td>
        </tr>
    </thread>
</table>

<style>
    table,tr,td {
        border: 3px solid grey;
    }
</style>

<input type = 'checkbox'>
<input type = 'radio' name = 'radio1'>
<input type = 'radio' name = 'radio1'>
<input type = 'text' value = 'Приветмедвед' placeholder="Напиши сюда">

<select>
    <option> 1 </option>
    <option> 2 </option>
    <option> 3 </option>
</select>