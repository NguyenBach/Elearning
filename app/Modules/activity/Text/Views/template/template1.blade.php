<?php $text = \App\Modules\activity\Text\Model\TextContent::where('id',$activity->activity_instance)->first() ?>
<h2>{{$text->title}}</h2>
<p>
    {{$text->content}}
</p>
