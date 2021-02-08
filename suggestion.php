<?php
  $con = new mysqli("localhost","root","","ajax_db");
  if (!$con) {
     die ("Connection fale");
  }

  $i = $_GET['i'];
  $sql = "SELECT *  from bookdetails where id ='$i'";
  $result = mysqli_query($con,$sql);
  if ($result) { ?>
  <table border="2" cellpadding="10px" cellspacing="10px" >
  <tr>
    <th>বইয়ের নাম</th>
    <th>লেখকের নাম</th>
    <th>দাম</th>
    <th>সারাংশ</th>
  </tr>
  <?php 
     while ($value = $result->fetch_assoc()) { ?>
         <tr>
             <td><?php echo $value['book_name']; ?></td>
              <td><?php echo $value['writer_name']; ?></td>
              <td><?php echo $value['price']; ?></td>
              <td><?php echo $value['summary']; ?></td>
         </tr>
        </table>
    <?php } } ?>