<div class="container">
<div class="mb-5 p-5">
    <h4 class="text-white-50">Se ha <?=$action ?> con exito la siguiente "TODO" para el usuario <?=$user->name?>:</h4>
</div>
<div class="row m-5">
  <div class="col-sm-6">
    <div class="card bg-info">
      <div class="card-body">
        <h5 class="card-title"><span class="text-white-50"> Id TODO: </span> <?=$save->{'id'} ?></h5>
        <h5 class="card-title"><span class="text-white-50">Title: </span> <?=$save->{'title'} ?></h5>
        <h5 class="card-title"><span class="text-white-50">Estado: </span><?php if( $save->{'completed'}=='1'){echo 'completada';}else{echo 'No completada';} ?></h5>
        <a href="<?=base_url?>" class="btn btn-warning m-4 ">VOLVER A INICIO</a>
      </div>
    </div>
  </div>
</div>

</div>