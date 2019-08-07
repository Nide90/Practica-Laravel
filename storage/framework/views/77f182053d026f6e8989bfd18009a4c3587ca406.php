<?php $__env->startSection('contenido'); ?>

    <div class="container"><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de productos
                        <a href="<?php echo e(route('productos.crearnuevo')); ?>" class="btn btn-success btn-sm float-right">Nuevo producto</a>
                    </div>
                    <div class="card-body">
                        <?php if(session('info')): ?>
                        <div class="alert alert-success">
                                <?php echo e(session ('info')); ?>

                        </div> 
                        <?php endif; ?>
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Acción</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($producto->description); ?>

                                    </td>
                                    <td>
                                        <?php echo e($producto->price); ?>

                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('productos.editar' , $producto->id)); ?>" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="javascript: document.getElementById('delete-<?php echo e($producto->id); ?>').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                    <form id="delete-<?php echo e($producto->id); ?>" action="<?php echo e(route('productos.borrado' , $producto->id)); ?>" method="POST">
                                    <?php echo method_field('delete'); ?>
                                    <?php echo csrf_field(); ?>
                                    </form>
                                    </td>
                                </tr>                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">
                        Bienvenido <?php echo e(auth()->user()->name); ?>

                        <a href="javascript: document.getElementById('logout').submit()" class="btn btn-danger btn-sm float-right">Cerrar sesión</a>
                        <form action="<?php echo e(route('logout')); ?>" id="logout" method="POST" style="display:none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Tienda\resources\views/productos/index.blade.php ENDPATH**/ ?>