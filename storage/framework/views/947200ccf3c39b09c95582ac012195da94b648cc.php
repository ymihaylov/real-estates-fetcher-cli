<?php $__currentLoopData = $offersByFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filterName => $offers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <table>
        <thead>
            <tr>
                <th colspan="2"><?php echo e($filterName); ?></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a href="<?php echo e($offer->getLink()); ?>"><?php echo e($offer->getTitle()); ?></a></td>
                <td><?php echo e($offer->getPrice()); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<style>
    table {
        width: 40%;
        font-size: 30px;
    }

    table, th, td {
        border: 1px solid black;
    }

    th, td {
        padding: 10px;
    }
</style>
<?php /**PATH /home/ymihaylov/Projects/qa-workbench-2/repositories/real-estates-fetcher-cli/resources/views/offers.blade.php ENDPATH**/ ?>