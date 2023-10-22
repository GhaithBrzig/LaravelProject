@extends('backOffice.backoffice_layout')

<script src="https://cdn.jsdelivr.net/npm/html2canvas"></script>
<script src="https://cdn.jsdelivr.net/npm/jspdf"></script>

<canvas id="myChart"></canvas>
<div class="main-content">
    <div class="page-content">
        <!-- ... other content ... -->
        <div class="row">
            <div class="col-xl-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title mb-0">Basic Line Chart</h4>
                  <br><br>
                  <form action="{{ route('export.pdf') }}" method="GET">
                  <button id="exportChartAsPdf" type="submit" onclick="click()">Export as PDF</button>
                  </form>
                </div>
                <!-- end card header -->

                <div class="card-body" style="width:100%;max-width: 716px;margin: 0 auto">
                    {!! $chart->container() !!}
                </div>

                <!-- end card-body -->
              </div>
              <!-- end card -->
            </div>
          </div>
    </div>
    <!-- End Page-content -->

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}

    <script >
        // Import the necessary libraries
        import html2canvas from 'html2canvas';
        import jsPDF from 'jspdf';

        // Attach a click event to your export button
       function click () {
        const chartContainer = document.querySelector('.card-body');

          // Use html2canvas to capture the chart container as an image
          html2canvas(chartContainer).then((canvas) => {
            // Create a new jsPDF instance
            const pdf = new jsPDF('landscape');

            // Add the captured image to the PDF
            const imgData = canvas.toDataURL('image/png');
            pdf.addImage(imgData, 'PNG', 10, 10, 280, 150); // Customize position and size

            // Save or download the PDF
            pdf.save('chart.pdf');
          });
       }
      </script>


</div>

