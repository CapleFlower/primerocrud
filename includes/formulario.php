<section>
<a href="index">
        <button class="btn btn-success">Voltar</button>
    </a>

    <h2 class="mt-3">Cadastrar vaga</h2>

    <form method="post" class="from-send">
        <div class="form-group">
            <label>Título</label>
        <input type="text" required class="form-control" name="titulo"> 
        </div>
        <div class="form-group">
            <label>Descrição</label>
        <textarea class="form-control" required name="descricao" row="5"></textarea>
        </div> 

        <div class="form-group">
            <label>Status</label>
            <div>
                <div class="from-check form check-inline">
                    <label>
                        <input type="radio" required name="status" value="s">Ativo
                    </label>
                    <label class="ml-3">
                        <input type="radio" required name="status" value="n">inativo
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</section>