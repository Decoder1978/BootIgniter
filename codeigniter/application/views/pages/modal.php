<!-- Modal -->

<!-- CHANGE THIS!!!!! -->
        <div class="modal fade" id=<?php echo "myModal$i";?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-md-8">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:600px">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                    <li data-target="#myCarousel" data-slide-to="3"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img alt="1" width="460" height="600">

                                    <div class="item">
                                        <img alt="2" width="460" height="600">
                                    </div>

                                    <div class="item">
                                        <img alt="3" width="460" height="600">
                                    </div>

                                    <div class="item">
                                        <img alt="4" width="460" height="600">
                                    </div>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="modal-body inline">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="http://www.solidbackgrounds.com/images/2880x1800/2880x1800-tiffany-blue-solid-color-background.jpg" width="50" height="50" alt="..." class="img-circle">
                                    </div>
                                    <div class="col-md-9">
                                        <small>Text Text Text Text</small>
                                        <small>Text Text Text Text</small>
                                        <small>Text Text Text Text</small>
                                        <br/>
                                        <span class="glyphicon glyphicon-heart"></span> Icon
                                    </div>
                                </div>
                               <hr/>
                               
                                <p class="text-success">Text Text Text</p>
                                <p>TextTextText</p>
                                <p class="text-mute">TextTextText</p>
                                <br/>                               
                                <p class="text-success">Text Text Text</p>
                                <p>TextTextText</p>
                                <p class="text-mute">TextTextText</p>
                                <br/>

                                <input placeholder="Comment" type="text" style="height:100px" class="form-control" />
                                <span class="text-mute">Please write your opinion.</span>
                                <button class="btn btn-sm btn-primary pull-right">Save</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>