<?php $__env->startSection('contenido'); ?>

    <div class="container"><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar producto
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('productos.modificado' , $producto->id)); ?>" method="POST">
                            <?php echo method_field('put'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="">Descripción</label>
                            <input type="text" class="form-control" value="<?php echo e($producto->description); ?>" name="description">
                            </div>
                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="number" class="form-control" value="<?php echo e($producto->price); ?>" name="price">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="<?php echo e(route('productos.index')); ?>" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Tienda\resources\views/productos/editar.blade.php ENDPATH**/ ?>