<title>My Charts</title>



</head>
<body>
<center>
   <h3> Projects per month</h3>
   <h5> January : 40 </h5>
   <h5> February : 90 </h5>
   <h5> March : 30 </h5>
   <h5> April : 40 </h5>
   <h5> May : 18 </h5>
   <h5> Juin : 82 </h5>

</center>
</body>
<script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
