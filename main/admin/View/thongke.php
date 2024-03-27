 
        <meta charset="UTF-8">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
     google.load('visualization', '1.0', {'packages':['corechart']});
     google.setOnLoadCallback(drawVisualization);
     function drawVisualization() {
		 				//thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
            var rows=new Array();
            var tenhh=new Array();
            var soluongban=new Array();
            var dataten=0;
            var soluong=0;
            //b1: phải tạo bảng
            var data=new google.visualization.DataTable();
            // lấy dữ liệu từ database về
            <?php
              $hh=new hanghoa();
              $result=$hh->getThongKe();
              while($set=$result->fetch()){
                $tenhh=$set['tenhh'];//Dép Quai Chữ V Đan Chéo Vân Cá Sấu
                $slb=$set['soluong'];//25
                // đem biến này đưa vào mảng tenhh và soluongban
                echo "tenhh.push('".$tenhh."');";
                echo "soluongban.push('".$slb."');";
              }
            ?>
            //+ tạo dòng
            for(var i=0;i<tenhh.length;i++)
            {
              dataten=tenhh[i];
              soluong=parseInt(soluongban[i]);
              rows.push([dataten,soluong]);
            }
            // +tạo cột
            data.addColumn('string','Tên hàng hóa');
            data.addColumn('number','Số lượng bán');
            data.addRows(rows);
            //b2: tạo options
            var options={
              title:'Thống kê số lượng bán',
              'width':600,
              'height':500,
              'backgroundColor':'#ffffff',
              is3D:true
            };
            // b3: tiến hàng vẽ
            var chart=new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data,options);
                   
	 }
                   
    </script>
        <div class="thongke">
        <div style=" width:100%"   id="chart_div">dfsf
      </div>
      <select name="" id="">
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
      </select>
        <!-- <div style=" width:50%;  float: right"   id="chart_div1">dsfd</div>     -->
      </div>
 
 