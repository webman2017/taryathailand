<html>
<head>
    <title>รายชื่อผู้สแกน qr code ลุ้นรางวัล</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container box">
    <h4 align="center">สแกน QR CODE <?php $today = date("F j, Y,"); echo $today?></h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>ลำดับที่</th>
<!--                <th>ลำดับ</th>-->
<!--                <th>ชื่อสินค้า</th>-->
                <th>รหัส</th>
                <th style="100px">ชื่อ-นามสกุล</th>
                <th>เบอร์โทรศัพท์</th>
                <th>จังหวัด</th>
                					<th>วันที</th>
            </tr>
            <?php
            $i=1;
            foreach ($qr_data as $row) {?>

					<tr>
                        <td><?php echo $i;?></td>
<!--					<td>--><?php //echo $row->id;?><!--</td>-->
<!--						<td>--><?php //echo $row->product_name ;?><!--</td>-->
							<td><?php echo $row->code_generate ;?></td>
						<td><?php echo $row->name ;?></td>
							<td><?php echo substr($row->mobile,0,8)."**";?></td>

                         <td><?php  echo $row->province ;?></td>
                        <td><?php  echo $row->datetime ;?></td>
					</tr>
            <?php
                $i++;
           }
            ?>
        </table>
        <div align="center">
            <form method="post" action="<?php echo base_url(); ?>index.php/Excel_qr/action">
                <input type="submit" name="export" class="btn btn-success" value="Export"/>
            </form>
            <a href="<?php echo base_url(); ?>index.php/LatLongControl">
                <button class="btn btn-danger">สแกน พ.ย</button></a>
<!--            <a href="--><?php //echo base_url(); ?><!--LatLongControl_agency">-->
<!--                <button class="btn btn-primary">หมุด 189 คน</button></a>-->
        </div>
        <br/>
        <br/>
    </div>
</div>
</body>
</html>
























