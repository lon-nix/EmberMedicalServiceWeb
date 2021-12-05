       
        <div class="footer fixed-bottom  clearfix mb-0 text-muted">
      
            <div class="container">
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                    <p class="text-center">&copy; <?php echo date("Y");?> Ember Medical Service. All rights reserved. </p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="#">L.Stephens</a></p>
                    </div>
                </div>
            </footer>
            </div>
        </div>
       
      
      
       
    
    <!-- Optional JavaScript; choose one of the two! -->
  <!--   <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script> -->
    <!-- <script src="assets/js/bootstrap.bundle.min.js"></script>
 -->
    <script src="assets/js/main.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    <!-- JQuery Script for date picker -->    
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="assets/js/bootstrap-clockpicker.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script>
        $( function() {
            var date = new Date();
            date.setDate(date.getDate());

            $('#doctor_schedule_date').datepicker({
                startDate: date,
                format: "yyyy-mm-dd",
                autoclose: true
            });

            $('#doctor_schedule_start_time').clockpicker({
                format: 'HH:mm',
                donetext:'Done'
            });

            $('#doctor_schedule_end_time').clockpicker({
                useCurrent: false,
                format: 'HH:mm',
                donetext:'Done'
            });

            $("#doctor_schedule_start_time").on("change.clockpicker", function (e) {
                console.log('test');
                $('#doctor_schedule_end_time').clockpicker('minDate', e.date);
            });

            $("#doctor_schedule_end_time").on("change.clockpicker", function (e) {
                $('#doctor_schedule_start_time').clockpicker('maxDate', e.date);
            });

           
            $( "#dateofbirth" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            dateFormat: "yy-mm-dd"
            });

                       
        } );
    </script>



     
  </body>
</html>