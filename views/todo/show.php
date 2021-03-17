<div>
    <div class="m-5">
        <h1 class="text-white-50 mb-4">ToDos de <?= $user->{'name'} ?></h1>

        <form action="<?=base_url?>todo/save" method="POST" >
            <label for="nombre" class="card-title text-white-50 mb-4"></label>
            <input type="text" name="title" placeholder="Titulo..." required >
            <input type="text" name="userId" value="<?=$_GET['id']?>" hidden required >
            <input class="btn btn-success " type="submit" value="AGREGAR TODO" >
        </form>
    </div>
    <div class="row">
    <?php  foreach($userTodos as $key => $todo): ?>
   
        <div class="ccol-sm-2" style="width: 36rem;">
            <div class="card bg-info m-5">
                <div class="card-body">
                <h5 class="card-title"><span class="text-white-50">Title: </span> <?=$todo->title?> </h5>
                    <div class="form-check m-4">
                        <?php if($todo->completed):?>
                            <h6 class="text-white-50">  Estado:  <span class="text-success">Tarea completada</span></h6>
                        <?php else:  ?>
                            <h6 class="text-white-50"> Estado: <span class="text-danger">Tarea no completada</span></h6>
                        <?php endif  ?>
                    </div>
                    <span><a href="<?=base_url?>todo/deleteTodo&id=<?=$todo->id?>&userId=<?=$user->{'id'}?>"> <input class="btn btn-danger" type="submit" value="ELIMINAR" ></a></span> 
                    <span><a href="<?=base_url?>todo/showFormUpdate&id=<?=$todo->id?>&userId=<?=$user->{'id'}?>"> <input class="btn btn-warning" type="submit" value="EDITAR" ></a></span> 
                </div>
            </div>
        </div>
    
    <?php  endforeach ?>
    </div>
</div>