@push('scripts_vendor')
    <!-- ChartJS -->
    <script src="{{ asset('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            barChart(); // Inisialisasi grafik saat dokumen siap
            fetchAndUpdateData();
            // Memperbarui data setiap 3 detik // Memperbarui data pertama kali
            setInterval(fetchAndUpdateData, 3000);
        });

        function updateBarChart(data) {
            var barChart = Chart.instances[0];
            barChart.data.datasets[0].data = data;

            var backgroundColor;
            if (data.status == "Aman") {
                backgroundColor = 'blue';
            } else if (data.status == 'Siaga') {
                backgroundColor = 'yellow';
            } else {
                backgroundColor = 'red';
            }
            barChart.data.datasets[0].backgroundColor = [backgroundColor];

            barChart.update();
        }

        function fetchAndUpdateData() {
            $.ajax({
                type: "GET",
                url: "{{ route('monitoring.data') }}",
                dataType: "json",
                success: function(response) {
                    updateBarChart([response.data]);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function barChart() {
            // Bar Chart
            var barChartCanvas = $('#barchart').get(0).getContext('2d');
            var barData = {
                labels: ['Ketinggian Air'],
                datasets: [{
                    data: [],
                    label: 'Nilai ',
                    backgroundColor: []
                }]
            };
            var barOptions = {
                legend: {
                    display: false
                },
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                            max: 100
                        }
                    }]
                }
            };

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barData,
                options: barOptions
            });
        }
    </script>
@endpush
