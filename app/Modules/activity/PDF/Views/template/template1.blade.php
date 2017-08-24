
<?php
$pdf = \App\Modules\activity\PDF\Model\PDF::where('id',$activity->activity_instance)->first();
?>

<h2>{{$pdf->name}} </h2>
<p>{{$pdf->intro}}</p>
<iframe src = "/ViewerJS/#{{$pdf->pdf_link}}" width='700' height='500' allowfullscreen webkitallowfullscreen></iframe>