      <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Department name</th>
                                                <th>Birth date</th>
                                                <th>Gender</th>
                                                <th>Hire date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><a href="personalInf/<?php echo e($key->emp_no); ?>"><?php echo e($key->emp_no); ?></a></td>
                                                <td><?php echo e($key->first_name); ?></td>
                                                <td><?php echo e($key->last_name); ?></td>
                                                <td><?php echo e($key->dept_name); ?></td>
                                                <td><?php echo e($key->birth_date); ?></td>
                                                <td><?php echo e($key->gender); ?></td>
                                                <td><?php echo e($key->hire_date); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php echo e($info->links()); ?>