

<?php $__env->startSection('main'); ?>

<div class="container">
    <div class="py-5 text-center">
        <h2>Produto</h2>
    </div>
    <div class="row">
        <h3>
          ID: <?php echo e($produto->id); ?>

        </h3> 
    </div>
    <div class="row">       
        <h3>
          Nome: <?php echo e($produto->nome); ?>

        </h3>          
    </div>
    
    <div class="row mt-5">
      
      <h4>
          marcas:
           
         </h4>
      

      <div class="col-md-12" >

        <?php if(count($marcas) == 0): ?>
        <p> Nenhum marca associada.</p>
      <?php else: ?> 
        <ul>
        <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li> <?php echo e($marca->nome); ?> </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      <?php endif; ?>





        
      </div>
    </div>        

    <div class="row mt-5">
      <a href="<?php echo e(route('produtos.index')); ?>" 
        class="btn btn-primary" role="button" aria-pressed="true">Voltar</a>
    </div>
  </div>

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crudweb\resources\views/produtos/show.blade.php ENDPATH**/ ?>