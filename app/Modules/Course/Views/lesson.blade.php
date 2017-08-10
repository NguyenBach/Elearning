@extends('Core::template.2columns')
@section('content')
    <section id="lesson" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="lesson-content">
                        <h2>Lesson name</h2>
                        <div class="lesson-intro">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't look
                                even slightly believable</p>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#text" data-toggle="tab">Text</a></li>
                            <li><a data-toggle="tab" href="#video">Video</a></li>
                            <li><a data-toggle="tab" href="#youtube">Youtube</a></li>
                            <li><a data-toggle="tab" href="#audio">Audio</a></li>
                            <li><a data-toggle="tab" href="#filePDF">File PDF</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="text" class="tab-pane fade in active">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour, or randomised words which don't look
                                    even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be
                                    sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum
                                    generators on the Internet tend to repeat predefined chunks as necessary, making this the
                                    first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined
                                    with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.
                                    The generated Lorem Ipsum is therefore always free from repetition, injected humour, or
                                    non-characteristic words etc.

                                    It is a long established fact that a reader will be distracted by the readable content of a
                                    page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                    more-or-less normal distribution of letters, as opposed to using 'Content here, content
                                    here', making it look like readable English. Many desktop publishing packages and web page
                                    editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will
                                    uncover many web sites still in their infancy. Various versions have evolved over the years,
                                    sometimes by accident, sometimes on purpose (injected humour and the like).

                                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                                    interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are
                                    also reproduced in their exact original form, accompanied by English versions from the 1914
                                    translation by H. Rackham.</p>
                            </div>
                            <div id="video" class="tab-pane fade">
                                <video src="video/video1.mp4" width="100%" height="400px" controls></video>
                            </div>
                            <div id="youtube" class="tab-pane fade">
                                <iframe src="https://www.youtube.com/embed/BamZARzsIgs" frameborder="0" width="100%" height="500px"></iframe>
                            </div>
                            <div id="audio" class="tab-pane fade">
                                <audio src="audio/Shape-of-You-Ed-Sheeran.mp3" controls></audio>
                            </div>
                            <div id="filePDF" class="tab-pane fade">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">

                </div>
            </div>
        </div>
    </section>
@stop
@section('sidebar')
    @include('Core::template.sidebar')
    @stop
