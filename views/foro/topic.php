<?php
/* @var $this yii\web\View */
?>
<!--<div class="row">
    <center>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary btn-lg">
                    <span style="font-size:30px;" class="glyphicon glyphicon-comment" aria-hidden="true"></span> <br>
                    <hr>
                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Foro
                </label>
                <label class="btn btn-primary btn-lg active">
                    <span style="font-size:30px;" class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                    <br>
                    <hr>
                    <input type="radio" name="options" id="option2" autocomplete="off"> Documentos
                </label>
                <label class="btn btn-primary btn-lg">
                    <span style="font-size:30px;" class="glyphicon glyphicon-play" aria-hidden="true"></span> <br>
                    <hr>
                    <input type="radio" name="options" id="option3" autocomplete="off"> Multimendia
                </label>
                <label class="btn btn-primary btn-lg">
                    <span style="font-size:30px;" class="glyphicon glyphicon-align-left" aria-hidden="true"></span> <br>
                    <hr>
                    <input type="radio" name="options" id="option3" autocomplete="off"> Mensajes
                </label>
            </div>
        </div>
    </center>
</div>
<br>-->

<!--<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
    <div class="panel panel-primary">
        <div class="panel-heading">Panel heading without title</div>
        <div class="panel-body">
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>-->
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="panel panel-primary">
        <div class="panel-heading"><?= $model->phforum->name; ?></div>
        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <table class="table table-condensed">
                    <tr>
                        <td class="active"><?= $model->content; ?>
                        </td>
                    </tr>

                </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <table class="table table-condensed">
                    <tr>
                        <center>
                            <a href=""><span style="font-size:20px;"
                                             class="glyphicon glyphicon-circle-arrow-down"></span><br>

                                <div>Descargar</div>
                            </a>
                            <hr>
                        </center>
                    </tr>
                    <tr>
                        <center>
                            <a href=""><span style="font-size:20px;"
                                             class="glyphicon glyphicon-circle-arrow-down"></span><br>

                                <div>Descargar</div>
                            </a>
                            <hr>
                        </center>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="panel panel-primary">
    <div class="panel-heading">Aportes</div>
    <div class="panel-body">
        <ul class="timeline">
            <li>
                <div class="timeline-badge"><i class="fa fa-check"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Lorem ipsum dolor</h4>

                        <p>
                            <small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                        </p>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor
                            perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi.
                            Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
                    </div>


                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolorem quibusdam, tenetur
                            commodi provident cumque magni voluptatem libero, quis rerum. Fugiat esse debitis optio,
                            tempore. Animi officiis alias, officia repellendus.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium maiores odit qui est
                            tempora eos, nostrum provident explicabo dignissimos debitis vel! Adipisci eius voluptates,
                            ad aut recusandae minus eaque facere.</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim
                            eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam
                            quaerat, magni commodi quisquam.</p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates est quaerat asperiores
                            sapiente, eligendi, nihil. Itaque quos, alias sapiente rerum quas odit! Aperiam officiis
                            quidem delectus libero, omnis ut debitis!</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge info"><i class="fa fa-save"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus modi quam ipsum alias
                            at est molestiae excepturi delectus nesciunt, quibusdam debitis amet, beatae consequuntur
                            impedit nulla qui! Laborum, atque.</p>
                        <hr>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-gear"></i> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a>
                                </li>
                                <li><a href="#">Another action</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi fuga odio quibusdam. Iure
                            expedita, incidunt unde quis nam! Quod, quisquam. Officia quam qui adipisci quas
                            consequuntur nostrum sequi. Consequuntur, commodi.</p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-badge success"><i class="fa fa-graduation-cap"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt obcaecati, quaerat tempore
                            officia voluptas debitis consectetur culpa amet, accusamus dolorum fugiat, animi dicta
                            aperiam, enim incidunt quisquam maxime neque eaque.</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>