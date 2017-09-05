<?php $text = \App\Modules\mod\Text\Model\TextContent::where('mod_id',$activity->instance)->first() ?>
<h2>{{$text->title}}</h2>
<p>
    {{$text->content}}
</p>
