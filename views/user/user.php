<div class="m-4">
    <h2 class="text-white-50">Lista de usuarios</h2>
    <div class="row " >
    <?php foreach($users as $key => $user): ?>
   
        <div class="col-sm-3 m-4 ">
            <div class="card bg-info" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title "><?= $user->name ?></h5>
                    <p class="card-text text-success"><?= $user->email ?></p>
                    <a href="<?=base_url?>todo/getAllTodosToUser&id=<?=$user->id?>" class="btn btn-warning">ToDos</a>
                </div>
            </div>
        </div>
    
    <?php endforeach ?>
    </div>

</div>