
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <title>Twitter Profile</title>
</head>
<body>

    <section class="section_profile">
        <h2>PROFILE</h2>
        <a href="/" class="return_button">戻る</a>
        <div class="profile_wrapper">
            <div class="profile_box">
                
                <div class="profile_partition">
                    <form route="/users/{$user->id}/edit" method="POST" action="/edit" enctype="multipart/">
                    <?php echo csrf_field(); ?>

                        
                        <p> 
                            Profile_image:<input type="file" name="users_image" class="input-file"
                            id="image_url">
                        </p>
                        <img src="<?php echo e(asset('storage/avatar/' . $user->image_path)); ?>"alt="">
                        <p>
                            name：<input id="name" type="text" name="name" value="<?php echo e($user->name); ?>"required>
                        </p>
                        
                        <p>
                            E-mail：<input id="email" type="text" name="email" value="<?php echo e($user->email); ?>"required>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </p>
                        <p>
                            mention：<input id="mention" type="text" name="mention" value="<?php echo e($user->mention); ?>"required>
                            <?php $__errorArgs = ['mention'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </p>
                        <p>
                            password：<input id="password" type="text"  name="password"  autocomplete="new-password"  >
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </p>
                        <p>
                            password：<input id="password-confirm" type="text"  name="password_confirmation"  autocomplete="new-password">
                        </p>
                        <input type="submit" name="edit" value="変更" class="edit_button">
                    </form>
                    
                </div>  
            </div>
        </div>
    </section>

        
</body>
</html><?php /**PATH /var/www/twitter/resources/views/profile.blade.php ENDPATH**/ ?>