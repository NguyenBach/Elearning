<?php
$pdf = \App\Modules\mod\PDF\Model\PDF::where('id',$activity->instance)->first();
$content = \App\Modules\mod\PDF\Model\PDFContent::where('mod_id',$activity->instance)->first();
?>


<h2>{{$content->title}} </h2>
<iframe src = "/ViewerJS/#{{$content->url}}" width='700' height='500' allowfullscreen webkitallowfullscreen></iframe>