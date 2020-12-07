

<?php $__env->startSection('main'); ?>

<div class="container">
    <div class="py-5 text-center">
        <h2>Departamento</h2>
    </div>
    <div class="row">
        <h3>
          ID: <?php echo e($departamento->id); ?>

        </h3>
    </div>
    <div class="row">       
        <h3>
          Nome: <?php echo e($departamento->nome); ?>

        </h3>          
    </div>
    
    <div class="row mt-5">
      
      <h4>Produtos:</h4>

      <div class="col-md-12" >
        
        


      </div>
    </div>        

    <div class="row mt-5">
      <a href="<?php echo e(route('departamentos.index')); ?>" 
        class="btn btn-primary" role="button" aria-pressed="true">Voltar</a>
    </div>
  </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudweb\resources\views/departamentos/show.blade.php ENDPATH**/ ?>