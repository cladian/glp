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
  <label class="btn btn-primary btn-lg ">
    <span style="font-size:30px;"class="glyphicon glyphicon-play" aria-hidden="true"></span> <br> <hr>
    <input type="radio" name="options" id="option3" autocomplete="off"> Multimendia
  </label>
  <label class="btn btn-primary btn-lg active">
    <span style="font-size:30px;"class="glyphicon glyphicon-align-left" aria-hidden="true"></span> <br> <hr>
    <input type="radio" name="options" id="option3" autocomplete="off"> Mensajes
  </label>
</div>
</div>
</center>
</div>
<br>


<div role="tabpanel">
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <div class="panel panel-primary">
      <div class="panel-heading">Crear mensaje</div>
      <div class="panel-body">
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary active">
            <span class="glyphicon glyphicon-ok"></span><input type="checkbox" autocomplete="off" checked> Selecionar todos
          </label>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <div class="panel panel-yellow">
      <div class="panel-heading">Mensajes recibidos</div>
      <div class="panel-body">
        Panel content
      </div>
    </div>
  </div>

</div>



