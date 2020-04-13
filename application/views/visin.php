<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Visin Google Charts</title>
    <link rel="stylesheet" href="<?php echo base_url('vendor/uikit/css/'); ?>uikit.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>    
    <script type="text/javascript">
        // Mengambil API visualisasi.
        google.charts.load('current', {'packages':['corechart']});
        //mengambil data dari variabel PHP
        var region=[];
        region['dataStr'] = '<?php echo $region;?>';        
        region['dataArray'] = JSON.parse(region['dataStr']);   
        //menggambar grafik
        google.charts.setOnLoadCallback(function(){
            drawChart(region['dataArray'], 'pie','region');       
        });

        var sales=[];
        sales['dataStr'] = '<?php echo $sales;?>';        
        sales['dataArray'] = JSON.parse(sales['dataStr']);
  
        google.charts.setOnLoadCallback(function(){
            drawChart(region['dataArray'], 'pie','region');
            drawChart(sales['dataArray'],'bar','sales');        
        });

        var produk=[];
        produk['dataStr'] = '<?php echo $produk;?>';        
        produk['dataArray'] = JSON.parse(produk['dataStr']);    
        //menggambar grafik
        google.charts.setOnLoadCallback(function(){
            drawChart(region['dataArray'], 'pie','region');
            drawChart(sales['dataArray'],'bar','sales');
            drawChart(produk['dataArray'],'bar','produk');        
        });

        var bulanan=[];
        bulanan['dataStr'] = '<?php echo $bulanan;?>';        
        bulanan['dataArray'] = JSON.parse(bulanan['dataStr']);
        //menggambar grafik
        google.charts.setOnLoadCallback(function(){
            drawChart(region['dataArray'], 'pie','region');
            drawChart(sales['dataArray'],'bar','sales');
            drawChart(produk['dataArray'],'bar','produk');
            drawChart(bulanan['dataArray'],'bar','bulanan');
        });

        var total_biaya=[];
        total_biaya['dataStr'] = '<?php echo $total_biaya;?>';        
        total_biaya['dataArray'] = JSON.parse(total_biaya['dataStr']);   
        //menggambar grafik
        google.charts.setOnLoadCallback(function(){
            drawChart(produk['dataArray'], 'pie','produk');
            drawChart(total_biaya['dataArray'], 'pie','total_biaya');
        });

        var biaya_per_item=[];
        biaya_per_item['dataStr'] = '<?php echo $biaya_per_item;?>';        
        biaya_per_item['dataArray'] = JSON.parse(biaya_per_item['dataStr']);   
        //menggambar grafik
        google.charts.setOnLoadCallback(function(){
            drawChart(produk['dataArray'], 'bar','produk');
            drawChart(biaya_per_item['dataArray'], 'bar','biaya_per_item');
        });

        // Menentukan data yang akan ditampilkan
        function drawChart(dataArray,type,container) {
            // Membuat data tabel yang sesuai dengan format google chart dari sumber data array javascript
            var data = new google.visualization.arrayToDataTable(dataArray,false);      
            // Tentukan pengaturan chart
            var options = {
                legend:'bottom',            
                titlePosition:'none',
                titleTextStyle:{fontSize:18},
                chartArea:{width:'80%',height:'70%'}                      
                };
            if(type == 'pie')
            {
                var chart = new google.visualization.PieChart(document.getElementById(container));
            }
            if(type == 'column')
            {
                var chart = new google.visualization.ColumnChart(document.getElementById(container));
            }
            if(type == 'bar')
            {
                var chart = new google.visualization.BarChart(document.getElementById(container));
            }
            chart.draw(data, options);
        }
    </script> 
</head>
<body>
    <nav class="uk-navbar-container uk-margin" uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="#">Analisis Penjualan</a>
        </div>
    </nav>
    <div class="uk-container">
        <div class="uk-child-width-1-2@s" uk-grid uk-height-match="target: > div > .uk-card">    
            <div>
                <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                    <h3 class="uk-card-title">Penjualan Berdasarkan Region</h3>
                    <div id="region" style="height:350px;"></div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                    <h3 class="uk-card-title">Hasil Penjualan Oleh Sales</h3>
                    <div id="sales" style="height:350px;"></div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                    <h3 class="uk-card-title">Produk Terlaris</h3>
                    <div id="produk" style="height:350px;"></div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                    <h3 class="uk-card-title">Penjualan Bulanan</h3>
                    <div id="bulanan" style="height:350px;"></div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                    <h3 class="uk-card-title">Total Biaya Produk</h3>
                    <div id="total_biaya" style="height:350px;"></div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                    <h3 class="uk-card-title">Biaya @Produk Region</h3>
                    <div id="biaya_per_item" style="height:350px;"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('vendor/uikit/js/'); ?>uikit.js"></script>
</body>
</html>