

<?php $__env->startSection('main'); ?>

<div class="container">
    <div class="py-5 text-center">
        <h2>Cadastro de Marcas</h2>
    </div>
    <div class="row mb-2">
        <div class="col-md-12" >
            <a href="<?php echo e(route('marcas.create')); ?>" class="btn btn-primary active" 
                role="button" aria-pressed="true">Nova Marca</a>
        </div>
    </div>

    <?php if(session('msg_success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('msg_success')); ?>

    </div>
    <?php endif; ?>

    <?php if(session('msg_error')): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e(session('msg_error')); ?>

    </div>
    <?php endif; ?>

    <?php if(count($marcas) >0): ?>  
    <div class="row">
        <div class="col-md-12" >

            <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($m->id); ?></th>
                    <td><?php echo e($m->nome); ?></td>
                    <td>
                        <form action="<?php echo e(route('marcas.destroy', $m->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">
                                Apagar
                            </button>                            
                            <a class="btn btn-primary btn-sm active" 
                                href="<?php echo e(route('marcas.show', $m->id)); ?>">
                                Detalhes
                            </a>
                            <a class="btn btn-secondary btn-sm active" 
                                href="<?php echo e(route('marcas.edit', $m->id)); ?>">
                                Editar
                            </a>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
            </table>

        </div>
    </div>
    <?php endif; ?> 

    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudweb\resources\views/marcas/index.blade.php ENDPATH**/ ?>