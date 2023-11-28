<div style="display:flex">
<h1 >Biểu đồ </h1>
  <div class="row2">
    
    <div class="row2 form_content ">
      <div
              id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
      </div>

      <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

// Set Data
          // const data = google.visualization.arrayToDataTable([
          //   ['Contry', 'Mhl'],
          //   ['Italy',54.8],
          //   ['France',48.6],
          //   ['Spain',44.4],
          //   ['USA',23.9],
          //   ['Argentina',14.5]
          // ]);
          const data = google.visualization.arrayToDataTable([
            ['Danh Mục', 'Số Lượng'],
            <?php
              foreach($listsanpham as $sanpham){
                extract($sanpham);
                echo "['$name',$soBinhLuan],";
              }
            ?>
          ]);

// Set Options
          const options = {
            title:'BIỂU ĐỒ SỐ LƯỢNG BÌNH LUẬN TRONG DANH MỤC',
            is3D:true
          };

// Draw
          const chart = new google.visualization.PieChart(document.getElementById('myChart'));
          chart.draw(data, options);

        }
      </script>

    </div>
  </div>
  
  <div class="row2">
    
    <div class="row2 form_content ">
      <div
              id="myChart1" style="width:100%; width:800px; height:500px; align-items: center">
      </div>

      <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

// Set Data
          // const data = google.visualization.arrayToDataTable([
          //   ['Contry', 'Mhl'],
          //   ['Italy',54.8],
          //   ['France',48.6],
          //   ['Spain',44.4],
          //   ['USA',23.9],
          //   ['Argentina',14.5]
          // ]);
          const data = google.visualization.arrayToDataTable([
            ['Danh Mục', 'Số Lượng'],
            <?php
              foreach($dsthongke as $thongke){
                extract($thongke);
                echo "['$name',$soluong],";
              }
            ?>
          ]);

// Set Options
          const options = {
            title:'BIỂU ĐỒ SỐ LƯỢNG SẢN PHẨM TRONG DANH MỤC',
            is3D:true
          };

// Draw
          const chart = new google.visualization.PieChart(document.getElementById('myChart1'));
          chart.draw(data, options);

        }
      </script>

    </div>
  </div>
</div>