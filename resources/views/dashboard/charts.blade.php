<div id="news-chart"></div>
<script>
    // line chart
    var data =[
                @foreach ($news as $data)
            {

                ym: "{{ $data->year }}-{{ $data->month }}", b: "{{ $data->total_news }}"
            },
            @endforeach
        ],

        config = {

            data: data,
            xkey: 'ym',
            ykeys: 'b',
            labels: ['@lang('general.total_news')'],
            fillOpacity: 0.4,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors:['#ffffff'],
            pointStrokeColors: ['white'],
            //lineColors:['red','red'],
            lineWidth:4,
            gridStrokeWidth: 0.4,
            pointSize: 1,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10,
            barColors: ['blueberry','white'],
        };

    config.element = 'news-chart';
    Morris.Bar(config);
    config.stacked = true;

</script>


