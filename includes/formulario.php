<section>
<a href="index">
        <button class="btn btn-success">Voltar</button>
    </a>

    <h2 class="mt-3"><?php echo TITLE;?></h2>

    <form method="post" class="from-send">
        <div class="form-group">
            <label>Título</label>
        <input type="text" required class="form-control" name="titulo" value="<?php echo isset($obVaga->titulo) ? $obVaga->titulo : '';?>"> 
        </div>
        <div class="form-group">
            <label>Descrição</label>
        <textarea class="form-control" required name="descricao" row="5"> <?php echo isset($obVaga->descricao) ? $obVaga->descricao: '';?></textarea>
        </div> 

        <div class="form-group">
            <label>Status</label>
            <div>
                <div class="from-check form check-inline">
                    <label>
                        <input type="radio" required name="status" value="s" <?php echo isset($obVaga->status) && $obVaga->status == 's' ? 'checked' : '';?>>Ativo
                    </label>
                    <label class="ml-3">
                        <input type="radio" required name="status" value="n" <?php echo isset($obVaga->status) && $obVaga->status == 'n' ? 'checked' : '';?>>inativo
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</section>