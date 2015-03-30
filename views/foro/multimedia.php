<?php
/* @var $this yii\web\View */
?>
<div class="row">
<center>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary btn-lg">
    <span style="font-size:30px;"class="glyphicon glyphicon-comment" aria-hidden="true"></span> <br> <hr>
    <input type="radio" name="options" id="option1" autocomplete="off" checked> Foro
  </label>
  <label class="btn btn-primary btn-lg ">
    <span style="font-size:30px;"class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> <br> <hr>
    <input type="radio" name="options" id="option2" autocomplete="off"> Documentos
  </label>
  <label class="btn btn-primary btn-lg active">
    <span style="font-size:30px;"class="glyphicon glyphicon-play" aria-hidden="true"></span> <br> <hr>
    <input type="radio" name="options" id="option3" autocomplete="off"> Multimendia
  </label>
  <label class="btn btn-primary btn-lg">
    <span style="font-size:30px;"class="glyphicon glyphicon-align-left" aria-hidden="true"></span> <br> <hr>
    <input type="radio" name="options" id="option3" autocomplete="off"> Mensajes
  </label>
</div>
</div>
</center>
</div>
<br>


<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><span style="font-size:15px;"class="glyphicon glyphicon-camera" aria-hidden="true"></span>  Imagenes</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><span style="font-size:15px;"class="glyphicon glyphicon-film" aria-hidden="true"></span>  Videos</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><span style="font-size:15px;"class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>  Audio</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span style="font-size:15px;"class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>  Documentos</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
<!--Pestañas-->    
    <div role="tabpanel" class="tab-pane active" id="home">
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
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
      </div>
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <div class="panel panel-primary">
          <div class="panel-heading">Panel heading without title</div>
          <div class="panel-body">
            Panel content
          </div>
        </div>
      </div>
    </div>
<!--END Pestañas-->
<!--Pestañas-->
    <div role="tabpanel" class="tab-pane" id="profile">
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
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
      </div>
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <div class="panel panel-primary">
          <div class="panel-heading">Panel heading without title</div>
          <div class="panel-body">
            Panel content
          </div>
        </div>
      </div>
    </div>
<!--END Pestañas-->
<!--Pestañas-->
    <div role="tabpanel" class="tab-pane" id="messages">
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
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
      </div>
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <div class="panel panel-primary">
          <div class="panel-heading">Panel heading without title</div>
          <div class="panel-body">
            Panel content
          </div>
        </div>
      </div>
    </div>
<!--END Pestañas-->
<!--Pestañas-->
    <div role="tabpanel" class="tab-pane" id="settings">
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
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
      </div>
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <div class="panel panel-primary">
          <div class="panel-heading">Panel heading without title</div>
          <div class="panel-body">
            Panel content
          </div>
        </div>
      </div>
    </div>
<!--END Pestañas-->
  </div>

</div>



