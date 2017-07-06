@extends('Core::template.index')
@section('content')
    <div class="article">
        <h2><span>Excellent Solution</span> For Your Business</h2>
        <p class="infopost">Posted <span class="date">on 11 sep 2018</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp;
            Filed under <a href="#">templates</a>, <a href="#">internet</a></p>
        <div class="clr"></div>
        <div class="img"><img src="images/img1.jpg" width="178" height="185" alt="" class="fl"/></div>
        <div class="post_content">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. <a href="#">Suspendisse bibendum.
                    Cras id urna.</a> Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere
                nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit
                ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra condimentum, lorem tellus
                eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. In tristique orci porttitor
                ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.
                Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc
                justo tempus leo.</p>
            <p><strong>Aenean consequat porttitor adipiscing. Nam pellentesque justo ut tortor congue lobortis. Donec
                    venenatis sagittis fringilla.</strong> Etiam nec libero magna, et dictum velit. Proin mauris mauris,
                mattis eu elementum eget, commodo in nulla. Mauris posuere venenatis pretium. Maecenas a dui sed lorem
                aliquam dictum. Nunc urna leo, imperdiet eu bibendum ac, pretium ac massa. Cum sociis natoque penatibus
                et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Quisque condimentum luctus
                ullamcorper.</p>
            <p class="spec"><a href="#" class="rm">Read more</a> <a href="#" class="com">Comments <span>11</span></a>
            </p>
        </div>
        <div class="clr"></div>
    </div>
    <div class="article">
        <h2><span>We'll Make Sure Template</span> Works For You</h2>
        <p class="infopost">Posted <span class="date">on 29 aug 2016</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp;
            Filed under <a href="#">templates</a>, <a href="#">internet</a></p>
        <div class="clr"></div>
        <div class="img"><img src="images/img2.jpg" width="178" height="185" alt="" class="fl"/></div>
        <div class="post_content">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id
                urna. <a href="#">Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere
                    nunc justo tempus leo.</a> Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac
                blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra condimentum, lorem
                tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. In tristique orci
                porttitor ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse
                bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam.</p>
            <p><strong>Aenean consequat porttitor adipiscing. Nam pellentesque justo ut tortor congue lobortis. Donec
                    venenatis sagittis fringilla.</strong> Etiam nec libero magna, et dictum velit. Proin mauris mauris,
                mattis eu elementum eget, commodo in nulla. Mauris posuere venenatis pretium. Maecenas a dui sed lorem
                aliquam dictum. Nunc urna leo, imperdiet eu bibendum ac, pretium ac massa. Cum sociis natoque penatibus
                et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Quisque condimentum luctus
                ullamcorper.</p>
            <p class="spec"><a href="#" class="rm">Read more</a> <a href="#" class="com">Comments <span>7</span></a></p>
        </div>
        <div class="clr"></div>
    </div>
    <p class="pages">
        <small>Page 1 of 2</small>
        <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>
@stop
@section('slider')
    <div class="slider">
        <div id="coin-slider"><a href="#"><img src="images/slide1.jpg" width="960" height="360" alt=""/><span> Tusce nec iaculis risus hasellus nec sem sed tellus malesuada porttitor. Mauris scelerisque feugiat ante in vulputate. Nam sit amet ullamcorper tortor. Phasellus posuere facilisis cursus. Nunc est lorem, dictum at scelerisque sit amet, faucibus et est. Proin mattis ipsum quis arcu aliquam molestie.</span></a>
            <a href="#"><img src="images/slide2.jpg" width="960" height="360" alt=""/><span> Tusce nec iaculis risus hasellus nec sem sed tellus malesuada porttitor. Mauris scelerisque feugiat ante in vulputate. Nam sit amet ullamcorper tortor. Phasellus posuere facilisis cursus. Nunc est lorem, dictum at scelerisque sit amet, faucibus et est. Proin mattis ipsum quis arcu aliquam molestie.</span></a>
            <a href="#"><img src="images/slide3.jpg" width="960" height="360" alt=""/><span> Tusce nec iaculis risus hasellus nec sem sed tellus malesuada porttitor. Mauris scelerisque feugiat ante in vulputate. Nam sit amet ullamcorper tortor. Phasellus posuere facilisis cursus. Nunc est lorem, dictum at scelerisque sit amet, faucibus et est. Proin mattis ipsum quis arcu aliquam molestie.</span></a>
        </div>
        <div class="clr"></div>
    </div>
@stop