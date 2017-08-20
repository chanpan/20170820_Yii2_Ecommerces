<?php
# ----------------------------------------------------------------
# Glide
# glide is a wonderfully easy on-demand image manipulation library written in PHP
# http://glide.thephpleague.com/1.0/api/quick-reference
# ----------------------------------------------------------------
return [
    'class' => 'trntv\glide\components\Glide',
    'sourcePath' => '@storage/web/source',
    'cachePath' => '@storage/cache',
    'maxImageSize' => '4000000',
    'signKey' => 'Lhm5_vGAGMTvxt5AZnu31xGuRMhJIx5V',
    'presets' => [
        'sm' => [ 'w' => 540, 'h' => 540, 'fit' => 'contain'],
        'md' => [ 'w' => 720, 'h' => 720, 'fit' => 'contain'],
        'lg' => [ 'w' => 960, 'h' => 960, 'fit' => 'contain'],
        'xl' => [ 'w' => 1024, 'h' => 1024, 'fit' => 'contain']
    ]
];
