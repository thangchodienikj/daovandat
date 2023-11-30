<main class="main text-center" style="width: 78%; margin: 0 auto;">
    <div class="mb-5"></div>
    <div class="box_title " style="font-size: 25px">Thống kê theo sản phẩm</div> <br>
    <div class="mb-3">
        <form action="index.php?act=thongketg" method="post" >
            <select class="form-select" id="tg" name="tg" style="width: 200px;height: 37px">
                <option value="0" selected>Chọn khoảng thời gian</option>
                <option value="1">1 tuần trước</option>
                <option value="2">1 tháng trước</option>
                <option value="3">6 tháng trước</option>
                <option value="4">1 năm trước</option>
            </select>
            <input type="submit" name="gui" class="btn btn-primary value="Gửi">
        </form>
    </div>
    <div class="container mt-3">
        <div class="row form_content">
            <div class="col-12">
                <div class="mb-3 formds_loai">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center col-md-1"></th>
                                <th class="text-center col-md-1">Mã sản phẩm</th>
                                <th class="text-center col-md-2">Tên sản phẩm</th>
                                <th class="text-center col-md-2">Lượt xem</th>
                                <th class="text-center col-md-2">Lượt mua</th>
                                <th class="text-center col-md-2">Lượt bình luận</th>
                                <th class="text-center col-md-2">Danh thu</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($thongkesp as $value){
                                extract($value);
                                echo'<tr>
                                            <td class="text-center col-md-1"><input type="checkbox" name="" id=""></td>
                                            <td class="text-center col-md-1">'.$id.'</td>
                                            <td class="text-center col-md-2">'.$name.'</td>
                                            <td class="text-center col-md-2 justify-content-cente">'.$luotxem.'</td>
                                            <td class="text-center col-md-2">'.$luotmua.'</td>
                                            <td class="text-center col-md-2">'.$binhluan.'</td>
                                             <td class="text-center col-md-2">'.$luotmua * $price.'</td>
                                        </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="piechart"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tên danh mục', 'Doanh số'],
                <?php
                $tongdm=count($thongkesp);
                $i=1;
                foreach ($thongkesp as $tk){
                    extract($tk);
                    echo "['".$name."',".$luotmua * $price."],\n";
                    $i+=1;
                }
                ?>
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'Thống kêu doanh số bán hàng', 'width':1500, 'height':500};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</main>





