        </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?=base_url()?>assets/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#tabledata').DataTable({
                    "aaSorting": [],
                    "scrollX": true,
                    "lengthMenu": [ [5,10, 25, 50, -1], [5,10, 25, 50, "All"] ]
                }
                );
                $('#tabledata2').DataTable({
                    "aaSorting": [],
                    "scrollX": true,
                    "lengthMenu": [ [5,10, 25, 50, -1], [5,10, 25, 50, "All"] ]
                }
                );
                $('#tabledata3').DataTable({
                    "aaSorting": [],
                    "scrollX": true,
                    "lengthMenu": [ [5,10, 25, 50, -1], [5,10, 25, 50, "All"] ]
                }
                );
                $('#tabledata4').DataTable({
                    "aaSorting": [],
                    "scrollX": true,
                    "lengthMenu": [ [5,10, 25, 50, -1], [5,10, 25, 50, "All"] ]
                }
                );
                $('input[type=radio][name=radio-print]').click(function(){
                    var related_class=$(this).val();
                    $('.'+related_class).prop('disabled',false);
                    
                    $('input[type=radio][name=radio-print]').not(':checked').each(function(){
                        var other_class=$(this).val();
                        $('.'+other_class).prop('disabled',true);
                    });
                });
            } );
        </script>
            <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            </script>
    </body>
</html>
