

<?php $__env->startSection('main'); ?>

<div class="container">
    <div class="py-5 text-center">
        <h2>Cadastro de Produtos</h2>
    </div>
    <div class="row">
        <div class="col-md-12" >

            <form action="<?php echo e(route('produtos.update', $produto->id)); ?>" class="card p-2 my-4" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="input-group">
                    <input type="text" placeholder="Nome do Produto" 
                        value="<?php echo e($produto->nome); ?>"
                        class="form-control" name="nome" required>
                    <div class="input-group-append">

                            <div class="input-group ">
                                <label for="preco">Preço</label>
                                <input type="number" placeholder="Preco" class="form-control" min="0.00" max="10000.00" 
                                 value="<?php echo e($produto->preco); ?>"
                                    step="0.01"  id="preco" 
                                    name="preco" placeholder="Preço em R$" required>
                            </div>                            
                            <div class="input-group">
                                <label for="estoque">Estoque</label>
                                <input type="number" class="form-control" id="estoque"
                                 value="<?php echo e($produto->estoque); ?>" 
                                    name="estoque" placeholder="Estoque" required>
                            </div> 
                        <button type="submit" class="btn btn-primary">
                            Salvar
                        </button>
                    </div>
                </div>
                <?php $__errorArgs = ["nome"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger my-2" role="alert">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>               
            </form>
            <a href="<?php echo e(route('produtos.index')); ?>" 
            class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudweb\resources\views/produtos/edit.blade.php ENDPATH**/ ?>