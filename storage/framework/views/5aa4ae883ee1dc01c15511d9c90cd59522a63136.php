

<?php $__env->startSection('main'); ?>

<div class="container">
    <div class="py-5 text-center">
        <h2>Cadastro de Departamentos</h2>
    </div>
    <div class="row">
        <div class="col-md-12" >

            <form action="<?php echo e(route('departamentos.update', $departamento->id)); ?>" 
                class="card p-2 my-4" method="POST"
            >
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="input-group">
                    <input type="text" placeholder="Nome do Departamento" 
                        value="<?php echo e($departamento->nome); ?>"
                        class="form-control" name="nome" required>
                    <div class="input-group-append">
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
            <a href="<?php echo e(route('departamentos.index')); ?>" 
            class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudweb\resources\views/departamentos/edit.blade.php ENDPATH**/ ?>