

<?php $__env->startSection('main'); ?>

<div class="container">
    <div class="py-5 text-center">
        <h2>Cadastro de Produtos</h2>
    </div>
    <div class="row">
        <div class="col-md-12" >

            <form action="<?php echo e(route("produtos.store")); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label for="nome">Nome do produto</label>
                    <input type="text" class="form-control" id="nome"
                        name="nome" placeholder="Produto" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="preco">Preço</label>
                        <input type="number" class="form-control" min="0.00" max="10000.00" 
                            step="0.01"  id="preco" 
                            name="preco" placeholder="Preço em R$" required>
                    </div>                            
                    <div class="form-group col-md-6">
                        <label for="estoque">Estoque</label>
                        <input type="number" class="form-control" id="estoque" 
                            name="estoque" placeholder="Estoque" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <select class="form-control" id="marca" name="marca" required>
<?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($marca->id); ?>">
                            <?php echo e($marca->nome); ?>

                        </option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>                        
                </div>                    
                <div class="form-group">
                    <label for="departamentos">Selecione os Departamentos</label>
                    <select multiple size="5" class="form-control" id="departamentos" 
                        name="departamentos[]"  aria-describedby="departamentosHelp"
                    >
<?php $__currentLoopData = $departamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                        <option value="<?php echo e($dep->id); ?>">
                            <?php echo e($dep->nome); ?>

                        </option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <small id="departamentosHelp" class="form-text text-muted">
                        Utilize as teclas 'ctrl' ou 'shift' para selecionar mais que um departamento.
                    </small>                        
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="<?php echo e(route('produtos.index')); ?>" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>

            </form> 


        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudweb\resources\views/produtos/create.blade.php ENDPATH**/ ?>