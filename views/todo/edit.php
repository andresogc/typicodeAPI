<div class="container">
    <h1 class="text-white-50 mb-4 p-4" >Editar ToDo de <?= $user->{'name'} ?></h1>

    <form action="<?=base_url?>todo/update" method="POST" class="row">
        
        <div class="col-sm-12">
            <label for="nombre" class="card-title text-white-50 mb-4"><h4> Title: </h4></label>
            <input type="text" name="title" value="<?=$todoResult->title?>" required >
        </div>
        <div class="col-sm-4">
            <label for="completed" class="card-title text-white-50 mb-4"><h4> Estado:</h4></label>
            <select class="form-select" aria-label="Default select example" name="completed" id="completed">
                <option selected>Seleccione una opción</option>
                <option value="false" <?php if(!$todoResult->completed){ echo 'selected';} ?>>No Completada</option>
                <option value="true" <?php if($todoResult->completed){ echo 'selected';} ?> >Completada</option>
            </select>
        </div>
        <input type="text" name="id" value="<?=$_GET['id']?>" hidden required >
        <input type="text" name="userId" value="<?=$_GET['userId']?>" hidden requered >
        
        <div class="col-md-12 m-4">
            <input type="submit" value="Update" class="btn btn-warning m-4 " >
        </div>
    </form>
</div>