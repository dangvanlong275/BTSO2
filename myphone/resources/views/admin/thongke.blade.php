<html lang="vi">
@include('admin.header')

<body onload="thongke()">

    @include('admin.menu')
    {{-- Chart JS --}}
    <div class="thongke" >
        <div class="canvasContainer" style="width: 100%">
            <canvas id="myChart1"></canvas>
        </div> 
    </div>

    {{-- Chart Laravel --}}

    {{-- <div style="color: wheat; font-size: 33px; margin-left: 450px; margin-top: 25px;">
        <strong>Thống kê sản phẩm bán ra</strong>
    </div>
    <div id="chart" style="height: 450px;"></div>
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <script>
        const chart = new Chartisan({
          el: '#chart',
          url: "@chart('thongke')"
        });
      </script> --}}
</body>
</html>